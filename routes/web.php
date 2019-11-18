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
Route::get('olympiads', 'OlympiadController@index')->name('olympiad.index');
Route::get('olympiads/passed', 'OlympiadController@passed')->name('olympiad.passed');
Route::get('olympiad/{olympiad}/show', 'OlympiadController@show')->name('olympiad.show');
Route::get('olympiad/{olympiad}/participants', 'OlympiadController@participants')->name('olympiad.participants');
Route::get('olympiad/{olympiad}/winners', 'OlympiadController@winners')->name('olympiad.winners');
Route::post('download', 'FileWorkController@download')->name('download');

Route::get('change-password', 'ChangePasswordController@showPasswordForm')->name('show-password-form');
Route::post('change-password', 'ChangePasswordController@changePassword')->name('change-password');

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

        Route::get('students', 'StudentController@index')->name('student.index');
        Route::get('student/create', 'StudentController@create')->name('student.create');
        Route::post('student', 'StudentController@store')->name('student.store');
        Route::get('student/{student}/edit', 'StudentController@edit')->name('student.edit');
        Route::put('student/{student}', 'StudentController@update')->name('student.update');

        Route::get('teachers', 'TeacherController@index')->name('teacher.index');
        Route::get('teacher/create', 'TeacherController@create')->name('teacher.create');
        Route::post('teacher', 'TeacherController@store')->name('teacher.store');
        Route::get('teacher/{teacher}/edit', 'TeacherController@edit')->name('teacher.edit');
        Route::put('teacher/{teacher}', 'TeacherController@update')->name('teacher.update');

        Route::get('subjects', 'SubjectController@index')->name('subject.index');
        Route::get('subject/create', 'SubjectController@create')->name('subject.create');
        Route::post('subject', 'SubjectController@store')->name('subject.store');

        Route::get('olympiads', 'OlympiadController@index')->name('olympiad.index');
        Route::get('olympiads/moderating', 'OlympiadController@moderating')->name('olympiad.moderating');
        Route::get('olympiad/{olympiad}/show', 'OlympiadController@show')->name('olympiad.show');
        Route::post('olympiad/{olympiad}/accept', 'OlympiadController@accept')->name('olympiad.accept');
        Route::post('olympiad/{olympiad}/reject', 'OlympiadController@reject')->name('olympiad.reject');
        Route::post('olympiad/{olympiad}/start', 'OlympiadController@start')->name('olympiad.start');
        Route::post('olympiad/{olympiad}/finish', 'OlympiadController@finish')->name('olympiad.finish');

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
      'middleware' => ['auth:teacher', 'generated.user:teacher']
    ], function() {

        Route::get('profile/edit', 'ProfileController@edit')->name('profile.edit');
        Route::put('profile/update', 'ProfileController@update')->name('profile.update');

        Route::group([
          'middleware' => ['empty.profile:teacher']
        ], function () {

            Route::get('cabinet', 'CabinetController@index')->name('cabinet.index');
            Route::get('profile', 'ProfileController@index')->name('profile.index');

            Route::get('my-olympiads/draft', 'OlympiadController@draft')->name('olympiad.draft');
            Route::get('my-olympiads/checking', 'OlympiadController@checking')->name('olympiad.checking');
            Route::get('my-olympiads/moderating', 'OlympiadController@moderating')->name('olympiad.moderating');
            Route::get('my-olympiads/rejected', 'OlympiadController@rejected')->name('olympiad.rejected');
            Route::get('my-olympiads/{olympiad}/answers', 'OlympiadController@answers')->name('olympiad.answers');
            Route::get('my-olympiad/create', 'OlympiadController@create')->name('olympiad.create');
            Route::post('my-olympiad', 'OlympiadController@store')->name('olympiad.store');
            Route::post('my-olympiad/{olympiad}/to-moderation', 'OlympiadController@toModeration')->name('olympiad.to-moderation');
            Route::post('my-olympiads/{olympiad}/announce', 'OlympiadController@announce')->name('olympiad.announce');

            Route::post('participant/{participant}/mark', 'ParticipantController@mark')->name('participant.mark');
            Route::post('winner/{participant}/choose', 'OlympiadController@choose')->name('winner.choose');

            Route::get('work/{olympiad}/choose-type', 'WorkController@chooseType')->name('work.choose-type');

            Route::get('file-work/{olympiad}/create', 'FileWorkController@create')->name('file-work.create');
            Route::post('file-work/{olympiad}/attach', 'FileWorkController@attach')->name('file-work.attach');
            Route::delete('file-work/{olympiad}/detach', 'FileWorkController@delete')->name('file-work.detach');


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
        Route::post('logout', 'LoginController@logout')->name('logout');

    });

    Route::group([
      'middleware' => ['auth:student', 'generated.user:student']
    ], function() {

        Route::get('profile/edit', 'ProfileController@edit')->name('profile.edit');
        Route::put('profile/update', 'ProfileController@update')->name('profile.update');

        Route::group([
          'middleware' => ['empty.profile:student']
        ], function () {

            Route::get('', 'CabinetController@index')->name('cabinet.index');
            Route::get('profile', 'ProfileController@index')->name('profile.index');

            Route::post('olympiad/{olympiad}/join', 'OlympiadController@join')->name('olympiad.join');
            Route::get('olympiad/{olympiad}/answer', 'FileWorkAnswerController@answer')->name('olympiad.answer');

            Route::post('file-answer/{olympiad}/attach', 'FileWorkAnswerController@attach')->name('file-answer.attach');
            Route::delete('file-answer/{olympiad}/detach', 'FileWorkAnswerController@detach')->name('file-answer.detach');

        });
    });
});
