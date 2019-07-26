<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Lesson;
use App\Reserve;
use App\Like;
use App\Course;
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
            $user = Auth::user();
            $id =  (int)($form["course_id"]);
            $course = Course::findOrFail((int)($form["course_id"]));

            if ($course->user->id === $user->id) {
                $lesson = new Lesson();
                Log::info('レッスンを追加 $form[course_id]"' . print_r($form["course_id"], true) . '"');

                $start = new \DateTime( $form["date"] . " " . $form["start_time"] );
                $end = new \DateTime( $form["date"] . " " . $form["end_time"] );

                $lesson->fill(['course_id' => $form["course_id"] , 'start' => $start, 'end' => $end ]);
                $lesson->save();
            }else{
                Log::warning('別ユーザからレッスン追加された。レッスン追加を不許可とする ユーザーID="' . print_r(Auth::user()->id, true) . '" '); //TODO: errorsに格納できればベスト。ただ、通常運用では通らないコードなので、対応は任意でOK
                abort('403');
            }

        } else {
            Log::warning('未ログインのためクラス編集を不許可とする'); //TODO: errorsに格納できればベスト。ただ、通常運用では通らないコードなので、対応は任意でOK
            abort('403');
        }

        return redirect('/course');
    }

    public function delete(Request $req, $course_id, $id)
    {
        if (Auth::check()) {

            $lesson = lesson::find($id);

            if( $lesson !== null ){
               $lesson->delete();
               Log::info('レッスン予約を削除 ユーザーID="' . print_r(Auth::user()->id, true) . '" LessonID="' . print_r($id, true) ); 
            }
            else{
                Log::warning('「存在しないレッスン」の予約を削除しようとした ユーザーID="' . print_r(Auth::user()->id, true) . '" LessonID="' . print_r($id, true) ); 
            }            
            return redirect('course');   
        }
        else{
            Log::warning('未ログインのためレッスン削除操作を不許可とする'); 
        }

        abort('403');

    }

    public function index(Request $req, $course_id, $id)
    {
        $lesson = lesson::findOrFail($id);
        $reserves = Reserve::where('lesson_id', $id)->get();
        $likes = Like::where('course_id', $lesson->course->id)->get();
        return view('lesson.index')->with([ 'lesson' => $lesson , 'reserves' => $reserves , 'likes' => $likes]);
    }

}
