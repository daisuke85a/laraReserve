<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Log;
use App\Like;
use App\Mail\LikeOwnerNotification;


class LikeController extends Controller
{
    public function create(Request $request)
    {

        // 未ログインの場合は一旦Cokkieに保存する
        if (Auth::check() === false) {
            Cookie::queue(Cookie::make('noAuthLikeRequest', $request->course_id, 30));
        }

        if (Auth::check()) {
            // ユーザはログインしている

            // TODO: 同ユーザによりレッスン予約済みの場合は予約をガードしたい
            $user = Auth::user();
            Log::debug('ReserveController user_id' . print_r($user->id, true) . '"');
            Log::debug('ReserveController course_id' . print_r($request->course_id, true) . '"');

            $like = new Like();
            $like->fill(['user_id' => $user->id]);
            $like->fill(['course_id' => $request->course_id]);

            $like->save();

            $to = $like->getOwnerEmail();
            Mail::to($to)->send(new LikeOwnerNotification($like));
            
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
        //削除対象レコードを検索
        $like = Like::where('course_id', $request->course_id)->where('user_id', Auth::user()->id)->first();

        //削除
        $like->delete();

        //リダイレクト
        return redirect('/');
    }
}