<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Reserve extends Model
{
    //
    protected $fillable = [
        'user_id', 'lesson_id',
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function getUserName(){
        $user = $this->user->name;

        return $user;
    }

}
