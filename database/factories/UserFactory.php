<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Chief;
use App\models\admin\Category;
use App\models\admin\Course;
use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
    ];
});

$factory->define(Category::class, function (Faker $faker) {
    return [
        'name_ar'=>$faker->name,
        'name_en'=>$faker->name,
        'description_ar'=>$faker->name,
        'description_en'=>$faker->name,
        'image'=>$faker->name
    ];
});


$factory->define(Chief::class, function (Faker $faker) {
    return [
        'fname' =>$faker->name,
        'lname'=>$faker->name,
        'gender'=>$faker->name,
        'email'=> $faker->unique()->safeEmail,
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password        'phone',
        'image'=>'https://image.shutterstock.com/image-vector/ui-image-placeholder-wireframes-apps-260nw-1037719204.jpg',
        'phone'=>$faker->phoneNumber,
        'biography_en'=>$faker->name,
        'biography_ar'=>$faker->name,
        'professionalLife_en' =>$faker->name,
        'professionalLife_ar' =>$faker->name,
        'instagram'=>$faker->name,
        'twitter'=>$faker->name,
        'facebook'=>$faker->name,
    ];
});



$factory->define(Course::class, function (Faker $faker) {
    return [
        'name_ar'=>$faker->name,
        'name_en'=>$faker->name,
        'details_ar'=>$faker->name,
        'details_en'=>$faker->name,
        'number_of_lessons'=>$faker->randomDigit,
        'category_id'=> Category::all()->random()->id,
        'chief_id' => Chief::all()->random()->id,
        'image'=>'https://image.shutterstock.com/image-vector/ui-image-placeholder-wireframes-apps-260nw-1037719204.jpg',
    ];
});

