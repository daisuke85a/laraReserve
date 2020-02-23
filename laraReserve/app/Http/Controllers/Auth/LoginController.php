<?php

namespace App\Http\Controllers\Auth;

use App\Course;
use App\Http\Controllers\Controller;
use App\Jobs\SendMail;
use App\Like;
use App\Mail\LikeOwnerNotification;
use App\Mail\ReserveNotification;
use App\Mail\ReserveUserNotification;
use App\Reserve;
use App\Services\SocialService;
use App\Services\ReserveService;
use App\Services\LikeService;
use App\User;
use Cookie;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Log;
use Socialite;

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
     ** OAuth認証先にリダイレクト
     **
     ** @param str $provider
     ** @return \Illuminate\Http\Response
     **/
    public function redirectToProvider($provider)
    {
        Log::debug('redirectToProvider="' . print_r($provider, true) . '"');
        return Socialite::driver($provider)->redirect();
    }

    /**
     ** OAuth認証の結果受け取り
     **
     ** @param str $provider
     ** @return \Illuminate\Http\Response
     **/
    public function handleProviderCallback($provider)
    {
        Log::debug('handleProviderCallback="' . print_r($provider, true) . '"');

        $redirectTo = '/';

        try {
            $providerUser = \Socialite::with($provider)->user();
        } catch (\Exception $e) {
            Log::warning('OAuth認証の結果受け取りで予期せぬエラーが発生しました');
            Log::warning($e);
            return redirect('/')->with('oauth_error', '予期せぬエラーが発生しました');
        }

        $email = $providerUser->getEmail();

        if (empty($email)) {
            Log::warning('OAuth認証の結果受け取りでメールアドレスの取得失敗');
            //TODO: 仮実装。本当はemailをnullableにしたい
            $providerUser->email = uniqid();
        }
        else{
            Log::info('OAuth認証の結果受け取りでメールアドレスの取得に成功');
        }

        Auth::login(SocialService::findOrCreate($providerUser, $provider));

        if (Auth::check()) {
            Log::info('ログイン成功ID="' . print_r(Auth::user()->id, true) . '" ユーザーID="' . print_r(Auth::user()->id, true) . '" ');

            //ログイン済みであることをキャッシュに保存する(1年保存する)
            Cookie::queue(Cookie::make('SocialLogin', 1, 365 * 24 * 60 * 60));

            //ログイン前にしてた予約操作を実行する
            $noAuthReserveRequest = Cookie::get('noAuthReserveRequest');
            \Cookie::queue(\Cookie::forget('noAuthReserveRequest'));
            $noAuthReserveRequestKind = Cookie::get('noAuthReserveRequestKind');

            //予約IDと予約種別が両方Cookieに入力されている場合は保存する
            if (!empty($noAuthReserveRequest) && !empty($noAuthReserveRequestKind)) {

                $reserve = ReserveService::create(Auth::user(), $noAuthReserveRequest, $noAuthReserveRequestKind);

                if($reserve != null){
                    $this->dispatch(new SendMail($reserve->getUserEmail(), new ReserveUserNotification($reserve)));
                    $this->dispatch(new SendMail($reserve->getOwnerEmail(), new ReserveNotification($reserve)));

                    return view('course.reserve')->with(['course' => $reserve->lesson->course, 'lesson' => $reserve->lesson]);
                }
            }

            //ログイン前にしてたイイね操作を実行する
            $noAuthLikeRequest = Cookie::get('noAuthLikeRequest');
            \Cookie::queue(\Cookie::forget('noAuthReserveRequest'));

            //イイねがCookieに入力されている場合は保存する
            if (!empty($noAuthLikeRequest)) {

                $like = LikeService::create(Auth::user(), $noAuthLikeRequest);

                if($like != null){
                    $this->dispatch(new SendMail($like->getOwnerEmail(), new LikeOwnerNotification($like)));

                    $course = Course::where('id', $noAuthLikeRequest)->first();
                    $futureLessons = $course->getFutureLessons();
                    $futureFirstLesson = $course->getFutureFirstLesson();

                    return view('course.view', ['course' => $course, 'futureLessons' => $futureLessons, 'futureFirstLesson' => $futureFirstLesson]);
                }
            }

            //ログイン前にしてたクラス作成画面への遷移を実行する
            $RedirectCourseAdd = Cookie::get('RedirectCourseAdd');
            \Cookie::queue(\Cookie::forget('RedirectCourseAdd'));

            if ($RedirectCourseAdd === 'true') {
                return redirect('/course/add');
            }

        }

        return redirect($this->redirectTo);
    }

    protected function redirectTo()
    {
        // Twitterログインのみとするため削除
        return '/';
    }

    protected function loggedOut(Request $request)
    {
        //ログアウトした場合
        \Cookie::queue(\Cookie::forget('SocialLogin'));

        return redirect('/');
    }
}
