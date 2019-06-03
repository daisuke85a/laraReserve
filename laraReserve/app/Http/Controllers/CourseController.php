<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use Log;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    public function index(){
        return view('course.index');
    }

    public function create(Request $request){

        //$this->validate($request, Course::$rules); //TODO: validateしたい。requestにuser_idが入っていなためエラーになる。ただ、useridはコントローラで取得したほうが設計的に硬い気もする。。。
        $course = new Course;
        $form = $request->all();
        unset($form['_token']);

        $user = Auth::user();
        $form += array('user_id'=> $user->id );
        Log::debug('$form="'.print_r($form,true).'"');

        $course->fill($form)->save();

        return redirect('/course');
    }
}
