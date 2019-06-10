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

Route::get('/map', function () {
     return view('map');
});

Route::get('/map/{id}/', 'CourseController@map');

Route::get('/map2', function () {
    return view('map2');
});

Route::get('/map3', function () {
    return view('map3');
});

Route::get('/privacy', function () {
    return view('privacy');
});

Route::get('/terms', function () {
    return view('terms');
});

Route::get('/', 'CourseController@welcome');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/course', 'CourseController@index');

Route::post('/course/create', 'CourseController@create');

Route::get('/course/edit/{id}/', 'CourseController@edit_index'); //編集
Route::post('/course/edit/{id}/', 'CourseController@edit_finish'); //完了
Route::post('/course/delete/{id}/', 'CourseController@delete'); //削除

Route::get('/{id}/lesson/add/', 'LessonController@add'); //レッスン追加画面表示
Route::get('/{course_id}/lesson/{id}', 'LessonController@index'); //レッスン表示
Route::post('/{id}/lesson/create/', 'LessonController@create'); //レッスン追加

Route::post('/reserve/create/', 'ReserveController@create'); //レッスン予約
