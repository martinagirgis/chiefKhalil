<?php

use Illuminate\Http\Request;
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


        // Vendor routes
        Route::prefix('chief')->group(function(){
            Route::get('/', 'Users\Chief\ChiefController@index')->name('chief.dashboard');
            Route::get('/login', 'Auth\ChiefLoginController@showLoginForm')->name('chief.login');
            Route::post('/login', 'Auth\ChiefLoginController@login')->name('chief.login.submit');
            Route::get('/register', 'Auth\ChiefRegisterController@showRegisterForm')->name('chief.register');
            Route::post('/register', 'Auth\ChiefRegisterController@register')->name('chief.register.submit');

            Route::get('password-reset', 'Auth\ChiefForgetPasswordController@showForm')->name('chief.forgetpassword'); //I did not create this controller. it simply displays a view with a form to take the email
            Route::post('password-reset', 'Auth\ChiefForgetPasswordController@sendPasswordResetToken')->name('chief.password.email');
            Route::get('reset-password/{token}', 'Auth\ChiefForgetPasswordController@showPasswordResetForm');
            Route::post('reset-password/{token}', 'Auth\ChiefForgetPasswordController@resetPassword')->name('chief.password.update');
        });



    });
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('/testsad', function (Request $request) {
    $sad = $request->Arr1['answer0'];
    return $sad;
});
