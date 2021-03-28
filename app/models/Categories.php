<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected $guard = 'categories';

    protected $fillable = [
        'name_ar',
        'name_en',
        'description_ar',
        'description_en',
        'image'

    ];
}
