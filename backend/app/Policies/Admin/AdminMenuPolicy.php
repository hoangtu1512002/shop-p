<?php

namespace App\Policies\Admin;

use App\Models\User;
use App\Policies\BasePolicies;

class AdminMenuPolicy extends BasePolicies
{
    private $table = 'roles';
    private $column = 'role_name';
    private $allowed = ['Admin']; // các role có quyền truy cập vào tất cả menu

    public function viewDashboard(User $user)
    {
        $allowedRolesOrther = ['Category_management', 'Product_management', 'User_management']; 
        return $this->hasAccess($user, $this->table, $this->column, $this->allowed, $allowedRolesOrther);
    }

    public function viewCategory(User $user)
    {
        $allowedRolesOrther = ['Category_management'];
        return $this->hasAccess($user, $this->table, $this->column, $this->allowed, $allowedRolesOrther);
    }

    public function viewProduct(User $user)
    {
        $allowedRolesOrther = ['Product_management'];
        return $this->hasAccess($user, $this->table, $this->column, $this->allowed, $allowedRolesOrther);
    }

    public function viewUserManager(User $user)
    {
        $allowedRolesOrther = ['User_management'];
        return $this->hasAccess($user, $this->table, $this->column, $this->allowed, $allowedRolesOrther);
    }
}
