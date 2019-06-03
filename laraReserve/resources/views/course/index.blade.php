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
                <table>
                    <tr>
                        <th>タイトル</th>
                        <th>内容</th>
                        <th>料金</th>
                    </tr>
                    @foreach ($courses as $course)
                    <tr>
                        <td>{{$course->title}}</td>
                        <td>{{$course->content}}</td>
                        <td>{{$course->fee}}</td>
                        <td>
                                <form action="/course/edit/{{$course->id}}" method="GET">
                                    {{ csrf_field() }}
                                    <input type="submit" value="編集" class="btn btn-secondary btn-sm btn-dell">
                                </form>
                            </td>

                        <td>
                            <form action="/course/delete/{{$course->id}}" method="POST">
                                {{ csrf_field() }}
                                <input type="submit" value="削除" class="btn btn-danger btn-sm btn-dell">
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </table>

                <form action="/course/create" method="post">
                    {{ csrf_field() }}
                    <table>
                        <tr>
                            <th>講座名: </th>
                            <td><input type="text" name="title" value="{{old('title')}}"></td>
                        </tr>
                        <tr>
                            <th>講座内容: </th>
                            <td><input type="text" name="content" value="{{old('content')}}"></td>
                        </tr>
                        <tr>
                            <th>料金: </th>
                            <td><input type="number" name="fee" value="{{old('fee')}}"></td>
                        </tr>
                        <tr>
                            <th></th>
                            <td><input type="submit" value="講座を追加する"></td>
                        </tr>
                </form>
                </table>

            </div>
        </div>
    </div>
</div>
@endsection
