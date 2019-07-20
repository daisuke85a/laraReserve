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

Route::get('/login/{provider}', 'Auth\LoginController@redirectToProvider');
Route::get('login/{provider}/callback', 'Auth\LoginController@handleProviderCallback');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

Route::get('/', 'CourseController@welcome');
Route::get('/course', 'CourseController@index');
Route::get('/course/add', 'CourseController@add');
Route::post('/course/create', 'CourseController@create')->middleware('auth');

Route::get('/course/{id}/', 'CourseController@view'); //参照
Route::get('/course/edit/{id}/', 'CourseController@edit_index'); //編集
Route::post('/course/edit/{id}/', 'CourseController@edit_finish'); //完了
Route::post('/course/delete/{id}/', 'CourseController@delete'); //削除

Route::get('/{id}/lesson/add/', 'LessonController@add'); //レッスン追加画面表示
Route::get('/{course_id}/lesson/{id}', 'LessonController@index'); //レッスン表示
Route::post('/{id}/lesson/create/', 'LessonController@create'); //レッスン追加

Route::get('/reserve/add/{id}', 'ReserveController@add'); //レッスン予約
Route::post('/reserve/create/', 'ReserveController@create'); //レッスン予約
Route::post('/reserve/delete/', 'ReserveController@delete'); //削除

Route::post('/like/create/', 'LikeController@create'); //イイね
Route::post('/like/delete/', 'LikeController@delete'); //イイね

Route::get('/user/{userId}', 'UserController@show');
Route::get('/user/{userId}/edit', 'UserController@edit');
Route::patch('/user/update/{userId}', 'UserController@update'); /*編集フォーム */


Route::get('/privacy', function () {
    return view('privacy');
});

Route::get('/terms', function () {
    return view('terms');
});