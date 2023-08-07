<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Helpers\Message;
use App\Http\Requests\Admin\StaffUserRequest;
use App\Http\Requests\Admin\StaffUserInfoRequest;
use App\Models\UserInfo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use App\Helpers\GoogleDriver;

class UserManagementController extends Controller
{

    private function checkUserReuqestRole()
    {
        $userRequest = Auth::user();
        return $userRequest->roles->pluck('role')->first();
    }

    public function getStaff()
    {
        $staffUser = User::whereDoesntHave('roles', function ($query) {
            if ($this->checkUserReuqestRole() === 'Admin') {
                $query->where('role', 'Customer')->orWhere('is_active', '0');
            } else {
                $query->where('role', 'Customer')->orWhere('role', 'Admin')->orWhere('is_active', '0');
            }
        })->get();

        return view('admin.pages.userManagement.staff-view', [
            'index' => 1,
            'staffUsers' => $staffUser
        ]);
    }

    public function createStaff()
    {
        if (Gate::allows('create-user')) {
            $roles = $this->checkUserReuqestRole() === 'Admin' ? Role::all() : Role::where('role', '!=', 'Admin')->get();
            return view('admin.pages.userManagement.staff-add', [
                'roles' => $roles
            ]);
        }
        return redirect()->back()->withErrors(Message::notAccess);
    }

    public function storeStaff(StaffUserRequest $staffUserRequest)
    {
        $staffUserNew = User::create([
            'email' => $staffUserRequest->email,
            'password' => Hash::make($staffUserRequest->password),
        ]);
        $staffUserNew->roles()->sync($staffUserRequest->role);
        $staffUserNew->permissions()->sync($staffUserRequest->permissions);
        session()->flash('success', Message::createSuccess);
        return redirect()->route('admin.user.management.staff');
    }

    public function editStaff($usid)
    {
        if (Gate::allows('update-user')) {
            $userEdit = User::findOrFail($usid);
            $roleUserEdit = $userEdit->roles->pluck('role')->first();

            $roles = $this->checkUserReuqestRole() === 'Admin' ? Role::all() : Role::where('role', '!=', 'Admin')->get();

            if ($this->checkUserReuqestRole() != 'Admin' && $roleUserEdit === 'Admin') {
                return redirect()->route('admin.user.management.staff')->withErrors('bạn không được phép truy cập mục này');
            }

            return view('admin.pages.userManagement.staff-edit', [
                'roles' => $roles,
                'user' => $userEdit
            ]);
        }
        return redirect()->back()->withErrors(Message::notAccess);
    }

    public function updateStaff(StaffUserRequest $staffUserRequest, $usid)
    {
        $staffUserUpdate = User::findOrFail($usid);

        if ($staffUserUpdate->id === Auth::id()) {
            return redirect()->back()->withErrors(Message::notAccess);
        }

        $staffUserUpdate->update([
            'email' => $staffUserRequest->email,
            'password' => $staffUserRequest->password ? Hash::make($staffUserRequest->password) : $staffUserUpdate->password,
        ]);

        $staffUserUpdate->roles()->sync($staffUserRequest->role);
        $staffUserUpdate->permissions()->sync($staffUserRequest->permissions);
        session()->flash('success', Message::updateSuccess);
        return redirect()->route('admin.user.management.staff');
    }

    public function staffUserInfo($usid)
    {
        if (Gate::allows('update-info-user')) {
            $user = UserInfo::find($usid);
            if ($user) {
                return view('admin.pages.userManagement.staff-info', ['usid' => $usid, 'user' => $user]);
            }
            return view('admin.pages.userManagement.staff-info', ['usid' => $usid, 'user' => null]);
        }
        return redirect()->back()->withErrors(Message::notAccess);
    }

    public function staffUserInfoUpdate(StaffUserInfoRequest $staffUserInfoRequest, $usid)
    {
        $userInfo = UserInfo::updateOrCreate(
            ['user_id' => $usid],
            [
                'fullname' => $staffUserInfoRequest->fullname,
                'nickname' => $staffUserInfoRequest->nickname,
                'phone' => $staffUserInfoRequest->phone,
                'gender' => $staffUserInfoRequest->gender,
                'date_of_birth' => $staffUserInfoRequest->date_of_birth,
                'address' => $staffUserInfoRequest->address,
                'date_start_work' => $staffUserInfoRequest->date_start_work,
                'salary' => $staffUserInfoRequest->salary,
            ]
        );

        if ($staffUserInfoRequest->avatar) {
            $avatar = GoogleDriver::upload($staffUserInfoRequest->avatar);
            $oldAvatar = $userInfo->getOriginal('avatar');
            $userInfo->avatar = $avatar['name'];
            $userInfo->avatar_url = $avatar['url'];
            $userInfo->save();
            GoogleDriver::delete($oldAvatar);
        }

        session()->flash('success', Message::createSuccess);
        return redirect()->route('admin.user.management.staff');
    }

    public function staffUserDisable($usid)
    {
        $staffUserUpdate = User::findOrFail($usid);
        if ($staffUserUpdate->id === Auth::id()) {
            return redirect()->route('admin.user.management.staff')->withErrors(Message::notAccess);
        }
        $staffUserUpdate->is_active = 0;
        $staffUserUpdate->save();
        session()->flash('success', Message::updateSuccess);
        return redirect()->route('admin.user.management.staff');
    }

    public function staffUserDelete($usid)
    {
        dd($usid);
    }

    public function getDisableUser()
    {
        $index = 1;
        $users = User::whereHas('roles', function ($query) {
            $query->where('role', '!==', 'Customer')->orWhere('is_active', 0);
        })->get();

        return view('admin.pages.userManagement.disable', [
            'users' => $users,
            'index'=> $index
        ]);
    }

    public function restoreUser ($usid) 
    {
        $restoreUser = User::findOrFail($usid);
        $restoreUser->is_active = 1;
        $restoreUser->save();
        session()->flash('success', Message::updateSuccess);
        return redirect()->route('admin.user.management.staff');
    }
}
