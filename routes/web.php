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
Route::get('/', 'TestController@getlastedTest')->name('homepage');
Route::get('/login', 'LoginController@toLogin')->name('to.login');
Route::post('/login', 'LoginController@login');
Route::get('/logout', 'LoginController@logout')->name('logout');
Route::post('/register', 'LoginController@register')->name('register');

Route::get('/test','TestController@index');
Route::get('profile/{id}','UserController@show')->name('profile');
Route::post('update','UserController@update')->name('update.user');

Route::get('/api/gettest/{id}', 'TestSkillController@getTests')->name('get.question.test');
Route::get('/api/getcontent/{id}', 'TestController@getContents')->name('get.question.content');

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
        Route::post('destroy','QuesController@destroy')->name('destroy.question');
    });
    Route::prefix('test')->group(function () {
        Route::get('list','TestController@index')->name('listadmin.test');
        Route::get('view/{id}','TestController@show')->name('showadmin.test');
        Route::get('show/{id}','TestController@detail')->name('admin.detail.test');
        Route::get('create','TestController@createTest');
        Route::post('create','TestController@postCreate')->name('adminadd.test');
        Route::get('edit/{id}','TestController@getEditTest')->name('get.test');
        Route::post('edit','TestController@postEditTest')->name('postedit.test');
        Route::get('add','TestController@create')->name('admincreate.test');
        Route::post('add','TestController@store')->name('create');
        Route::post('upload','TestController@upload')->name('upload');
        Route::post('destroy','TestController@destroy')->name('destroy.test');
    });
    Route::prefix('content')->group(function () {
        Route::get('list','ContentController@index')->name('listadmin.content');
        Route::get('create','ContentController@create')->name('adminadd.content');
        Route::post('create','ContentController@postaddContent');
        Route::get('edit/{id}','ContentController@editContent')->name('get.content');
        Route::post('edit','ContentController@posteditContent')->name('postedit.content');
        Route::post('destroy','ContentController@destroy')->name('destroy.content');
    });
    Route::prefix('testskills')->group(function () {
        Route::get('/','TestSkillController@index')->name('list.test.skill');
        Route::get('create','TestSkillController@create')->name('admin.add.test.skill');
        Route::post('create','TestSkillController@store')->name('add.test.skill');
        Route::get('edit/{id}','TestSkillController@edit')->name('get.test.skill');
        Route::post('edit','TestSkillController@update')->name('edit.test.skill');
    });
});

Route::prefix('test')->group(function () {
    Route::get('view/{id}','TestController@getTest')->name('test');
    Route::get('solution/{id}','TestController@getSolution')->name('solution');
    Route::get('test/{id}','TestController@getcontentTest')->name('test.content');
    Route::get('listread','TestController@listTestRead')->name('view.testread');
    Route::get('listlisten','TestController@listTestLis')->name('view.testlist');
    Route::post('view/submit', 'TestController@postTest')->name('submit.test');
    Route::get('result', 'TestController@')->name('test.result');
});
