<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;
use App\User;
use App\Course;
use Debugbar;
use App\Mail\CancelUserNotification;
use App\Mail\CancelOwnerNotification;

class Reserve extends Model
{
    //
    protected $fillable = [
        'user_id', 'lesson_id', 'valid', 'kind'
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function lesson(){
        return $this->belongsTo('App\Lesson');
    }


    public function getUserName(){
        $user = $this->user->name;

        return $user;
    }

    public function getOwnerName(){
        $name = $this->lesson->course->user->name;

        return $name;
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

    public function invalid(){

        $to = $this->getUserEmail();
        Mail::to($to)->send(new CancelUserNotification($this));

        $to = $this->getOwnerEmail();
        Mail::to($to)->send(new CancelOwnerNotification($this));

        $this->valid = 0;
        $this->save();

    }
    

}
