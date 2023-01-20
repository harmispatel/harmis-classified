{{--
    THIS IS PROPERTIES DETAILS LIST PAGE FOR ADMIN PANEL
    ----------------------------------------------------------------------------------------------
    propertiesDetails.blade.php
    It Displayed Selected Product Detail.
    ----------------------------------------------------------------------------------------------
--}}

@extends('frontend.common.layout')
@section('title', 'Property Details')

@section('content')

<body class="aa-price-range">
  @php
      $muliImg = explode(" ,",$propertyDetails->multiImage);
  @endphp

  <nav aria-label="breadcrumb" class="pt-2">
    <div class="container">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('showProperty') }}">{{__('HOME')}}</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{__('Property Detail')}}</li>
      </ol>
    </div>
  </nav>

  <section>
    <div class="container">
      <div class="property_details_title">
        <div class="property_details_title_inr">
          <h3>{{ $propertyDetails->name }}</h3>
          <p><i class="fa-solid fa-location-dot me-2"></i> {{$propertyDetails->address}}</p>
          <label>{{($propertyDetails->property_type == 1) ? __('for Rent') : __('for Sale') }}</label>
        </div>
        <div class="property_details_title_inr text-end">
          <h3>$ {{ $propertyDetails->price }}</h3>
          <p><i class="fa-solid fa-object-ungroup me-2"></i> {{ $propertyDetails->building_area }} {{__('Sq.ft')}}</p>
        </div>
      </div>
    </div>
  </section>
  <section class="property-details-main">
    <div class="property_details_main">
        <div class="container">
          <div class="swiper-container">
            <!-- Additional required wrapper -->
            <div class="swiper-wrapper">
                <!-- Slides -->
                @foreach ($muliImg as $img)
                    <div class="swiper-slide">
                        <img src="{{ asset('public/multiImage/'.$img) }}" alt="">
                    </div>
                @endforeach
            </div>
              <!-- If we need navigation buttons -->
            {{-- <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div> --}}
        </div>
        </div>
      </div>
  </section>

  <section class="about_property">
    <div class="container">
      {{-- <div class="property_details_title">
        <div class="property_details_title_inr">
          <h3>{{ $propertyDetails->name }}</h3>
          <p><i class="fa-solid fa-location-dot me-2"></i> {{$propertyDetails->address}}</p>
          <label>{{($propertyDetails->property_type == 1) ? 'For Rent' : 'For Sale' }}</label>
        </div>
        <div class="property_details_title_inr text-end">
          <h3>$ {{ $propertyDetails->price }}</h3>
          <p><i class="fa-solid fa-object-ungroup me-2"></i> {{ $propertyDetails->building_area }} {{__('Sq ft')}}.</p>
        </div>
      </div> --}}
      <div class="row">
        <div class="col-md-8">
            <div class="property-info">
                <h3>{{__('Description')}}</h3>
                <p>{!! $propertyDetails->description !!}</p>
            </div>
            <div class="property_overview">
                <h3>{{__('Overview')}}</h3>
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                      <div class="overview_info">
                        <i class="fa-solid fa-home"></i>
                        <div class="overview_text_info">
                          <h4>{{ $propertyDetails->hasOneCategory['name'] }}</h4>
                          <span>{{__('Type')}}</span>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                      <div class="overview_info">
                        <i class="fa-solid fa-calendar-days"></i>
                        <div class="overview_text_info">
                          <h4>{{$propertyDetails->build_year}}</h4>
                          <span>{{__('Build Year')}}</span>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                      <div class="overview_info">
                        <i class="fa-solid fa-object-ungroup"></i>
                        <div class="overview_text_info">
                          <h4>{{($propertyDetails->building_area != 0) ? $propertyDetails->building_area : 0}}</h4>
                          <span>{{__('Sq.ft')}}.</span>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                      <div class="overview_info">
                        <i class="fa-solid fa-bed"></i>
                        <div class="overview_text_info">
                          <h4>{{$propertyDetails->bedroom}}</h4>
                          <span>{{__('Bedrooms')}}</span>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                      <div class="overview_info">
                        <i class="fa-solid fa-bath"></i>
                        <div class="overview_text_info">
                          <h4>{{$propertyDetails->bath}}</h4>
                          <span>{{__('Bathroom')}}</span>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                      <div class="overview_info">
                        <i class="fa-solid fa-kitchen-set"></i>
                        <div class="overview_text_info">
                          <h4>{{$propertyDetails->kitchen}}</h4>
                          <span>{{__('kitchen')}}</span>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                      <div class="overview_info">
                        <i class="fa-solid fa-car"></i>
                        <div class="overview_text_info">
                          <h4>{{$propertyDetails->garage}}</h4>
                          <span>{{__('Garage')}}</span>
                        </div>
                      </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
          <div class="agent-info">
            <div class="agent-img">
              @php
                  $userimg = isset($propertyDetails->hasOneUser['image']) ? $propertyDetails->hasOneUser['image'] : '';
              @endphp
                {{-- <img src="{{asset('public/userimage/'.$propertyDetails->hasOneUser['image'])}}" /> --}}
                <img src="{{ (file_exists(public_path('userimage/'.$userimg)) && !empty($userimg)) ? asset('public/userimage/'.$userimg) : asset('public/userimage/usernotfound.jpg') }}" />
            </div>
            <div class="agent-info-inr">
              <h3>{{ isset($propertyDetails->hasOneUser['name']) ? $propertyDetails->hasOneUser['name'] : '' }}</h3>
              <p><i class="fa-solid fa-circle-check"></i> {{__('Approved')}}</p>
            </div>
            {{-- @if (Auth::check()) --}}
            <div class="agent-contact">
                {{-- <!-- <button class="btn"><i class="fa-solid fa-message pe-2"></i> Message</button> --> --}}
                <p><i class="fa-solid fa-phone"></i> {{ isset($propertyDetails->hasOneUser['mobile']) ? $propertyDetails->hasOneUser['mobile'] : ''}}</p>
                </div>
            {{-- @endif --}}
        </div>
        <div>
            <div id="map" class="w-100" style="height:300px"></div>
        </div>
        </div>
      </div>
    </div>
  </section>

  @if (count($relatedProperties) > 0)
    <section class="agent-property">
      <div class="container">
        <div class="section_title">
          <h3>{{__('Related Property')}}</h3>        
        </div>
          <div class="row">
              @foreach ($relatedProperties as $property)
                  <div class="col-md-6">
                      <div class="property-inr-list-item">
                          <div class="property_inr-list-img">
                              <a href="javascript:void(0)" onclick="#" class="img_inr">
                                  <img src="{{ (file_exists(public_path('multiImage/'.$property->image)) && !empty($property->image)) ? asset('public/multiImage/'.$property->image) : asset('public/multiImage/pronotfound.jpg') }}" class="w-100"/>
                              </a>
                              @if($property["property_type"] == 1)
                                  <div class="type-tag">{{__("for Rent")}}</div>
                              @elseif($property["property_type"] == 2)
                                  <div class="type-tag">{{__("for Sale")}}</div>
                              @else
                                      {{ "" }}
                              @endif
                              </div>
                              <div class="property-inr-list-content">
                              <h2>{{$property->name}}</h2>
                              <p>{{ (strlen($property->address) < 80) ? substr($property->address,0,80) : substr($property->address,0,80).'...' }}</p>
                              <div class="property-inr-list-tag">
                                  {{-- {{ ($property->bedroom != 0 && !empty($property->bedroom)) ? '<span class="badge rounded-pill bg-light-green">'.$property->bedroom. ' '.__("Bedrooms").'</span>' : ""}}
                                  {{ ($property->bath != 0 && !empty($property->bath)) ? '<span class="badge rounded-pill bg-light-orange">'.$property->bath. ' ' .__("Bathrooms").'</span>' : }}
                                  {{ ($property->building_area != 0 && !empty($property->building_area)) ?  '<span class="badge rounded-pill bg-light-yellow">'.$property->building_area . ' '.__("Sq.ft").'</span>' : ""}}
                                  {{ ($property->garage != 0 && !empty($property->garage)) ?  '<span class="badge rounded-pill bg-light-blue">'.$property->garage . ' ' .__("Garage").'</span>' : ""}} --}}
                              </div>
                              <div class="property-inr-price-category-tag">
                                  <div class="price-tag">$ {{$property->price}}</div>
                              </div>
                              <a href="{{ route('propertyDetails',$property->slug)}}" class="btn btn-sm btn-success mt-2">{{ __("View Property")}}</a>
                          </div>
                      </div>
                  </div>       
              @endforeach
          </div>
      </div>
    </section>    
  @endif

</body>

@endsection


@section('js')
<script>
    $(document).ready(function() {
    // Assign some jquery elements we'll need
    var $swiper = $(".swiper-container");
    var $bottomSlide = null; // Slide whose content gets 'extracted' and placed
    // into a fixed position for animation purposes
    var $bottomSlideContent = null; // Slide content that gets passed between the
    // panning slide stack and the position 'behind'
    // the stack, needed for correct animation style

    var mySwiper = new Swiper(".swiper-container", {
        spaceBetween: 1,
        slidesPerView: 3,
        centeredSlides: true,
        roundLengths: true,
        loop: true,
        loopAdditionalSlides: 30,
        navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev"
        }
    });
    });
</script>
<script>
	var slider = new Swiper('.gallery-slider', {
		slidesPerView: 1,
		centeredSlides: true,
		loop: false,
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
		loop: false,
		slideToClickedSlide: true,
	});

	slider.controller.control = thumbs;
	thumbs.controller.control = slider;
</script>


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
@endsection
