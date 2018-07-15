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
Route::get('choosecontent/{id}', 'TestController@getContent')->name('content.name');
Route::get('/', 'TestController@getlastedTest')->name('homepage');
Route::get('/login', 'LoginController@toLogin')->name('to.login');
Route::post('/login', 'LoginController@login');
Route::get('/logout', 'LoginController@logout')->name('logout');
Route::post('/register', 'LoginController@register')->name('register');

Route::get('/test','TestController@index');
Route::get('profile/{id}','UserController@show')->name('profile');
Route::post('update','UserController@update')->name('update.user');

Route::get('admin','LoginController@loginAdmin')->name('admin.user');
Route::group(['prefix' => 'admin'],function () {
    // Route::get('/', function () {
    //     return view('admin.layout.master');
    // });
    Route::prefix('users')->group(function () {
        Route::get('view','UserController@index')->name('view.user');
        Route::get('add','UserController@create');
        Route::post('add','UserController@store')->name('add.user');
        Route::get('edit/{id}','UserController@getEdit')->name('edit');
        Route::post('update','UserController@update')->name('update.user');
        Route::post('destroy','UserController@destroy')->name('destroy.user');
    });
    Route::prefix('ques')->group(function () {
        Route::get('view','QuesController@index')->name('view.ques');
        Route::get('add','QuesController@create')->name('addQues');
        Route::get('edit/{id}','QuesController@edit')->name('get.ques');
        Route::post('edit','QuesController@postEdit')->name('edit.ques');
        Route::post('add','QuesController@postCreate')->name('add');
        Route::get('destroy/{id}','QuesController@destroy')->name('destroy.ques');
    });
    Route::prefix('test')->group(function () {
        Route::get('list','TestController@index')->name('listadmin.test');
        Route::get('view/{id}','TestController@show')->name('showadmin.test');
        Route::get('create','TestController@createTest')->name('adminadd.test');
        Route::post('create','TestController@postCreate');
        Route::get('edit/{id}','TestController@getEditTest')->name('get.test');
        Route::post('edit','TestController@postEditTest')->name('postedit.test');
        Route::get('add','TestController@create');
        Route::post('add','TestController@store')->name('create');
        Route::post('upload','TestController@upload')->name('upload');
    });
    Route::prefix('content')->group(function () {
        Route::get('list','ContentController@index')->name('listadmin.content');
        Route::get('create','ContentController@create')->name('adminadd.content');
        Route::post('create','ContentController@postaddContent');
        Route::get('edit/{id}','ContentController@editContent')->name('get.content');
        Route::post('edit','ContentController@posteditContent')->name('postedit.content');
    });
});

Route::prefix('test')->group(function () {
    Route::get('view/{id}','TestController@getTest')->name('test');
    Route::get('test/{id}','TestController@getcontentTest')->name('test.content');
    Route::get('list','TestController@listTest')->name('view.test');
    Route::post('view/submit', 'TestController@postTest')->name('submit.test');
});
