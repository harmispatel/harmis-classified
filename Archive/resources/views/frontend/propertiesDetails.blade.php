@extends('frontend.common.layout')

@section('content')

<section class="property-main page-title-bg">
    <div class="container">
        <div class="page-title">
            <h2>{{$propertyDetails->name}}</h2>
            <ol class="breadcrumb">
                <li><a href="#">{{__('HOME')}}</a></li>
            </ol>
        </div>
    </div>
</section>

<body class="aa-price-range">
    <section class="property-details-main">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    @php
                        $muliImg = explode(" ,",$propertyDetails->multiImage);
                    @endphp
                    <div class="gallery">
                        <div class="swiper-container gallery-slider">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide"><img src="{{ url('public/multiImage/'.$propertyDetails->image) }}" alt=""></div>
                                @foreach ($muliImg as $images)
                                    <div class="carousel-item">
                                        <img src="{{ url('public/multiImage/'.$images) }}" class="d-block w-100" height="100%" alt="...">
                                    </div>
                                    <div class="swiper-slide"><img src="{{ url('public/multiImage/'.$images) }}" alt=""></div>
                                @endforeach
                            </div>
                            <div class="swiper-button-prev"></div>
                            <div class="swiper-button-next"></div>
                        </div>
                
                        <div class="swiper-container gallery-thumbs">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide"><img src="{{ url('public/multiImage/'.$propertyDetails->image) }}" alt=""></div>
                                @foreach ($muliImg as $images)
                                    <div class="carousel-item">
                                        <img src="{{ url('public/multiImage/'.$images) }}" class="d-block w-100" height="100%" alt="...">
                                    </div>
                                    <div class="swiper-slide"><img src="{{ url('public/multiImage/'.$images) }}" alt=""></div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="property-price mt-4">
                        <div class="property-price-info">
                            <ul class="price-ul">
                                <li>
                                    <span class="category">{{$propertyDetails->hasOneCategory['name']}}</span>
                                </li>
                                <li>
                                    <span class="bed">{{$propertyDetails->bedroom}} Bed</span>
                                </li>
                                <li>
                                    <span class="bath">{{$propertyDetails->bath}} Bath</span>
                                </li>
                                <li>
                                    <span class="garage">{{$propertyDetails->garage}} Garage</span>
                                </li>
                            </ul>
                            <h2>{{$propertyDetails->name}}</h2>
                            <label><i class="fa-solid fa-location-dot"></i> {{$propertyDetails->address}}</label>
                        </div>
                        <div class="property_share_lists">
                            <ul class="share_list">
                                <li>
                                    <i class="fa-regular fa-bookmark"></i>
                                </li>
                                <li>
                                    <a href="#"><i class="fa-solid fa-share"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="property-info">
                        <h3>{{__('About Property')}}</h3>
                        <p>{!!$propertyDetails->description!!}</p>
                    </div>
                    <div class="property-advance-fea">
                        <h3>{{__('Advance Features')}}</h3>
                        <ul class="feature_ul row">
                            <li class="col-lg-4 col-md-6">
                                <i class="fa-solid fa-bed"></i>
                                <span>{{$propertyDetails->bedroom}} Bedrooms</span>
                            </li>
                            <li class="col-lg-4 col-md-6">
                                <i class="fa-solid fa-building"></i>
                                <span>{{$propertyDetails->floor}} Floor</span>
                            </li>
                            <li class="col-lg-4 col-md-6">
                                <i class="fa-solid fa-kitchen-set"></i>
                                <span>{{$propertyDetails->kitchen}} Kitchen</span>
                            </li>
                            <li class="col-lg-4 col-md-6">
                                <i class="fa-solid fa-car"></i>
                                <span>{{$propertyDetails->garage}} Car Parking</span>
                            </li>
                            <li class="col-lg-4 col-md-6">
                                <i class="fa-solid fa-calendar-days"></i>
                                <span>{{$propertyDetails->build_year}}</span>
                            </li>
                            <li class="col-lg-4 col-md-6">
                                <i class="fa-brands fa-uncharted"></i>
                                <span>730 Sqft</span>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="agent-info">
                        <div class="agent-img">
                            <img src="{{ url('public/userimage/'.$propertyDetails->hasOneUser['image']) }}"/>
                        </div>
                        <div class="agent-info-inr">
                            <h3>{{$propertyDetails->hasOneUser['name']}}</h3>
                            <p><i class="fa-solid fa-circle-check"></i> Approved</p>
                        </div>
                        <div class="agent-contact">
                            <button class="btn"><i class="fa-solid fa-message pe-2"></i> {{__('Message')}}</button>
                            <p><i class="fa-solid fa-phone"></i>+91 {{$propertyDetails->hasOneUser['mobile']}}</p>
                        </div>
                    </div>
                    <div>
                        <div id="map" class="w-100" style="height:300px"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- clusterd  Google map--}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.0.1/leaflet.css" rel="stylesheet" />
    <script src="https://unpkg.com/@googlemaps/markerclusterer/dist/index.min.js"></script>
    <script src="https://cdn.rawgit.com/googlemaps/js-marker-clusterer/gh-pages/src/markerclusterer.js"></script>

    <script type="text/javascript">     
        var markers = []
        var gmarkers = []
        var categoryInput = []
        var conditionInput = []
        var floorInput = []
        var bedroomInput = []
        var map;
        var markerCluster;

        function getPropertyList(type="") {
            // this is from controller to blade Pass Array:
            if(markerCluster){
                markerCluster.removeMarkers(markers);
            }
            // var listPro = res.propertyList;
            const infoWindow = new google.maps.InfoWindow({
                content: "",
                disableAutoPan: true,
            });
            // let markersajax = listPro.map((propertyData, i) => {
                if (infoWindow) infoWindow.close();
                const marker = new google.maps.Marker({
                    position:{lat:Number({{$propertyDetails->latitude}}), lng:Number({{$propertyDetails->longitude}})},
                    content: "{{$propertyDetails->name}}",
                });

                // open info window when marker is clicked
                marker.addListener("click", () => {
                    var property_type = {{$propertyDetails->property_type}};
                    if(property_type == 1){
                        property_type = "For Rent";
                    }
                    else{
                        property_type = "For Sales";
                    }
                    infoWindow.open(map, marker);
                });
                markers.push(marker);
            if(markers.length > 0 && map){
                markerCluster = new MarkerClusterer(map, markers, {
                    imagePath: 'https://cdn.rawgit.com/googlemaps/js-marker-clusterer/gh-pages/images/m'
                });
            }
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

                if(!map){
                    map = new google.maps.Map(document.getElementById('map'), {
                        zoom: 5,
                        center: new google.maps.LatLng(lat, lon)
                    });
                    markerCluster = new MarkerClusterer(map, markers, {
                        imagePath: 'https://cdn.rawgit.com/googlemaps/js-marker-clusterer/gh-pages/images/m'
                    });
                }
                resolve({map})
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

    </script>

    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBsf7LHMQFIeuA_7-bR7u7EXz5CUaD6I2A&callback=initMap&v=weekly"></script>
</body>

@endsection


@section('js')
<script>
	var slider = new Swiper('.gallery-slider', {
		slidesPerView: 1,
		centeredSlides: true,
		loop: true,
		loopedSlides: 6,

        autoplay: {
            delay: 5000,
        },

		navigation: {
			nextEl: '.swiper-button-next',
			prevEl: '.swiper-button-prev',
		},
	});

	var thumbs = new Swiper('.gallery-thumbs', {
		slidesPerView: 'auto',
		spaceBetween: 10,
		centeredSlides: true,
		loop: true,
		slideToClickedSlide: true,
	});

	slider.controller.control = thumbs;
	thumbs.controller.control = slider;
</script>
@endsection
