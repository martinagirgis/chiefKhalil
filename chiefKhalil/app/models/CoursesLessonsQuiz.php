<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class CoursesLessonsQuiz extends Model
{
    protected $table = 'courses_lessons_quiz';

    protected $fillable = [
        'title_ar',
        'title_en',
        'description_ar',
        'description_en',
        'number_of_questions',
        'total_score',
        'courses_lessons_id',
    ];

    public function quizQuestions() {
        return $this->hasMany('App\Models\CoursesLessonsQuizQuestions','courses_lessons_quiz_id');
    }
}
