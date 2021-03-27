<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Chief extends Authenticatable
{
    use Notifiable;


    protected $guard = 'chief';

    protected $fillable = [
        'fname','lname','gender','email', 'password','phone','image','gender',
            'biography', 'professionalLife', 'instagram', 'twitter', 'facebook'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
