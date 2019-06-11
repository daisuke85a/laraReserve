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
                    <div id="map{{$course->id}}" class="map"></div>
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
                                @if (!$lesson->isDoneReserve())
                                <input type="submit" value="予約する" class="btn btn-primary btn-sm btn-dell">
                                @else
                                <input type="submit" value="予約済み" class="btn btn-success btn-sm btn-dell" disabled="disabled">
                                @endif
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
<script src="https://maps.googleapis.com/maps/api/js?key={{env('GOOGLE_API_KEY', 'AIzaSyBcorsRq7wWpYTCJhs75pU5paQ32xzuMAU')}}&callback=initMap" async
    defer></script>

<script>
    //読み込み
    window.onload = function () {
        // 実行したい処理
        @foreach($courses as $course)
            @if($course->address != "")
               getLatLng("{{$course->address}}", "map{{$course->id}}");
            @endif
        @endforeach
    }

</script>
@endsection
