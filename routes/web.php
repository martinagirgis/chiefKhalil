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

        Route::get('/', function () {
            return view('welcome');
        });

        Auth::routes();

        Route::get('/home', 'HomeController@index')->name('home');

        // Admin routes
        Route::prefix('admin')->group(function(){
            Route::get('/', 'Users\Admin\AdminController@index')->name('admin.dashboard');
            Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
            Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
            Route::get('/register', 'Auth\AdminRegisterController@showRegisterForm')->name('admin.register');
            Route::post('/register', 'Auth\AdminRegisterController@register')->name('admin.register.submit');
        });

        // Vendor routes
        Route::prefix('chief')->group(function(){
            Route::get('/', 'Users\Chief\ChiefController@index')->name('chief.dashboard');
            Route::get('/login', 'Auth\ChiefLoginController@showLoginForm')->name('chief.login');
            Route::post('/login', 'Auth\ChiefLoginController@login')->name('chief.login.submit');
            Route::get('/register', 'Auth\ChiefRegisterController@showRegisterForm')->name('chief.register');
            Route::post('/register', 'Auth\ChiefRegisterController@register')->name('chief.register.submit');
        });
        
    });
