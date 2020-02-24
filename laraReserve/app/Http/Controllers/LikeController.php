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
        LikeService::delete(Auth::user(),$request->course_id);

        //リダイレクト
        return redirect('/course/' . $request->course_id);
    }
}
