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
                <p>このレッスンを予約してくれた人リスト(今後表示したい)</p>
                {{-- //TODO: 予約した人のリストを表示する --}}
            </div>
        </div>
    </div>
</div>
@endsection
