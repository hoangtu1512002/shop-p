<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;


class ApiController extends Controller
{
    public function apiGetPermissionByRole($id)
    {
        $role = Role::where('id', $id)->first();
        $user = Auth::user();

        $parts = explode('_', $role->role);
        $search = $parts[0];
        $role = $user->roles->pluck('role')->first();

        if ($search === 'Admin' && $role === "Admin") {
            $permissions = Permission::where('permission', 'LIKE', "%supper_permission%")->get();
            $html = View::make('admin.common.checkbox', ['permissions' => $permissions])->render();
            return response()->json(['html' => $html]);
        }
        
        $permissions = Permission::where('permission', 'LIKE', "%{$search}%")->get();
        $html = View::make('admin.common.checkbox', ['permissions' => $permissions])->render();
        return response()->json(['html' => $html]);
    }
}
