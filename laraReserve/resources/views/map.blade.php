<!DOCTYPE html>
<html>

<head>
    <title>Simple Map</title>
    <meta name="viewport" content="initial-scale=1.0">
    <meta charset="utf-8">
    <style>
        /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
        #map {
            height: 100%;
        }

        /* Optional: Makes the sample page fill the window. */
        html,
        body {
            height: 100%;
            margin: 0;
            padding: 0;
        }

    </style>
</head>

<body>
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

            getLatLng("{{$course->address}}");
        }

        function getLatLng(place) {
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
    <script src="https://maps.googleapis.com/maps/api/js?key={{env('GOOGLE_API_KEY', 'secret')}}&callback=initMap" async
        defer></script>

</body>

</html>
