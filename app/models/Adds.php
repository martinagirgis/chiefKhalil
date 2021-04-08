<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Adds extends Model
{
    protected $table = 'adds';

    protected $fillable = [
        'url',
        'skiped',
        'clicked',
        'from',
        'to',
        'link',
    ];
}
