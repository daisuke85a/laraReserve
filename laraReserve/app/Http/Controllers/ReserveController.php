<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Reserve;
use Log;

class ReserveController extends Controller
{
    public function create(Request $request){

        if (Auth::check()) {
            // ユーザはログインしている

            // TODO: 同ユーザによりレッスン予約済みの場合は予約をガードしたい
            $user = Auth::user();
            Log::debug('ReserveController user_id' . print_r($user->id, true) . '"');
            Log::debug('ReserveController lesson_id' . print_r($request->lesson_id, true) . '"');

            $reserve = new Reserve();
            $reserve->fill(['user_id' => $user->id]);
            $reserve->fill(['lesson_id' => $request->lesson_id]);

            $reserve->save();

            // $course->fill($form)->save();
        } else {
            Log::debug('未ログインのため予約を不許可とする'); //TODO: errorsに格納できればベスト。ただ、通常運用では通らないコードなので、対応は任意でOK

            return redirect('/login');
        }

    }
}
