<?php

namespace App\Http\Controllers;

use App\AddressImage;
use App\Course;
use App\Image;
use App\SubImage;
use Cookie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Log;

class CourseController extends Controller
{

    public function index()
    {
        Log::debug('CourseController:index');

        if (Auth::check()) {
            $user = Auth::user();
            Log::debug('$user_id="' . print_r($user->id, true) . '"');
            $courses = Course::where('user_id', $user->id)->get();
            return view('course.index', ['courses' => $courses, 'user' => $user]);
        }

    }

    public function welcome()
    {
        if (!Auth::check()) {
            //過去にログイン済みの場合は自動ログインする
            $SocialLogin = Cookie::get('SocialLogin');
            Log::debug('$SocialLogin="' . print_r($SocialLogin, true) . '"');
            if ($SocialLogin === "1") {
                if (env('TWITTER_LOGIN')) {
                    return redirect('/login/twitter');
                } else {
                    return redirect('/login');
                }
            }
        }

        $courses = Course::all();
        return view('welcome', ['courses' => $courses]);
    }

    public function map($id)
    {
        $course = Course::findOrFail($id);
        return view('map3')->with('course', $course);
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
                ],
            ]);

            $course->fill($form)->save();

            if ($request->file('image') != null) {
                if ($request->file('image')->isValid([])) {
                    $image = new Image;
                    $image->name = basename($request->image->store('public/image'));
                    $image->course_id = $course->id;
                    $image->save();
                    Log::debug('store Image');
                } else {
                    Log::debug('inValid Image');
                }
            } else {
                Log::debug('no input Image');
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

    public function edit_finish(Request $request, $id)
    {
        //レコードを検索
        $course = Course::findOrFail($id);
        //値を代入
        //$course = new Course;
        $form = $request->all();
        unset($form['_token']);
        unset($form['image']);
        unset($form['sub_image']);
        unset($form['address_image']);
        unset($form['button1']);

        if (Auth::check()) {
            // ユーザはログインしている
            $user = Auth::user();
            $form += array('user_id' => $user->id);
            Log::debug('$form="' . print_r($form, true) . '"');

            $course->fill($form)->save();

            if ($request->file('image') != null) {

                if ($request->file('image')->isValid([])) {

                    $image = Image::where('course_id', $course->id)->first();

                    if ($image === null) {
                        $image = new Image;
                    }

                    $image->name = basename($request->image->store('public/image'));
                    $image->course_id = $course->id;
                    $image->save();
                    Log::debug('store Image');
                } else {
                    Log::debug('inValid Image');
                }
            } else {
                Log::debug('no input Image');
            }

            if ($request->file('sub_image') != null) {

                if ($request->file('sub_image')->isValid([])) {

                    $image = new SubImage;

                    $image->name = basename($request->sub_image->store('public/image'));
                    $image->course_id = $course->id;
                    $image->save();
                    Log::debug('store Sub Image');
                } else {
                    Log::debug('inValid Sub Image');
                }
            } else {
                Log::debug('no input Sub Image');
            }

            if ($request->file('address_image') != null) {

                if ($request->file('address_image')->isValid([])) {

                    $image = new AddressImage;

                    $image->name = basename($request->address_image->store('public/image'));
                    $image->course_id = $course->id;
                    $image->save();
                    Log::debug('store Address Image');
                } else {
                    Log::debug('inValid Address Image');
                }
            } else {
                Log::debug('no input Address Image');
            }

        } else {
            Log::debug('未ログインのため講座追加を不許可とする'); //TODO: errorsに格納できればベスト。ただ、通常運用では通らないコードなので、対応は任意でOK
        }

        //リダイレクト
        return redirect('/course');
    }
}
