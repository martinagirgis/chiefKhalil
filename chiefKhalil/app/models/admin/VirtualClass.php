<?php

namespace App\models\admin;

use Illuminate\Database\Eloquent\Model;

class VirtualClass extends Model
{
    protected $table = 'virtual_classes';
    protected $fillable = [
        'name',
        'user_id',
        'session_id'
    ];
}
