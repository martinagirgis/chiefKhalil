<?php

namespace App\models\admin;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    protected $table = 'courses_lessons';
    protected $fillable = [
        'name_ar',
        'name_en',
        'details_ar',
        'details_en',
        'image',
        'video',
        'course_id',
    ];
}
