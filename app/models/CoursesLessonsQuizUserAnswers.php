<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class CoursesLessonsQuizUserAnswers extends Model
{
    protected $table = 'courses_lessons_quiz_user_answers';

    protected $fillable = [
        'answer',
        'user_id',
        'quiz_questions_id',
    ];
}
