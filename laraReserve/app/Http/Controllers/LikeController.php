<?php

namespace App\Http\Controllers;

use App\Jobs\SendMail;
use App\Like;
use App\Mail\LikeOwnerNotification;
use Cookie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Log;

class LikeController extends Controller
{
    public function create(Request $request)
    {

        // 未ログインの場合は一旦Cokkieに保存する
        if (Auth::check() === false) {
            Cookie::queue(Cookie::make('noAuthLikeRequest', $request->course_id, 30));
            Log::info('未ログインでイイね操作したため一旦Cokkieに保存する course_id="' . print_r($request->course_id, true) . '"');                    
        }

        if (Auth::check()) {
            // ユーザはログインしている

            if (0 === Like::where('user_id', Auth::user()->id)->where('course_id', $request->course_id)->count()) {

                $user = Auth::user();
                Log::info('ログイン中にイイね操作を実行 lesson_id="' . print_r($request->course_id, true) . '" ユーザーID="' . print_r($user->id, true) . '" ');

                $like = new Like();
                $like->fill(['user_id' => $user->id]);
                $like->fill(['course_id' => $request->course_id]);

                $like->save();

                $this->dispatch(new SendMail($like->getOwnerEmail(), new LikeOwnerNotification($like)));
            }

        } else {
            return redirect('/login/twitter');

        }

        return redirect('/course/' . $request->course_id);

    }

    public function delete(Request $request)
    {
        $user = Auth::user();
        Log::info('イイね削除操作 course_id="' . print_r($request->course_id, true) . '" ユーザーID="' . print_r($user->id, true) . '" ');
        //削除対象レコードを検索
        $like = Like::where('course_id', $request->course_id)->where('user_id', Auth::user()->id)->first();

        //削除
        $like->delete();

        //リダイレクト
        return redirect('/course/' . $request->course_id);
    }
}
