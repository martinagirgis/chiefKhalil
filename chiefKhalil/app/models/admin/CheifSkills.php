<?php

namespace App\models\admin;

use Illuminate\Database\Eloquent\Model;

class CheifSkills extends Model
{
    protected $table = 'chiefs_skills';
    protected $fillable = [
        'skill',
        'percentage',
        'chief_id',
    ];
}
