<?php

namespace App\Http\Controllers;

use App\Course;
use App\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Log;

class CourseController extends Controller
{
    public function index()
    {
        Log::debug('CourseController:index');
        $courses = Course::all();
        return view('course.index', ['courses' => $courses]);
    }

    public function welcome(){
        $courses = Course::all();
        return view('welcome', ['courses' => $courses]);
    }

    public function create(Request $request)
    {

        $this->validate($request, Course::$rules);

        $course = new Course;
        $form = $request->all();
        unset($form['_token']);
        unset($form['image']);

        if (Auth::check()) {
            // ユーザはログインしている
            $user = Auth::user();
            $form += array('user_id' => $user->id);
            Log::debug('$form="' . print_r($form, true) . '"');

            // $ext = $request->file('image')->guessExtension();
            // Log::debug('$request->file(image)->guessExtension()"' . print_r($ext, true) . '"');


            $this->validate($request, [
                'image' => [
                    // 必須
                    'required',
                    // アップロードされたファイルであること
                    'file',
                    // 画像ファイルであること
                    'image',
                    // MIMEタイプを指定
                    'mimes:jpeg,jpg,png',
                ]
            ]);

            $course->fill($form)->save();

            if($request->file('image')->isValid([])){
                $image = new Image;
                $image->name = basename($request->image->store('public/image'));
                $image->course_id = $course->id;
                $image->save();
                //$course->image = $request->image->store('public/image');
                Log::debug('store Image');
            }
            else{
                Log::debug('inValid Image');
            }

        } else {
            Log::debug('未ログインのため講座追加を不許可とする'); //TODO: errorsに格納できればベスト。ただ、通常運用では通らないコードなので、対応は任意でOK
        }

        return redirect('/course');
    }

    public function delete(Request $request, $id)
    {
        //削除対象レコードを検索
        $course = Course::find($id);

        //削除
        $course->delete();

        //リダイレクト
        return redirect('/course');
    }

    public function edit_index($id)
    {
        $course = Course::findOrFail($id);
        return view('course.edit_index')->with('course', $course);
    }

    public function edit_confirm(\App\Http\Requests\CheckCourseRequest $req)  //TODO: バリデーションをチェックする 参考:https://laraweb.net/knowledge/2156/
    {
        $data = $req->all();
        return view('course.edit_confirm')->with($data);
    }

    public function edit_finish(Request $request, $id)
    {
        //レコードを検索
        $course = Course::findOrFail($id);
        //値を代入
        $course = new Course;
        $form = $request->all();
        unset($form['_token']);
        unset($form['button1']);

        if (Auth::check()) {
            // ユーザはログインしている
            $user = Auth::user();
            $form += array('user_id' => $user->id);
            Log::debug('$form="' . print_r($form, true) . '"');

            $course->fill($form)->save();
        } else {
            Log::debug('未ログインのため講座追加を不許可とする'); //TODO: errorsに格納できればベスト。ただ、通常運用では通らないコードなので、対応は任意でOK
        }

        //リダイレクト
        return redirect('/course');
    }
}
