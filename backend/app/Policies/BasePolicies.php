<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class BasePolicies
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

    public function hasAccess(User $user, $table, $column, $allowed, array $allowedOrther)
    {
        $allowedOrther = array_merge($allowedOrther, $allowed);
        return $user->$table->pluck($column)->intersect($allowedOrther)->count() > 0;
    }
}
