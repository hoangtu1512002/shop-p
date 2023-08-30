<?php

namespace App\Policies\Admin;

use App\Models\User;
use App\Policies\BasePolicies;


class ProductPolicy extends BasePolicies
{
    public function create(User $user)
    {
        $allowedPermissionOrther = ['create_product'];
        return $this->checkPermission($user, $allowedPermissionOrther);
    }

    public function update(User $user)
    {
        $allowedPermissionOrther = ['update_product'];
        return $this->checkPermission($user, $allowedPermissionOrther);
    }

    public function delete(User $user)
    {
        $allowedPermissionOrther = ['delete_product'];
        return $this->checkPermission($user, $allowedPermissionOrther);
    }
}
