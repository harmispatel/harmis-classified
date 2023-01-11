{{--
    THIS IS CREATE PROOERTIES PAGE FOR FRONTSIDE/USERSIDE
    ----------------------------------------------------------------------------------------------
    contactus.blade.php

    Only Agent Can Proerty Create.
    It Displayed Create New Property Form.
    ----------------------------------------------------------------------------------------------
--}}


@extends('frontend.common.layout')

@section('title', 'Contactus')

@php
  $data = footerData();
@endphp
@section('content')
<nav aria-label="breadcrumb" class="pt-2">
  <div class="container">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ route('showProperty') }}">{{__('Home')}}</a></li>
      <li class="breadcrumb-item active" aria-current="page">{{__('Contact Us')}}</li>
    </ol>
  </div>
</nav>
<section class="contact_us_sec">
    <div class="container">
      <h2>Contact us</h2>
    </div>
  </section>

  <section class="contact_us_main">
    <div class="container">  
      <div class="contact_title">
        <h2><span>Contact Information</span></h2>
      </div>
      <div class="row align-items-center">
        <div class="col-md-6">
          <div class="contact_info">
            <div class="contact_info_inr">
              <ul>
                <li>
                  <div class="contact_icon">
                    <span><i class="fa-solid fa-phone"></i></span>
                    <p>Mobile : </p>
                  </div>
                  <div class="contact_detail">
                    <h3>{{ $data['mobile'] }}</h3>
                  </div>
                </li>
                <li>
                  <div class="contact_icon">
                    <span><i class="fa-solid fa-envelope"></i></span>
                    <p>Email : </p>
                  </div>
                  <div class="contact_detail">
                    <h3>{{ $data['email'] }}</h3>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="contact_detail_form">
            <form action="{{ route('contactusmail') }}" method="POST">
              @csrf
              <div class="row">
                <div class="col-md-12">
                  <div class="from-group">
                    <label for="name" class="form-label">Your Name</label>
                    <div class="position-relative">
                      <input type="text" class="form-control" name="name" placeholder="Enter Your Name" id="name">
                      <i class="fa-solid fa-user input_ic"></i>
                    </div>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="from-group">
                    <label for="number" class="form-label">Your Mobile No.</label>
                    <div class="position-relative">
                      <input type="text" class="form-control" name="mobile" placeholder="Enter Your Number" id="number">
                      <i class="fa-solid fa-phone input_ic"></i>
                    </div>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="from-group">
                    <label for="email" class="form-label">Your Email</label>
                    <div class="position-relative">
                      <input type="email" class="form-control" name="email" placeholder="Enter Your Email" id="email">
                      <input type="hidden" class="form-control" name="tomail" value="{{ $data['email'] }}" placeholder="Enter Your Email" id="email">
                      <i class="fa-solid fa-envelope input_ic"></i>
                    </div>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="from-group">
                    <label for="message" class="form-label">Your message</label>
                    <div class="position-relative">
                      <textarea class="form-control" name="message" placeholder="Enter Your Message" id="message" rows="3"></textarea>
                      <i class="fa-solid fa-message input_ic"></i>
                    </div>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="from-group">
                    <button class="btn contact_sb_bt">Submit</button>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
  
  <section class="our_location">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-md-6">
          <div class="contact-map">
            {{-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3672.0126015326273!2d72.53636841440384!3d23.02330952207922!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x395e84dc95e1d653%3A0x694b9501a8240c88!2sHarmis%20Technology!5e0!3m2!1sen!2sin!4v1671450114998!5m2!1sen!2sin"
            height="300" class="w-100 border-0" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"></iframe> --}}
            <div>
              <div id="map" class="w-100" style="height:300px"></div>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="our_location_inr">
            <ul>
              <li>
                <div class="contact_icon">
                  <span><i class="fa-solid fa-phone"></i></span>
                  <p>Address : </p>
                </div>
                <div class="contact_detail">
                  <h3>{{ isset($data['address']) ? $data['address'] : '' }}</h3>
                </div>
              </li>
              <li>
                <div class="contact_icon">
                  <span><i class="fa-sharp fa-solid fa-globe"></i></span>
                  <p>Social : </p>
                </div>
                <div class="contact_detail">
                  <ul>
                    <li>
                      <a href="{{ isset($data['twitter']) ? $data['twitter'] : '#' }}"><i class="fa-brands fa-twitter"></i></a>
                    </li>
                    <li>
                      <a href="{{ isset($data['facebook']) ? $data['facebook'] : '#' }}"><i class="fa-brands fa-facebook-f"></i></a>
                    </li>
                    <li>
                      <a href="{{ isset($data['instagram']) ? $data['instagram'] : '#' }}"><i class="fa-brands fa-instagram"></i></a>
                    </li>
                    <li>
                      <a href="{{ isset($data['linkedin']) ? $data['linkedin'] : '#' }}"><i class="fa-brands fa-linkedin-in"></i></a>
                    </li>
                  </ul>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection

@section('js')
  {{-- Google map  --}}
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
              position:{lat:Number({{ $data['latitude'] }}), lng:Number({{ $data['longitude'] }})},
              // content: "$data['name']",
          });

          // markers.push(marker);
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