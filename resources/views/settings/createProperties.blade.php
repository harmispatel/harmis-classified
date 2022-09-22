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
                                <input type="text" name="name" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" placeholder="Enter Name">
                                @if ($errors->has('name'))
                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="exampleInputImage">Main Image</label>
                                <input type="file" name="image" class="form-control {{ $errors->has('image') ? 'is-invalid' : '' }}" placeholder="Enter Name">
                                @if ($errors->has('image'))
                                    <span class="text-danger">{{ $errors->first('image') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="exampleInputMultiImage">Sub Image</label>
                                <input type="file" name="multiImage[]" class="form-control {{ $errors->has('multiImage') ? 'is-invalid' : '' }}" placeholder="Enter Name" multiple="multiple">
                                @if ($errors->has('multiImage'))
                                    <span class="text-danger">{{ $errors->first('multiImage') }}</span>
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
                                <label for="exampleInputUser">User</label>
                                <select class="form-control" name="user_id">
                                    {{-- <option value="1">Hello</option> --}}
                                    @foreach ($userId as $user)
                                        <option value="{{$user->id}}">{{$user->name}}</option>
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
                                <label for="exampleInputBedroom">Number Of Bedrooms</label>
                                <input type="text" name="bedroom" class="form-control {{ $errors->has('bedroom') ? 'is-invalid' : '' }}" placeholder="Enter Number of Bedroom">
                                @if ($errors->has('bedroom'))
                                    <span class="text-danger">{{ $errors->first('bedroom') }}</span>
                                @endif
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
</script>

@endsection
