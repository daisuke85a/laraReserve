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
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <p class="mb-0">渋谷駅徒歩5分 ¥1,000</p>
                    <h1 class="h2 font-weight-bold">{{$course->title}}</h1>
                    @if ($course->mainImage != null)
                    <img src="/storage/image/{{$course->mainImage->name}}" alt="ClassMainImage" style="max-width:100%">
                    @endif
                </div>
                <div class="card-body">
                    @if (count($course->subImages) > 0)
                    @foreach ($course->subImages as $subImage)
                    <img src="/storage/image/{{$subImage->name}}" alt="ClassSubImage"
                        style="width:calc(32vmin); height:calc(32vmin); object-fit:cover;">
                    @endforeach
                    @endif

                    <h2 class="h3 text-center font-weight-bold py-3">\こんなことやります/</h2>
                    <div class="d-flex justify-content-center">
                        <p class="font-weight-bold lead">{!! nl2br(e($course->content)) !!}</p>
                    </div>
                    <div class="video-container">
                        <iframe width="560" height="315" src="https://www.youtube.com/embed/tJIVFVdqKIo" frameborder="0"
                            allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen></iframe>
                    </div>
                    <h2
                        class="h3 font-weight-bold text-center mt-3 py-3 border border-primary border-right-0 border-left-0 border-bottom-0">
                        \こんな人におすすめ/</h2>
                    <div class="d-flex justify-content-center">
                        <p class="font-weight-bold lead">１．ダンスに興味があるけど、始める勇気がない人<br>
                            ２．運動不足のため、楽しく汗をかきたい人<br>
                            ３．Webエンジニア、デザイナーと仲良くなりたい人</p>
                    </div>
                    <h2
                        class="h3 font-weight-bold pt-3 border border-primary border-right-0 border-left-0 border-bottom-0">
                        料金</h2>
                    <p>{{$course->fee}}円</p>
                    <h2
                        class="h3 font-weight-bold pt-3 border border-primary border-right-0 border-left-0 border-bottom-0">
                        会場</h2>
                    <p class="mb-0">渋谷駅 徒歩5分 レンタルスタジオ</p>
                    <p class="lead mb-0">{{$course->address}} A-815号室</p>
                    <a href="http://studio-mission.com">http://studio-mission.com</a>
                    <div>
                        {{-- TODO:Google非公式の埋め込み方なので後で見直す必要あり --}}
                        <iframe class="col" style="height: 300px;"
                            src="https://maps.google.co.jp/maps?output=embed&q={{$course->address}}"></iframe>
                    </div>
                    {{-- <div id="map{{$course->id}}" class="map">
                </div> --}}
                @if (count($course->addressImages) > 0)
                @foreach ($course->addressImages as $addressImage)
                <img src="/storage/image/{{$addressImage->name}}" alt="ClassSubImage"
                    style="width:calc(32vmin); height:calc(32vmin); object-fit:cover;">
                @endforeach
                @endif
                <p>{!! nl2br(e($course->address_detail)) !!}</p>
                <h2 class="h3 font-weight-bold pt-3 border border-primary border-right-0 border-left-0 border-bottom-0">
                    必要なもの</h2>
                <p>{!! nl2br(e($course->need)) !!}</p>
                <h2 class="h3 font-weight-bold pt-3 border border-primary border-right-0 border-left-0 border-bottom-0">
                    レッスンの予定</h2>
                @if (count($futureLessons) > 0)
                @foreach ($futureLessons as $lesson)

                <div class="row">
                    <div class="col-3">
                        <p>{{$lesson->getStartDay()}}
                            {{$lesson->getStartTime()}}〜{{$lesson->getEndTime()}}</p>
                    </div>
                    <div class="col-9 d-flex justify-content-start">
                        <div class="col">
                            <form action="/reserve/create" method="post">
                                {{ csrf_field() }}
                                <input type="hidden" name="kind" value="1">
                                <input type="hidden" name="lesson_id" value="{{$lesson->id}}">
                                @if (!$lesson->isDoneReserve())
                                <input type="submit" value="予約する" class="btn btn-primary btn-sm btn-block">
                                @else
                                <input type="submit" value="予約済み" class="btn btn-success btn-sm btn-block"
                                    disabled="disabled">
                                @endif
                            </form>
                        </div>
                        @if ($lesson->isDoneReserve())
                        <div class="col">
                            <form action="/reserve/delete" method="post">
                                {{ csrf_field() }}
                                <input type="hidden" name="lesson_id" value="{{$lesson->id}}">
                                <input type="submit" value="キャンセル" class="btn btn-danger btn-sm btn-block">
                            </form>
                        </div>
                        @endif
                    </div>
                </div>
                @endforeach
                @else
                <div class="col-md-12">
                    <p>レッスン予定無し</p>
                </div>
                @endif
            </div>

            <h2
                class="h3 font-weight-bold pt-3 border border-primary border-right-0 border-left-0 border-bottom-0 text-center">
                \主催者/
            </h2>
            <div class="d-flex justify-content-center">
                <div><img src="{{$course->user->getImageLink()}}" alt="image" class="text-center"></div>
            </div>
            <p class="text-center lead font-weight-bold">{{$course->user->name}}
                @if (null !== $course->user->getTwitterLink())
                <a href="{{ $course->user->getTwitterLink() }}" target="_blank" rel="noopener noreferrer">
                    <i class="fab fa-twitter-square fa-2x"></i>
                </a>
                @endif
            </p>
            <p>Webエンジニアを目指すダンスインストラクター。PHPのリモート案件で月30万の収入を目指す。ポートフォリオとしてこの予約システムを開発、運用中。病気のため通常の会社勤務が難しい。エンジニアやデザイナーにダンスを気軽に楽しんでもらいたい。毎月第4日曜に
                #WEB系ダンス会 主催(渋谷¥1000) 瞑想、佐藤優樹</p>

        </div>
    </div>
</div>
<div class="fixed-bottom" id="reserve-area">
    <div class="footer-box-shadow bg-light container">
        <div class="d-flex justify-content-center">

            <div>
            <p class="text-center">{{$futureFirstLesson->getStartDay()}}{{$futureFirstLesson->getStartTime()}}〜{{$futureFirstLesson->getEndTime()}}<br>
                    渋谷徒歩5分 ¥1,000 参加人数({{$futureFirstLesson->getReservesNum()}}/6人)</p>
            </div>
            <div class="d-flex justify-content-center align-items-center">
                {{-- <button type="button" class="btn-lg btn-success mr-3">
                            <p class="h3">予約する</p>
                        </button> --}}

                @if(!$course->isDoneLike())
                <form action="/like/create" method="post">
                    {{ csrf_field() }}
                    <input type="hidden" name="course_id" value="{{$course->id}}">
                    <input type="submit" value="&#xf004" class="far fa-heart heart border-0 h3">
                </form>
                @else
                <form action="/like/delete" method="post">
                    {{ csrf_field() }}
                    <input type="hidden" name="course_id" value="{{$course->id}}">
                    <input type="submit" value="&#xf004" class="fas fa-heart heart border-0 h3 bg-light">
                </form>
                @endif
                <span class="heart h5">{{$course->getLikesNum()}}</span>
            </div>
        </div>
        <div class="row pb-3">
            <div class="col">
                <form action="/reserve/create" method="post">
                    {{ csrf_field() }}
                    <input type="hidden" name="kind" value="1">
                    <input type="hidden" name="lesson_id" value="{{$futureFirstLesson->id}}">
                    @if (!$futureFirstLesson->isDoneReserve())
                    <input type="submit" value="予約する" class="btn btn-primary btn-lg btn-block">
                    @else
                    <input type="submit" value="予約済み" class="btn btn-success btn-lg btn-block" disabled="disabled">
                    @endif
                </form>
            </div>
            @if ($futureFirstLesson->isDoneReserve())
            <div class="col">
                <form action="/reserve/delete" method="post">
                    {{ csrf_field() }}
                    <input type="hidden" name="lesson_id" value="{{$futureFirstLesson->id}}">
                    <input type="submit" value="キャンセル" class="btn btn-danger btn-lg btn-block">
                </form>
            </div>
            @endif
        </div>
    </div>
</div>
</div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<script type="text/javascript">
    $(window).bind("scroll", function () {
        scrollHeight = $(document).height();
        scrollPosition = $(window).height() + $(window).scrollTop();
        if ((scrollHeight - scrollPosition) / scrollHeight <= 0.05) {
            $('#reserve-area').removeClass("fixed-bottom");
            $('#reserve-area').addClass("col");
        } else {
            $('#reserve-area').removeClass("col");
            $('#reserve-area').addClass("fixed-bottom");
        }
    });

</script>

@endsection
