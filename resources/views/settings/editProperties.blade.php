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
                        <form action="{{route('propertie.update',$editPropertiesData->id)}}" id="quickForm" method="POST">
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
                                <label for="exampleInputCategory">Category</label>
                                <select class="form-control" name="category_id">
                                    @foreach ($categoryId as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
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
                                <label for="exampleInputPrice">Price</label>
                                <input type="text" name="price" value="{{$editPropertiesData->price}}" class="form-control {{ $errors->has('price') ? 'is-invalid' : '' }}" placeholder="Enter Price">
                                @if ($errors->has('price'))
                                    <span class="text-danger">{{ $errors->first('price') }}</span>
                                @endif
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
                                <label for="exampleInputAddress">address</label>
                                <textarea id="address" class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}" name="address" rows="3">{{$editPropertiesData->address}}</textarea>
                                @if ($errors->has('address'))
                                    <span class="text-danger">{{ $errors->first('address') }}</span>
                                @endif
                            </div>
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
