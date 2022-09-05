<!DOCTYPE html>
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


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->


  </head>
  <body>
  <section class="form-main">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="form-inr">
                <form action="{{route('addProperty')}}" id="quickForm" method="POST">
                    @csrf
                    <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputName">Name</label>
                        <input type="text" name="name" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" placeholder="Enter Name">
                        @if ($errors->has('name'))
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="exampleInputCategory">Category</label>
                        <select class="form-control" name="category_id">
                            {{-- <option value="1">Hello</option> --}}
                            @foreach ($categoryId as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputProperty_type">Property Type</label>
                        <select class="form-control" name="property_type">
                            <option value="1">For Rent</option>
                            <option value="2">For Sale</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputProperty_type">Property Condition</label>
                        <select class="form-control" name="property_condition">
                            <option value="1">Used</option>
                            <option value="2">New</option>
                            <option value="3">Furnished</option>
                            <option value="4">Unfurnished</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputProperty_type">Floor</label>
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
                        <label for="exampleInputPrice">Price</label>
                        <input type="text" name="price" class="form-control {{ $errors->has('price') ? 'is-invalid' : '' }}" placeholder="Enter Price">
                        @if ($errors->has('price'))
                            <span class="text-danger">{{ $errors->first('price') }}</span>
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
                        <label for="exampleInputAddress">address</label>
                        <textarea id="address" class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}" name="address" rows="3"></textarea>
                        @if ($errors->has('address'))
                            <span class="text-danger">{{ $errors->first('address') }}</span>
                        @endif
                    </div>
                    {{-- <div class="form-group">
                        <label for="exampleInputPrice">Latitude</label>
                        <input type="text" name="price" class="{{ $errors->has('price') ? 'is-invalid' : '' }}">
                        <label for="exampleInputPrice">Logitude</label>
                        <input type="text" name="price" class="{{ $errors->has('price') ? 'is-invalid' : '' }}">
                        @if ($errors->has('price'))
                            <span class="text-danger">{{ $errors->first('price') }}</span>
                        @endif
                    </div> --}}
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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
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
</script>


  <!-- jQuery library -->
  {{-- <script src="{{ asset ('js/jquery.min.js')}}"></script> --}}
  <script src="{{ asset ('js/bootstrap.min.js')}}"></script>

  </body>
</html>
