<?php

namespace App\models\admin;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    protected $fillable = [
        'name_ar',
        'name_en',
        'description_ar',
        'description_en',
        'image'
    ];

}
