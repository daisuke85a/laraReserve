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

                <h2>講座リスト</h2>
                <form action="" method="post" class="form-horizontal">
                    {{ csrf_field() }}
                    <input type="hidden" name="title" value="{{$title}}">
                    <input type="hidden" name="content" value="{{$content}}">
                    <input type="hidden" name="fee" value="{{$fee}}">
                    <div class="row">
                    <label class="col-sm-4 control-label">タイトル</label>
                    <div class="col-sm-8">{{$title}}</div>
                    </div>
                    <div class="row">
                    <label class="col-sm-4 control-label">内容</label>
                    <div class="col-sm-8">{{$content}}</div>
                    </div>
                    <div class="row">
                    <label class="col-sm-4 control-label">料金</label>
                    <div class="col-sm-8">{{$fee}}</div>
                    </div>
                    <div class="row" style="margin-top: 30px;">
                    <div class="col-sm-offset-4 col-sm-8">
                    <input type="submit" name="button1" value="登録" class="btn btn-primary btn-wide" />
                    </div>
                    </div>
                   </form>
            </div>
        </div>
    </div>
</div>
@endsection
