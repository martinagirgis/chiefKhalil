<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Add extends Model
{
    protected $table = 'adds';

    protected $fillable = [
        'video',
        'skipped',
        'clicked',
        'adv_link',
        'from',
        'to'
    ];
}
