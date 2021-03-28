<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){

    //uth::routes();

    // Admin routes
    // Route::prefix('admin')->group(function(){
    //     Route::get('/', 'Users\Admin\AdminController@index')->name('admin.dashboard');
    //     Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    //     Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    //     Route::get('/register', 'Auth\AdminRegisterController@showRegisterForm')->name('admin.register');
    //     Route::post('/register', 'Auth\AdminRegisterController@register')->name('admin.register.submit');

    //     Route::get('password-reset', 'Auth\AdminForgotPasswordController@showForm'); //I did not create this controller. it simply displays a view with a form to take the email
    //     Route::post('password-reset', 'Auth\AdminForgotPasswordController@sendPasswordResetToken')->name('admin.password.email');
    //     Route::get('reset-password/{token}', 'Auth\AdminForgotPasswordController@showPasswordResetForm');
    //     Route::post('reset-password/{token}', 'Auth\AdminForgotPasswordController@resetPassword')->name('admin.password.update');
    // });
    // Vendor routes



});

