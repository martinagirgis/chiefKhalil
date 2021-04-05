<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesLessonsQuizTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses_lessons_quiz', function (Blueprint $table) {
            $table->id();
            $table->string('title_ar');
            $table->string('title_en');

            $table->string('description_ar');
            $table->string('description_en');

            $table->integer('number_of_questions');

            $table->double('total_score');

            $table->unsignedBigInteger('courses_lessons_id');
            $table->foreign('courses_lessons_id')->references('id')->on('courses_lessons');


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
        Schema::dropIfExists('courses_lessons_quiz');
    }
}
