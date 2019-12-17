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

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();

Route::prefix('manage')->middleware('role:superadministrator|administrator|staff')->group(function () {

    Route::get('/','ManageController@index' );
    Route::get('/dashboard', 'ManageController@dashboard')->name('manage.dashboard');




    Route::resource('/contacts', 'ContactController');

    Route::resource('/users', 'UserController');

    Route::get('/change', 'UserController@changePassword')->name('change.password');

    Route::resource('/jobs', 'JobsController');

    Route::post('/jobs/note/{id}', 'NoteJobController@store')->name('note.create');
    Route::delete('/jobs/note/{id}', 'NoteJobController@delete')->name('note.delete');
    Route::put('/job/note/{id}', 'NoteJobController@update')->name('note.update');
    Route::post('/job/attachment/{id}', 'AttachmentController@store');
    Route::get('/job/attachment/{id}', 'AttachmentController@getAttachment');
    Route::delete('/job/attachment/{id}', 'AttachmentController@remove');
    Route::get('/job/attachment/download/{id}', 'AttachmentController@download');

    Route::get('/calendar', function (){
        return view('manage.scheduler.scheduler');
    })->name('calendar');


    Route::prefix('setting')->namespace('Setting')->middleware('role:superadministrator')->group(function (){
        Route::resource('status-jobs', 'StatusJobsSettingController');
        Route::resource('services', 'ServiceController');
    });




});


Route::get('/home', 'HomeController@index')->name('home');
