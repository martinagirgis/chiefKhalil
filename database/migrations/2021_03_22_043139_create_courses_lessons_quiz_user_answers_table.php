<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesLessonsQuizUserAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses_lessons_quiz_user_answers', function (Blueprint $table) {
            $table->id();
            $table->string('answer');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');

            $table->unsignedBigInteger('quiz_questions_id');
            $table->foreign('quiz_questions_id')->references('id')->on('courses_lessons_quiz_questions');

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
        Schema::dropIfExists('courses_lessons_quiz_user_answers');
    }
}
