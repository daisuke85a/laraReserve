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

        $reserve = ReserveService::create(Auth::user(), $request->lesson_id, $request->kind);

        if($reserve != null){
            $this->dispatch(new SendMail($reserve->getUserEmail(), new ReserveUserNotification($reserve)));
            $this->dispatch(new SendMail($reserve->getOwnerEmail(), new ReserveNotification($reserve)));

            return view('course.reserve')->with(['course' => $reserve->lesson->course, 'lesson' => $reserve->lesson]);
        }            

        return redirect('/');
    }

    public function delete(Request $request)
    {
        $lesson = ReserveService::delete(Auth::user(), $request->lesson_id);

        return view('course.cancel')->with(['course' => $lesson->course, 'lesson' => $lesson]);

    }
}
