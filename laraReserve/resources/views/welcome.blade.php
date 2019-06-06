@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>
            </div>

            @if (count($errors) > 0)
            <div>
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{$error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <h2>クラス</h2>
            <table>
                <tr>
                    <th>クラス名</th>
                    <th>内容</th>
                    <th>料金</th>
                    <th>レッスン予定</th>
                </tr>
                @foreach ($courses as $course)
                <tr>
                    <td>{{$course->title}}</td>
                    <td>{{$course->content}}</td>
                    <td>{{$course->fee}}円</td>
                    <td>
                        @if (count($course->lessons) > 0)
                        @foreach ($course->lessons as $lesson)
                            <p><a href="/{{$course->id}}/lesson/{{$lesson->id}}">{{$lesson->getDate()}}〜</a></p>
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
            </table>

        </div>
    </div>
</div>
@endsection
