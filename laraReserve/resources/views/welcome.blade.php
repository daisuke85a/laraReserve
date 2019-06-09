@extends('layouts.app')

@section('content')
<div class="container">
    @if (count($errors) > 0)
    <div>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{$error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    @if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
    @endif

    <div class="row">
        @foreach ($courses as $course)
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h2>{{$course->title}}</h2>
                </div>
                <div class="card-body">
                    @if ($course->mainImage != null)
                    <img src="/storage/image/{{$course->mainImage->name}}" alt="ClassMainImage" style="max-width:100%">
                    @endif
                    <p>{{$course->content}}</p>
                    <p>{{$course->fee}}円</p>
                    <p>{{$course->address}}</p>
                    <p>レッスンの予定</p>
                    <div class="row">
                        @if (count($course->lessons) > 0)
                        @foreach ($course->lessons as $lesson)
                        <div class="col-8">
                            <p>{{$lesson->getStartDay()}}
                                    {{$lesson->getStartTime()}}〜{{$lesson->getEndTime()}}</p>
                        </div>
                        <div class="col-4">
                            <form action="/reserve/create" method="post">
                                {{ csrf_field() }}
                                <input type="hidden" name="lesson_id" value="{{$lesson->id}}">
                                <input type="submit" value="予約する" class="btn btn-primary btn-sm btn-dell">
                                {{-- TODO:レッスン予約済みの場合はボタンを無効化したい --}}
                            </form>
                        </div>
                        @endforeach
                        @else
                        <div class="col-md-12">
                            <p>レッスン予定無し</p>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        @endforeach

    </div>
</div>
@endsection
