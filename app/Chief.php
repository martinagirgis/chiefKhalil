<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Chief extends Authenticatable
{
    use Notifiable;

    protected $table='chiefs';

    protected $fillable  = [
        'fname',
        'lname',
        'gender',
        'email',
        'password',
        'phone',
        'image',
        'gender',
        'biography_en',
        'biography_ar',
        'professionalLife_en',
        'professionalLife_en',
        'instagram',
        'twitter',
        'facebook'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
