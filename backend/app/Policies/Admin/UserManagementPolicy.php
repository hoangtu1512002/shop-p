<?php

namespace App\Policies\Admin;

use App\Policies\BasePolicies;
use App\Models\User;

class UserManagementPolicy extends BasePolicies
{
    public function create(User $user)
    {
        $allowedPermissionOrther = ['create_user'];
        return $this->checkPermission($user, $allowedPermissionOrther);
    }

    public function update(User $user)
    {
        $allowedPermissionOrther = ['update_user'];
        return $this->checkPermission($user, $allowedPermissionOrther);
    }

    public function updateInfo(User $user)
    {
        $allowedPermissionOrther = ['update_info_user'];
        return $this->checkPermission($user, $allowedPermissionOrther);
    }

    public function disable(User $user)
    {
        $allowedPermissionOrther = ['disable_user'];
        return $this->checkPermission($user, $allowedPermissionOrther);
    }

    public function delete(User $user)
    {
        $allowedPermissionOrther = ['delete_user'];
        return $this->checkPermission($user, $allowedPermissionOrther);
    }
}
