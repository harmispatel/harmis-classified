{{--
    THIS IS CREATE PROOERTIES PAGE FOR ADMIN PANEL
    ----------------------------------------------------------------------------------------------
    createProperties.blade.php
    It Displayed Create New Property Form.
    ----------------------------------------------------------------------------------------------
--}}

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
                        <form action="{{route('propertie.store')}}" id="quickForm" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputName">Name</label>
                                    <input type="text" id="name" name="name" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" value="{{ old('name') }}" placeholder="Enter Name">
                                    @if ($errors->has('name'))
                                        <span class="text-danger">{{ $errors->first('name') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputImage">Main Image</label>
                                    <input type="file" name="image" value="{{ old('image') }}" class="form-control {{ $errors->has('image') ? 'is-invalid' : '' }}">
                                    @if ($errors->has('image'))
                                        <span class="text-danger">{{ $errors->first('image') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputMultiImage">Sub Image</label>
                                    <input type="file" name="multiImage[]" value="{{ old('multiImage[]') }}" class="form-control {{ $errors->has('multiImage') ? 'is-invalid' : '' }}" multiple="multiple">
                                    @if ($errors->has('multiImage'))
                                        <span class="text-danger">{{ $errors->first('multiImage') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputCategory">Category</label>
                                    <select class="form-control" name="category_id" value="{{ old('category_id') }}">
                                        {{-- <option value="1">Hello</option> --}}
                                        @foreach ($categoryId as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputUser">User</label>
                                    <select class="form-control" name="user_id" value="{{ old('user_id') }}"">
                                        <option value="{{ auth()->user()->id }}" selected>--Select user--</option>
                                        @foreach ($userId as $user)
                                            <option value="{{$user->id}}">{{$user->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputProperty_type">Property Type</label>
                                    <select class="form-control" name="property_type" value="{{ old('property_type') }}">
                                        <option value="1">For Rent</option>
                                        <option value="2">For Sale</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputProperty_type">Property Condition</label>
                                    <select class="form-control" name="property_condition" value="{{ old('property_condition') }}">
                                        <option value="1">Used</option>
                                        <option value="2">New</option>
                                        <option value="3">Furnished</option>
                                        <option value="4">Unfurnished</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputProperty_type">Floor</label>
                                    <select class="form-control" name="floor" value="{{ old('floor') }}">
                                        <option value="1">Settlement</option>
                                        <option value="2">Semi ground</option>
                                        <option value="3">My land</option>
                                        <option value="4">The First</option>
                                        <option value="5">The Second</option>
                                        <option value="6">The Third</option>
                                        <option value="7">Fourth +</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputBedroom">Number Of Bedrooms</label>
                                    <input type="number" name="bedroom" value="{{ old('bedroom') }}" class="form-control {{ $errors->has('bedroom') ? 'is-invalid' : '' }}" placeholder="Enter Number of Bedroom">
                                    @if ($errors->has('bedroom'))
                                        <span class="text-danger">{{ $errors->first('bedroom') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputBedroom">Kitchen</label>
                                    <input type="number" name="kitchen" value="{{ old('kitchen') }}" class="form-control {{ $errors->has('kitchen') ? 'is-invalid' : '' }}" placeholder="Enter Number of Kitchen">
                                    @if ($errors->has('kitchen'))
                                        <span class="text-danger">{{ $errors->first('kitchen') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputBedroom">Bath</label>
                                    <input type="number" name="bath" value="{{ old('bath') }}" class="form-control {{ $errors->has('bath') ? 'is-invalid' : '' }}" placeholder="Enter Number of Bath">
                                    @if ($errors->has('bath'))
                                        <span class="text-danger">{{ $errors->first('bath') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputBedroom">Garage</label>
                                    <input type="number" name="garage" value="{{ old('garage') }}" class="form-control {{ $errors->has('garage') ? 'is-invalid' : '' }}" placeholder="Enter Number of Garage">
                                    @if ($errors->has('garage'))
                                        <span class="text-danger">{{ $errors->first('garage') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputMultiImage">Build Year</label>
                                    <select name="build_year" class="form-control" id="ddlYears"></select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPrice">Price</label>
                                    <input type="number" name="price" value="{{ old('price') }}" class="form-control {{ $errors->has('price') ? 'is-invalid' : '' }}" placeholder="Enter Price">
                                    @if ($errors->has('price'))
                                        <span class="text-danger">{{ $errors->first('price') }}</span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPrice" class="mb-2">Building Area (In SQFT.)</label>
                                    <input type="number" name="building_area" value="{{ old('building_area') }}" class="form-control mb-2 {{ $errors->has('building_area') ? 'is-invalid' : '' }}" placeholder="Enter Building Area">
                                    @if ($errors->has('building_area'))
                                        <span class="text-danger">{{ $errors->first('building_area') }}</span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPrice">Description</label>
                                    <textarea class="form-control" name="description" id="summernote_1">{{ old('description') }}</textarea>
                                    @if ($errors->has('description'))
                                        <span class="text-danger">{{ $errors->first('description') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputCountry">Country</label>
                                    <select id="country" class="form-control {{ $errors->has('country') ? 'is-invalid' : '' }}" name="country_id">
                                        <option value="">-- Select Country --</option>
                                        @foreach ($countryId as $country)
                                            <option value="{{$country->id}}">{{$country->name}}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('country_id'))
                                        <span class="text-danger">{{ $errors->first('country_id') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputState">State</label>
                                    <select  class="form-control" name="state_id" id="state_id">
                                    </select>
                                    @if ($errors->has('state_id'))
                                        <span class="text-danger">{{ $errors->first('state_id') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputAddress">Address</label>
                                    <input type="text" id="autocomplete" value="{{ old('address') }}" name="address" class="form-control">
                                    @if ($errors->has('address'))
                                        <span class="text-danger">{{ $errors->first('address') }}</span>
                                    @endif
                                </div>
                                <input type="hidden" id="latitude" name="latitude" class="form-control">
                                <input type="hidden" name="longitude" id="longitude" class="form-control">

                                <div class="form-group">
                                    <label for="exampleInputStatus">Status</label>
                                    <select class="form-control" name="status">
                                        <option value="1">Active</option>
                                        <option value="0">InActive</option>
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

@endsection

@section('js')
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

            $('#summernote_1').summernote({
                height: 400,
                placeholder: 'Property Description...',
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
