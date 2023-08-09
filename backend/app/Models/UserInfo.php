<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\User;

class UserInfo extends Model
{
    use HasFactory;

    protected $table = 'user_infos';

    protected $fillable = [
        "fullname",
        "nickname",
        "date_of_birth",
        "gender",
        "phone",
        "address",
        "date_start_work",
        "salary",
        "interest",
        "avatar",
        "avatar_url",
        "date_end_work",
        'user_id'
    ];
}
