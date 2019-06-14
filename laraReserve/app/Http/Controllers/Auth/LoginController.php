<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Socialite;
use Cookie;
use App\Reserve;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    :q
     */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     *      * OAuth認証先にリダイレクト
     *           *
     *                * @param str $provider
     *                     * @return \Illuminate\Http\Response
     *                          */
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    /**
     *      * OAuth認証の結果受け取り
     *           *
     *                * @param str $provider
     *                     * @return \Illuminate\Http\Response
     *                          */
    public function handleProviderCallback($provider)
    {
        try {
            $providerUser = \Socialite::with($provider)->user();
        } catch (\Exception $e) {
            return redirect('/login')->with('oauth_error', '予期せぬエラーが発生しました');
        }

        if ($email = $providerUser->getEmail()) {
            Auth::login(User::firstOrCreate([
                'email' => $email,
            ], [
                'name' => $providerUser->getName(),
            ]));

        } else {
            return redirect('/login')->with('oauth_error', 'メールアドレスが取得できませんでした');
        }
    }

    protected function redirectTo()
    {

        \Debugbar::info("redirectTo");

        if (Auth::check()) {

            //ログイン前にしてた操作を実行する
            $noAuthReserveRequest = Cookie::get('noAuthReserveRequest');
            \Cookie::queue(\Cookie::forget('noAuthReserveRequest'));

            $reserve = new Reserve();
            $reserve->fill(['user_id' => Auth::user()->id]);
            $reserve->fill(['lesson_id' => $noAuthReserveRequest]);

            $reserve->save();
        }

        return '/';
    }

}
