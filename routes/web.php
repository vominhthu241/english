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
Route::get('/admin', function () {
    return view('admin.layout.master');
});
Route::get('/test','TestController@index');

Route::prefix('admin')->group(function () {
    Route::prefix('users')->group(function () {
        Route::get('view','UserController@index');
        Route::get('add','UserController@create');
        Route::post('add','UserController@store')->name('add');
        Route::get('edit/{id}','UserController@getEdit')->name('edit');
        Route::post('update','UserController@update')->name('update');
        Route::post('destroy','UserController@destroy')->name('destroy');
    });
    Route::prefix('ques')->group(function () {
        Route::get('view','UserController@index');
        Route::get('add','QuesController@create');
        Route::post('add','QuesController@postCreate')->name('add');
    });
    Route::prefix('test')->group(function () {
        Route::get('add','TestController@create');
        Route::post('add','TestController@store')->name('create');
        Route::post('upload','TestController@upload')->name('upload');
    });
});
