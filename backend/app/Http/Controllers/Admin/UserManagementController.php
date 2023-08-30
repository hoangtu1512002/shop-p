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
    private $staff;

    public function __construct(User $staff)
    {
        $this->staff = $staff;
    }

    private function checkUserReuqestRole()
    {
        $userRequest = Auth::user();
        return $userRequest->roles->pluck('role')->first();
    }

    public function getStaff(Request $request)
    {
        $roles = Role::all();
        $status = [$this->staff::STATUS_ACTIVE, $this->staff::STATUS_INACTIVE];
        $staffUser = $this->staff->whereDoesntHave('roles', function ($query) {
            $query->where('role', 'Customer');
        })->getModel()->findByConditions($request, $status);

        return view('admin.pages.userManagement.staff-view', [
            'index' => 1,
            'staffUsers' => $staffUser,
            'roles' => $roles
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
        $staffUserNew = $this->staff->create([
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
            $userEdit = $this->staff->findOrFail($usid);
            $roleUserEdit = $userEdit->roles->pluck('role')->first();

            $roles = $this->checkUserReuqestRole() === 'Admin' ? Role::all() : Role::where('role', '!=', 'Admin')->get();

            if ($this->checkUserReuqestRole() != 'Admin' && $roleUserEdit === 'Admin') {
                return redirect()->route('admin.user.management.staff')->withErrors(Message::notAccess);
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
        $staffUserUpdate = $this->staff->findOrFail($usid);

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
            $staffRole = $this->staff->findOrFail($usid)->roles->pluck('role')->first();
            if ($this->checkUserReuqestRole() != 'Admin' && $staffRole === 'Admin') {
                return redirect()->route('admin.user.management.staff')->withErrors(Message::notAccess);
            } else {
                $userInfo = UserInfo::find($usid);
                if ($userInfo) {
                    return view('admin.pages.userManagement.staff-info', ['usid' => $usid, 'userInfo' => $userInfo]);
                }
                return view('admin.pages.userManagement.staff-info', ['usid' => $usid, 'userInfo' => null]);
            }
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
        $staffUserUpdate = $this->staff->findOrFail($usid);
        $staffDisableRole = $staffUserUpdate->roles->pluck('role')->first();
        if ($staffUserUpdate->id === Auth::id() || $this->checkUserReuqestRole() != 'Admin' && $staffDisableRole === 'Admin') {
            return redirect()->route('admin.user.management.staff')->withErrors(Message::notAccess);
        }
        $staffUserUpdate->status = $this->staff::STATUS_INACTIVE;
        $staffUserUpdate->save();
        session()->flash('success', Message::updateSuccess);
        return redirect()->route('admin.user.management.staff');
    }

    public function restoreUser($usid)
    {
        $restoreUser = $this->staff->findOrFail($usid);
        $restoreUser->status = $this->staff::STATUS_ACTIVE;
        $restoreUser->save();
        session()->flash('success', Message::updateSuccess);
        return redirect()->route('admin.user.management.staff');
    }

    public function staffUserDelete($usid)
    {
        dd($usid);
    }
}
