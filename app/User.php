<?php

namespace App;

use App\models\admin\Package;
use App\models\admin\VirtualClass;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fname',
        'lname',
        'email',
        'phone',
        'gender',
        'package_id',
        'state',
        'image',
        'password',
        'user_type',
        'active',
        'countryCode',
        'code',
        'endDateSubscripe'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //Stream.
    public function myClass() {
        return $this->hasOne(VirtualClass::class);
    }

    public function userPackages() {
        return $this->belongsTo('App\models\admin\Package','package_id');
    }
}
