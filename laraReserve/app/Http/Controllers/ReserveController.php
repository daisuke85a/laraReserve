<?php

namespace App\Http\Controllers;

use App\Lesson;
use App\Reserve;
use Cookie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Log;
use Illuminate\Support\Facades\Mail;
use App\Mail\ReserveNotification;
use App\Mail\ReserveUserNotification;
use App\Jobs\SendMail;

class ReserveController extends Controller
{

    public function add(Request $request , $id)
    {
        return view('reserve.add')->with([ 'id' => $id ]);
    }


    public function create(Request $request)
    {

        // 未ログインの場合は一旦Cokkieに保存する
        if (Auth::check() === false) {
            Cookie::queue(Cookie::make('noAuthReserveRequest', $request->lesson_id, 30));
            Cookie::queue(Cookie::make('noAuthReserveRequestKind', $request->kind, 30));
        }

        // $this->middleware('auth');

        if (Auth::check()) {
            // ユーザはログインしている

            // TODO: 同ユーザによりレッスン予約済みの場合は予約をガードする
            if (0 === Reserve::where('user_id', Auth::user()->id)->where('lesson_id', $request->lesson_id)->count()) {

                $user = Auth::user();
                Log::debug('ReserveController user_id' . print_r($user->id, true) . '"');
                Log::debug('ReserveController lesson_id' . print_r($request->lesson_id, true) . '"');

                $reserve = new Reserve();
                $reserve->fill(['user_id' => $user->id]);
                $reserve->fill(['lesson_id' => $request->lesson_id]);
                $reserve->fill(['kind' => $request->kind]);            
                $reserve->fill(['valid' => 1]);

                $reserve->save();

                $this->dispatch(new SendMail( $reserve->getUserEmail(), new ReserveUserNotification($reserve) ));
                $this->dispatch(new SendMail( $reserve->getOwnerEmail(), new ReserveNotification($reserve) ));

                return view('course.reserve')->with([ 'course' => $reserve->lesson->course ]);
            }
            
        } else {
            Log::debug('未ログインのため予約を不許可とする'); //TODO: errorsに格納できればベスト。ただ、通常運用では通らないコードなので、対応は任意でOK

            if (env('TWITTER_LOGIN')) {
                return redirect('/login/twitter');
            }
            else{
                return redirect('/login');
            }
        }

        return redirect('/');
    }

    public function delete(Request $request)
    {
        Log::debug('lesson_id"' . print_r($request->lesson_id, true) . '"');
        Log::debug('reserve_id"' . print_r($request->id, true) . '"');

        $lesson = Lesson::find($request->lesson_id);
        $lesson->cancelReserve();
        return redirect('/');
    }
}
