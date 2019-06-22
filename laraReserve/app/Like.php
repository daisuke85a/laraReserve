<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    //
    protected $fillable = [
        'user_id', 'course_id'
    ];

    public function course(){
        return $this->belongsTo('App\Course');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }


    public function getOwnerName(){
        return $this->course->user->name;
    }

    public function getUserName(){
        return $this->user->name;
    }


    public function getOwnerEmail(){
        return $this->course->user->email;
    }

    public function getCourseTitle(){
        return $this->course->title;
    }


}
