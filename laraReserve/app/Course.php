<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Course extends Model
{
    protected $guarded = array('id');

    public static $rules =
        ['title' => 'required|string|no_ctrl_chars|max:50',
        'image' => 'file|image|mimes:jpeg,jpg,png|max:10000',
        'content' => 'required|string|no_ctrl_chars_crlf|max:300',
        'youtube_url' => 'nullable|url|no_ctrl_chars|string|max:50',
        'target' => 'required|string|no_ctrl_chars_crlf|max:300',
        'fee' => 'required|numeric|max:100000',
        'max_num' => 'required|numeric|max:100000',
        'min_from_station' => 'required|string|no_ctrl_chars|max:50',
        'address' => 'required|string|no_ctrl_chars|max:50',
        'address_detail' => 'no_ctrl_chars|string|max:50',
        'address_room' => 'no_ctrl_chars|string|max:50',
        'address_url' => 'nullable|url|no_ctrl_chars|string|max:50',
        'need' => 'no_ctrl_chars_crlf|string|max:300',
    ];

    public function getFeeString()
    {
        return '¥' . number_format($this->fee);
    }

    public function lessons()
    {
        return $this->hasMany('App\Lesson');
    }

    public function getFutureLessons()
    {
        $date = date('Y-m-d H:i:s');
        return Lesson::where('end', '>', $date)->where('course_id', $this->id)->get();
    }

    public function getFutureFirstLesson()
    {
        $date = date('Y-m-d H:i:s');
        return Lesson::where('end', '>', $date)->where('course_id', $this->id)->first();
    }

    public function mainImage()
    {
        return $this->hasOne('App\Image');
    }

    public function subImages()
    {
        return $this->hasMany('App\SubImage');
    }

    public function addressImages()
    {
        return $this->hasMany('App\AddressImage');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function likes()
    {
        return $this->hasMany('App\Like');
    }

    public function getLikesNum()
    {
        return $this->likes()->count();
    }

    public function isDoneLike()
    {

        if (Auth::check()) {
            $user = Auth::user();
            $like = Like::where('user_id', $user->id)->where('course_id', $this->id)->first();

            if ($like !== null) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }

    }

}
