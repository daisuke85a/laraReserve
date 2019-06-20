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

    public function getCourseTitle(){
        $lesson = $this->lesson();
        \Debugbar::info($lesson);
        return $this->lesson->id;
    }

    public function lesson(){
        return $this->belongsTo('App\Lesson');
    }

}
