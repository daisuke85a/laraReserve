@extends('layouts.app')

@section('title')
<title>運動不足の社会人へ楽しいダンスを | EEDance</title>
@endsection
@section('description')
<meta name="description" content="ダンスのレッスンの受講や開催ができます。Twitter連携で簡単に利用できます。">
@endsection


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <h2>ユーザー情報 編集</h2>
                <form action="/user/update/{{$user->id}}" method="post" class="form-horizontal">
                    {{ csrf_field() }}
                    {{ method_field('patch') }}

                    <div class="col-sm-9">
                        <p class="mb-1">名前</p>
                        <p>{{$user->name}}</p>
                    </div>

                    <div class="form-group @if($errors->has('profile')) has-error @endif">
                        <label for="profile" class="col-md-3 control-label">プロフィール</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" id="profile" name="profile">{{$user->profile}}</textarea>
                            @if($errors->has('profile'))<span class="text-danger">{{ $errors->first('profile') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-offset-3 text-center"><button class="btn btn-primary">プロフィールを更新</button></div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
