<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserManagementController extends Controller
{
    public function getAdministrators()
    {
        return view('admin.pages.userManagement.view');
    }

    public function getCustomers() 
    {
        return view('admin.pages.userManagement.customer');
    }
}
