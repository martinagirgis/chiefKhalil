<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class UserPackages extends Model
{

    protected $table = 'user_packages';
    protected $fillable =[
      'name',
      'price',
      'duration'
    ];

    public function features()
    {
        return $this->hasMany('App\models\PackagesFeatures','user_package_id');
    }
}
