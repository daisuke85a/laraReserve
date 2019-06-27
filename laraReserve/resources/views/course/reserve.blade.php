@extends('layouts.app')

@section('content')
<div class="container">
    @if (count($errors) > 0)
    <div>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{$error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    @if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
    @endif

    <p class="mb-0 text-center">渋谷駅徒歩5分 ¥1,000</p>
    <h1 class="lead font-weight-bold text-center">{{$course->title}}</h1>
    <p class="text-center">06月23日(日) 15:00〜16:00 </p>
    <p class="text-center h2 font-weight-bold">予約が完了しました！</p>

    <p class="text-center">続けて16:30〜17:30のレッスンもございます！<br>
        ¥1,000(税込み)</p>
    <p class="text-center">当日の気分で参加をご検討ください＼(^o^)／</p>

    <p class="text-center">不明点がある場合は下記のアカウントまでDMください</p>
    <div class="d-flex justify-content-center">
        <div><img src="{{$course->user->getImageLink()}}" alt="image" class="text-center"></div>
    </div>
    <p class="text-center lead font-weight-bold">{{$course->user->name}}
        @if (null !== $course->user->getTwitterLink())
        <a href="{{ $course->user->getTwitterLink() }}" target="_blank" rel="noopener noreferrer">
            <i class="fab fa-twitter-square fa-2x"></i>
        </a>
        @endif
    </p>
    <div class="row pb-3">
        <div class="col">
            <a href="/course/{{$course->id}}"><button class="btn btn-primary btn-lg btn-block">戻る</button></a>
        </div>
    </div>
</div>

@endsection
