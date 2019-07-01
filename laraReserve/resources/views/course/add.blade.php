@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
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
                <form action="/course/create" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <table>
                        <tr>
                            <th>クラス名 </th>
                            <td><input type="text" name="title" value="{{old('title')}}"></td>
                        </tr>

                        <tr>
                            <th>メインイメージ</th>
                            <td><input type="file" name="image"></td>
                        </tr>

                        <tr>
                            <th>\こんなことやります/</th>
                            <td><textarea name="content" value="{{old('content')}}"></textarea></td>
                        </tr>
                        <tr>
                            <th>\こんな人におすすめ/</th>
                            <td><textarea name="target" value="{{old('target')}}"></textarea></td>
                        </tr>
                        <tr>
                            <th>料金 </th>
                            <td><input type="number" name="fee" value="{{old('fee')}}"></td>
                        </tr>
                        <tr>
                            <th>何駅から徒歩何分か</th>
                            <td><input type="text" name="min_from_station" value="{{old('min_from_station')}}"></td>
                        </tr>
                        <tr>
                            <th>会場名</th>
                            <td><input type="text" name="address" value="{{old('address')}}"></td>
                        </tr>
                        <tr>
                            <th>部屋名</th>
                            <td><input type="text" name="address_room" value="{{old('address_room')}}"></td>
                        </tr>
                        <tr>
                            <th>会場URL</th>
                            <td><input type="text" name="address_url" value="{{old('address_url')}}"></td>
                        </tr>
                        <tr>
                            <th>会場詳細 </th>
                            <td><textarea name="address_detail" value="{{old('address_detail')}}"></textarea></td>
                        </tr>
                        <tr>
                            <th>必要なもの</th>
                            <td><textarea name="need" value="{{old('need')}}"></textarea></td>
                        </tr>
                        <tr>
                            <th>最大人数</th>
                            <td><input type="number" name="max_num" value="{{old('max_num')}}"></td>
                        </tr>

                        <tr>
                            <th></th>
                            <td><input type="submit" value="クラスを追加する"></td>
                        </tr>
                </form>
                </table>

            </div>
        </div>
    </div>
</div>
@endsection
