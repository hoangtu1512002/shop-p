<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;


class ApiController extends Controller
{
    public function apiGetPermissionByRole(Request $request, $role_id)
    {
        $role = Role::findOrFail($role_id);;
        $parts = explode('_', $role->role);
        $search = $parts[0];

        $userEdit = isset($request->userId) ? User::where('id', $request->userId)->first() : null;
        $userRequest = Auth::user();
        $userRequestRole = $userRequest->roles->pluck('role')->first();

        switch ($role) {
            case $request->type === "create" && $search === 'Admin' && $userRequestRole === 'Admin':
                $permissions = Permission::where('permission', 'supper_permission')->get();
                break;

            case $request->type === 'edit' && $search === 'Admin' && $userRequestRole === 'Admin':
                $permissions = Permission::where('permission', 'supper_permission')->get();
                break;

            case $request->type === 'edit' && $userEdit->id === $userRequest->id:
                $permissions = $userEdit->permissions;
                break;

            case $request->type === 'create' || $request->type === 'edit':
                $permissions = Permission::where('permission', 'LIKE', "%{$search}%")->get();
                break;

            default:
                return redirect()->back()->withErrors('có lỗi xảy ra vui lòng thử lại sau');
                break;
        }

        return view('admin.form.checkbox', [
            'permissions' => $permissions,
            'userEdit' => $userEdit
        ]);
    }
}
