@extends('frontend.common.layout')


@section('content')
    <div>

    </div>
    {{-- @php
        echo '<pre>';
        print_r($listOfProperty->toArray());
        exit;
    @endphp --}}
    <div class="container-fluid">
        <div class="property_list_main">
            <div class="row">
                <div class="col-md-6">
                    <div id="map" class="w-100" style="height:600px"></div>
                </div>
                <div class="col-md-6">
                    <div class="property_list_info">
                        <h2>{{ __('Properties') }}</h2>
                        <div class="property_list_inr_box post-grid" id="map-property-lists">

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    {{-- <script src="https://unpkg.com/wrld.js@1.x.x"></script> --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.0.1/leaflet.css" rel="stylesheet" />

    <script src="https://unpkg.com/@googlemaps/markerclusterer/dist/index.min.js"></script>
{{-- clusterd --}}
    <script src="https://cdn.rawgit.com/googlemaps/js-marker-clusterer/gh-pages/src/markerclusterer.js"></script>
{{-- clusterd --}}

    <script type="text/javascript">
        var limit = 4;
        var start = 0;
        var page = 1;
        var total = {{ $totalRecords }};
        var recent = 0;
        var markers = []
        var gmarkers = []
        var map
        $('.filter-message').hide();
        // window.onload = getPropertyList("load");
        // Infinite Scrolling
        $(window).scroll(function() {
            if ($(window).scrollTop() + $(window).height() >= $(document).height() && total != recent) {
                page++;
                limit+=4;
                getPropertyList("scroll");
            }
        });

        function getPropertyList(type="") {

            if(type != "scroll")
            {
                page = 1;
                limit = 4;
                $('#map-property-lists').animate({scrollTop: '0px'}, 1000);
            }

            $('.ajax-load').removeClass('d-none')

            var ajaxId = 1;

            $.ajax({
                type: "POST",
                url: "/list-scroll",
                dataType: 'json',
                data: {
                    "_token": "{{ csrf_token() }}",
                    "ajaxId": ajaxId,
                    "page":page,
                    "limit": limit,
                    "start": start,
                },
                dataType: 'json',
                success: function(res) {
                    if (res) {
                        recent = res.records;
                        total = res.total;
                        $('.ajax-load').addClass('d-none')
                        $('#map-property-lists').append(res.html);
                        jQuery("#page-pagination").html(res.homePagination)
                        // this is from controller to blade Pass Array:

                        var listPro = res.propertyList;

                        const infoWindow = new google.maps.InfoWindow({
                            content: "",
                            disableAutoPan: true,
                        });
//                         const markers = locations.map((position, i) => {
//     const label = labels[i % labels.length];
//     const marker = new google.maps.Marker({
//       position,
//       label,
//     });

//     // markers can only be keyboard focusable when they have click listeners
//     // open info window when marker is clicked
//     marker.addListener("click", () => {
//       infoWindow.setContent(label);
//       infoWindow.open(map, marker);
//     });
//     return marker;
//   });
                        listPro.forEach(function (propertyData) {
                            var marker = new google.maps.Marker({
                                position: new google.maps.LatLng(propertyData.latitude, propertyData.longitude),
                                content: propertyData.name,
                                map: map,
                                zoom: 10
                            });
                            marker.addListener("click", function(e) {
                                // $(".property_detail_inr_info").scrollTop(100);
                                infoWindow = new google.maps.InfoWindow();
                                infoWindow.close();
                                infoWindow.setContent('<div><h4><b> '+ propertyData.name +'</b></h4></div><div><img src="/mainImage/'+ propertyData.image +'"></div>');
                                infoWindow.open(map, marker);
                            });

                            // Property id store in marker:
                            marker.addListener('click', function () {

                                // Active In List Click on Marker
                                $('.property_detail_inr_info').removeClass("active");
                                $('#property'+propertyData.id).addClass("active");
                                // document.getElementById('#map-property-lists .active').scrollIntoView({behavior: "smooth"})

                                document.getElementById('map-property-lists').getElementsByClassName('active')[0].scrollIntoView({behavior: "smooth"})
                                infoWindow.addListener('closeclick', ()=>{
                                    $('.property_detail_inr_info').removeClass('active');
                                });
                                $('.gm-ui-hover-effect').on('click', function(){
                                    $('.property_detail_inr_info').removeClass('active');
                                });
                            });
                            // Multi Markers in Clusterer marker push:

                            markers.push(marker);
                            // console.log(marker);

                            // return marker;
                        });
                        let cluster;
                        if(map){

                            console.log(markers);
                            cluster = new MarkerClusterer(map, markers, {
                                imagePath: 'https://cdn.rawgit.com/googlemaps/js-marker-clusterer/gh-pages/images/m'
                            });
                        }
                        console.log({cluster});
                        console.log({markersAfter:markers});
                    }
                }
            });
        }

        function initMap() {
            // Call Current Location Function:

            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showPosition, showError)
                    getPropertyList("load");
            } else {
                x.innerHTML = "Geolocation is not supported by this browser.";
            }
        }



        function showPosition(position) {
            return new Promise(function(resolve, reject) {
                // Get latitude ande longitude:
                lat = position.coords.latitude;
                lon = position.coords.longitude;
                // var proListData = @json($proDataList);
                // console.log(proListData);
                if(!map){
                    map = new google.maps.Map(document.getElementById('map'), {
                        zoom: 5,
                        center: new google.maps.LatLng(lat, lon)
                    });
                }
                var markerCluster = new MarkerClusterer(map, markers, {
                    imagePath: 'https://cdn.rawgit.com/googlemaps/js-marker-clusterer/gh-pages/images/m'
                });
                resolve({map})
                console.log(markerCluster)
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

    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBsf7LHMQFIeuA_7-bR7u7EXz5CUaD6I2A&callback=initMap&v=weekly"></script>
@endsection
