@extends('frontend.common.layout')


@section('content')
    <div class="container-fluid">
      <div class="row">
          <div class="col-md-6">
              <div id="map" class="w-100" style="height:600px"></div>
          </div>
          <div class="col-md-6">
            <div class="property_list_info">
                <h2>{{__('Properties')}}</h2>
                <div class="property_list_inr">
                    <div class="row">
                        @foreach ($listOfProperty as $property)
                            <div class="col-md-4">
                                <div class="property_list_img">
                                    <a href="#" class="img_inr">
                                    <img src="{{ 'MainImage/'.$property->image }}" class="img-fluid card-img "alt="">
                                    </a>&nbsp;
                                </div>
                            </div>
                        <div class="col-md-8">
                            <div class="property_detail">
                                <div class="property_name">
                                    <h2>{{$property->name}}</h2>
                                </div>
                                <div class="property_detail_inr">
                                    <span>BedRooms:-{{$property->bedroom}}</span> <span>Floor:-{{$property->floor}}</span>
                                </div>
                                <div class="property_detail_inr">
                                    <span>Addres:-{{$property->hasOneCountry['name']}}</span>, <span>{{$property->haseOneState['name']}}</span>, <span>{{$property->address}}</span>
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

    <script type="text/javascript">
        function initMap() {
          const myLatLng = { lat: 22.2734719, lng: 70.7512559 };
          const map = new google.maps.Map(document.getElementById("map"), {
            zoom: 5,
            center: myLatLng,
          });

          new google.maps.Marker({
            position: myLatLng,
            map,
            title: "Hello Rajkot!",
          });
        }

        window.initMap = initMap;
    </script>

    <script type="text/javascript"
        src="https://maps.google.com/maps/api/js?key={{ env('AIzaSyBsf7LHMQFIeuA_7-bR7u7EXz5CUaD6I2A') }}&callback=initMap" ></script>

@endsection





