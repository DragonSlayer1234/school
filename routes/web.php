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

Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function(){

    Route::get('student', 'StudentController@index')->name('student.index');

    Route::get('student/create', 'StudentController@create');

    Route::post('student/save', 'StudentController@save')->name('student.save');

    Route::post('student/update/{id}', 'StudentController@update')->name('student.update');

    Route::get('student/edit/{id}', 'StudentController@edit')->name('student.edit');

}) ;
