@extends('layouts.app')

@section('title')
<title>ダンスで楽しく運動不足を解消しよう | EEDance</title>
@endsection
@section('description')
<meta name="description" content="ダンスのレッスンの受講や開催ができます。Twitter連携で簡単に利用できます。">
@endsection


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

                <p class="pt-1 pl-2">{{$user->name}}さんが管理するクラス</p>

                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">クラス名</th>
                            <th>レッスン予定</th>
                            <th>日程追加</th>
                            <th>編集</th>
                            <th>有効化/無効化</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($courses as $course)
                        @if ($course->isValid())
                        <tr>
                        @else
                        <tr class="table-dark">
                        @endif
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
                                @if ($course->isValid())
                                <form action="/course/invalid/{{$course->id}}" method="POST">
                                    {{ csrf_field() }}
                                    <input type="submit" value="無効にする" class="btn btn-danger btn-sm btn-dell">
                                </form>
                                @else
                                <form action="/course/valid/{{$course->id}}" method="POST">
                                    {{ csrf_field() }}
                                    <input type="submit" value="有効にする" class="btn btn-success btn-sm btn-dell">
                                </form>

                                @endif
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
