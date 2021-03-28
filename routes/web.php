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

        Route::get('/test', function () {
            return view('site.courseDetails');
        });

        Auth::routes();

        Route::get('/home', 'HomeController@index')->name('home');

        // verify mobile code
        Route::get('/verify','Auth\VerifyController@getVerify')->name('getverify');
        Route::post('/verify','Auth\VerifyController@postVerify')->name('verify');
        
        Route::any('/package','Auth\VerifyController@getPackages')->name('getPackages');
        Route::any('/payment/{id}','Auth\VerifyController@getPaymentt');
        Route::any('/addPackage','Auth\VerifyController@addPackage');
        
        // profile
        Route::any('/profile','HomeController@profile');
        Route::any('/editProfileInfo','HomeController@edit');
        Route::any('/updateProfileInfo', 'HomeController@update')->name('updateProfile');
        Route::any('/editProfileAccount','HomeController@editAccount');
        Route::any('/updateProfileAccount', 'HomeController@updateAccount')->name('updateAccount');


        // chief routes
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


        Route::prefix('admin')->group(function(){
            Route::get('/', 'Users\Admin\AdminController@index')->name('admin.dashboard');
            Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
            Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
            Route::get('/register', 'Auth\AdminRegisterController@showRegisterForm')->name('admin.register');
            Route::post('/register', 'Auth\AdminRegisterController@register')->name('admin.register.submit');
    
            Route::get('password-reset', 'Auth\AdminForgotPasswordController@showForm')->name('admin.password.forget'); //I did not create this controller. it simply displays a view with a form to take the email
            Route::post('password-reset', 'Auth\AdminForgotPasswordController@sendPasswordResetToken')->name('admin.password.email');
            Route::get('reset-password/{token}', 'Auth\AdminForgotPasswordController@showPasswordResetForm');
            Route::post('reset-password/{token}', 'Auth\AdminForgotPasswordController@resetPassword')->name('admin.password.update');
        });


    });

