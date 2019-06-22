<?php
namespace App\Services;

use App\SocialAccount;
use App\User;
use App\Services\SocialService;
use Socialite;
use Laravel\Socialite\Contracts\User as ProviderUser;


class SocialService
{
    /**
     *  検索か新規作成
     *
     *  @param ProviderUser $providerUser
     *  @param str $provider
     *  @return \App\User
     */
    public static function findOrCreate(ProviderUser $providerUser, $provider)
    {
        // SNS連携済みユーザがいれば返す
        $socialAccount = SocialAccount::where('provider_name', $provider)
            ->where('provider_id', $providerUser->getId())
            ->first();
        if ($socialAccount) {
            return $socialAccount->user;
        }

        $user = User::where('email', $providerUser->getEmail())->first();
        if (!$user) {
            // ユーザの新規作成
            $user = User::create([
                'email' => $providerUser->getEmail(),
                'name' => $providerUser->getName(),
            ]);
        }

        // SNSアカウントの新規作成
        $user->socialAccounts()->create([
            'provider_id' => $providerUser->getId(),
            'provider_name' => $provider,
            'token' => $providerUser->token,
            'secret_token' => $providerUser->tokenSecret,
        ]);

        return $user;

    }

    /**
     * リンクを取得
     */
    public static function findLink($provider, $token, $secret)
    {
        $user = Socialite::driver($provider)->userFromTokenAndSecret($token, $secret);
        if (!$user) {
            return '';
        }

        switch ($provider) {
            case 'twitter':
                return 'https://twitter.com/' . $user->nickname;
            default:
                return '';
        }

    }
}
