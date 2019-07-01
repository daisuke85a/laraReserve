@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
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

                <h2>クラスの編集</h2>
                <form action="" method="post" class="form-horizontal" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    {{-- {{ method_field('patch') }} --}}
                    <div class="form-group @if($errors->has('title')) has-error @endif">
                        <label for="title" class="col-md-3 control-label">クラス名</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="title" name="title" value="{{$course->title}}">
                            @if($errors->has('title'))<span class="text-danger">{{ $errors->first('title') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group @if($errors->has('image')) has-error @endif">
                        <label for="fee" class="col-md-3 control-label">メインイメージ</label>
                        <div class="col-sm-9">
                            <input type="file" class="form-control" id="image" name="image">
                            @if($errors->has('image'))<span class=" text-danger">{{ $errors->first('image') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group @if($errors->has('sub_image')) has-error @endif">
                        <label for="fee" class="col-md-3 control-label">サブイメージ</label>
                        <div class="col-sm-9">
                            <input type="file" class="form-control" id="sub_image" name="sub_image">
                            @if($errors->has('sub_image'))<span
                                class="text-danger">{{ $errors->first('sub_image') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group @if($errors->has('content')) has-error @endif">
                        <label for="content" class="col-md-3 control-label">\こんなことやります/</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" id="content" name="content">{{$course->content}}</textarea>
                            @if($errors->has('content'))<span class="text-danger">{{ $errors->first('content') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group @if($errors->has('youtube_url')) has-error @endif">
                        <label for="youtube_url" class="col-md-3 control-label">YouTube埋め込み用URL</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="youtube_url" name="youtube_url" value="{{$course->youtube_url}}">
                            @if($errors->has('youtube_url'))<span class="text-danger">{{ $errors->first('youtube_url') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group @if($errors->has('content')) has-error @endif">
                        <label for="content" class="col-md-3 control-label">\こんな人におすすめ/</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" id="target" name="target">{{$course->target}}</textarea>
                            @if($errors->has('target'))<span class="text-danger">{{ $errors->first('target') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group @if($errors->has('fee')) has-error @endif">
                        <label for="fee" class="col-md-3 control-label">料金</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" id="fee" name="fee" value="{{$course->fee}}">
                            @if($errors->has('fee'))<span class="text-danger">{{ $errors->first('fee') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group @if($errors->has('min_from_station')) has-error @endif">
                        <label for="min_from_station" class="col-md-3 control-label">何駅から徒歩何分か</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="min_from_station" name="min_from_station" value="{{$course->min_from_station}}">
                            @if($errors->has('min_from_station'))<span class="text-danger">{{ $errors->first('min_from_station') }}</span>
                            @endif
                        </div>
                    </div>


                    <div class="form-group @if($errors->has('address')) has-error @endif">
                        <label for="address" class="col-md-9 control-label">会場名</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="address" name="address"
                                value="{{$course->address}}">
                            @if($errors->has('address'))<span class="text-danger">{{ $errors->first('address') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group @if($errors->has('address_room')) has-error @endif">
                        <label for="address_room" class="col-md-3 control-label">部屋名</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="address_room" name="address_room" value="{{$course->address_room}}">
                            @if($errors->has('address_room'))<span class="text-danger">{{ $errors->first('address_room') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group @if($errors->has('address_url')) has-error @endif">
                        <label for="address_url" class="col-md-3 control-label">会場URL</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="address_url" name="address_url" value="{{$course->address_url}}">
                            @if($errors->has('address_url'))<span class="text-danger">{{ $errors->first('address_url') }}</span>
                            @endif
                        </div>
                    </div>


                    <div class="form-group @if($errors->has('address_image')) has-error @endif">
                        <label for="fee" class="col-md-3 control-label">入り口の画像</label>
                        <div class="col-sm-9">
                            <input type="file" class="form-control" id="address_image" name="address_image">
                            @if($errors->has('address_image'))<span
                                class="text-danger">{{ $errors->first('address_image') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group @if($errors->has('address_detail')) has-error @endif">
                        <label for="address_detail" class="col-md-9 control-label">住所の詳細</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" id="address_detail"
                                name="address_detail">{{$course->address_detail}}</textarea>
                            @if($errors->has('address_detail'))<span
                                class="text-danger">{{ $errors->first('address_detail') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group @if($errors->has('need')) has-error @endif">
                        <label for="need" class="col-md-9 control-label">必要なもの</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" id="need" name="need">{{$course->need}}</textarea>
                            @if($errors->has('need'))<span class="text-danger">{{ $errors->first('need') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group @if($errors->has('max_num')) has-error @endif">
                        <label for="max_num" class="col-md-9 control-label">最大人数</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" id="max_num" name="max_num" value="{{$course->max_num}}">
                            @if($errors->has('max_num'))<span class="text-danger">{{ $errors->first('max_num') }}</span>
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
