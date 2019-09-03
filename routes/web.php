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

Route::resource('task', 'TasksController');

Route::get('/', function () {
  return redirect()->route('task.index');
});

Auth::routes();



Route::get('/task/{task}', 'TasksController@store');
Route::delete('/task/clear/{task}', 'TasksController@clear')->name('clear_task');
Route::get('/task/view/{task}', 'TasksController@show')->name('view_task');
Route::get('/home', 'HomeController@index')->name('home');
