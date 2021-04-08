<?php

namespace App\models\admin;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $table = 'user_packages';
    protected $foreign_key = 'user_package_id';
    protected $fillable =[
      'name',
      'price',
      'duration'
    ];
}
