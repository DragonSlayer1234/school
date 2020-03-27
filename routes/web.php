<?php

Route::get('test', function(){
    return view('test');
});

Route::get('/', 'HomeController@index')->name('home');

Route::get('olympiads', 'OlympiadController@index')->name('olympiad.index');
Route::get('olympiad/{olympiad}/show', 'OlympiadController@show')->name('olympiad.show');

Route::get('download', 'FileController@download')->name('download');
Route::post('upload/image', 'FileController@uploadImage');

Route::group([
    'prefix'=>'teacher',
    'as'=>'teacher.',
    'namespace'=>'Teacher',
], function(){

    Route::group([
        'namespace' => 'Auth'
    ], function() {
        Route::get('login', 'LoginController@showLoginForm')->name('login-form');
        Route::post('login', 'LoginController@login')->name('login');

    });

    Route::group([
        'middleware' => ['auth:teacher']
    ], function() {

        Route::post('logout', 'Auth\LoginController@logout')->name('logout');
        Route::get('profile/change-password', 'ProfileController@passwordForm')->name('profile.password-form');
        Route::post('profile/change-password', 'ProfileController@changePassword')->name('profile.change-password');

        Route::group([
            'middleware' => ['generated.password:teacher']
        ], function () {

            Route::get('profile/edit', 'ProfileController@edit')->name('profile.edit');
            Route::put('profile/update', 'ProfileController@update')->name('profile.update');

            Route::get('olympiads', 'OlympiadController@index')->name('olympiad.index');
            Route::get('olympiad/{olympiad}/check', 'OlympiadController@check')->name('olympiad.check');
            Route::get('olympiad/{olympiad}/show', 'OlympiadController@show')->name('olympiad.show');
            Route::get('olympiad/create', 'OlympiadController@create')->name('olympiad.create');
            Route::post('olympiad', 'OlympiadController@store')->name('olympiad.store');

        });
    });

});

Route::group([
    'prefix'=>'student',
    'as'=>'student.',
    'namespace'=>'Student',
], function(){

    Route::group([
        'namespace' => 'Auth'
    ], function() {
        Route::get('login', 'LoginController@showLoginForm')->name('login-form');
        Route::post('login', 'LoginController@login')->name('login');
    });

    Route::group([
        'middleware' => ['auth:student']
    ], function() {

        Route::post('logout', 'Auth\LoginController@logout')->name('logout');
        Route::get('profile/change-password', 'ProfileController@passwordForm')->name('profile.password-form');
        Route::post('profile/change-password', 'ProfileController@changePassword')->name('profile.change-password');

        Route::group([
            'middleware' => ['generated.password:student']
        ], function () {

            Route::get('profile/edit', 'ProfileController@edit')->name('profile.edit');
            Route::put('profile/update', 'ProfileController@update')->name('profile.update');

            Route::get('olympiad/{olympiad}/show', 'OlympiadController@show')->name('olympiad.show');
            Route::post('olympiad/{olympiad}/join', 'OlympiadController@join')->name('olympiad.join');
        });
    });
});


Route::group([
    'prefix'=>'admin',
    'as'=>'admin.',
    'namespace'=>'Admin',
], function() {

    Route::group([
        'namespace' => 'Auth'
    ], function() {
        Route::get('login', 'LoginController@showLoginForm')->name('login-form');
        Route::post('login', 'LoginController@login')->name('login');
        Route::post('logout', 'LoginController@logout')->name('logout');
    });

    Route::group([
        'middleware' => ['auth:admin']
    ], function() {

        Route::get('', 'HomeController@index')->name('home');

        Route::resource('student', 'StudentController');
        Route::post('student/{student}/reset-password', 'StudentController@resetPassword')->name('student.reset-password');

        Route::resource('teacher', 'TeacherController');
        Route::post('teacher/{teacher}/reset-password', 'TeacherController@resetPassword')->name('teacher.reset-password');

        Route::resource('subject', 'SubjectController');

        Route::get('olympiads', 'OlympiadController@index')->name('olympiad.index');
        Route::get('olympiads/moderating', 'OlympiadController@moderating')->name('olympiad.moderating');
        Route::get('olympiad/{olympiad}/show', 'OlympiadController@show')->name('olympiad.show');
        Route::post('olympiad/{olympiad}/accept', 'OlympiadController@accept')->name('olympiad.accept');
        Route::post('olympiad/{olympiad}/reject', 'OlympiadController@reject')->name('olympiad.reject');
        Route::post('olympiad/{olympiad}/start', 'OlympiadController@start')->name('olympiad.start');
        Route::post('olympiad/{olympiad}/finish', 'OlympiadController@finish')->name('olympiad.finish');

    });

});
