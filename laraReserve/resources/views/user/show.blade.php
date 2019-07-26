@extends('layouts.app')

@section('title')
<title>ダンスで楽しく運動不足を解消しよう | EEDance</title>
@endsection
@section('description')
<meta name="description" content="ダンスのレッスンの受講や開催ができます。Twitter連携で簡単に利用できます。">
@endsection


@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div>
                <h2 class="mb-1">マイページ</h2>
                <p>{{$user->name}}
                    @foreach ($socialAccounts as $provider => $account)
                    @if (isset($account['link']) && $account['link'])
                    <a href="{{ $account['link'] }}" target="_blank" rel="noopener noreferrer">
                        @if ($provider === 'twitter')
                        <i class="fab fa-twitter-square fa-2x"></i>
                        @else
                        {{ $provider }}
                        @endif
                    </a>
                </p>
                @endif
                @endforeach
                <h2 class="mb-1">予約リスト</h2>
                <p>{{$user->name}} さんは以下のレッスンを予約しています</p>
                @foreach ($reserves as $reserve)
                <a href="/course/{{$reserve->lesson->course->id}}" class="btn btn-outline-primary" role="button">
                    {{$reserve->lesson->getStartDay()}}{{$reserve->lesson->getStartTime()}}〜{{$reserve->lesson->getEndTime()}}<br />
                    {{$reserve->lesson->course->title}}<br />
                </a>
                @endforeach
                @if (count($reserves) === 0)
                    <p>予約中のレッスンはありません</p>
                @endif
            </div>
        </div>
    </div>
</div>

@endsection
