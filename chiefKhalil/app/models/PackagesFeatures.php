<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class PackagesFeatures extends Model
{
    protected $table = 'packages_features';
    protected $fillable = [
      'name_ar',
      'name_en',
      'user_package_id'
    ];
}
