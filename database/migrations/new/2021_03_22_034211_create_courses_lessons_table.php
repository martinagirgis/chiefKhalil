<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesLessonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses_lessons', function (Blueprint $table) {
            $table->id();
            $table->string('name_ar');
            $table->string('name_en');

            $table->string('details_ar');
            $table->string('details_en');

            $table->string('url');
            $table->string('image');
            $table->integer('lesson_number');

            $table->unsignedBigInteger('course_id');
            $table->foreign('course_id')->references('id')->on('courses');

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
        Schema::dropIfExists('courses_lessons');
    }
}
