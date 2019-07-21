<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Services\SocialService;

class User extends Authenticatable
{
    use Notifiable;

    public static $rules =
    [
    'profile' => 'nullable|no_ctrl_chars_crlf|string|max:300',
];


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function socialAccounts()
    {
        return $this->hasMany('App\SocialAccount');
    }

    public function getImageLink(){

        // social_account情報
        $socialAccounts = [];
        foreach ($this->socialAccounts as $account) {
            $socialAccounts[$account->provider_name]['imagelink'] = SocialService::findImageLink($account->provider_name, $account->token, $account->secret_token_enc);
        }

        if(isset($socialAccounts['twitter']['imagelink'])){
            return $socialAccounts['twitter']['imagelink'];
        }
        else{
            return null;
        }
    }

    public function getTwitterLink(){

        // social_account情報
        $socialAccounts = [];
        foreach ($this->socialAccounts as $account) {
            $socialAccounts[$account->provider_name]['link'] = SocialService::findLink($account->provider_name, $account->token, $account->secret_token_enc);
        }

        if(isset($socialAccounts['twitter']['link'])){
            return $socialAccounts['twitter']['link'];
        }
        else{
            return null;
        }

    }

}
