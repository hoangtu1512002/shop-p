<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;

class UserManagementController extends Controller
{
    public function getStaff()
    {
        return view('admin.pages.userManagement.staff-view');
    }

    public function getCustomers() 
    {
        return view('admin.pages.userManagement.customer-view');
    }

    public function createStaff ()
    {
        $roles = Role::all();
        return view('admin.pages.userManagement.add-staff', [
            'roles' => $roles
        ]);
    }

    public function storeStaff (Request $request) {

    }
}
