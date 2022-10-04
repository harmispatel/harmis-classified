{{-- <!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Propertys</title>

        <!-- Favicon -->
        <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">

        <!-- Font awesome -->
        <link href="{{ asset ('css/bootstrap.min.css')}}" rel="stylesheet">
        <link href="{{ asset ('css/custom.css')}}" rel="stylesheet">

        <!-- Google Font -->
        <link href='https://fonts.googleapis.com/css?family=Vollkorn' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    </head>
<body> --}}
    @extends('frontend.common.layout')

@section('content')
@section('js')

<section class="form-main">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="form-inr">
                <form action="{{route('addProperty')}}" id="quickForm" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputName">{{__('Name')}}</label>
                        <input type="text" name="name" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" placeholder="Enter Name">
                        @if ($errors->has('name'))
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="exampleInputImage">{{__('Main Image')}}</label>
                        <input type="file" name="image" class="form-control {{ $errors->has('image') ? 'is-invalid' : '' }}" placeholder="Enter Name">
                        @if ($errors->has('image'))
                            <span class="text-danger">{{ $errors->first('image') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="exampleInputMultiImage">{{__('Sub Image')}}</label>
                        <input type="file" name="multiImage[]" class="form-control {{ $errors->has('multiImage') ? 'is-invalid' : '' }}" placeholder="Enter Name" multiple="multiple">
                        @if ($errors->has('multiImage'))
                            <span class="text-danger">{{ $errors->first('multiImage') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="exampleInputCategory">{{__('Category')}}</label>
                        <select class="form-control" name="category_id">
                            {{-- <option value="1">Hello</option> --}}
                            @foreach ($categoryId as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputProperty_type">{{__('Property Type')}}</label>
                        <select class="form-control" name="property_type">
                            <option value="1">For Rent</option>
                            <option value="2">For Sale</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputProperty_type">{{__('Property Condition')}}</label>
                        <select class="form-control" name="property_condition">
                            <option value="1">Used</option>
                            <option value="2">New</option>
                            <option value="3">Furnished</option>
                            <option value="4">Unfurnished</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputProperty_type">{{__('Floor')}}</label>
                        <select class="form-control" name="floor">
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
                        <label for="exampleInputBedroom">{{__('Number Of BedRooms')}}</label>
                        <input type="number" name="bedroom" class="form-control {{ $errors->has('bedroom') ? 'is-invalid' : '' }}" placeholder="Number of BedRooms">
                        @if ($errors->has('bedroom'))
                            <span class="text-danger">{{ $errors->first('bedroom') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="exampleInputBedroom">{{__('kitchen')}}</label>
                        <input type="number" name="kitchen" class="form-control {{ $errors->has('kitchen') ? 'is-invalid' : '' }}" placeholder="Numner of kitchen">
                        @if ($errors->has('kitchen'))
                            <span class="text-danger">{{ $errors->first('kitchen') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="exampleInputBedroom">{{__('Bathroom')}}</label>
                        <input type="number" name="bath" class="form-control {{ $errors->has('bath') ? 'is-invalid' : '' }}" placeholder="Number of Bathroom">
                        @if ($errors->has('bath'))
                            <span class="text-danger">{{ $errors->first('bath') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="exampleInputBedroom">{{__('Garage')}}</label>
                        <input type="number" name="garage" class="form-control {{ $errors->has('garage') ? 'is-invalid' : '' }}" placeholder="Number of Garage">
                        @if ($errors->has('garage'))
                            <span class="text-danger">{{ $errors->first('garage') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="exampleInputMultiImage">{{__('Build Year')}}</label>
                        <select name="build_year" class="form-control" id="ddlYears"></select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPrice">{{__('Description')}}</label>
                        <textarea class="form-control" name="description" id="summernote_1"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPrice">{{__('Price')}}</label>
                        <input type="number" name="price" class="form-control {{ $errors->has('price') ? 'is-invalid' : '' }}" placeholder="Enter Price">
                        @if ($errors->has('price'))
                            <span class="text-danger">{{ $errors->first('price') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="exampleInputCountry">{{__('Countries')}}</label>
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
                        <label for="exampleInputState">{{__('State')}}</label>
                        <select  class="form-control" name="state_id" id="state_id">
                        </select>
                        @if ($errors->has('state_id'))
                            <span class="text-danger">{{ $errors->first('state_id') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="exampleInputAddress">{{__('Addres')}}</label>
                        <textarea id="address" class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}" name="address" rows="3"></textarea>
                        @if ($errors->has('address'))
                            <span class="text-danger">{{ $errors->first('address') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="exampleInputStatus">{{__('Status')}}</label>
                        <select class="form-control" name="status">
                            <option value="1">{{__('Active')}}</option>
                            <option value="0">{{__('Inactive')}}</option>
                        </select>
                    </div>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('propertie.index') }}" class="btn btn-secondary">{{__('Back')}}</a>
                        <button type="submit" name="submit" class="btn btn-primary">{{__('Save')}}</button>
                    </div>
                </form>
            </div>
        </div>
      </div>
    </div>
</section>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
  <script>
    $(document).ready(function() {
        $('#country').change(function (){
            var countryId  = $(this).val();
            // console.log(countryId);
            $.ajax({
                    url : "{{ route('getState') }}",
                    data : {
                        "_token": "{{ csrf_token() }}",
                        'countryId' : countryId

                    },
                    type : 'post',
                    dataType : 'json',
                    success : function(result){
                        console.log(result);
                        $("#state_id").html('');
                        $("#state_id").append(result.html);
                    }
                });
        });
    });


    $(document).ready(function(){
        var autocomplete;
        var to = 'location';
        autocomplete = new google.maps.places.Autocomplete((document.getElementById(to)),{
            types:['geocode'],
        });
        google.maps.event.addListener(autocomplete,'place_changed',function(){
            var near_place = autocomplete.getPlace();

            $("#latitude").val(near_place.geometry.location.lat());
            $("#longitude").val(near_place.geometry.location.lng());
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

  <!-- jQuery library -->
  {{-- <script src="{{ asset ('js/jquery.min.js')}}"></script> --}}
  <script src="{{ asset ('js/bootstrap.min.js')}}"></script>

  {{-- </body>
</html> --}}
@endsection
@endsection
