<?php

namespace App\Http\Controllers;

use App\Services\SocialService;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
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

        //未ログイン時は閲覧禁止
        if (Auth::check()) {
            $user = User::findOrFail($userId);
            $authUser = Auth::user();

            //自分以外は閲覧禁止
            if ($authUser->id === $user->id) {

                // social_account情報
                $socialAccounts = [];
                foreach ($user->socialAccounts as $account) {
                    $socialAccounts[$account->provider_name]['link'] = SocialService::findLink($account->provider_name, $account->token, $account->secret_token);
                }

                return view('user/show', [
                    'user' => $user,
                    'socialAccounts' => $socialAccounts,
                ]);
            }
        }

        abort('403');
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

        //未ログイン時は閲覧禁止
        if (Auth::check()) {
            $user = User::findOrFail($id);
            $authUser = Auth::user();

            //自分以外は閲覧禁止
            if ($authUser->id === $user->id) {
                return view('user/edit', [
                    'user' => $user,
                ]);
            }
        }
        abort('403');
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
            return redirect('user/edit/' . $id)
                ->withErrors($validator)
                ->withInput();
        }

        //未ログイン時は閲覧禁止
        if (Auth::check()) {
            $user = User::findOrFail($id);
            $authUser = Auth::user();

            //自分以外は更新禁止
            if ($authUser->id === $user->id) {

                $user->profile = $request->profile;
                $user->save();

                return redirect('user/' . $user->id  );
            }
        }
        abort('403');
    }
}
