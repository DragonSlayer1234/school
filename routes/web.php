<?php

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

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::group([
  'prefix'=>'admin',
  'as'=>'admin.',
  'namespace'=>'Admin',
], function(){

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

        Route::get('students', 'StudentController@index')->name('student.index');
        Route::get('student/create', 'StudentController@create')->name('student.create');
        Route::post('student', 'StudentController@store')->name('student.store');
        Route::get('student/{student}/edit', 'StudentController@edit')->name('student.edit');
        Route::put('student/{student}', 'StudentController@update')->name('student.update');

        Route::get('subjects', 'SubjectController@index')->name('subject.index');
        Route::get('subject/create', 'SubjectController@create')->name('subject.create');
        Route::post('subject', 'SubjectController@store')->name('subject.store');

        Route::get('olympiads', 'OlympiadController@index')->name('olympiad.index');
        Route::get('olympiad/create', 'OlympiadController@create')->name('olympiad.create');
        Route::post('olympiad', 'OlympiadController@store')->name('olympiad.store');
        Route::post('olympiad/download', 'OlympiadController@download')->name('olympiad.download');

    });

});

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
        Route::post('logout', 'LoginController@logout')->name('logout');
    });

    Route::group([
      'middleware' => ['auth:teacher']
    ], function() {

        Route::get('', 'HomeController@index')->name('home');

        Route::get('olympiads/upcoming', 'OlympiadController@upcoming')->name('olympiad.upcoming');
        Route::get('olympiads/active', 'OlympiadController@active')->name('olympiad.active');
        Route::get('olympiads/draft', 'OlympiadController@draft')->name('olympiad.draft');
        Route::get('olympiads/checking', 'OlympiadController@checking')->name('olympiad.checking');
        Route::get('olympiads/moderating', 'OlympiadController@moderating')->name('olympiad.moderating');
        Route::get('olympiads/rejected', 'OlympiadController@rejected')->name('olympiad.rejected');

        Route::get('olympiad/create', 'OlympiadController@create')->name('olympiad.create');
        Route::post('olympiad', 'OlympiadController@store')->name('olympiad.store');
        Route::get('olympiad/{olympiad}/show', 'OlympiadController@show')->name('olympiad.show');
        Route::post('olympiad/{olympiad}/to-moderation', 'OlympiadController@toModeration')->name('olympiad.to-moderation');

        Route::get('work/choose-type/{olympiad}', 'WorkController@chooseType')->name('work.choose-type');

        Route::get('file/create/{olympiad}', 'FileWorkController@create')->name('file.create');
        Route::post('file/{olympiad}', 'FileWorkController@store')->name('file.store');
        Route::delete('file/{olympiad}', 'FileWorkController@delete')->name('file.delete');

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
        Route::post('logout', 'LoginController@logout')->name('logout');
        Route::get('profile/change-password', 'ChangePasswordController@showPasswordForm')->name('show-password-form');
        Route::post('profile/change-password', 'ChangePasswordController@changePassword')->name('change-password');
    });

    Route::group([
      'middleware' => ['auth:student', 'generated.user:student']
    ], function() {

        Route::get('', 'HomeController@index')->name('home');


    });

});
