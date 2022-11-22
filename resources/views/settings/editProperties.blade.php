@extends('common.layout')

@section('title', 'Add Properties')

@section('content')

<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary my-4">
                        <div class="card-header">
                            <h3 class="card-title">Add Properties</h3>
                        </div>
                        <form action="{{route('propertie.update',$editPropertiesData->id)}}" id="quickForm" method="POST" enctype="multipart/form-data">
                            @csrf
                            {{-- @php
                                echo "<pre>";
                                print_r($editPropertiesData);exit;
                            @endphp --}}
                            {{ method_field('PUT') }}
                            <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputName">Name</label>
                                <input type="text" name="name" value="{{$editPropertiesData->name}}" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" placeholder="Enter Name">
                                @if ($errors->has('name'))
                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="exampleInputImage">Main Image</label>
                                <input type="file" name="image" class="form-control {{ $errors->has('image') ? 'is-invalid' : '' }}" placeholder="Enter Name">
                                <img src="{{ url('MainImage/'.$editPropertiesData->image) }}" style="height: 100px; width: 60px; margin-top: 20px;">
                                @if ($errors->has('image'))
                                    <span class="text-danger">{{ $errors->first('image') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="exampleInputMultiImage">Sub Image</label>
                                <input type="file" name="multiImage[]" class="form-control {{ $errors->has('multiImage') ? 'is-invalid' : '' }}" placeholder="Enter Name" multiple="multiple">
                                @php
                                    $multiImage = explode(" ,",$editPropertiesData->multiImage);
                                @endphp
                                @foreach ($multiImage as $images)
                                <img src="{{ url('/multiImage/'.$images) }}" style="height: 100px; width: 100px; margin-top: 20px;">
                                @endforeach
                                @if ($errors->has('multiImage'))
                                    <span class="text-danger">{{ $errors->first('multiImage') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="exampleInputCategory">Category</label>
                                <select class="form-control" name="category_id">
                                    @foreach ($categoryId as $category)
                                        <option {{ ($editPropertiesData->category_id == $category->id )? 'selected' : '' }} value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            @php
                                $user_id = $editPropertiesData->user_id;
                                $userName = getUserName($user_id);
                            @endphp
                            <div class="form-group">
                                <label for="exampleInputUser">User</label>
                                <select class="form-control" name="user_id">
                                    <option value="{{$userName->id}}" style="display: none" selected>{{$userName->name}}</option>
                                    @foreach ($userId as $user)
                                        <option value="{{$user->id}}">{{$user->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputProperty_type">Property Type</label>
                                <select class="form-control" name="property_type">
                                    <option {{ ($editPropertiesData->property_type) == '1' ? 'selected' : '' }} value="1">For Rent</option>
                                    <option {{ ($editPropertiesData->property_type) == '2' ? 'selected' : '' }} value="2">For Seles</option>
                                    {{-- <option value="2">For Sale</option> --}}
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputProperty_type">Property Condition</label>
                                <select class="form-control" name="property_condition">
                                    <option {{ ($editPropertiesData->property_condition) == '1' ? 'selected' : '' }} value="1">Used</option>
                                    <option {{ ($editPropertiesData->property_condition) == '2' ? 'selected' : '' }} value="2">New</option>
                                    <option {{ ($editPropertiesData->property_condition) == '3' ? 'selected' : '' }} value="3">Furnished</option>
                                    <option {{ ($editPropertiesData->property_condition) == '4' ? 'selected' : '' }} value="4">Unfurnished</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputProperty_type">Floor</label>
                                <select class="form-control" name="floor">
                                    <option {{ ($editPropertiesData->floor) == '1' ? 'selected' : '' }} value="1">Settlement</option>
                                    <option {{ ($editPropertiesData->floor) == '2' ? 'selected' : '' }} value="2">Semi ground</option>
                                    <option {{ ($editPropertiesData->floor) == '3' ? 'selected' : '' }} value="3">My land</option>
                                    <option {{ ($editPropertiesData->floor) == '4' ? 'selected' : '' }} value="4">The First</option>
                                    <option {{ ($editPropertiesData->floor) == '5' ? 'selected' : '' }} value="5">The Second</option>
                                    <option {{ ($editPropertiesData->floor) == '6' ? 'selected' : '' }} value="6">The Third</option>
                                    <option {{ ($editPropertiesData->floor) == '7' ? 'selected' : '' }} value="7">Fourth +</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputBedroom">Number Of Bedrooms</label>
                                <input type="text" name="bedroom" value="{{$editPropertiesData->bedroom}}" class="form-control {{ $errors->has('bedroom') ? 'is-invalid' : '' }}" placeholder="Enter Price">
                                @if ($errors->has('bedroom'))
                                    <span class="text-danger">{{ $errors->first('bedroom') }}</span>
                                @endif
                            </div>


                            <div class="form-group">
                                <label for="exampleInputKitchen">Kitchen</label>
                                <input type="text" name="kitchen" value="{{$editPropertiesData->kitchen}}" class="form-control {{ $errors->has('kitchen') ? 'is-invalid' : '' }}" placeholder="Enter Price">
                                @if ($errors->has('kitchen'))
                                <span class="text-danger">{{ $errors->first('kitchen') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="exampleInputBath">Bath</label>
                                <input type="text" name="bath" value="{{$editPropertiesData->bath}}" class="form-control {{ $errors->has('bath') ? 'is-invalid' : '' }}" placeholder="Enter Price">
                                @if ($errors->has('bath'))
                                <span class="text-danger">{{ $errors->first('bath') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="exampleInputGarage">Garage</label>
                                <input type="text" name="garage" value="{{$editPropertiesData->garage}}" class="form-control {{ $errors->has('garage') ? 'is-invalid' : '' }}" placeholder="Enter Price">
                                @if ($errors->has('garage'))
                                    <span class="text-danger">{{ $errors->first('garage') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="exampleInputMultiImage">Build Year</label>
                                <select name="build_year" class="form-control" id="ddlYears">
                                        <option value="{{$editPropertiesData->build_year}}">{{$editPropertiesData->build_year}}</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPrice">Price</label>
                                <input type="text" name="price" value="{{$editPropertiesData->price}}" class="form-control {{ $errors->has('price') ? 'is-invalid' : '' }}" placeholder="Enter Price">
                                @if ($errors->has('price'))
                                    <span class="text-danger">{{ $errors->first('price') }}</span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPrice" class="mb-2">Building Area (In SQFT.)</label>
                                <input type="number" name="building_area" value="{{$editPropertiesData->building_area}}" class="form-control mb-2 {{ $errors->has('building_area') ? 'is-invalid' : '' }}" placeholder="Enter Building Area">
                                @if ($errors->has('building_area'))
                                    <span class="text-danger">{{ $errors->first('building_area') }}</span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPrice">Description</label>
                                <textarea class="form-control" name="description" id="summernote_1">{{$editPropertiesData->description}}</textarea>
                            </div>

                            @php
                                $countryId = $editPropertiesData->country_id;
                                $countryName = getCountryName($countryId);
                                // prx($countryName);
                            @endphp
                            <div class="form-group">
                                <label for="exampleInputCountry">Country</label>
                                <select id="country" class="form-control {{ $errors->has('country') ? 'is-invalid' : '' }}" name="country_id">
                                    <option value="{{$countryName->id}}" style="display: none" selected>{{$countryName->name}}</option>
                                    @foreach ($country as $countrys)
                                        <option  value="{{$countrys->id}}">{{$countrys->name}}</option>
                                    @endforeach

                                </select>
                                @if ($errors->has('country_id'))
                                    <span class="text-danger">{{ $errors->first('country_id') }}</span>
                                @endif
                            </div>
                            @php
                                $stateId = $editPropertiesData->state_id;
                                $stateName = getStateName($stateId, $countryId);
                                $countryOnState = getCountryOnState($countryId);
                                // prx($stateName);
                            @endphp
                            <div class="form-group">
                                <label for="exampleInputState">State</label>
                                <select  class="form-control" name="state_id" id="state_id">
                                    <option value="{{$stateName->id}}" style="display: none" selected>{{$stateName->name}}</option>
                                    @foreach ($countryOnState as $state)
                                        <option value="{{$state->id}}">{{$state->name}}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('state_id'))
                                    <span class="text-danger">{{ $errors->first('state_id') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="exampleInputAddress">Address</label>
                                <input type="text" id="autocomplete" name="address" value="{{$editPropertiesData->address}}" class="form-control">
                                @if ($errors->has('address'))
                                    <span class="text-danger">{{ $errors->first('address') }}</span>
                                @endif
                            </div>

                                <input type="hidden" id="latitude" name="latitude" value="{{$editPropertiesData->latitude}}" class="form-control">
                                <input type="hidden" name="longitude" value="{{$editPropertiesData->longitude}}" id="longitude" class="form-control">

                            <div class="form-group">
                                <label for="exampleInputStatus">Status</label>
                                <select class="form-control" name="status">
                                    <option {{ ($editPropertiesData->status) == '1' ? 'selected' : '' }} value="1">Active</option>
                                    <option {{ ($editPropertiesData->status) == '0' ? 'selected' : '' }} value="0">InActive</option>
                                </select>
                            </div>
                            </div>
                            <div class="card-footer">
                                <a href="{{ route('propertie.index') }}" class="btn btn-secondary">Back</a>
                                <button type="submit" name="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
        <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<script>
    $(document).ready(function() {
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

    $(document).ready(function() {
        $('#summernote_1').summernote({
            height: 400,
            placeholder: 'Property Description...',
        });
    });
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script type="text/javascript"
        src="https://maps.google.com/maps/api/js?key=AIzaSyBsf7LHMQFIeuA_7-bR7u7EXz5CUaD6I2A&libraries=places" ></script>

    <script>
        $(document).ready(function () {
            $("#latitudeArea").addClass("d-none");
            $("#longtitudeArea").addClass("d-none");
        });
        </script>
    <script>
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
