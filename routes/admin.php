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
            Route::resource('packages','PackagesController');//Done
            Route::get('/package/features/get/{package_id}','PackagesController@getFeature')->name('feature.get');
            Route::post('/package/features/add','PackagesController@addFeature')->name('feature.add');
            Route::get('/package/features/remove/{id}','PackagesController@removeFeature')->name('feature.remove');
            Route::post('/package/features/change/number','PackagesController@chnageFeature')->name('feature.change');


            Route::resource('admins','AdminsController');
            Route::resource('users','UsersController');
            Route::post('users/state','UsersController@AcceptOrRefuse')->name('users.state');
            Route::post('users/ban','UsersController@BanUser')->name('users.ban');

            Route::resource('chiefs','ChiefsController');
            Route::resource('categories','CategoriesController');
            Route::resource('courses','CoursesController');
            Route::resource('lessons','lessonsController',['except'=>['index,create']]);
            Route::get('/course/lessons/{course_id}', 'LessonsController@index')->name('lessons.index');
            Route::get('/course/lessons/create/{course_id}', 'LessonsController@create')->name('lessons.create');
            Route::resource('users','UsersController');
            Route::resource('live','LivesController');
        });
    });


    Route::prefix('chief')->group(function() {
        //Chief Home Page
        Route::get('/', 'Users\Chief\ChiefController@index')->name('chief.dashboard');

        Route::group(['namespace'=>'Users\Chief\Dashboard'],function(){
            //Sections Routes.
            Route::resource('courses','CoursesController');

        });
    });



    });
Route::get('live',function(){
    return view('admin.sections.liveStream.index');
})->name('stream.create');



Route::post('/create_class', 'Stream\SessionsController@createClass')
    ->name('create_class');

// This route is used by both teachers and students to join a class

Route::get('/classroom/{id}', 'Stream\SessionsController@showClassRoom')
    ->where('id', '[0-9]+')
    ->name('classroom');
Route::get('/yamshl','Stream\SessionsController@Test');
