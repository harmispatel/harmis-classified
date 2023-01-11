{{--
    THIS IS CREATE PROOERTIES PAGE FOR FRONTSIDE/USERSIDE
    ----------------------------------------------------------------------------------------------
    editagentproperty.blade.php

    Only Agent Can Proerty Create.
    It Displayed Create New Property Form.
    ----------------------------------------------------------------------------------------------
--}}


@extends('frontend.common.layout')

@section('title', 'Add Properties')

@section('content')
<nav aria-label="breadcrumb" class="pt-2">
    <div class="container">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('showProperty') }}">{{__('Home')}}</a></li>
        <li class="breadcrumb-item"><a href="{{ route('agentpropertylist') }}">{{__('Your Properties')}}</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{__('Edit Properties')}}</li>
      </ol>
    </div>
  </nav>
    <div class="content">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="col-md-8 offset-2 mt-5">
                            <div class="card card-primary my-4">
                                <div class="card-header">
                                    <h3 class="card-title">{{__('Edit Properties')}}</h3>
                                </div>
                                <div class="card-body">
                                    <form action="{{route('updateagentProperty', $PropertiesData->id)}}" id="quickForm" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        {{-- {{ method_field('PUT') }} --}}
                                        <div class="card-body">
                                        <div class="form-group">
                                            <label>{{__('Property Name')}}</label>
                                            <input type="text" name="name" value="{{$PropertiesData->name}}" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" placeholder="Enter Name">
                                            @if ($errors->has('name'))
                                                <span class="text-danger">{{ $errors->first('name') }}</span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputImage">Main Image</label>
                                            <input type="file" name="image" accept="image/*" class="form-control {{ $errors->has('image') ? 'is-invalid' : '' }}" placeholder="Enter Name">
                                            <img src="{{ asset('public/multiImage/'.$PropertiesData->image) }}" style="height: 100px; width: 60px; margin-top: 20px;">
                                            @if ($errors->has('image'))
                                                <span class="text-danger">{{ $errors->first('image') }}</span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputMultiImage">Sub Image</label>
                                            <input type="file" name="multiImage[]" accept="image/*" class="form-control {{ $errors->has('multiImage') ? 'is-invalid' : '' }}" placeholder="Enter Name" multiple="multiple">
                                            @php
                                                $multiImage = explode(" ,",$PropertiesData->multiImage);
                                            @endphp
                                            @foreach ($multiImage as $images)
                                                <img src="{{ asset('public/multiImage/'.$images) }}" style="height: 100px; width: 100px; margin-top: 20px;">
                                            @endforeach
                                            @if ($errors->has('multiImage'))
                                                <span class="text-danger">{{ $errors->first('multiImage') }}</span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputCategory">Category</label>
                                            <select class="form-control" name="category">
                                                @foreach ($categoryId as $category)
                                                    <option {{ ($PropertiesData->category_id == $category->id )? 'selected' : '' }} value="{{$category->id}}">{{$category->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputProperty_type">Property Type</label>
                                            <select class="form-control" name="property_type">
                                                <option {{ ($PropertiesData->property_type) == '1' ? 'selected' : '' }} value="1">For Rent</option>
                                                <option {{ ($PropertiesData->property_type) == '2' ? 'selected' : '' }} value="2">For Seles</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputProperty_type">Property Condition</label>
                                            <select class="form-control" name="property_condition">
                                                <option {{ ($PropertiesData->property_condition) == '1' ? 'selected' : '' }} value="1">Used</option>
                                                <option {{ ($PropertiesData->property_condition) == '2' ? 'selected' : '' }} value="2">New</option>
                                                <option {{ ($PropertiesData->property_condition) == '3' ? 'selected' : '' }} value="3">Furnished</option>
                                                <option {{ ($PropertiesData->property_condition) == '4' ? 'selected' : '' }} value="4">Unfurnished</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputProperty_type">Floor</label>
                                            <select class="form-control" name="floor">
                                                <option {{ ($PropertiesData->floor) == '1' ? 'selected' : '' }} value="1">Settlement</option>
                                                <option {{ ($PropertiesData->floor) == '2' ? 'selected' : '' }} value="2">Semi ground</option>
                                                <option {{ ($PropertiesData->floor) == '3' ? 'selected' : '' }} value="3">My land</option>
                                                <option {{ ($PropertiesData->floor) == '4' ? 'selected' : '' }} value="4">The First</option>
                                                <option {{ ($PropertiesData->floor) == '5' ? 'selected' : '' }} value="5">The Second</option>
                                                <option {{ ($PropertiesData->floor) == '6' ? 'selected' : '' }} value="6">The Third</option>
                                                <option {{ ($PropertiesData->floor) == '7' ? 'selected' : '' }} value="7">Fourth +</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputBedroom">Number Of Bedrooms</label>
                                            <input type="text" name="bedroom" value="{{$PropertiesData->bedroom}}" class="form-control {{ $errors->has('bedroom') ? 'is-invalid' : '' }}" placeholder="Enter Price">
                                            @if ($errors->has('bedroom'))
                                                <span class="text-danger">{{ $errors->first('bedroom') }}</span>
                                            @endif
                                        </div>


                                        <div class="form-group">
                                            <label for="exampleInputKitchen">Kitchen</label>
                                            <input type="text" name="kitchen" value="{{$PropertiesData->kitchen}}" class="form-control {{ $errors->has('kitchen') ? 'is-invalid' : '' }}" placeholder="Enter Price">
                                            @if ($errors->has('kitchen'))
                                            <span class="text-danger">{{ $errors->first('kitchen') }}</span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputBath">Bath</label>
                                            <input type="text" name="bath" value="{{$PropertiesData->bath}}" class="form-control {{ $errors->has('bath') ? 'is-invalid' : '' }}" placeholder="Enter Price">
                                            @if ($errors->has('bath'))
                                            <span class="text-danger">{{ $errors->first('bath') }}</span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputGarage">Garage</label>
                                            <input type="text" name="garage" value="{{$PropertiesData->garage}}" class="form-control {{ $errors->has('garage') ? 'is-invalid' : '' }}" placeholder="Enter Price">
                                            @if ($errors->has('garage'))
                                                <span class="text-danger">{{ $errors->first('garage') }}</span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputMultiImage">Build Year</label>
                                            <select name="build_year" class="form-control" id="ddlYears">
                                                    <option value="{{$PropertiesData->build_year}}">{{$PropertiesData->build_year}}</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPrice">Price</label>
                                            <input type="text" name="price" value="{{$PropertiesData->price}}" class="form-control {{ $errors->has('price') ? 'is-invalid' : '' }}" placeholder="Enter Price">
                                            @if ($errors->has('price'))
                                                <span class="text-danger">{{ $errors->first('price') }}</span>
                                            @endif
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputPrice" class="mb-2">Building Area (In SQFT.)</label>
                                            <input type="number" name="building_area" value="{{$PropertiesData->building_area}}" class="form-control mb-2 {{ $errors->has('building_area') ? 'is-invalid' : '' }}" placeholder="Enter Building Area">
                                            @if ($errors->has('building_area'))
                                                <span class="text-danger">{{ $errors->first('building_area') }}</span>
                                            @endif
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputPrice">Description</label>
                                            <textarea class="form-control" name="description" id="description">{{$PropertiesData->description}}</textarea>
                                        </div>

                                        @php
                                            $countryId = $PropertiesData->country_id;
                                            $countryName = getCountryName($countryId);
                                        @endphp
                                        <div class="form-group">
                                            <label for="exampleInputCountry">Country</label>
                                            <select id="country" class="form-control {{ $errors->has('country') ? 'is-invalid' : '' }}" name="country">
                                                <option value="{{$countryName->id}}" style="display: none" selected>{{$countryName->name}}</option>
                                                @foreach ($country as $countrys)
                                                    <option  value="{{$countrys->id}}">{{$countrys->name}}</option>
                                                @endforeach

                                            </select>
                                            @if ($errors->has('country_id'))
                                                <span class="text-danger">{{ $errors->first('country') }}</span>
                                            @endif
                                        </div>
                                        @php
                                            $stateId = $PropertiesData->state_id;
                                            $stateName = getStateName($stateId, $countryId);
                                            $countryOnState = getCountryOnState($countryId);
                                        @endphp
                                        <div class="form-group">
                                            <label for="exampleInputState">State</label>
                                            <select  class="form-control" name="state" id="state_id">
                                                <option value="{{$stateName->id}}" style="display: none" selected>{{$stateName->name}}</option>
                                                @foreach ($countryOnState as $state)
                                                    <option value="{{$state->id}}">{{$state->name}}</option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('state_id'))
                                                <span class="text-danger">{{ $errors->first('state') }}</span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputAddress">Address</label>
                                            <input type="text" id="autocomplete" name="address" value="{{$PropertiesData->address}}" class="form-control">
                                            @if ($errors->has('address'))
                                                <span class="text-danger">{{ $errors->first('address') }}</span>
                                            @endif
                                        </div>

                                            <input type="hidden" id="latitude" name="latitude" value="{{$PropertiesData->latitude}}" class="form-control">
                                            <input type="hidden" name="longitude" value="{{$PropertiesData->longitude}}" id="longitude" class="form-control">

                                        <div class="form-group">
                                            <label for="exampleInputStatus">Status</label>
                                            <select class="form-control" name="status">
                                                <option {{ ($PropertiesData->status) == '1' ? 'selected' : '' }} value="1">Active</option>
                                                <option {{ ($PropertiesData->status) == '0' ? 'selected' : '' }} value="0">InActive</option>
                                            </select>
                                        </div>
                                        </div>
                                        <div class="card-footer">
                                            <a href="{{ route('agentpropertylist') }}" class="btn btn-secondary">Back</a>
                                            <button type="submit" name="submit" class="btn btn-primary">Save</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>


@endsection

@section('js')
    {{-- Summernote Text Editor js And css --}}
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>

    <script script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://maps.google.com/maps/api/js?key={{ env('GOOGLE_MAP_KEY') }}&libraries=places" ></script>

    <script>
        $(document).ready(function() {
            $('#description').summernote({
                height: 300,
                placeholder: 'Property Description...',
            });

            $('#country').change(function (){
                var countryId  = $(this).val();
                $.ajax({
                    url : "{{ url('getState') }}",
                    data : {
                        "_token": "{{ csrf_token() }}",
                        'countryId' : countryId
                    },
                    type : 'post',
                    dataType : 'json',
                    success : function(result){
                        $("#state_id").html('');
                        $("#state_id").append(result.html);
                    }
                });
            });
        });

        window.onload = function () {
            //Reference the DropDownList.
            var ddlYears = document.getElementById("ddlYears");

            //Determine the Current Year.
            var currentYear = (new Date()).getFullYear();

            //Loop and add the Year values to DropDownList.
            for (var i = 1900; i <= currentYear; i++) {
                var option = document.createElement("OPTION");
                option.innerHTML = i;
                option.value = i;
                ddlYears.appendChild(option);
            }
        };

        $(document).ready(function () {
            $("#latitudeArea").addClass("d-none");
            $("#longtitudeArea").addClass("d-none");
        });

        google.maps.event.addDomListener(window, 'load', initialize);

        function initialize() {
            var input = document.getElementById('autocomplete');
            var autocomplete = new google.maps.places.Autocomplete(input);

            autocomplete.addListener('place_changed', function () {
                var place = autocomplete.getPlace();
                console.log(place);
                $('#latitude').val(place.geometry['location'].lat());
                $('#longitude').val(place.geometry['location'].lng());

                $("#latitudeArea").removeClass("d-none");
                $("#longtitudeArea").removeClass("d-none");
            });
        }
    </script>
@endsection
