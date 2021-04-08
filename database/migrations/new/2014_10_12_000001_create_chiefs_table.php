<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChiefsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chiefs', function (Blueprint $table) {
            $table->id();
            $table->string('fname');
            $table->string('lname');
            $table->string('gender');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('phone');
            $table->text('image');
            $table->text('biography_en')->nullable();
            $table->text('biography_ar')->nullable();
            $table->text('professionalLife_en')->nullable();
            $table->text('professionalLife_ar')->nullable();
            $table->string('instagram')->nullable();
            $table->string('twitter')->nullable();
            $table->string('facebook')->nullable();

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
        Schema::dropIfExists('chiefs');
    }
}
