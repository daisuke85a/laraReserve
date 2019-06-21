<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Course;
use Debugbar;

class Reserve extends Model
{
    //
    protected $fillable = [
        'user_id', 'lesson_id', 'valid', 'kind'
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function getUserName(){
        $user = $this->user->name;

        return $user;
    }

    public function getOwnerEmail(){
        $email = $this->lesson->course->user->email;

        return $email;
    }

    public function getUserEmail(){
        $email = $this->user->email;

        return $email;
    }


    public function getCourseTitle(){
        $lesson = $this->lesson();
        \Debugbar::info($lesson);
        return $this->lesson->course->title;
    }

    public function lesson(){
        return $this->belongsTo('App\Lesson');
    }

}
