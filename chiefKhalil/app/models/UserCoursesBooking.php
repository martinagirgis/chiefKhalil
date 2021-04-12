<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class UserCoursesBooking extends Pivot
{
    protected $table = 'user_courses_booking';

    protected $fillable = [
        'user_id',
        'course_id',
        'course_progress',
    ];
}
