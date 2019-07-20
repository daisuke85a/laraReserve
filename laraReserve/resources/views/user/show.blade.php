@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div>
                <h2 class="mb-1">名前</h2>
                <p>{{$user->name}}</p>
                @foreach ($socialAccounts as $provider => $account)
                @if (isset($account['link']) && $account['link'])
                <a href="{{ $account['link'] }}" target="_blank" rel="noopener noreferrer">
                    @if ($provider === 'twitter')
                    <i class="fab fa-twitter-square fa-2x"></i>
                    @else
                    {{ $provider }}
                    @endif
                </a>
                @endif
                @endforeach
                <h2 class="mb-1">プロフィール</h2>
                <p>Webエンジニアを目指すダンスインストラクター。PHPのリモート案件で月30万の収入を目指す。ポートフォリオとしてこの予約システムを開発、運用中。病気のため通常の会社勤務が難しい。エンジニアやデザイナーにダンスを気軽に楽しんでもらいたい。毎月第4日曜に
                        #WEB系ダンス会 主催(渋谷¥1000) 瞑想、佐藤優樹</p>
            </div>
        </div>
    </div>
</div>

@endsection
