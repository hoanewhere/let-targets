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

// get
Route::get('/', 'TargetController@index')->name('home');
Route::get('/home', 'TargetController@index')->name('home');

// post
Route::post('/add', 'TargetController@add')->name('target.add');
Route::get('/{id}/complete', 'TargetController@complete')->name('target.complete');
Route::get('/{id}/notComplete', 'TargetController@notComplete')->name('target.notComplete');