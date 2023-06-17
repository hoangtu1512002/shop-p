<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\belongsToMany;
use App\Models\User;
use App\Models\Permission;

class Role extends Model
{
    use HasFactory;

    protected $table = 'roles';

    /**
     * Get the user that owns the Role
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsToMany
     */
    public function users(): belongsToMany
    {
        return $this->belongsToMany(User::class, 'user_role');
    }

    /**
     * The roles that belong to the Role
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function permissions(): BelongsToMany
    {
        return $this->belongsToMany(Permission::class,'role_permission');
    }
}
