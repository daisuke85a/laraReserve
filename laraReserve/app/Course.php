<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Course extends Model
{
    protected $guarded = array('id');

    public static $rules = array(
        'title' => 'required',
        'content' => 'required',
        'fee' => 'required'
    );

    public function lessons(){
        return $this->hasMany('App\Lesson');
    }

    public function getFutureLessons(){
        $date = date('Y-m-d H:i:s');
        return Lesson::where('end' , '>' , $date )->where('course_id', $this->id)->get();
    }

    public function getFutureFirstLesson(){
        $date = date('Y-m-d H:i:s');
        return Lesson::where('end' , '>' , $date )->first();
    }


    public function mainImage(){
        return $this->hasOne('App\Image');
    }

    public function subImages(){
        return $this->hasMany('App\SubImage');
    }

    public function addressImages(){
        return $this->hasMany('App\AddressImage');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function likes(){
        return $this->hasMany('App\Like');
    }

    public function getLikesNum(){
        return $this->likes()->count();
    }

    public function isDoneLike(){

        if(Auth::check()){
            $user = Auth::user();
            $like = Like::where('user_id', $user->id)->where('course_id', $this->id)->first();

            if( $like !== null){
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

}
