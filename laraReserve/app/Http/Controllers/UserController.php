<?php

namespace App\Http\Controllers;

use App\Lesson;
use App\Course;
use App\Services\SocialService;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;

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
        $authUser = Auth::user();

        //自分以外は閲覧禁止
        if ($authUser->id === $user->id) {

            // social_account情報
            $socialAccounts = [];
            foreach ($user->socialAccounts as $account) {
                $socialAccounts[$account->provider_name]['link'] = SocialService::findLink($account->provider_name, $account->token, $account->secret_token_enc);
            }

            // 現在有効な予約を取得する
            // TODO: 開催終了した予約を分けたい
            // TODO: クラスが削除されたら、関連するレッスンや予約を削除したい
            // TODO: もしかしたら、DBからは削除せずに、無効フラグを立てて残しておきたいかも。
            $reserves = [];
            $reservesCount = 0;
            foreach ($user->reserves as $reserve) {
                $lesson = Lesson::find($reserve->lesson_id);
                if ($lesson !== null) {
                    $course = Course::find($lesson->course_id);
                    if ($course !== null) {
                        $reserves[$reservesCount] = $reserve;
                        $reservesCount++;
                    }
                }
            }

            return view('user/show', [
                'user' => $user,
                'socialAccounts' => $socialAccounts,
                'reserves' => $reserves,
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $userId = intval($id);

        $user = User::findOrFail($id);
        $authUser = Auth::user();

        //自分以外は閲覧禁止
        if ($authUser->id === $user->id) {
            return view('user/edit', [
                'user' => $user,
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $userId = intval($id);

        $validator = Validator::make($request->all(), User::$rules);

        if ($validator->fails()) {
            return redirect('user/' . $id . '/edit/')
                ->withErrors($validator)
                ->withInput();
        }

        $user = User::findOrFail($id);
        $authUser = Auth::user();

        //自分以外は更新禁止
        if ($authUser->id === $user->id) {

            $user->profile = $request->profile;
            $user->save();

            return redirect('user/' . $user->id);
        }
    }
}
