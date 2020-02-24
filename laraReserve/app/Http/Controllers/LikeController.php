<?php

namespace App\Http\Controllers;

use App\Jobs\SendMail;
use App\Like;
use App\Mail\LikeOwnerNotification;
use App\Services\LikeService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Log;

class LikeController extends Controller
{
    public function create(Request $request)
    {

        $like = LikeService::create(Auth::user(),$request->course_id);

        if($like != null){
            $this->dispatch(new SendMail($like->getOwnerEmail(), new LikeOwnerNotification($like)));
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
