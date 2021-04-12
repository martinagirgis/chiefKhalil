<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseLessonQuizAnswerUserMarkTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_lesson_quiz_answer_user_mark', function (Blueprint $table) {
            $table->id();
            $table->string('mark');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');

            $table->unsignedBigInteger('quiz_id');
            $table->foreign('quiz_id')->references('id')->on('courses_lessons_quiz');

//            $table->unsignedBigInteger('courses_lessons_quiz_id');
//            $table->foreign('courses_lessons_quiz_id')->references('id')->on('courses_lessons_quiz');

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
        Schema::dropIfExists('course_lesson_quiz_answer_user_mark');
    }
}
