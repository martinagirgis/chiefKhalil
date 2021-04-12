<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use Notifiable;

    protected $guard = 'admins';

    protected $fillable = [
        'fname', 'lname', 'city', 'gender', 'email', 'password', 'phone', 'image', 'facebock','twitter','instagram',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
