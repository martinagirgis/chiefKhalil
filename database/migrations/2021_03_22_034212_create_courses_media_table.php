<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesMediaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses_media', function (Blueprint $table) {
            $table->id();
            //video or image or pdf or text
            $table->string('type');
            //Url
            $table->string('url');

            $table->string('description_ar');
            $table->string('description_en');

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
        Schema::dropIfExists('courses_media');
    }
}
