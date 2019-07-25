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
        <div class="col-12">
            <div class="card">
                <form action="/course/create" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group @if($errors->has('title')) has-error @endif">
                        <label for="title" class="col-md-3 control-label">クラス名</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="title" name="title" value="{{old('title')}}"  placeholder="例：未経験者向けヒップホップダンス">
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

                    <div class="form-group @if($errors->has('content')) has-error @endif">
                        <label for="content" class="col-md-3 control-label">\こんなことやります/</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" id="content" name="content" placeholder="例：ストリートダンスである「ハウス」をメインに踊ります。
１．まずはゆっくり体をストレッチ
２．基礎的なステップの練習
３．曲に合わせた振り付けでダンスを楽しむ">{{old('content')}}</textarea>
                            @if($errors->has('content'))<span class="text-danger">{{ $errors->first('content') }}</span>
                            @endif
                        </div>
                    </div>


                    <table>
                        <div class="form-group @if($errors->has('youtube_url')) has-error @endif">
                            <label for="youtube_url" class="col-md-3 control-label">YouTube埋め込み用URL</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="youtube_url" name="youtube_url" value="{{old('youtube_url')}}" placeholder="（任意）例：https://www.youtube.com/embed/tJIVFVdqKIo">
                                @if($errors->has('youtube_url'))<span class="text-danger">{{ $errors->first('youtube_url') }}</span>
                                @endif
                            </div>
                        </div>
    
                        <div class="form-group @if($errors->has('content')) has-error @endif">
                            <label for="content" class="col-md-3 control-label">\こんな人におすすめ/</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" id="target" name="target" placeholder="例：
１．ダンスに興味があるけど、始める勇気がない人
２．運動不足のため、楽しく汗をかきたい人
３．Webエンジニア、デザイナーと仲良くなりたい人">{{old('target')}}</textarea>
                                @if($errors->has('target'))<span class="text-danger">{{ $errors->first('target') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group @if($errors->has('fee')) has-error @endif">
                            <label for="fee" class="col-md-3 control-label">料金</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" id="fee" name="fee" value="{{old('fee')}}" placeholder="例：1000">
                                @if($errors->has('fee'))<span class="text-danger">{{ $errors->first('fee') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group @if($errors->has('min_from_station')) has-error @endif">
                            <label for="min_from_station" class="col-md-3 control-label">何駅から徒歩何分か</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="min_from_station" name="min_from_station" value="{{old('min_from_station')}}" placeholder="例：渋谷駅から徒歩5分">
                                @if($errors->has('min_from_station'))<span class="text-danger">{{ $errors->first('min_from_station') }}</span>
                                @endif
                            </div>
                        </div>
    
                        <div class="form-group @if($errors->has('address')) has-error @endif">
                            <label for="address" class="col-md-9 control-label">会場名</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="address" name="address"
                                    value="{{old('address')}}" placeholder="例：スタジオミッション">
                                @if($errors->has('address'))<span class="text-danger">{{ $errors->first('address') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group @if($errors->has('address_room')) has-error @endif">
                            <label for="address_room" class="col-md-3 control-label">部屋名</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="address_room" name="address_room" value="{{old('address_room')}}"  placeholder="例：A-815号室">
                                @if($errors->has('address_room'))<span class="text-danger">{{ $errors->first('address_room') }}</span>
                                @endif
                            </div>
                        </div>
    
                        <div class="form-group @if($errors->has('address_url')) has-error @endif">
                            <label for="address_url" class="col-md-3 control-label">会場URL</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="address_url" name="address_url" value="{{old('address_url')}}"   placeholder="（任意）例：http://studio-mission.com/map/">
                                @if($errors->has('address_url'))<span class="text-danger">{{ $errors->first('address_url') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group @if($errors->has('address_detail')) has-error @endif">
                            <label for="address_detail" class="col-md-9 control-label">住所の詳細</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" id="address_detail"
                                    name="address_detail" placeholder="例：JR渋谷駅ハチ公口から出て109ビル左の道玄坂を上り、坂の中腹、セブンイレブンの隣、駐車場奥のエレベーターにてお上りください。9Fにある受付には行かず、そのままレッスンを行うB-813室におこしください。">{{old('address_detail')}}</textarea>
                                @if($errors->has('address_detail'))<span
                                    class="text-danger">{{ $errors->first('address_detail') }}</span>
                                @endif
                            </div>
                        </div>    
                        
                        <div class="form-group @if($errors->has('need')) has-error @endif">
                            <label for="need" class="col-md-9 control-label">必要なもの</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" id="need" name="need" placeholder="例：●動きやすい靴
　できれば室内用の靴をご準備お願いします。外履きの靴の場合は、こちらで用意する雑巾でのお掃除をお願いしております。
　最悪靴下/裸足でもOKです！
●動きやすい格好への着替え
　Tシャツ&ジャージorスウェットなど
　ちょっと汗かくとおもいます。
●お飲み物
　あると幸せです。">{{old('need')}}</textarea>
                                @if($errors->has('need'))<span class="text-danger">{{ $errors->first('need') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group @if($errors->has('max_num')) has-error @endif">
                            <label for="max_num" class="col-md-9 control-label">最大人数</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" id="max_num" name="max_num" value="{{old('max_num')}}" placeholder="例：10">
                                @if($errors->has('max_num'))<span class="text-danger">{{ $errors->first('max_num') }}</span>
                                @endif
                            </div>                        
                        </div>
    
                        <div class="col-md-offset-3 text-center"><button class="btn btn-primary">クラスを追加</button></div>                </form>
                </table>

            </div>
        </div>
    </div>
</div>
@endsection
