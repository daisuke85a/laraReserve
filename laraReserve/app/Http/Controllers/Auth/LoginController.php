<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Reserve;
use App\Like;
use App\Services\SocialService;
use App\User;
use Cookie;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Socialite;
use App\Mail\LikeOwnerNotification;

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
            Auth::login(SocialService::findOrCreate($providerUser, $provider));

            if (Auth::check()) {

                //ログイン前にしてた予約操作を実行する
                $noAuthReserveRequest = Cookie::get('noAuthReserveRequest');
                \Cookie::queue(\Cookie::forget('noAuthReserveRequest'));
                $noAuthReserveRequestKind = Cookie::get('noAuthReserveRequestKind');

                //予約IDと予約種別が両方Cookieに入力されている場合は保存する
                if (!empty($noAuthReserveRequest) && !empty($noAuthReserveRequestKind)) {
                    $reserve = new Reserve();
                    $reserve->fill(['user_id' => Auth::user()->id]);
                    $reserve->fill(['lesson_id' => $noAuthReserveRequest]);
                    $reserve->fill(['kind' => $noAuthReserveRequestKind]);
                    $reserve->fill(['valid' => 1]);
                    $reserve->save();
                }

                //ログイン前にしてたイイね操作を実行する
                $noAuthLikeRequest = Cookie::get('noAuthLikeRequest');
                \Cookie::queue(\Cookie::forget('noAuthReserveRequest'));

                //イイねがCookieに入力されている場合は保存する
                if (!empty($noAuthLikeRequest)) {
                    $like = new Like();
                    $like->fill(['user_id' => Auth::user()->id]);
                    $like->fill(['course_id' => $noAuthLikeRequest]);
        
                    $like->save();
        
                    $to = $like->getOwnerEmail();
                    Mail::to($to)->send(new LikeOwnerNotification($like));
                }
            }

            return redirect($this->redirectTo);
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
            $reserve->fill(['valid' => true]);

            $reserve->save();
        }

        return '/';
    }

}
