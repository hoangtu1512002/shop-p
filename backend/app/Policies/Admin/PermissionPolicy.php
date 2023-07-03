<?php

namespace App\Policies\Admin;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PermissionPolicy
{
    use HandlesAuthorization;

    private function hasAccess(User $user, array $allowedPermission)
    {
        $allowedPermission = array_merge($allowedPermission, ['super_permission']);
        return $user->permissions->pluck('permission_name')->intersect($allowedPermission)->count() > 0;
    }

    public function create(User $user)
    {
        $allowedPermission = ['create'];
        return $this->hasAccess($user, $allowedPermission);
    }

    public function update(User $user)
    {
        $allowedPermission = ['update'];
        return $this->hasAccess($user, $allowedPermission);
    }

    public function delete(User $user)
    {
        $allowedPermission = ['delete'];
        return $this->hasAccess($user, $allowedPermission);
    }
}
