<?php

namespace App\models\admin;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{

    protected $fillable = [
        'name_ar',
        'name_en',
        'details_ar',
        'details_en',
        'number_of_lessons',
        'category_id',
        'chief_id',
        'image'
    ];
}
