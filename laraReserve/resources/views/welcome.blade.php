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
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <p class="mb-0">渋谷駅徒歩5分 ¥1,000</p>
                    <h1 class="h2">{{$course->title}}</h1>
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

                    <h2 class="h3 text-center">\こんなことやります/</h2>
                    <div class="d-flex justify-content-center">
                        <div><img src="{{$course->user->getImageLink()}}" alt="image" class="text-center"></div>
                    </div>
                    <p class="text-center">{{$course->user->name}}</p>

                    <p>{!! nl2br(e($course->content)) !!}</p>
                    <h2
                        class="h3 text-center pt-3 h3 border border-primary border-right-0 border-left-0 border-bottom-0">
                        \こんな人におすすめ/</h2>
                    <p>１．ダンスに興味があるけど、始める勇気がない人<br>
                        ２．運動不足のため、楽しく汗をかきたい人<br>
                        ３．この予約システムについて語り合いたい人(私が開発,運用してます)</p>
                    <h2 class="h3 pt-3 border border-primary border-right-0 border-left-0 border-bottom-0">料金</h2>
                    <p>{{$course->fee}}円</p>
                    <h2 class="h3 pt-3 border border-primary border-right-0 border-left-0 border-bottom-0">会場</h2>
                    <p class="mb-0">渋谷駅 徒歩5分 レンタルスタジオ</p>
                    <p class="h5 mb-0">{{$course->address}} A-815号室</p>
                    <a href="http://studio-mission.com">http://studio-mission.com</a>
                    <div id="map{{$course->id}}" class="map"></div>
                    @if (count($course->addressImages) > 0)
                    @foreach ($course->addressImages as $addressImage)
                    <img src="/storage/image/{{$addressImage->name}}" alt="ClassSubImage"
                        style="width:calc(32vmin); height:calc(32vmin); object-fit:cover;">
                    @endforeach
                    @endif
                    <p>{!! nl2br(e($course->address_detail)) !!}</p>
                    <h2 class="h3 pt-3 border border-primary border-right-0 border-left-0 border-bottom-0">必要なもの</h2>
                    <p>{!! nl2br(e($course->need)) !!}</p>
                    <h2 class="h3 pt-3 border border-primary border-right-0 border-left-0 border-bottom-0">レッスンの予定</h2>
                    <div class="row">
                        @if (count($course->lessons) > 0)
                        @foreach ($course->lessons as $lesson)
                        <div class="col-6">
                            <p>{{$lesson->getStartDay()}}
                                {{$lesson->getStartTime()}}〜{{$lesson->getEndTime()}}</p>
                        </div>
                        <div class="col-2 d-flex">
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
                                <input type="submit" value="&#xf004" class="fas fa-heart heart border-0 h3">
                            </form>
                            @endif
                            <span class="heart h5">{{$course->getLikesNum()}}</span>

                            <form action="/reserve/create" method="post">
                                {{ csrf_field() }}
                                <input type="hidden" name="kind" value="1">
                                <input type="hidden" name="lesson_id" value="{{$lesson->id}}">
                                @if (!$lesson->isDoneReserve())
                                <input type="submit" value="予約する" class="btn btn-primary btn-sm btn-dell">
                                <span class="h5 text-primary">{{$lesson->getReservesNum()}}</span>
                                @else
                                <input type="submit" value="予約済み" class="btn btn-success btn-sm btn-dell"
                                    disabled="disabled">
                                <span class="h5 text-success">{{$lesson->getReservesNum()}}</span>
                                @endif
                            </form>

                        </div>
                        <div class="col-2">
                            @if ($lesson->isDoneReserve())
                            <form action="/reserve/delete" method="post">
                                {{ csrf_field() }}
                                <input type="hidden" name="lesson_id" value="{{$lesson->id}}">
                                <input type="submit" value="キャンセル" class="btn btn-danger btn-sm btn-dell">
                            </form>
                            @endif
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
        <div class="fixed-bottom">
            <div class="shadow bg-light container">
                <div class="d-flex justify-content-between">
                    @foreach ($course->lessons as $lesson)
                    <div>
                        <p class="h4 mb-0">06月23日(日)</p>
                        <p class="mb-0">15:00〜16:00 ¥1,000</p>
                    </div>
                    <div class="d-flex justify-content-between">
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
                            <input type="submit" value="&#xf004" class="fas fa-heart heart border-0 h3">
                        </form>
                        @endif
                        <span class="heart h5">{{$course->getLikesNum()}}</span>
                        <form action="/reserve/create" method="post">
                            {{ csrf_field() }}
                            <input type="hidden" name="kind" value="1">
                            <input type="hidden" name="lesson_id" value="{{$lesson->id}}">
                            @if (!$lesson->isDoneReserve())
                            <input type="submit" value="予約する" class="btn btn-primary btn-sm btn-dell">
                            <span class="h5 text-primary">{{$lesson->getReservesNum()}}</span>
                            @else
                            <input type="submit" value="予約済み" class="btn btn-success btn-sm btn-dell"
                                disabled="disabled">
                            <span class="h5 text-success">{{$lesson->getReservesNum()}}</span>
                            @endif
                        </form>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
<script>
    function getLatLng(place, argmap) {
        var map;
        console.log(place);
        console.log(argmap);
        map = new google.maps.Map(document.getElementById(argmap), {
            center: {
                lat: -34.397,
                lng: 150.644
            },
            zoom: 16
        });

        var geocoder = new google.maps.Geocoder();
        geocoder.geocode({
            address: place,
            region: 'jp'
        }, function (results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
                var bounds = new google.maps.LatLngBounds();
                for (var r in results) {
                    if (results[r].geometry) {
                        var latlng = results[r].geometry.location;
                        bounds.extend(latlng);
                        var address = results[0].formatted_address.replace(/^日本, /, '');
                        new google.maps.InfoWindow({
                            content: address + "<br>(Lat, Lng) = " + latlng.toString()
                        }).open(map, new google.maps.Marker({
                            position: latlng,
                            map: map
                        }));
                    }
                }
                map.fitBounds(bounds);
                map.setZoom(16);
            } else if (status == google.maps.GeocoderStatus.ERROR) {
                alert("サーバとの通信時に何らかのエラーが発生！");
            } else if (status == google.maps.GeocoderStatus.INVALID_REQUEST) {
                alert("リクエストに問題アリ！geocode()に渡すGeocoderRequestを確認せよ！！");
            } else if (status == google.maps.GeocoderStatus.OVER_QUERY_LIMIT) {
                alert("短時間にクエリを送りすぎ！落ち着いて！！");
            } else if (status == google.maps.GeocoderStatus.REQUEST_DENIED) {
                alert("このページではジオコーダの利用が許可されていない！・・・なぜ！？");
            } else if (status == google.maps.GeocoderStatus.UNKNOWN_ERROR) {
                alert("サーバ側でなんらかのトラブルが発生した模様。再挑戦されたし。");
            } else if (status == google.maps.GeocoderStatus.ZERO_RESULTS) {
                alert("見つかりません");
            } else {
                alert("えぇ～っと・・、バージョンアップ？");
            }
        });
    }

</script>
<script
    src="https://maps.googleapis.com/maps/api/js?key={{env('GOOGLE_API_KEY', 'AIzaSyBcorsRq7wWpYTCJhs75pU5paQ32xzuMAU')}}&callback=initMap"
    async defer></script>

<script>
    //読み込み
    window.onload = function () {
        // 実行したい処理
        @foreach ($courses as $course)
        @if ($course->address != "")
        getLatLng("{{$course->address}}", "map{{$course->id}}");
        @endif
        @endforeach
    }

</script>
@endsection
