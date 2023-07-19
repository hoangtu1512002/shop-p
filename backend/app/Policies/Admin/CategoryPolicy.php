<?php

namespace App\Policies\Admin;

use App\Policies\BasePolicies;
use App\Models\User;

class CategoryPolicy extends BasePolicies
{
    private $table = 'permissions';
    private $column = 'permission_name';
    private $allowed = ['supper_permission', 'category_management']; // các permission có quyền truy cập

    public function create(User $user)
    {
        $allowedPermissionOrther = ['create_category'];
        return $this->hasAccess($user, $this->table, $this->column, $this->allowed, $allowedPermissionOrther);
    }

    public function update(User $user)
    {
        $allowedPermissionOrther = ['update_category'];
        return $this->hasAccess($user, $this->table, $this->column, $this->allowed, $allowedPermissionOrther);
    }

    public function delete(User $user)
    {
        $allowedPermissionOrther = ['delete_category'];
        return $this->hasAccess($user, $this->table, $this->column, $this->allowed, $allowedPermissionOrther);
    }

    public function selling(User $user)
    {
        $allowedPermissionOrther = ['stop_selling_category'];
        return $this->hasAccess($user, $this->table, $this->column, $this->allowed, $allowedPermissionOrther);
    }
}
