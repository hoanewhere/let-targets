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
Route::get('/index/complete/{id}', 'TargetController@complete')->name('target.complete');
Route::get('/index/notComplete/{id}', 'TargetController@notComplete')->name('target.notComplete');
Route::get('/index/delete/{id}', 'TargetController@delete')->name('target.delete');
Route::get('/index/editTarget/{id}/target/{text}', 'TargetController@editTarget')->name('target.edit');
Route::get('/index/search/{user}/{state}/{text?}', 'TargetController@search')->name('target.search');
Route::get('/index/firstSearch', 'TargetController@firstSearch')->name('target.firstSearch');
Route::get('/index/getUser', 'TargetController@getUser')->name('target.getUser');

// post
Route::post('/index/add', 'TargetController@add')->name('target.add');
