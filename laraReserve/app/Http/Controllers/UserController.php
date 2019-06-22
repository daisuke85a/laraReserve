<?php

namespace App\Http\Controllers;
use App\User;
use App\Services\SocialService;
use Debugbar;

class UserController extends Controller
{
    /**
     * プロフィールページの表示
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function show($userId)
    {
        $userId = intval($userId);

        $user = User::findOrFail($userId);

        // social_account情報
        $socialAccounts = [];
        foreach ($user->socialAccounts as $account) {
            $socialAccounts[$account->provider_name]['link'] = SocialService::findLink($account->provider_name, $account->token, $account->secret_token);
        }

        \Debugbar::info($user);
        \Debugbar::info($socialAccounts);

        return view('user/show', [
            'user' => $user,
            'socialAccounts' => $socialAccounts,
        ]);
    }
}
