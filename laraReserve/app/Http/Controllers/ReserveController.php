<?php

namespace App\Http\Controllers;

use App\Jobs\SendMail;
use App\Lesson;
use App\Mail\ReserveNotification;
use App\Mail\ReserveUserNotification;
use App\Reserve;
use App\Services\ReserveService;
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

        if (Auth::check()) {
            $reserve = ReserveService::create(Auth::user(), $request->lesson_id, $request->kind);

            if($reserve != null){
                $this->dispatch(new SendMail($reserve->getUserEmail(), new ReserveUserNotification($reserve)));
                $this->dispatch(new SendMail($reserve->getOwnerEmail(), new ReserveNotification($reserve)));

                return view('course.reserve')->with(['course' => $reserve->lesson->course, 'lesson' => $reserve->lesson]);
            }
            
        } else {
            return redirect('/login/twitter');
        }

        return redirect('/');
    }

    public function delete(Request $request)
    {
        $user = Auth::user();
        $lesson = Lesson::find($request->lesson_id);

        if($lesson != null){
            Log::info('予約削除 lesson_id="' . print_r($request->lesson_id, true) .  '" ユーザーID="' . print_r($user->id, true) . '"  ');
            $lesson->cancelReserve();
        }
        else{
            Log::warning('別のユーザから予約削除を試みられた lesson_id="' . print_r($request->lesson_id, true) .  '" ユーザーID="' . print_r($user->id, true) . '"  ');
        }

        return view('course.cancel')->with(['course' => $lesson->course, 'lesson' => $lesson]);

    }
}
