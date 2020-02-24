<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Cookie;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string
     */
    protected function redirectTo($request)
    {
        if($request->routeIs('likeCreate')){
            Cookie::queue(Cookie::make('noAuthLikeRequest', $request->course_id, 30));
            \Log::info('未ログインでイイね操作したため一旦Cokkieに保存する course_id="' . print_r($request->course_id, true) . '"');
        }

        if($request->routeIs('reserveCreate')){
            Cookie::queue(Cookie::make('noAuthReserveRequest', $request->lesson_id, 30));
            Cookie::queue(Cookie::make('noAuthReserveRequestKind', $request->kind, 30));
            \Log::info('未ログインで予約操作したため一旦Cokkieに保存する lesson_id="' . print_r($request->lesson_id, true) . '" kind="' . print_r($request->kind, true) . '" ');
        }

        if($request->routeIs('courseAdd')){
            Cookie::queue(Cookie::make('RedirectCourseAdd', 'true', 30));
            \Log::info('未ログインでコース追加操作したため一旦Cokkieに保存する');
        }

        if (! $request->expectsJson()) {
            return 'login/twitter';
        }
    }
}
