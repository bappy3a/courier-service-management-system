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

Route::group(['middleware'=>['auth']],function(){
	Route::resource('medias','MediaController');
});

Route::group(['as'=>'admin.','prefix'=>'admin','namespace'=>'Admin','middleware'=>['auth','admin']],function(){
	Route::get('deshboard', 'DashboardController@index')->name('deshboard');
});

Route::group(['as'=>'agent.','prefix'=>'agent','namespace'=>'Agent','middleware'=>['auth','agent']],function(){
	Route::get('deshboard', 'DashboardController@index')->name('deshboard');
});