<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Footer extends Model
{
    protected $table = 'footers';

    protected $fillable = [
        'address_ar',
        'address_en',
        'phone',
    ];
}
