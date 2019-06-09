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
                <form action="" method="post" class="form-horizontal"  enctype="multipart/form-data">
                    {{ csrf_field() }}
                    {{-- {{ method_field('patch') }} --}}
                    <div class="form-group @if($errors->has('title')) has-error @endif">
                        <label for="title" class="col-md-3 control-label">タイトル</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="title" name="title" value="{{$course->title}}">
                            @if($errors->has('title'))<span class="text-danger">{{ $errors->first('title') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group @if($errors->has('content')) has-error @endif">
                        <label for="content" class="col-md-3 control-label">内容</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="content" name="content" value="{{$course->content}}">
                            @if($errors->has('content'))<span class="text-danger">{{ $errors->first('content') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group @if($errors->has('fee')) has-error @endif">
                        <label for="fee" class="col-md-3 control-label">料金</label>
                        <div class="col-sm-9">
                            <input type="nember" class="form-control" id="fee" name="fee" value="{{$course->fee}}">
                            @if($errors->has('fee'))<span class="text-danger">{{ $errors->first('fee') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group @if($errors->has('image')) has-error @endif">
                            <label for="fee" class="col-md-3 control-label">メインイメージ</label>
                            <div class="col-sm-9">
                                <input type="file" class="form-control" id="image" name="image" value="{{$course->fee}}">
                                @if($errors->has('image'))<span class="text-danger">{{ $errors->first('image') }}</span>
                                @endif
                            </div>
                    </div>

                    <div class="col-md-offset-3 text-center"><button class="btn btn-primary">確認</button></div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
