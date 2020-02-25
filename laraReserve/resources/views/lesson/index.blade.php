@extends('layouts.app')

@section('title')
<title>ダンスで楽しく運動不足を解消しよう | EEDance</title>
@endsection
@section('description')
<meta name="description" content="ダンスのレッスンの受講や開催ができます。Twitter連携で簡単に利用できます。">
@endsection


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
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

                <h2 class="h3">{{$lesson->course->title}}</h2>
                <p>{{$lesson->getStartDay()}}
                    {{$lesson->getStartTime()}}〜{{$lesson->getEndTime()}}</p>
                <h2 class="h3">予約者リスト</h2>
                @if (count($reserves) > 0)
                @foreach ($reserves as $reserve)
                <p>{{$reserve->getUserName()}}
                    @if (null !== $reserve->getUserTwitterLink())
                    <a href="{{ $reserve->getUserTwitterLink() }}" target="_blank" rel="noopener noreferrer">
                        <i class="fab fa-twitter-square fa-2x"></i>
                    </a>
                    @endif
                </p>
                @endforeach
                @else
                <p>まだ居ません</p>
                @endif

                <h2 class="h3">イイねリスト</h2>
                @if (count($likes) > 0)
                @foreach ($likes as $like)
                <p>{{$like->getUserName()}}
                    @if (null !== $like->getUserTwitterLink())
                    <a href="{{ $like->getUserTwitterLink() }}" target="_blank" rel="noopener noreferrer">
                        <i class="fab fa-twitter-square fa-2x"></i>
                    </a>
                    @endif
                </p>
                @endforeach
                @else
                <p>まだ居ません</p>
                @endif

                
                <form action="/{{$lesson->course->id}}/lesson/{{$lesson->id}}/delete" method="post">
                    {{ csrf_field() }}
                    {{ method_field('delete') }}
                        <input type="submit" value="レッスンを削除する" class="btn btn-danger btn-lg btn-block"></td>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection
