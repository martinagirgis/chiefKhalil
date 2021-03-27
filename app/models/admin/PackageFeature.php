<?php

namespace App\models\admin;

use Illuminate\Database\Eloquent\Model;

class PackageFeature extends Model
{
    protected $table = 'packages_features';
    protected $fillable = [
      'name_ar',
      'name_en',
      'user_package_id'
    ];
}
