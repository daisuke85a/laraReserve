<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;
use App\User;
use App\Course;
use Debugbar;
use App\Mail\CancelUserNotification;
use App\Mail\CancelOwnerNotification;
use App\Services\SocialService;


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

    public function getUserTwitterLink(){

        $user = $this->user;

        // social_account情報
        $socialAccounts = [];
        foreach ($user->socialAccounts as $account) {
            $socialAccounts[$account->provider_name]['link'] = SocialService::findLink($account->provider_name, $account->token, $account->secret_token);
        }

        \Debugbar::info($user);
        \Debugbar::info($socialAccounts);

        if(isset($socialAccounts['twitter']['link'])){
            return $socialAccounts['twitter']['link'];
        }
        else{
            return null;
        }

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

    public function delete(){

        $to = $this->getUserEmail();
        Mail::to($to)->send(new CancelUserNotification($this));

        $to = $this->getOwnerEmail();
        Mail::to($to)->send(new CancelOwnerNotification($this));

        parent::delete();

    }
    

}
