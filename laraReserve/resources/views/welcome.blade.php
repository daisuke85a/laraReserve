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
                <div class="card-header"><h2>{{$course->title}}</h2></div>
                <div class="card-body">
                    @if ($course->mainImage != null)
                        <img src="/storage/image/{{$course->mainImage->name}}" alt="ClassMainImage" style="max-width:100%">
                    @endif
                    <p>{{$course->content}}</p>
                    <p>{{$course->fee}}円</p>
                    <p>{{$course->address}}</p>
                    <p>レッスンの予約</p>
                    <div class="row">
                        @if (count($course->lessons) > 0)
                        @foreach ($course->lessons as $lesson)
                        <div class="col-md-12">
                        <p><a href="/{{$course->id}}/lesson/{{$lesson->id}}">{{$lesson->getStartDay()}}  {{$lesson->getStartTime()}}〜{{$lesson->getEndTime()}}</a></p>
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
