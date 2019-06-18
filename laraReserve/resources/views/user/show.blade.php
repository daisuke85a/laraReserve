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

    <div class="row">
        <div class="col-md-12">
            <div class="row">
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
            </div>
        </div>
    </div>
</div>

@endsection
