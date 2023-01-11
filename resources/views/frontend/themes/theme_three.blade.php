{{--
    THIS IS PROPERTIES LIST PAGE FOR FRONTSIDE/USERSIDE
    ----------------------------------------------------------------------------------------------
    theme_one.blade.php
    It Displayed All Product Frontside/userside Home Page.
    ----------------------------------------------------------------------------------------------
--}}

@extends('frontend.common.layout')

@section('content')
    <!-- slider-sectiom  -->
    <section class="home-slide2 wow animate__fadeInUp" data-wow-duration="1s">
        {{-- <div class="swiper">
            <div class="swiper-wrapper">
                @foreach ($property['sliders'] as $slider)
                    <div class="swiper-slide">
                        <strong class="title text-uppercase">{{ $slider->title }}</strong>
                        <strong class="sub-title text-capitalize">{{ $slider->description }}</strong>
                        <img class="img-fluid" style="background-image: url('{{asset('public/slider_image/'.$slider->image)}}')" />
                    </div>                    
                @endforeach
            </div>
            <div class="swiper-button-next"><i class="fas fa-arrow-right"></i></div>
            <div class="swiper-button-prev"><i class="fas fa-arrow-left"></i></div>
        </div> --}}
        <div class="gallery">                
            <div class="swiper-container gallery-slider">
                <div class="swiper-wrapper">
                    @foreach ($property['sliders'] as $slider)
                        <div class="swiper-slide"><img src="{{asset('public/slider_image/'.$slider->image)}}" alt=""></div>
                    @endforeach
                </div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
            </div>

            <div class="swiper-container gallery-thumbs">
                <div class="swiper-wrapper">
                    @foreach ($property['sliders'] as $slider)
                        <div class="swiper-slide"><img src="{{asset('public/slider_image/'.$slider->image)}}" alt=""></div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

<section class="property_sec theme3_listing">
    <div class="container">
        <div class="section_title">
            <h2>{{__('Properties')}}</h2>
        </div>
        <div class="theme3_listing_inr">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" data-value="0" id="home-tab" data-bs-toggle="tab" data-bs-target="#home"
                        type="button" role="tab" aria-controls="home" aria-selected="true">{{__('All Property')}}</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="sale-tab" data-value="2" data-bs-toggle="tab" data-bs-target="#sale" type="button"
                        role="tab" aria-controls="sale" aria-selected="false">{{__('For Sale')}}</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="rent-tab" data-value="1" data-bs-toggle="tab" data-bs-target="#rent" type="button"
                    role="tab" aria-controls="rent" aria-selected="false">{{__('For Rent')}}</button>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <div class="row">
                        @forelse ($property['resentPropertys'] as $recent)
                            <div class="col-lg-4 col-md-6">
                                <a href="{{ route("propertyDetails",$recent->slug) }}" class="img-inr property_list_card">
                                    <figure class="m-0">
                                        <img src="{{ (file_exists(public_path('multiImage/'.$recent->image)) && !empty($recent->image)) ? asset('public/multiImage/'.$recent->image) : asset('public/multiImage/pronotfound.jpg') }}" width="100%" class="img-fluid" alt="">
                                    </figure>
                                    <div class="property_list-info">
                                        <div class="property_list_inr">
                                            <span class="prize">$ {{ $recent->price }}</span>
                                            <h2>{{$recent->name}}</h2>
                                            <p>{{ substr($recent->address,0,20) }}</p>
                                        </div>
                                    </div>
                                    <div class="property_more_info">
                                        <div class="inner">
                                            <div class="col">
                                                <span><i class="fa-solid fa-bed"></i></span>
                                                <h4>3 {{$recent->bedroom}}</h4>
                                            </div>
                                            <div class="col">
                                                <span><i class="fa-solid fa-bath"></i></span>
                                                <h4>3 {{$recent->bath}}</h4>
                                            </div>
                                            <div class="col">
                                                <span><i class="fa-solid fa-car"></i></span>
                                                <h4>3 {{$recent->garage}}</h4>
                                            </div>
                                            <div class="col">
                                                <span><i class="fa-solid fa-object-ungroup"></i></span>
                                                <h4>{{$recent->bulding_area}} Sq.ft</h4>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @empty

                        @endforelse
                    </div>
                </div>
                <div class="tab-pane fade" id="sale" role="tabpanel" aria-labelledby="sale-tab">
                    <div class="row">
                    @forelse ($property['themeTwoSale'] as $sale)
                        <div class="col-lg-4 col-md-6">
                            <a href="{{ route("propertyDetails",$sale->slug) }}" class="img-inr property_list_card">
                                <figure class="m-0">
                                    <img src="{{ (file_exists(public_path('multiImage/'.$sale->image)) && !empty($sale->image)) ? asset('public/multiImage/'.$sale->image) : asset('public/multiImage/pronotfound.jpg') }}" width="100%" class="img-fluid" alt="">
                                </figure>
                                <div class="property_list-info">
                                    <div class="property_list_inr">
                                        <span class="prize">$ {{ $sale->price }}</span>
                                        <h2>{{$sale->name}}</h2>
                                        <p>{{ substr($sale->address,0,20) }}</p>
                                    </div>
                                </div>
                                <div class="property_more_info">
                                    <div class="inner">
                                        <div class="col">
                                            <span><i class="fa-solid fa-bed"></i></span>
                                            <h4>3 {{$sale->bedroom}}</h4>
                                        </div>
                                        <div class="col">
                                            <span><i class="fa-solid fa-bath"></i></span>
                                            <h4>3 {{$sale->bath}}</h4>
                                        </div>
                                        <div class="col">
                                            <span><i class="fa-solid fa-car"></i></span>
                                            <h4>3 {{$sale->garage}}</h4>
                                        </div>
                                        <div class="col">
                                            <span><i class="fa-solid fa-object-ungroup"></i></span>
                                            <h4>{{$sale->bulding_area}} Sq.ft</h4>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @empty

                    @endforelse
                    </div>
                </div>
                <div class="tab-pane fade" id="rent" role="tabpanel" aria-labelledby="rent-tab">
                    <div class="row">
                    @forelse ($property['themeTwoRent'] as $rent)
                        <div class="col-lg-4 col-md-6">
                            <a href="{{ asset("single-property-details",$rent->slug) }}" class="img-inr property_list_card">
                                <figure class="m-0">
                                    <img src="{{ (file_exists(public_path('multiImage/'.$rent->image)) && !empty($rent->image)) ? asset('public/multiImage/'.$rent->image) : asset('public/multiImage/pronotfound.jpg') }}" width="100%" class="img-fluid" alt="">
                                </figure>
                                <div class="property_list-info">
                                    <div class="property_list_inr">
                                        <span class="prize">$ {{ $rent->price }}</span>
                                        <h2>{{$rent->name}}</h2>
                                        <p>{{ substr($rent->address,0,20) }}</p>
                                    </div>

                                </div>
                                <div class="property_more_info">
                                    <div class="inner">
                                        <div class="col">
                                            <span><i class="fa-solid fa-bed"></i></span>
                                            <h4>3 {{$rent->bedroom}}</h4>
                                        </div>
                                        <div class="col">
                                            <span><i class="fa-solid fa-bath"></i></span>
                                            <h4>3 {{$rent->bath}}</h4>
                                        </div>
                                        <div class="col">
                                            <span><i class="fa-solid fa-car"></i></span>
                                            <h4>3 {{$rent->garage}}</h4>
                                        </div>
                                        <div class="col">
                                            <span><i class="fa-solid fa-object-ungroup"></i></span>
                                            <h4>{{$rent->bulding_area}} Sq.ft</h4>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @empty

                    @endforelse
                    </div>
                </div>
            </div>
        </div>
        <div class="view-bt text-center">
            <a href="{{ route('property-lists') }}" class="btn view-bt-inr">View More</a>
        </div>
    </div>
</section>

@php
    $property_agents = isset($property['agents']) ? $property['agents'] : [];
    $blogs = isset($property['blogs']) ? $property['blogs'] : [];

    // Import Carbon
    use Carbon\Carbon;
@endphp

<section class="our_agent property_sec_bg">
    <div class="container-fluid">
        <div class="section_title text-center">
            <h2>{{__('Our Agent')}}</h2>
        </div>
        <div class="our_agent_main">
            <div class="row">
                @if (count($property_agents) > 0)
                    @foreach ($property_agents as $agent)
                        <div class="col-lg-2">
                            <a class="our_agent_item" href="{{ route('agentdetail',Crypt::encrypt($agent->id)) }}" >
                                <div class="our_agent_img">
                                    <img src="{{ (file_exists(public_path('userimage/'.$agent->image)) && !empty($agent->image)) ? asset('public/userimage/'.$agent->image) : asset('public/multiImage/pronotfound.jpg') }}" class="w-100" />
                                </div>
                                <div class="our_agent_title">
                                    <h2>{{ $agent->name }}</h2>
                                </div>
                            </a>
                        </div>
                        @if ($loop->iteration == 6)
                            @break
                        @endif
                    @endforeach
                @endif
            </div>
        </div>
        <div class="view-bt text-center">
            <a href="{{ route('allagent') }}" class="btn view-bt-inr">View More</a>
        </div>
    </div>
</section>

    @if (count($blogs) > 0)
        <section class="property_sec blog_sec">
            <div class="container">
                <div class="section_title">
                    <span>Blog</span>
                    <h2>Our Property Blog</h2>
                </div>
                <div class="row">
                    @foreach ($blogs as $blog)
                        <div class="col-md-6 col-lg-4 mb-md-3">
                            <div class="blog_post">
                                <a href="{{ route('showblog',Crypt::encrypt($blog->id)) }}">
                                    <div class="blog_post_img">
                                        <img src="{{ (file_exists(public_path('blog_image/'.$blog->image)) && !empty($blog->image)) ? asset('public/blog_image/'.$blog->image) : asset('public/blog_image/imgnotfound.png') }}" class="w-100"/>
                                    </div>
                                    <div class="blog_info">
                                        <h2>{{ $blog->title }}</h2>
                                        <div class="blog_info_inr">
                                            <div class="blog_date">  
                                                <label><i class="fa-solid fa-calendar-days"></i> <span>{{Carbon::parse($blog['created_at'])->diffForHumans()}}</span></label>
                                            </div>
                                            <div class="blog_view">
                                                <label><i class="fa-solid fa-eye"></i><span>{{ $blog->view }}</span> </label>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="view-bt text-center">
                    <a href="{{ url('allblogs') }}" class="btn view-bt-inr">View More</a>
                </div>
            </div>
        </section>
    @endif

    <section class="app_section">
        <div class="container">
            <div class="section_title">
                <span>App</span>
                <h2>Download Our App</h2>
            </div>
            <div class="row align-itmes-center">
                <div class="col-md-6">
                    <div class="application_img">
                        <img/>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="application_info">
                        <h3>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dummy text of the printing and typesetting industry.</h3>
                        <div class="app_img">
                            <a href="#"><img src="{{ asset('public/assets/images/applestore.png')}}" class="w-100" /></a>
                            <a href="#"><img src="{{ asset('public/assets/images/playstore.png')}}" class="w-100" /></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<section class="theme2_pro_map">
    <section class="theme2_pro_map">
        <div>
            <div id="map" class="w-100" style="height:700px"></div>
        </div>
    </section>
</section>

@endsection

@section('js')
    <script type="text/javascript">
        var markers = []
        var gmarkers = []
        var map;
        var markerCluster;
        function getPropertyList() {
            // document.getElementById('textInput').value = afterTwoZero;
            $.ajax({
                type: "get",
                url: "{{ route('mapproperty') }}",
                dataType: 'json',
                success: function(res) {
                    if (res) {
                        recent = res.records;
                        total = res.total;

                        // this is from controller to blade Pass Array:
                        if(markerCluster){
                            markerCluster.removeMarkers(markers);
                        }
                        var listPro = res.propertyList;

                        let proarr = [];
                        $.each(listPro, function (index, value) {
                            proarr.push(value);
                        });

                        const infoWindow = new google.maps.InfoWindow({
                            content: "",
                            disableAutoPan: true,
                        });

                        // console.log(listPro);
                        let markersajax = proarr.map((propertyData, i) => {
                            if (infoWindow) infoWindow.close();

                            // Show map marker on google map.
                            const marker = new google.maps.Marker({
                                position:{lat:Number(propertyData.latitude), lng:Number(propertyData.longitude)},
                                content: propertyData.name,
                            });

                            // open info window when marker is clicked
                            marker.addListener("click", () => {
                                var property_type = propertyData.property_type;
                                if(propertyData.property_type == 1){
                                    property_type = "For Rent";
                                }
                                else{
                                    property_type = "For Sales";
                                }

                                // Map marker click and show propery detail
                                infoWindow.setContent('<a href="{{ asset("single-property-details") }}/'+ propertyData.slug +'" class="img-inr property_list_card">\
                                                            <figure class="m-0">\
                                                                <img src="assets/images/house1.png" class="img-fluid" alt="" />\
                                                            </figure>\
                                                            <div class="property_list-info">\
                                                            <div class="property_list_inr">\
                                                                <span class="prize">$ '+ propertyData.price +'</span>\
                                                                <h2>'+ propertyData.name +'</h2>\
                                                                <p>'+ propertyData.address +'</p>\
                                                            </div>\
                                                            </div>\
                                                            <div class="property_more_info">\
                                                            <div class="inner">\
                                                                <div class="col">\
                                                                <span><i class="fa-solid fa-bed"></i></span>\
                                                                <h4>'+ propertyData.bedroom +' Bed</h4>\
                                                                </div>\
                                                                <div class="col">\
                                                                <span><i class="fa-solid fa-bath"></i></span>\
                                                                <h4>'+ propertyData.bath +' Bath</h4>\
                                                                </div>\
                                                                <div class="col">\
                                                                <span><i class="fa-solid fa-car"></i></span>\
                                                                <h4>'+ propertyData.garage +' Garage</h4>\
                                                                </div>\
                                                                <div class="col">\
                                                                <span><i class="fa-solid fa-object-ungroup"></i></span>\
                                                                <h4>'+ propertyData.building_area +' Sq.ft</h4>\
                                                                </div>\
                                                            </div>\
                                                            </div>\
                                                        </a>');
                                infoWindow.open(map, marker);

                                $('.property_detail_inr_info').removeClass("active");
                                $('#property'+propertyData.id).addClass("active");

                                // map marker click scrolling property list and showing top selected property.
                                // document.getElementById('map-property-lists').getElementsByClassName('active')[0].scrollIntoView({behavior: "smooth"})
                                infoWindow.addListener('closeclick', ()=>{
                                    $('.property_detail_inr_info').removeClass('active');
                                });
                                $('.gm-ui-hover-effect').on('click', function(){
                                    $('.property_detail_inr_info').removeClass('active');
                                });
                            });
                            markers.push(marker);
                            return marker;
                        });
                        if(markers.length > 0 && map){
                            markerCluster = new MarkerClusterer(map, markers, {
                                imagePath: 'https://cdn.rawgit.com/googlemaps/js-marker-clusterer/gh-pages/images/m'
                            });
                        }
                    }
                }
            });
        }

        // Call Current Location Function:
        function initMap() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showPosition, showError)
                    getPropertyList("load");
                } else {
                x.innerHTML = "Geolocation is not supported by this browser.";
            }
        }

        // marker Cluster position
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

        // show map errors
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

        // google map marker click event
        function myClick(id) {
            google.maps.event.trigger(markers[id], 'click');
        }

    </script>
@endsection

