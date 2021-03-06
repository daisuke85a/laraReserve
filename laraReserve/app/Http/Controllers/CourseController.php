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
use Validator;

class CourseController extends Controller
{

    public function index()
    {
        Log::debug('CourseController:index');

        $user = Auth::user();
        Log::debug('$user_id="' . print_r($user->id, true) . '"');
        $courses = Course::where('user_id', $user->id)->get();
        return view('course.index', ['courses' => $courses, 'user' => $user]);

    }

    public function view(Request $request, $id)
    {
        $course = Course::where('id', $id)->where('valid', true )->first();

        $futureLessons = $course->getFutureLessons();
        $futureFirstLesson = $course->getFutureFirstLesson();

        return view('course.view', ['course' => $course, 'futureLessons' => $futureLessons, 'futureFirstLesson' => $futureFirstLesson]);
    }

    public function welcome()
    {
        $courses = Course::where('valid', true )->get();
        return view('welcome', ['courses' => $courses]);
    }

    public function add()
    {
        return view('course.add');
    }

    public function create(Request $request)
    {
        Log::info('create');
        Log::debug('create');

        $validator = Validator::make($request->all(), Course::$rules);

        if ($validator->fails()) {
            return redirect('/course/add')
                ->withErrors($validator)
                ->withInput();
        }

        $course = new Course;
        $form = $request->all();
        unset($form['_token']);
        unset($form['image']);

        // ユーザはログインしている
        $user = Auth::user();
        $form += array('user_id' => $user->id);
        $form += array('valid' => true);
        Log::debug('$form="' . print_r($form, true) . '"');

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

        return redirect('/course');
    }

    public function invalid(Request $request, $id)
    {
        //削除対象レコードを検索
        $course = Course::find($id);

        $user = Auth::user();
        if ($course->user->id === $user->id) {
            //削除
            $course->valid = false;
            $course->update();
            //リダイレクト
            return redirect('/course');
        }

        abort('403');
    }

    public function valid(Request $request, $id)
    {
        //削除対象レコードを検索
        $course = Course::find($id);

        $user = Auth::user();
        if ($course->user->id === $user->id) {
            $course->valid = true;
            $course->update();
            //リダイレクト
            return redirect('/course');
        }

        abort('403');
    }

    public function edit_index($id)
    {
        $course = Course::findOrFail($id);
        return view('course.edit_index')->with('course', $course);
    }

    public function edit_finish(Request $request, $id)
    {

        $validator = Validator::make($request->all(), Course::$rules);

        if ($validator->fails()) {
            return redirect('course/edit/' . $id)
                ->withErrors($validator)
                ->withInput();
        }

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

        // ユーザはログインしている
        $user = Auth::user();

        if ($course->user->id === $user->id) {

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
            Log::warning('別ユーザからクラス編集された。クラス編集を不許可とする ユーザーID="' . print_r(Auth::user()->id, true) . '" '); //TODO: errorsに格納できればベスト。ただ、通常運用では通らないコードなので、対応は任意でOK
            abort('403');
        }

        //リダイレクト
        return redirect('/course');
    }
}
