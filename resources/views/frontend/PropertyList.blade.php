@extends('frontend.common.layout')


@section('content')
    <div>

    </div>
    <div class="container-fluid">
        <div class="property_list_main">
            <div class="row">
                <div class="col-md-6">
                    <div id="map" class="w-100" style="height:600px"></div>
                </div>
                <div class="col-md-6">
                    <div class="property_list_info">
                        <h2>{{ __('Properties') }}</h2>
                        <div class="">

                            <div class="property_list_inr_box">
                                @foreach ($listOfProperty as $key => $property)
                                <div id="property{{$property->id}}" class="property_detail_inr_info" onclick="myClick({{ $key }});">
                                    <div class="property_list_inr_box_img">
                                        <div class="property_list_img">
                                            <a href="javascript:void(0)" class="img_inr">
                                                    <img src="{{ 'MainImage/' . $property->image }}" alt="">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="property_list_inr_box_info">
                                            <div class="property_detail" >
                                                <div class="sl-item highlighted">
                                                    <div class="property_name">
                                                        <h2>{{ $property->name }}</h2>
                                                    </div>
                                                    <div class="property_detail_inr">
                                                        <span>{{ __('BedRooms') }}:-{{ $property->bedroom }}</span>
                                                    </div>
                                                    <div class="property_detail_inr">
                                                        <span>{{ __('Floor') }}:-{{ $property->floor }}</span>
                                                    </div>
                                                    <div class="property_detail_inr">
                                                        <span>{{ __('Addres') }}:-</span><span
                                                            onclick="myClick({{ $key }});">{{ $property->address }}
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://unpkg.com/wrld.js@1.x.x"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.0.1/leaflet.css" rel="stylesheet" />
    <script type="text/javascript">

        function initMap() {
            // Call Current Location Function:
            getLocation();
        }
        window.initMap = initMap;
        var markers = []
        var map
        function mapLocation(lat, lng) {
            const myLatLng = {
                lat: lat,
                lng: lng
            };
            const map = new google.maps.Map(document.getElementById("map"), {
                zoom: 1,
                center: myLatLng,
            });

            new google.maps.Marker({
                position: myLatLng,
                map,
            });
        }

        // Get Current Location on Map:
        function getLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showPosition, showError);
            } else {
                x.innerHTML = "Geolocation is not supported by this browser.";
            }
        }

        function showPosition(position) {

            // Get latitude ande longitude:
            lat = position.coords.latitude;
            lon = position.coords.longitude;
            latlon = new google.maps.LatLng(lat, lon)
            mapholder = document.getElementById('map')

            var myOptions = {
                center: latlon,
                zoom: 5,
            };

            map = new google.maps.Map(document.getElementById('map'), {
            zoom: 5,
            center: new google.maps.LatLng(lat, lon),
            // mapTypeId: 'roadmap',
            styles: [{
                    elementType: 'geometry',
                    stylers: [{
                        color: '#242f3e'
                    }]
                }, {
                    elementType: 'labels.text.stroke',
                    stylers: [{
                        color: '#242f3e'
                    }]
                }, {
                    elementType: 'labels.text.fill',
                    stylers: [{
                        color: '#746855'
                    }]
                }, {
                    featureType: 'administrative.locality',
                    elementType: 'labels.text.fill',
                    stylers: [{
                        color: '#d59563'
                    }]
                }, {
                    featureType: 'poi',
                    elementType: 'labels.text.fill',
                    stylers: [{
                        color: '#d59563'
                    }]
                }, {
                    featureType: 'poi.park',
                    elementType: 'geometry',
                    stylers: [{
                        color: '#263c3f'
                    }]
                }, {
                    featureType: 'poi.park',
                    elementType: 'labels.text.fill',
                    stylers: [{
                        color: '#6b9a76'
                    }]
                }, {
                    featureType: 'road',
                    elementType: 'geometry',
                    stylers: [{
                        color: '#38414e'
                    }]
                }, {
                    featureType: 'road',
                    elementType: 'geometry.stroke',
                    stylers: [{
                        color: '#212a37'
                    }]
                }, {
                    featureType: 'road',
                    elementType: 'labels.text.fill',
                    stylers: [{
                        color: '#9ca5b3'
                    }]
                }, {
                    featureType: 'road.highway',
                    elementType: 'geometry',
                    stylers: [{
                        color: '#746855'
                    }]
                }, {
                    featureType: 'road.highway',
                    elementType: 'geometry.stroke',
                    stylers: [{
                        color: '#1f2835'
                    }]
                }, {
                    featureType: 'road.highway',
                    elementType: 'labels.text.fill',
                    stylers: [{
                        color: '#f3d19c'
                    }]
                }, {
                    featureType: 'transit',
                    elementType: 'geometry',
                    stylers: [{
                        color: '#2f3948'
                    }]
                }, {
                    featureType: 'transit.station',
                    elementType: 'labels.text.fill',
                    stylers: [{
                        color: '#d59563'
                    }]
                }, {
                    featureType: 'water',
                    elementType: 'geometry',
                    stylers: [{
                        color: '#17263c'
                    }]
                }, {
                    featureType: 'water',
                    elementType: 'labels.text.fill',
                    stylers: [{
                        color: '#515c6d'
                    }]
                }, {
                    featureType: 'water',
                    elementType: 'labels.text.stroke',
                    stylers: [{
                        color: '#17263c'
                    }]
                }]
            });

            var iconBase = 'https://maps.google.com/mapfiles/kml/shapes/';
            var icons = {
                parking: {
                    icon: iconBase + 'parking_lot_maps.png'
                },
                library: {
                    icon: iconBase + 'library_maps.png'
                },
                info: {
                    icon: iconBase + 'info-i_maps.png'
                }
            };

            var property = {!! $listOfProperty !!}
            var infowindow = new google.maps.InfoWindow({
                content: ""
            });
            // Create markers.
            property.forEach(function (feature) {
                var marker = new google.maps.Marker({
                    position: new google.maps.LatLng(feature.latitude, feature.longitude),
                    content: feature.name,
                    map: map
                });

                // Property id store in marker:
                var markerId = feature.id;
                var content = "<a href='" + feature.content + "'>A link to google</a>";
                marker.addListener('click', function () {

                    // Active In List Click on Marker

                    $('.property_detail_inr_info').removeClass("active");
                    $('#property'+feature.id).addClass("active");

                    infowindow.setContent('<div><h4><b> '+ feature.name +'</b></h4></div><div><img src="/MainImage/'+ feature.image +'"></div>');
                    infowindow.open(map, marker);

                    // var selector = '.gm-ui-hover-effect';

                    $('.gm-ui-hover-effect').on('click', function(){
                        // alert("hello");
                        $('.property_detail_inr_info').removeClass('active');
                        // $(this).addClass('active');
                    });
                    // $('.gm-ui-hover-effect').removeClass("active");
                    // $('#property'+feature.id).addClass("active");
                });
                markers.push(marker);
            });
        }

        function showError(error) {

            switch (error.code) {
                case error.PERMISSION_DENIED:
                    // x.innerHTML = "User denied the request for Geolocation."
                    console.log("User denied the request for Geolocation.");
                    break;
                case error.POSITION_UNAVAILABLE:
                    x.innerHTML = "Location information is unavailable."
                    break;
                case error.TIMEOUT:
                    x.innerHTML = "The request to get user location timed out."
                    break;
                case error.UNKNOWN_ERROR:
                    x.innerHTML = "An unknown error occurred."
                    break;
            }
        }
        function myClick(id) {
            google.maps.event.trigger(markers[id], 'click');
        }


        $(document).ready(function(){
            $('.property_detail_inr_info').click(function(){
                $('.property_detail_inr_info').removeClass("active");
                $(this).addClass("active");
            });
        });
    </script>

    {{-- <script type="text/javascript"
        src="https://maps.google.com/maps/api/js?key=AIzaSyBsf7LHMQFIeuA_7-bR7u7EXz5CUaD6I2A" ></script> --}}
    {{-- src="https://maps.google.com/maps/api/js?key={{ env('AIzaSyBsf7LHMQFIeuA_7-bR7u7EXz5CUaD6I2A') }}&callback=initMap" ></script> --}}
<script>

    </script>
    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBsf7LHMQFIeuA_7-bR7u7EXz5CUaD6I2A&callback=initMap"></script>
@endsection
