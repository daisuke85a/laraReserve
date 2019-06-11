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
                            <th>内容 </th>
                            <td><input type="text" name="content" value="{{old('content')}}"></td>
                        </tr>
                        <tr>
                            <th>料金 </th>
                            <td><input type="number" name="fee" value="{{old('fee')}}"></td>
                        </tr>
                        <tr>
                            <th>住所 </th>
                            <td><input type="text" name="address" value="{{old('address')}}"></td>
                        </tr>
                        <tr>
                            <th>画像</th>
                            <td><input type="file" name="image"></td>
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
