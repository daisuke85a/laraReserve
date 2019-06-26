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

    <section class="jumbotron text-center">
        <div class="container">
            <h1 class="jumbotron-heading">気軽にダンスを楽しもう〜！</h1>
            <p class="lead text-muted">
                ダンスのレッスンを受講したり、開催することができます。
            </p>
            <p>
                <a href="#" class="btn btn-primary my-2">ダンスレッスンを受ける</a>
                <a href="#" class="btn btn-secondary my-2">ダンスレッスンを開催する</a>
            </p>
        </div>
    </section>

    <div class="album py-5 bg-light">
        <div class="container">
            <div class="row">
                @foreach ($courses as $course)
                <div class="col-md-6">
                    <div class="card mb-4 shadow-sm">

                        @if ($course->mainImage != null)
                        <img src="/storage/image/{{$course->mainImage->name}}" alt="ClassMainImage"
                            style="max-width:100%">
                        @endif

                        <div class="card-body">
                            <small class="text-muted">渋谷駅徒歩5分 ¥1,000</small>
                            <p class="card-text">{{$course->title}}</p>
                            <div class="d-flex justify-content-left align-items-center">
                                <p class="badge badge-pill badge-secondary mr-2">7/28(日)</p>
                                <p class="badge badge-pill badge-secondary mr-2">8/28(日)</p>
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
                </div>
                @endforeach
            </div>
        </div>
    </div>

    @endsection
