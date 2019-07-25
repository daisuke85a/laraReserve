@extends('layouts.app')

@section('ogp')
<meta name="twitter:card" content="summary_large_image" />
<meta name="twitter:site" content="@daisuke7924" />
<meta name="twitter:creator" content="@daisuke7924" />
<meta property="og:url" content="{{url()->current()}}" />
<meta property="og:title" content="運動不足の社会人へ楽しいダンスを | EEDance" />
<meta property="og:description" content="ダンスのレッスンの受講や開催ができます。Twitter連携で簡単に利用できます。" />
<meta property="og:image" content="{{url("/")}}/storage/default/top1.jpg" />
@endsection

@section('content')
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

<section class="jumbotron text-center jumbotron-fluid">
    <div class="container py-5">
        <h1 class="jumbotron-heading text-white py-5">運動不足の社会人へ<br />楽しいダンスを</h1>
        <p class="lead text-white">
            ダンスのレッスンの受講や開催ができます</p>
        <p class="lead text-white">
            Twitter連携で簡単に予約できます</p>
        <p class="py-3">
            <a href="#lesson-list" class="btn btn-primary my-2">ダンスレッスンを受ける</a>
            <a href="/course/add" class="btn btn-secondary my-2">ダンスレッスンを開催する</a>
        </p>
    </div>
</section>

<div class="container">
    <div class="album py-5 bg-light" id="lesson-list">
        <div class="container">
            <div class="row">
                @foreach ($courses as $course)
                <div class="col-md-6">
                    <a href="/course/{{$course->id}}">
                        <div class="card mb-4 shadow-sm">
                            @if ($course->mainImage != null)
                            <img src="/storage/image/{{$course->mainImage->name}}" alt="ClassMainImage"
                                style="max-width:100%">
                            @endif

                            <div class="card-body">
                                <small
                                    class="text-muted">{{$course->min_from_station . ' ' }}{{$course->getFeeString()}}</small>
                                <p class="card-text">{{$course->title}}</p>
                                <div class="d-flex justify-content-left align-items-center">
                                    <?php $futureLessons = $course->getFutureLessons(); ?>
                                    @if (count($futureLessons) > 0)
                                    @foreach ($futureLessons as $lesson)
                                    <p class="badge badge-pill badge-secondary mr-2">{{$lesson->getStartDay()}}</p>
                                    @endforeach
                                    @else
                                    <div class="col-md-12">
                                        <p class="badge badge-pill badge-secondary mr-2">レッスン予定なし</p>
                                    </div>
                                    @endif
                                </div>
                                <div class="d-flex justify-content-end align-items-center">
                                    <small class="text-muted">{{$course->user->name}}</small>
                                    @if (null !== $course->user->getTwitterLink())
                                    <a href="{{ $course->user->getTwitterLink() }}" target="_blank"
                                        rel="noopener noreferrer">
                                        <i class="fab fa-twitter-square"></i>
                                    </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    @endsection
