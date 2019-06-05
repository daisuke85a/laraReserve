<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LessonController extends Controller
{
    public function add(Request $request, $id)
    {
        return view('lesson.add',compact('id'));
    }

}
