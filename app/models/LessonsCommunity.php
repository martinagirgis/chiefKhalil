<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class LessonsCommunity extends Model
{
    protected $table = 'lessons_community';

    protected $fillable = [
        'body',
        'user_id',
        'courses_lessons_id',
        'created_at',
    ];

    public function commentUser()
    {
        return $this->belongsTo('App\User','user_id');
    }
}
