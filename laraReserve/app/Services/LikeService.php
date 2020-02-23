<?php
namespace App\Services;

use App\User;
use App\Like;
use Log;

class LikeService
{
    public static function create($user, $course_id)
    {
        if (0 === Like::where('user_id', $user->id)->where('course_id', $course_id)->count()) {
            $like = new Like();
            $like->fill(['user_id' => $user->id]);
            $like->fill(['course_id' => $course_id]);
            $like->save();

            return $like;
        }

        return null;
    }

}
