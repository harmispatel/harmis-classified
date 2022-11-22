@extends('frontend.common.layout')

@section('title', 'Add Properties')

@section('content')
@section('js')
    <div class="content">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="col-md-8 offset-2 mt-5">
                            <div class="card card-primary my-4">
                                <div class="card-header">
                                    <h3 class="card-title">Add Properties</h3>
                                </div>
                                <div class="card-body">
                                    <form action="{{route('addProperty')}}" id="quickForm" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="card-body">
                                        <div class="form-group">
                                            <label for="exampleInputName" class="mb-2">Name</label>
                                            <input type="text" name="name" class="form-control mb-2 {{ $errors->has('name') ? 'is-invalid' : '' }}" placeholder="Enter Name">
                                            @if ($errors->has('name'))
                                                <span class="text-danger">{{ $errors->first('name') }}</span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputImage" class="mb-2">Main Image</label>
                                            <input type="file" name="image" class="form-control mb-2 {{ $errors->has('image') ? 'is-invalid' : '' }}" placeholder="Enter Name">
                                            @if ($errors->has('image'))
                                                <span class="text-danger">{{ $errors->first('image') }}</span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputMultiImage" class="mb-2">Sub Image</label>
                                            <input type="file" name="multiImage[]" class="form-control mb-2 {{ $errors->has('multiImage') ? 'is-invalid' : '' }}" placeholder="Enter Name" multiple="multiple">
                                            @if ($errors->has('multiImage'))
                                                <span class="text-danger">{{ $errors->first('multiImage') }}</span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputCategory" class="mb-2">Category</label>
                                            <select class="form-control mb-2" name="category_id">
                                                {{-- <option value="1">Hello</option> --}}
                                                @foreach ($categoryId as $category)
                                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputProperty_type" class="mb-2">Property Type</label>
                                            <select class="form-control mb-2" name="property_type">
                                                <option value="1">For Rent</option>
                                                <option value="2">For Sale</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputProperty_type" class="mb-2">Property Condition</label>
                                            <select class="form-control mb-2" name="property_condition">
                                                <option value="1">Used</option>
                                                <option value="2">New</option>
                                                <option value="3">Furnished</option>
                                                <option value="4">Unfurnished</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputProperty_type" class="mb-2">Floor</label>
                                            <select class="form-control mb-2" name="floor">
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
                                            <label for="exampleInputBedroom" class="mb-2">Number Of Bedrooms</label>
                                            <input type="number" name="bedroom" class="form-control mb-2 {{ $errors->has('bedroom') ? 'is-invalid' : '' }}" placeholder="Enter Number of Bedroom">
                                            @if ($errors->has('bedroom'))
                                                <span class="text-danger">{{ $errors->first('bedroom') }}</span>
                                            @endif
                                        </div>


                                        <div class="form-group">
                                            <label for="exampleInputBedroom" class="mb-2">Kitchen</label>
                                            <input type="number" name="kitchen" class="form-control mb-2 {{ $errors->has('kitchen') ? 'is-invalid' : '' }}" placeholder="Enter Kitchen">
                                            @if ($errors->has('kitchen'))
                                                <span class="text-danger">{{ $errors->first('kitchen') }}</span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputBedroom" class="mb-2">Bath</label>
                                            <input type="number" name="bath" class="form-control mb-2 {{ $errors->has('bath') ? 'is-invalid' : '' }}" placeholder="Enter Number of Bath">
                                            @if ($errors->has('bath'))
                                                <span class="text-danger">{{ $errors->first('bath') }}</span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputBedroom" class="mb-2">Garage</label>
                                            <input type="number" name="garage" class="form-control mb-2 {{ $errors->has('garage') ? 'is-invalid' : '' }}" placeholder="Enter Number of Garage">
                                            @if ($errors->has('garage'))
                                                <span class="text-danger">{{ $errors->first('garage') }}</span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputMultiImage" class="mb-2">Build Year</label>
                                            <select name="build_year" class="form-control mb-2" id="ddlYears"></select>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPrice" class="mb-2">Price</label>
                                            <input type="number" name="price" class="form-control mb-2 {{ $errors->has('price') ? 'is-invalid' : '' }}" placeholder="Enter Price">
                                            @if ($errors->has('price'))
                                                <span class="text-danger">{{ $errors->first('price') }}</span>
                                            @endif
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputPrice" class="mb-2">Building Area (In SQFT.)</label>
                                            <input type="number" name="building_area" class="form-control mb-2 {{ $errors->has('building_area') ? 'is-invalid' : '' }}" placeholder="Enter Building Area">
                                            @if ($errors->has('building_area'))
                                                <span class="text-danger">{{ $errors->first('building_area') }}</span>
                                            @endif
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputDescription"class="mb-2">Description</label>
                                            <textarea class="form-control mb-2" id="summernote" name="description"></textarea>
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputCountry" class="mb-2">Country</label>
                                            <select id="country" class="form-control mb-2 {{ $errors->has('country') ? 'is-invalid' : '' }}" name="country_id">
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
                                            <label for="exampleInputState" class="mb-2">State</label>
                                            <select  class="form-control mb-2" name="state_id" id="state_id">
                                            </select>
                                            @if ($errors->has('state_id'))
                                                <span class="text-danger">{{ $errors->first('state_id') }}</span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputAddress" class="mb-2">Address</label>
                                            <input type="text" id="autocomplete" name="address" class="form-control mb-2">
                                            @if ($errors->has('address'))
                                                <span class="text-danger">{{ $errors->first('address') }}</span>
                                            @endif
                                        </div>

                                            <input type="hidden" id="latitude" name="latitude" class="form-control">
                                            <input type="hidden" name="longitude" id="longitude" class="form-control">

                                        <div class="form-group">
                                            <label for="exampleInputStatus" class="mb-2">Status</label>
                                            <select class="form-control mb-2" name="status">
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
                </div>
            </div>
        </section>
    </div>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
          $('#summernote').summernote({
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
    </script>
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
