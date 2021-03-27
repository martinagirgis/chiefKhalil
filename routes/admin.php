<?php
use Illuminate\Support\Facades\Route;



Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){

    //uth::routes();

    // Admin routes
    Route::prefix('admin')->group(function(){
        Route::get('/', 'Users\Admin\AdminController@index')->name('admin.dashboard');
        Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
        Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
        Route::get('/register', 'Auth\AdminRegisterController@showRegisterForm')->name('admin.register');
        Route::post('/register', 'Auth\AdminRegisterController@register')->name('admin.register.submit');
        Route::get('password-reset', 'Auth\AdminForgotPasswordController@showForm'); //I did not create this controller. it simply displays a view with a form to take the email
        Route::post('password-reset', 'Auth\AdminForgotPasswordController@sendPasswordResetToken')->name('admin.password.email');
        Route::get('reset-password/{token}', 'Auth\AdminForgotPasswordController@showPasswordResetForm');
        Route::post('reset-password/{token}', 'Auth\AdminForgotPasswordController@resetPassword')->name('admin.password.update');

        Route::group(['namespace'=>'Users\Admin\Dashboard'],function(){
            Route::resource('categories','CategoriesController');
            Route::resource('chiefs','ChiefsController');
            Route::resource('courses','CoursesController');
            Route::resource('users','UsersController');
            Route::resource('live','LivesController');
        });

    });



});
Route::get('live',function(){
    return view('admin.sections.liveStream.index');
});
