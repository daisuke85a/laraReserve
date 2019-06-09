<?php

namespace App;
use DateTime;

use Illuminate\Database\Eloquent\Model;

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

}
