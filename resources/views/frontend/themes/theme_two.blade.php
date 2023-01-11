{{--
    THIS IS PROPERTIES LIST PAGE FOR FRONTSIDE/USERSIDE
    ----------------------------------------------------------------------------------------------
    theme_one.blade.php
    It Displayed All Product Frontside/userside Home Page.
    ----------------------------------------------------------------------------------------------
--}}

@extends('frontend.common.layout')
<style>
    .gm-style-iw{
        width: 400px !important;
    }
</style>

@section('content')
    <!-- slider-sectiom  -->

    <!-- slider-sectiom  -->
    <section class="home-slide wow animate__fadeInUp" data-wow-duration="1s">
        <div class="swiper">
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
        </div>
    </section>


    <!-- new added Real Estate  Start -->
    <section class="property_sec theme2_pro_listing">
        <div class="container">
            <div class="section_title text-center">
                <!-- <span>Featured</span> -->
                <h2>Recently Added Property</h2>
            </div>
            <div class="row">
                <!-- post item : minimal -->
                @forelse ($property['resentPropertys'] as $resent)
                    <div class="col-lg-4 col-md-6">
                        <a href="{{ route("propertyDetails",$resent->slug) }}" class="property_list">
                            <div class="property_image">
                                <div class="property_image_container">
                                    {{-- <img src="{{ asset('public/multiImage/'.$resent->image)}}" class="img-fluid w-100" alt=""> --}}
                                    <img src="{{ (file_exists(public_path('multiImage/'.$resent->image)) && !empty($resent->image)) ? asset('public/multiImage/'.$resent->image) : asset('public/multiImage/pronotfound.jpg') }}" class="img-fluid w-100" alt="">
                                </div>
                                <div class="property_tags">
                                    <div class="property_tag property_bg_green me-2">{{ $resent['hasOneCategory']->name }}</div>
                                    <div class="property_tag property_bg_purple">$ {{ $resent->price }}</div>
                                </div>
                            </div>
                            <div class="property_list_content">
                                <div class="property_list_content_title">
                                    <div class="property_list_info">
                                        <h2>{{ $resent->name }}</h2>
                                        <p>{{ $resent->address }}</p>
                                    </div>
                                </div>
                                <div class="property_info">
                                    <ul class="">
                                        <li class="">
                                            <i class="fa-solid fa-object-ungroup"></i>
                                            <span>{{ $resent->building_area }} sq ft</span>
                                        </li>
                                        <li class="">
                                            <i class="fa-solid fa-bath"></i>
                                            <span>{{ $resent->bath }}</span>
                                        </li>
                                        <li class="">
                                            <i class="fa-solid fa-bed"></i>
                                            <span>{{ $resent->bedroom }}</span>
                                        </li>
                                        <li class="">
                                            <i class="fa-solid fa-car"></i>
                                            <span>{{ $resent->garage }}</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </a>
                    </div>
                @empty

                @endforelse
            </div>
            <div class="view-bt text-center">
                <a href="{{ route('property-lists') }}" class="btn view-bt-inr">View More</a>
            </div>
        </div>
    </section>
    <!-- new added Real Estate End -->

    <!-- property for Sale  Start -->
    <section class="property_sec theme2_pro_listing property_sec_bg">
        <div class="container">
            <div class="section_title text-center">
                <!-- <span>Sale</span> -->
                <h2>Properties for Sale</h2>
            </div>
            <div class="row">
                <!-- post item : minimal -->
                @forelse ($property['themeTwoSale'] as $sale)
                    <div class="col-lg-4 col-md-6">
                        <a href="{{ route("propertyDetails",$sale->slug) }}" class="property_list">
                            <div class="property_image">
                                <div class="property_image_container">
                                    <img src="{{ (file_exists(public_path('multiImage/'.$sale->image)) && !empty($sale->image)) ? asset('public/multiImage/'.$sale->image) : asset('public/multiImage/pronotfound.jpg') }}" class="img-fluid w-100" alt="">
                                </div>
                                <div class="property_tags">
                                    <div class="property_tag property_bg_green me-2">{{ $sale['hasOneCategory']->name }}</div>
                                    <div class="property_tag property_bg_purple">$ {{ $sale->price }}</div>
                                </div>
                            </div>
                            <div class="property_list_content">
                                <div class="property_list_content_title">
                                    <div class="property_list_info">
                                        <h2>{{ $sale->name }}</h2>
                                        <p>{{ $sale->address }}</p>
                                    </div>
                                </div>
                                <div class="property_info">
                                    <ul class="">
                                        <li class="">
                                            <i class="fa-solid fa-object-ungroup"></i>
                                            <span>{{ $sale->building_area }} sq ft</span>
                                        </li>
                                        <li class="">
                                            <i class="fa-solid fa-bath"></i>
                                            <span>{{ $sale->bath }}</span>
                                        </li>
                                        <li class="">
                                            <i class="fa-solid fa-bed"></i>
                                            <span>{{ $sale->bedroom }}</span>
                                        </li>
                                        <li class="">
                                            <i class="fa-solid fa-car"></i>
                                            <span>{{ $sale->garage }}</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </a>
                    </div>
                @empty

                @endforelse
            </div>
            <div class="view-bt text-center">
                <a href="{{ route('property-lists') }}" class="btn view-bt-inr">View More</a>
            </div>
        </div>
    </section>
    <!-- property for Sale End -->

    <!-- property for Rent  Start -->
    <section class="property_sec theme2_pro_listing">
        <div class="container">
            <div class="section_title text-center">
                <!-- <span>Rent</span> -->
                <h2>Properties for Rent</h2>
            </div>
            <div class="row">
                <!-- post item : minimal -->
                @forelse ($property['themeTwoRent'] as $rent)
                    <div class="col-lg-4 col-md-6">
                        <a href="{{ route("propertyDetails",$rent->slug) }}" class="property_list">
                            <div class="property_image">
                                <div class="property_image_container">
                                    <img src="{{ (file_exists(public_path('multiImage/'.$rent->image)) && !empty($rent->image)) ? asset('public/multiImage/'.$rent->image) : asset('public/multiImage/pronotfound.jpg') }}" class="img-fluid w-100" alt="">
                                </div>
                                <div class="property_tags">
                                    <div class="property_tag property_bg_green me-2">{{ $rent['hasOneCategory']->name }}</div>
                                    <div class="property_tag property_bg_purple">$ {{ $rent->price }}</div>
                                </div>
                            </div>
                            <div class="property_list_content">
                                <div class="property_list_content_title">
                                    <div class="property_list_info">
                                        <h2>{{ $rent->name }}</h2>
                                        <p>{{ $rent->address }}</p>
                                    </div>
                                </div>
                                <div class="property_info">
                                    <ul class="">
                                        <li class="">
                                            <i class="fa-solid fa-object-ungroup"></i>
                                            <span>{{ $rent->building_area }} sq ft</span>
                                        </li>
                                        <li class="">
                                            <i class="fa-solid fa-bath"></i>
                                            <span>{{ $rent->bath }}</span>
                                        </li>
                                        <li class="">
                                            <i class="fa-solid fa-bed"></i>
                                            <span>{{ $rent->bedroom }}</span>
                                        </li>
                                        <li class="">
                                            <i class="fa-solid fa-car"></i>
                                            <span>{{ $rent->garage }}</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </a>
                    </div>
                @empty

                @endforelse
            </div>
            <div class="view-bt text-center">
                <a href="{{ route('property-lists') }}"    class="btn view-bt-inr">View More</a>
            </div>
        </div>
    </section>
    @php
        $property_agents = isset($property['agents']) ? $property['agents'] : [];
        $blogs = isset($property['blogs']) ? $property['blogs'] : [];

        // Import Carbon
        use Carbon\Carbon;
    @endphp

    <section class="property_agent property_sec_bg">
        <div class="container">
            <div class="row">
                @foreach ($property_agents as $agent)
                    <div class="col-md-3">
                        <a class="property_agent_inr" href="{{ route('agentdetail',Crypt::encrypt($agent->id)) }}">
                            <div class="property_agent_img">
                                <img src="{{(file_exists(public_path('userimage/'.$agent->image)) && !empty($agent->image)) ? asset('public/userimage/'.$agent->image) : asset('public/multiImage/pronotfound.jpg')}}" class="w-100"/>
                            </div>
                            <div class="property_agent_title">
                                <h2>{{ $agent->name }}</h2>
                            </div>
                        </a>
                    </div>
                    @if ($loop->iteration == 4)
                        @break
                    @endif                
                @endforeach
            </div>
            <div class="view-bt text-center mt-5">
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
                        <div class="col-md-4">
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
    <!-- property for Rent end -->

    <section class="theme2_pro_map">
        <div>
            <div id="map" class="w-100" style="height:700px"></div>
        </div>
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
                type: "POST",
                url: "{{ route('mapproperty') }}",
                data: {
                    "_token" : "{{ csrf_token() }}",
                },
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
                                infoWindow.setContent('<a href="{{ asset("single-property-details") }}/'+ propertyData.slug +'" class="property_list">\
                                                            <div class="property_image">\
                                                                <div class="property_image_container">\
                                                                    <img src="{{asset("/multiImage")}}/'+ propertyData.image +'" class="img-fluid w-100" alt="">\
                                                                </div>\
                                                                <div class="property_tags">\
                                                                    <div class="property_tag property_bg_green me-2">'+ propertyData.has_one_category.name +'</div>\
                                                                    <div class="property_tag property_bg_purple me-2">$ '+ propertyData.price +'</div>\
                                                                    <div class="property_tag property_bg_purple">'+ property_type +'</div>\
                                                                </div>\
                                                            </div>\
                                                            <div class="property_list_content m-0">\
                                                                <div class="property_list_content_title">\
                                                                    <div class="property_list_info">\
                                                                        <h2>'+ propertyData.name +'</h2>\
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

