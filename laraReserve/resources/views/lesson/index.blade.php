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

                <h2>レッスン表示</h2>
                <p>開始時間 </p>
                <p>{{$lesson->start}}</p>
                <p>終了時間 </p>
                <p>{{$lesson->end}}</p>

                <h2>レッスンの予約</h2>
                <form action="/reserve/create" method="post">
                    {{ csrf_field() }}
                        <input type="hidden" name="lesson_id" value="{{$lesson->id}}">
                        <input type="submit" value="レッスンを予約する">
                </form>

                <p>このレッスンを予約してくれた人リスト(今後表示したい)</p>
                {{-- //TODO: 予約した人のリストを表示する --}}
            </div>
        </div>
    </div>
</div>
@endsection
