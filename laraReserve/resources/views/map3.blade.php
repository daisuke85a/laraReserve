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
        <form action="#" onsubmit="getLatLng(document.getElementById('address').value); return(false);">
            住所 or ランドマーク：<input type='text' id='address' style='width: 400px' value=""> <input type='submit' value='検索'>
        </form>
        <div id="map"></div>
        <script>
            var map;

            function initMap() {
                map = new google.maps.Map(document.getElementById('map'), {
                    center: {
                        lat: -34.397,
                        lng: 150.644
                    },
                    zoom: 8
                });
                getLatLng("スタジオミッション");
            }

            function getLatLng(place) {
                map = new google.maps.Map(document.getElementById('map'), {
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
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDLYvIVANJSRK1eSQGQ-E0oIyBME9WdHPc&callback=initMap"
            async defer></script>
    </div>
</div>
@endsection
