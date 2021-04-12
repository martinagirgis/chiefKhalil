<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class CoursesLessonsQuizQuestions extends Model
{
    protected $table = 'courses_lessons_quiz_questions';

    protected $fillable = [
        'question_ar',
        'question_en',
        'correct_answer_en',
        'all_answers_en',
        'question_score',
        'courses_lessons_quiz_id',
    ];
}
