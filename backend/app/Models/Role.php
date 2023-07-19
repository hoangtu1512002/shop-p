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

    protected $fillable = ['role_name'];

    /**
     * Get the user that owns the Role
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsToMany
     */
    public function users(): belongsToMany
    {
        return $this->belongsToMany(User::class, 'user_role');
    }
}
