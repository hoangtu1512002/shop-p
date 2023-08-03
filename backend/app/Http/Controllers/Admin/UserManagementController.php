<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StaffUserRequest;
use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Helpers\Message;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;




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
                $query->where('role', 'Customer');
            } else {
                $query->where('role', 'Customer')->orWhere('role', 'Admin');
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

        $staffUserUpdate->update([
            'email' => $staffUserRequest->email,
            'password' => $staffUserRequest->password ? Hash::make($staffUserRequest->password) : $staffUserUpdate->password,
        ]);

        if ($staffUserUpdate->id !== Auth::id()) {
            $staffUserUpdate->roles()->sync($staffUserRequest->role);
            $staffUserUpdate->permissions()->sync($staffUserRequest->permissions);
        }

        session()->flash('success', Message::updateSuccess);
        return redirect()->route('admin.user.management.staff');
    }

    public function staffUserInfo($usid)
    {
        return view('admin.pages.userManagement.staff-info');
    }
}
