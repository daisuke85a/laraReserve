@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center pb-3">
        <div class="col-12">
            <form action="/course/add/" method="GET">
                {{ csrf_field() }}
                <input type="submit" value="クラス追加" class="btn btn-primary btn-sm btn-dell">
            </form>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                @if (count($errors) > 0)
                <div>
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{$error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">クラス名</th>
                            <th>レッスン予定</th>
                            <th>日程追加</th>
                            <th>編集</th>
                            <th>削除</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($courses as $course)
                        <tr>
                            <th scope="row">{{$course->title}}</th>
                            <td>
                                @if (count($course->lessons) > 0)
                                @foreach ($course->lessons as $lesson)
                                <p><a href="/{{$course->id}}/lesson/{{$lesson->id}}">{{$lesson->getStartDay()}}</a></p>
                                @endforeach
                                @else
                                <p>予定無し</p>
                                @endif
                            </td>

                            <td>
                                <form action="/{{$course->id}}/lesson/add" method="GET">
                                    {{ csrf_field() }}
                                    <input type="submit" value="日程追加" class="btn btn-primary btn-sm btn-dell">
                                </form>
                            </td>

                            <td>
                                <form action="/course/edit/{{$course->id}}" method="GET">
                                    {{ csrf_field() }}
                                    <input type="submit" value="編集" class="btn btn-secondary btn-sm btn-dell">
                                </form>
                            </td>

                            <td>
                                <form action="/course/delete/{{$course->id}}" method="POST">
                                    {{ csrf_field() }}
                                    <input type="submit" value="削除" class="btn btn-danger btn-sm btn-dell">
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
