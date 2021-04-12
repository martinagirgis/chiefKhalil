<?php

namespace App\models\admin;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $table = 'user_packages';
    protected $fillable =[
      'name',
      'price',
      'duration'
    ];
}
