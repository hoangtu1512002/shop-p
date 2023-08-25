<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Relations\belongsToMany;
use Illuminate\Database\Eloquent\Relations\belongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use App\Models\Role;
use App\Models\UserInfo;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The roles that belong to the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsToMany
     */
    public function roles(): belongsToMany
    {
        return $this->belongsToMany(Role::class, 'user_role');
    }

    /**
     * The roles that belong to the Role
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function permissions(): BelongsToMany
    {
        return $this->belongsToMany(Permission::class, 'user_permission');
    }


    /**
     * Get the user associated with the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function user_info(): belongsTo
    {
        return $this->belongsTo(UserInfo::class, 'id', 'user_id');
    }

    private $limit = 10;

    public function findByConditions($request)
    {
        $role = $request->input('role');
        $keyword = $request->input('keyword');
        $status = $request->input('status');
        $selectedFilters = ['email' => $keyword, 'is_active' => $status];
        $conditions  = [];

        $query = $this->query();

        if ($role !== null) {
            $query = $this->whereHas('roles', function ($query) use ($role) {
                $query->where('id', $role);
            });
        }

        foreach ($selectedFilters as $field => $value) {
            if (isset($value)) {
                $conditions[] = [$field, 'like', '%' . $value . '%'];
            }
        }

        $query->where($conditions);

        $result = $query->paginate($this->limit)->appends($selectedFilters);

        return $result;
    }
}
