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
    });

    Route::group([
      'middleware' => ['auth:teacher']
    ], function() {

        Route::get('', 'HomeController@index')->name('home');

        Route::get('olympiads', 'OlympiadController@index')->name('olympiad.index');
        Route::get('olympiad/create', 'OlympiadController@create')->name('olympiad.create');
        Route::post('olympiad', 'OlympiadController@store')->name('olympiad.store');
        Route::get('olympiad/choose-work-type/{olympiad}', 'OlympiadController@choose')->name('olympiad.choose-work-type');

        Route::get('file/create/{olympiad}', 'FileWorkController@create')->name('file.create');
        Route::post('file/{olympiad}', 'FileWorkController@store')->name('file.store');

    });

});
