<?php

namespace App\Policies\Admin;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AdminMenuPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    private function hasAccess(User $user, array $allowedRoles)
    {
        $allowedRoles = array_merge($allowedRoles, ['Admin']);
        return $user->roles->pluck('role_name')->intersect($allowedRoles)->count() > 0;
    }

    public function viewDashboard(User $user)
    {
        $allowedRoles = []; // thêm các Role được phép truy cập view này tại đây.
        return $this->hasAccess($user, $allowedRoles);
    }

    public function viewCategory(User $user)
    {
        $allowedRoles = []; // thêm các Role được phép truy cập view này tại đây.
        return $this->hasAccess($user, $allowedRoles);
    }

    public function viewProduct(User $user)
    {
        $allowedRoles = []; // thêm các Role được phép truy cập view này tại đây.
        return $this->hasAccess($user, $allowedRoles);
    }

    public function viewUserManager(User $user)
    {
        $allowedRoles = []; // thêm các Role được phép truy cập view này tại đây.
        return $this->hasAccess($user, $allowedRoles);
    }
}
