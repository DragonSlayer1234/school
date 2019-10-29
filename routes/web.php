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
    'namespace'=>'Admin'
    ], function(){

    Route::resource('student','StudentController');

    Route::get('olympic', 'OlympicController@index')->name('olympic.index');

    Route::get('olympic/create', 'OlympicController@create')->name('olympic.create');

    Route::post('olympic/store', 'OlympicController@store')->name('olympic.store');

    Route::post('olympic/download', 'OlympicController@download')->name('olympic.download');

    Route::resource('subject', 'SubjectController');

    Route::get('','HomeController@index')->name('home');




}) ;
