<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('fname');
            $table->string('lname');

            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
<<<<<<< HEAD
            $table->string('phone');
            $table->string('code');
            $table->boolean('active')->default(0);
=======

            $table->string('phone');
>>>>>>> 7a4cd018563e706c55581667306d2f5a54363a45
            $table->rememberToken();

            $table->string('city');
            $table->string('gender');

            //Package Type
            $table->unsignedBigInteger('package_id');
            $table->foreign('package_id')->references('id')->on('user_packages');
            //Account State Active "1"& disable "0"
            $table->integer('state');

            $table->string('image');

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
        Schema::dropIfExists('users');
    }
}
