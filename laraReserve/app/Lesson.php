<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    protected $guarded = array('id');

    public function getDate(){
        $date = $this->start;
        return $date;
    }
}
