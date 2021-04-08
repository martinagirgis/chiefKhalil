<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class ChiefsSkills extends Model
{
    protected $table = 'chiefs_skills';

    protected $fillable = [
        'skill_en',
        'skill_ar',
        'percentage',
        'chief_id',
    ];
}
