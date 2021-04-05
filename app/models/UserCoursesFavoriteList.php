<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class UserCoursesFavoriteList extends Pivot
{
    protected $table = 'user_courses_favorite_list';

    protected $fillable = [
        'user_id',
        'course_id',
    ];
}
