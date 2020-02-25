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

    public function reserves(){
        return $this->hasMany('App\Reserve');
    }

    public function getReservesNum(){
        return $this->reserves()->count();
    }

    public function getStartDay(){
        $week = array( "日", "月", "火", "水", "木", "金", "土" );
        $day = new DateTime($this->start);
        return $day->format('m/d(' . $week[$day->format("w")] . ')');
    }

    public function getStartTime(){
        $day = new DateTime($this->start);
        return $day->format('H:i');
    }

    public function getEndTime(){
        $day = new DateTime($this->end);
        return $day->format('H:i');
    }

    public function isDoneReserve(){
        if(Auth::check()){
            $user = Auth::user();
            $reserve = Reserve::where('user_id', $user->id)->where('lesson_id', $this->id)->first();

            if( $reserve !== null){
                return true;
            }
            else{
                return false;
            }
        }
        else{
            return false;
        }
    }

    public function getReserveKind(){
        if(Auth::check()){
            $user = Auth::user();
            $reserve = Reserve::where('user_id', $user->id)->where('lesson_id', $this->id)->first();

            if( $reserve !== null){
                return $reserve->kind;
            }
            else{
                return null;
            }
        }
        else{
            return null;
        }
    }

    public function cancelReserve(){

        if(Auth::check()){
            $user = Auth::user();
            $reserve = Reserve::where('user_id', $user->id)->where('lesson_id', $this->id)->first();

            if( $reserve !== null){
                Log::debug('$reserve !== null');
                $reserve->delete();
                return true;
            }
            else{
                Log::warning('「存在しないレッスンの予約」を削除しようとした ユーザーID="' . print_r(Auth::user()->id, true) . '" LessonID="' . print_r($this->id, true) ); 
                return false;
            }
        }
        else{
            Log::warning('未ログインのためレッスン削除操作を不許可とする'); 
            return false;
        }
    }

    public function course(){
        return $this->belongsTo('App\Course');
    }

    public function isMaxReserve(){

        if( $this->getReservesNum() >= $this->course->max_num ){
            return true;
        }
        else{
            return false;
        }
    }

}
