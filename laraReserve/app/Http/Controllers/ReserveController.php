<?php

namespace App\Http\Controllers;

use App\Jobs\SendMail;
use App\Lesson;
use App\Mail\ReserveNotification;
use App\Mail\ReserveUserNotification;
use App\Reserve;
use Cookie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Log;

class ReserveController extends Controller
{

    public function add(Request $request, $id)
    {
        return view('reserve.add')->with(['id' => $id]);
    }

    public function create(Request $request)
    {

        // 未ログインの場合は一旦Cokkieに保存する
        if (Auth::check() === false) {
            Cookie::queue(Cookie::make('noAuthReserveRequest', $request->lesson_id, 30));
            Cookie::queue(Cookie::make('noAuthReserveRequestKind', $request->kind, 30));
            Log::info('未ログインで予約操作したため一旦Cokkieに保存する lesson_id="' . print_r($request->lesson_id, true) . '" kind="' . print_r($request->kind, true) . '" ');                    
        }

        // $this->middleware('auth');

        if (Auth::check()) {
            // ユーザはログインしている

            // 同ユーザによりレッスン予約済みの場合は予約をガードする
            if (0 === Reserve::where('user_id', Auth::user()->id)->where('lesson_id', $request->lesson_id)->count()) {
                // 満席の場合は予約をガードする
                $lesson = Lesson::findOrFail($request->lesson_id);
                if (!$lesson->isMaxReserve()) {

                    $user = Auth::user();
                    Log::info('ログイン中に予約操作を実行 lesson_id="' . print_r($request->lesson_id, true) . '" ユーザーID="' . print_r($user->id, true) . '" ');

                    $reserve = new Reserve();
                    $reserve->fill(['user_id' => $user->id]);
                    $reserve->fill(['lesson_id' => $request->lesson_id]);
                    $reserve->fill(['kind' => $request->kind]);
                    $reserve->fill(['valid' => 1]);

                    $reserve->save();

                    $this->dispatch(new SendMail($reserve->getUserEmail(), new ReserveUserNotification($reserve)));
                    $this->dispatch(new SendMail($reserve->getOwnerEmail(), new ReserveNotification($reserve)));

                    return view('course.reserve')->with(['course' => $reserve->lesson->course, 'lesson' => $reserve->lesson]);
                }
            }
            
        } else {
            return redirect('/login/twitter');
        }

        return redirect('/');
    }

    public function delete(Request $request)
    {
        $user = Auth::user();
        Log::info('予約削除 lesson_id="' . print_r($request->lesson_id, true) .  '" ユーザーID="' . print_r($user->id, true) . '"  ');

        $lesson = Lesson::find($request->lesson_id);
        $lesson->cancelReserve();

        return view('course.cancel')->with(['course' => $lesson->course, 'lesson' => $lesson]);

    }
}
