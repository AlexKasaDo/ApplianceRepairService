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

    Route::resource('/jobs', 'JobsController');

    Route::prefix('setting')->namespace('Setting')->middleware('role:superadministrator')->group(function (){
        Route::resource('status-jobs', 'StatusJobsSettingController');
        Route::resource('services', 'ServiceController');
    });


});


Route::get('/home', 'HomeController@index')->name('home');
