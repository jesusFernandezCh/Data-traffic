<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Auth::routes();

Route::group(['middleware' => 'auth'], function () {
	Route::apiResource('distributors','DistributorController');
	Route::apiResource('tasks','TaskController');
});
Route::group(['middleware' => 'auth', 'middleware' => 'TimeTable'], function () {
	Route::get('tasks/today/{distributor?}/{date?}','taskController@tasksToday')->name('tasksToday');
});