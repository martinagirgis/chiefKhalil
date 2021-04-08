<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class UserChiefsFollowingsList extends Pivot
{
    protected $table = 'user_chiefs_followings_list';

    protected $fillable = [
        'user_id',
        'chief_id',
    ];
}
