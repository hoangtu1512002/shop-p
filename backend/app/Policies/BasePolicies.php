<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class BasePolicies
{
    use HandlesAuthorization;

    public function hasAccess(User $user, $table, $column, $allowed, array $allowedOrther)
    {
        $allowedOrther = array_merge($allowedOrther, $allowed);
        return $user->$table->pluck($column)->intersect($allowedOrther)->count() > 0;
    }

    public function checkPermission($user, $allowedPermissionOrther)
    {
        $table = 'permissions';
        $column = 'permission';
        $allowed = ['supper_permission'];
        return $this->hasAccess($user, $table, $column, $allowed, $allowedPermissionOrther);
    }
}
