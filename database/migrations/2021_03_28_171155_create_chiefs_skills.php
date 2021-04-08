<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChiefsSkills extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chiefs_skills', function (Blueprint $table) {
            $table->id();
            $table->string('skill_en');
            $table->string('skill_ar');
            $table->double('percentage');
 
            $table->unsignedBigInteger('chief_id');
            $table->foreign('chief_id')->references('id')->on('chiefs');

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
        Schema::dropIfExists('chiefs_skills');
    }
}
