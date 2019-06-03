<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use Log;

class CourseController extends Controller
{
    public function index(){
        return view('course.index');
    }

    public function create(Request $request){

        $form = $request->all();

        //$this->validate($request, Course::$rules); TODO:バリデートを効かせる。
        $course = new Course;
        $form = $request->all();
        unset($form['_token']);

        $form += array('user_id'=>'1'); //TODO:現ユーザーIDを取得する。
        Log::debug('$form="'.print_r($form,true).'"');

        $course->fill($form)->save();

        return redirect('/course');
    }
}
