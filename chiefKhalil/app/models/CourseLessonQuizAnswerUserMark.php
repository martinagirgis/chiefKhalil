<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class CourseLessonQuizAnswerUserMark extends Model
{
    protected $table = 'course_lesson_quiz_answer_user_mark';

    protected $fillable = [
        'mark',
        'user_id',
        'courses_lessons_quiz_id',
    ];
}
