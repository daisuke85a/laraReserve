@extends('layouts.app')

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

                <h2>レッスン詳細</h2>
                <h3>クラス名</h3>
                <p>{{$lesson->title}}</p>
                <h3>開始時間 </h3>
                <p>{{$lesson->start}}</p>
                <h3>終了時間 </h3>
                <p>{{$lesson->end}}</p>

                <h2>レッスンの予約</h2>
                <form action="/reserve/create" method="post">
                    {{ csrf_field() }}
                        <input type="hidden" name="lesson_id" value="{{$lesson->id}}">
                        <input type="submit" value="レッスンを予約する">
                        {{-- TODO:レッスン予約済みの場合はボタンを無効化したい --}}
                </form>

                <h2>このレッスンを予約してる人</h2>
                @if (count($reserves) > 0)
                @foreach ($reserves as $reserve)
                    <p>{{$reserve->getUserName()}}</p>
                @endforeach
                @else
                    <p>まだ居ません</p>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
