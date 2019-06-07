<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Lesson;
use App\Reserve;
use Log;

class LessonController extends Controller
{
    public function add(Request $request, $id)
    {
        return view('lesson.add', compact('id'));
    }

    public function create(Request $request)
    {

        $form = $request->all();
        unset($form['_token']);

        if (Auth::check()) {
            // ユーザはログインしている
            // TODO: 本当はコースを管理するユーザーかのチェックをしたい

            $lesson = new Lesson();

            Log::debug('$form="' . print_r($form, true) . '"');
            Log::debug('$form[course_id]"' . print_r($form["course_id"], true) . '"');

            $start = new \DateTime( $form["date"] . " " . $form["start_time"] );
            $end = new \DateTime( $form["date"] . " " . $form["end_time"] );


            $lesson->fill(['course_id' => $form["course_id"] , 'start' => $start, 'end' => $end ]);
            $lesson->save();

        } else {
            Log::debug('未ログインのためレッスン追加を不許可とする'); //TODO: errorsに格納できればベスト。ただ、通常運用では通らないコードなので、対応は任意でOK
        }

        return redirect('/course');
    }

    public function index(Request $req, $course_id, $id)
    {
        Log::debug('LessonController:index');
        Log::debug('LessonController:index $id' . print_r($id,true));
        $lesson = lesson::findOrFail($id);
        Log::debug('LessonController:index $lesson' . print_r($lesson,true));
        $reserves = Reserve::where('lesson_id', $id)->get();
        Log::debug('LessonController:index $reserves count' . print_r($reserves->count(),true));

        return view('lesson.index')->with([ 'lesson' => $lesson , 'reserves' => $reserves ]);
    }

}
