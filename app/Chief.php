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
            'biography_en','biography_ar', 'professionalLife_en','professionalLife_ar', 'instagram', 'twitter', 'facebook'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function chiefSkills()
    {
        return $this->hasMany('App\models\ChiefsSkills', 'chief_id');
    }
}
