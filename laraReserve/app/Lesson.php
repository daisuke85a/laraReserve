<?php

namespace App;
use DateTime;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use App\Reserve;
use Log;

class Lesson extends Model
{
    protected $guarded = array('id');

    public function getStartDay(){
        $day = new DateTime($this->start);
        return $day->format('m月d日');
    }

    public function getStartTime(){
        $day = new DateTime($this->start);
        return $day->format('H時i分');
    }

    public function getEndTime(){
        $day = new DateTime($this->end);
        return $day->format('H時i分');
    }

    public function isDoneReserve(){
        if(Auth::check()){
            $user = Auth::user();
            $reserve = Reserve::where('user_id', $user->id)->where('lesson_id', $this->id)->first();

            if( $reserve !== null){
                Log::debug('$reserve !== null');
                return true;
            }
            else{
                Log::debug('$reserve === null');
                return false;
            }
        }
        else{
            Log::debug('Auth::check() === false');
            return false;
        }
    }

}
