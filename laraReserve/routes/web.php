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

Route::group(['middleware' => 'auth.very_basic'], function () {
    Route::get('login/{provider}', 'Auth\LoginController@redirectToProvider');
    Route::get('login/{provider}/callback', 'Auth\LoginController@handleProviderCallback');

    Route::get('/', 'CourseController@welcome');

    Route::group(['middleware' => 'auth'], function () {
        Route::post('logout', 'Auth\LoginController@logout')->name('logout');
        Route::get('/course', 'CourseController@index');
        Route::get('/course/add', 'CourseController@add')->name('courseAdd');
        Route::post('/course/create', 'CourseController@create');
        Route::get('/course/edit/{id}/', 'CourseController@edit_index'); //編集
        Route::post('/course/invalid/{id}/', 'CourseController@invalid'); //無効
        Route::post('/course/valid/{id}/', 'CourseController@valid'); //有効
        Route::post('/course/edit/{id}/', 'CourseController@edit_finish'); //完了
        Route::get('/{id}/lesson/add/', 'LessonController@add'); //レッスン追加画面表示
        Route::get('/{course_id}/lesson/{id}', 'LessonController@index'); //レッスン表示
        Route::post('/{id}/lesson/create/', 'LessonController@create'); //レッスン追加
        Route::delete('/{course_id}/lesson/{id}/delete', 'LessonController@delete'); //レッスン削除
        Route::get('/reserve/add/{id}', 'ReserveController@add'); //レッスン予約
        Route::post('/reserve/create/', 'ReserveController@create')->name('reserveCreate'); //レッスン予約
        Route::post('/reserve/delete/', 'ReserveController@delete'); //削除
        Route::post('/like/create/', 'LikeController@create')->name('likeCreate'); //イイね
        Route::post('/like/delete/', 'LikeController@delete'); //イイね
        Route::get('/user/{userId}', 'UserController@show');
        Route::get('/user/{userId}/edit', 'UserController@edit');
        Route::patch('/user/update/{userId}', 'UserController@update'); /*編集フォーム */
    });

    Route::get('/course/{id}/', 'CourseController@view'); //参照

    Route::get('/privacy', function () {
        return view('privacy');
    });

    Route::get('/terms', function () {
        return view('terms');
    });

});