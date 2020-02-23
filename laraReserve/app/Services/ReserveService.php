<?php
namespace App\Services;

use App\User;
use App\Reserve;
use App\Lesson;
use Log;

class ReserveService
{
    public static function create($user, $lesson_id, $kind)
    {
        // 同ユーザによりレッスン予約済みの場合は予約をガードする
        if (0 === Reserve::where('user_id', $user->id)->where('lesson_id', $lesson_id)->count()) {
            // 満席の場合は予約をガードする
            $lesson = Lesson::findOrFail($lesson_id);
            if (!$lesson->isMaxReserve()) {
                Log::info('ログイン中に予約操作を実行 lesson_id="' . print_r($lesson_id, true) . '" ユーザーID="' . print_r($user->id, true) . '" ');

                $reserve = new Reserve();
                $reserve->fill(['user_id' => $user->id]);
                $reserve->fill(['lesson_id' => $lesson_id]);
                $reserve->fill(['kind' => $kind]);
                $reserve->fill(['valid' => 1]);

                $reserve->save();

                return $reserve;
            }
        }
        else{
            Log::info('同ユーザによりレッスン予約済みの場合は予約をガードする lesson_id="' . print_r($request->lesson_id, true) . '" ユーザーID="' . print_r($user->id, true) . '" ');
        }

        return null;
    }

}
