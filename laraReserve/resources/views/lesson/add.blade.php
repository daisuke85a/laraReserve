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

                <h2>レッスン日程の追加</h2>
                <form action="/{{$id}}/lesson/create" method="post">
                    {{ csrf_field() }}
                    <table>
                        <td><input type="hidden" name="course_id" value="{{$id}}"></td>

                        <tr>
                            <th>レッスン日 </th>
                            <td><input type="date" name="date" value="{{old('date')}}"></td>
                        </tr>
                        <tr>
                            <th>開始時間 </th>
                            <td><input type="time" name="start_time" value="{{old('start_time')}}"></td>
                        </tr>
                        <tr>
                            <th>終了時間 </th>
                            <td><input type="time" name="end_time" value="{{old('end_time')}}"></td>
                        </tr>
                        <tr>
                            <th></th>
                            <td><input type="submit" value="レッスンを追加する"></td>
                        </tr>
                </form>
                </table>

            </div>
        </div>
    </div>
</div>
@endsection
