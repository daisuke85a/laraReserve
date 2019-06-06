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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'CourseController@welcome');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/course', 'CourseController@index');

Route::post('/course/create', 'CourseController@create');

Route::get('/course/edit/{id}/', 'CourseController@edit_index'); //編集
Route::patch('/course/edit/{id}/','CourseController@edit_confirm'); //確認
Route::post('/course/edit/{id}/', 'CourseController@edit_finish'); //完了
Route::post('/course/delete/{id}/', 'CourseController@delete'); //削除

Route::get('/{id}/lesson/add/', 'LessonController@add'); //レッスン追加画面表示
Route::get('/{course_id}/lesson/{id}', 'LessonController@index'); //レッスン表示
Route::post('/{id}/lesson/create/', 'LessonController@create'); //レッスン追加

