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

Route::get('/home', 'HomeController@index')->name('home');

//LevelController Routes
Route::resource('level', 'LevelController');

//ClassController Routes

Route::resource('class', 'ClassController');

//StudentController Routes
Route::resource('student', 'StudentController');
Route::post('/student/ajax_get_class_list', 'StudentController@ajaxGetClassList')->name('student.ajax_get_class_list');
Route::post('/student/ajax_show', 'StudentController@ajax_show')->name('student.ajax_show');

