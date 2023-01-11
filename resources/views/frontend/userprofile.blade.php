{{--
    THIS IS USER/AGENT PAGE FOR USER
    ----------------------------------------------------------------------------------------------
    userprofile.blade.php
    It Displayed User/Agent Edit Details Form.
    ----------------------------------------------------------------------------------------------
--}}

@extends('frontend.common.layout')

@section('title', 'Update Profile')

@section('content')
<nav aria-label="breadcrumb" class="pt-2">
    <div class="container">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('showProperty') }}">{{__('Home')}}</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{__('Profile')}}</li>
      </ol>
    </div>
  </nav>  
    <section class="form-main">
        <div class="container">
            <div class="row justify-content-center">
                <!-- Success Message -->

                <div class="col-md-6 my-3">
                    <div class="form-inr">
                        <form method="POST" action="{{ route('userupdate') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3 ">
                                        <label for="name" class="form-label">{{__('Name')}}</label>
                                        <input type="text" value="{{ $userDetail->name }}" name="name" class="form-control" id="name" />
                                    </div>
                                    @if ($errors->has('name'))
                                        <span class="text-danger">{{ $errors->first('name') }}</span>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3 ">
                                        <label for="name" class="form-label">{{__('Mobile Number')}}</label>
                                        <input type="number" class="form-control" name="mobile" value="{{ $userDetail->mobile }}" id="mobile" />
                                    </div>
                                    @if ($errors->has('mobile'))
                                        <span class="text-danger">{{ $errors->first('mobile') }}</span>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3 ">
                                        <label for="role" class="form-label">{{__('Role')}}</label>
                                        <select class="form-select" name="role_id" id="role">
                                            <option selected>select menu</option>
                                            @foreach (getuserrole() as $role)
                                                <option value="{{ $role->id }}" {{ ($userDetail->role_id == $role->id) ? 'selected' : '' }}>{{ $role->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3 ">
                                        <label for="gendar" class="form-label">{{__('Gendar')}}</label>
                                        <select class="form-select" name="gender" id="gender">
                                            <option value="Male" {{ ($userDetail->gender == 'Male') ? 'selected' : ''}}>{{ __('Male') }}</option>
                                            <option value="Female" {{ ($userDetail->gender == 'Female') ? 'selected' : ''}}>{{ __('Female') }}</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3 ">
                                <label for="image" class="form-label">{{__('Image')}}</label>
                                <input type="file" class="form-control" accept="image/*" name="image" value="{{ old('userimage') }}" id="image">
                                @if ($errors->has('image'))
                                    <span class="text-danger">{{ $errors->first('image') }}</span>
                                @endif
                            </div>
                            <div>
                                <img src="{{ asset('public/userimage/'.$userDetail->image) }}" width="50" alt="Img">
                            </div>
                            <div class="mb-3 ">
                                <label for="Email" class="form-label">{{__('Email address')}}</label>
                                <input type="email" class="form-control" value="{{ $userDetail->email }}" name="email" id="Email">
                                @if ($errors->has('email'))
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">{{ __('Password') }}</label>
                                <input type="password" class="form-control" id="password" name="password">
                                @if ($errors->has('password'))
                                    <span class="text-danger">{{ $errors->first('password') }}</span>
                                @endif
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">{{ __('Confirm Password') }}</label>
                                <input type="password" class="form-control" id="password" name="confirmPassword">
                                @if ($errors->has('confirmPassword'))
                                    <span class="text-danger">{{ $errors->first('confirmPassword') }}</span>
                                @endif
                            </div>
                            <div class="login-bt">
                                <button type="submit" class="btn btn-success w-100">{{__('UPDATE')}}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            @if (Session::has('success'))
                toastr.success('{{ Session::get('success') }}')
            @endif
            setTimeout(() => {
                $('.alert').hide()
            }, 3000);

            // Validate the Login Form
            $("#register").validate({
                rules: {
                    name: {
                        required: true
                    },
                    mobile: {
                        required: true,
                        minlength: 10,
                        maxlength: 10,
                        number: true
                    },
                    email: {
                        required: true,
                        email: true
                    }
                },
                messages : {
                    name: {
                        required: "Name is required"
                    },
                    mobile: {
                        required: "Mobile No. is required",
                        minlength: "Mobile No. must be 10 digits",
                        maxlength: "Mobile No. must be 10 digits",
                        number: "Mobile No. is not valid"
                    },
                    email: {
                        required: "Email is required",
                        email: "Please enter a valid email address"
                    }
                }
            });
        });
    </script>
@endsection
