<?php

namespace App;

use App\Services\SocialService;
use Illuminate\Database\Eloquent\Model;
use Log;
class Like extends Model
{
    //
    protected $fillable = [
        'user_id', 'course_id',
    ];

    public function course()
    {
        return $this->belongsTo('App\Course');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function getOwnerName()
    {
        return $this->course->user->name;
    }

    public function getUserName()
    {
        return $this->user->name;
    }

    public function getOwnerEmail()
    {
        return $this->course->user->email;
    }

    public function getCourseTitle()
    {
        return $this->course->title;
    }

    public function getUserTwitterLink()
    {

        $user = $this->user;

        try {
            // social_account情報
            $socialAccounts = [];
            foreach ($user->socialAccounts as $account) {
                $socialAccounts[$account->provider_name]['link'] = SocialService::findLink($account->provider_name, $account->token, $account->secret_token_enc);
            }
        } catch (\Exception $e) {
            Log::info('Twitterリンクの取得に失敗"' . print_r($user->id, true) . '" ');                    
            return null;
        }

        if (isset($socialAccounts['twitter']['link'])) {
            return $socialAccounts['twitter']['link'];
        } else {
            return null;
        }

    }

}
