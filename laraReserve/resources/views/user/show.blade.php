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
                <p>{{$user->profile}}</p>
            </div>
        </div>
    </div>
</div>

@endsection
