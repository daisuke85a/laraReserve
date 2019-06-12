<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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

    public function mainImage(){
        return $this->hasOne('App\Image');
    }

    public function subImage(){
        return $this->hasOne('App\SubImage');
    }

}
