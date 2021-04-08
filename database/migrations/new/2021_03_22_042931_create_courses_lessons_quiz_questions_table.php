<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesLessonsQuizQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses_lessons_quiz_questions', function (Blueprint $table) {
            $table->id();
            $table->string('question_ar');
            $table->string('question_en');

            $table->string('correct_answer');
            $table->string('all_answers');

            $table->double('question_score');

            $table->unsignedBigInteger('courses_lessons_quiz_id');
            $table->foreign('courses_lessons_quiz_id')->references('id')->on('courses_lessons_quiz');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('courses_lessons_quiz_questions');
    }
}
