<?php

namespace App\Policies\Admin;

use App\Policies\BasePolicies;
use App\Models\User;

class CategoryPolicy extends BasePolicies
{

    public function create(User $user)
    {
        $allowedPermissionOrther = ['create_category'];
        return $this->checkPermission($user, $allowedPermissionOrther);
    }

    public function update(User $user)
    {
        $allowedPermissionOrther = ['update_category'];
        return $this->checkPermission($user, $allowedPermissionOrther);
    }

    public function delete(User $user)
    {
        $allowedPermissionOrther = ['delete_category'];
        return $this->checkPermission($user, $allowedPermissionOrther);
    }

    public function selling(User $user)
    {
        $allowedPermissionOrther = ['stop_selling_category'];
        return $this->checkPermission($user, $allowedPermissionOrther);
    }
}
