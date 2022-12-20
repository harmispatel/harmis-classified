{{--
    THIS IS REGISTER PAGE FOR USER
    ----------------------------------------------------------------------------------------------
    register.blade.php
    It Displayed User Register Form.
    ----------------------------------------------------------------------------------------------
--}}

@extends('frontend.common.layout')

@section('title', 'Register')

@section('content')
    <section class="form-main">
        <div class="container">
            <div class="row justify-content-center">
                <!-- Success Message -->
                @if (session('success'))
                    <div class="d-flex justify-content-end">
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    </div>
                @endif

                <!-- Error Message -->
                @if (session('error'))
                    <div class="d-flex justify-content-end">
                        <div class="alert alert-danger" role="alert">
                            {{ session('error') }}
                        </div>
                    </div>
                @endif

                <div class="col-md-6">
                    <div class="form-inr">
                        <form action="{{ route('userRegister') }}" method="POST" id="register" role="form" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="name"><span>{{ __('Name') }}</span></label>
                                <input type="text" class="form-control" value="{{ old('name') }}" id="name" name="name">
                                @if ($errors->has('name'))
                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="image">{{ __('Image') }}</label>
                                <input type="file" id="image" name="image" accept="image/*" class="form-control {{ $errors->has('image') ? 'is-invalid' : '' }}">
                                @if ($errors->has('image'))
                                    <span class="text-danger">{{ $errors->first('image') }}</span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="mobile">{{ __('Mobile No') }}</label>
                                <input type="text" class="form-control" value="{{ old('mobile') }}" id="mobile" name="mobile">
                                @if ($errors->has('mobile'))
                                    <span class="text-danger">{{ $errors->first('mobile') }}</span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="role">{{ __('Role') }}</label>
                                <select name="role_id" id="role" class="form-control">
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->id }}" {{ (old('role_id') == $role->id) ? 'selected' : '' }}>{{__($role->name) }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="gender">{{ __('Gender') }}</label>
                                <select name="gender" id="gender" class="form-control">
                                    <option value="Male">{{ __('Male') }}</option>
                                    <option value="Female">{{ __('Female') }}</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="email">{{ __('Email') }}</label>
                                <input type="email" class="form-control" value="{{ old('email') }}" id="email" name="email">
                                @if ($errors->has('email'))
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="password">{{ __('Password') }}</label>
                                <input type="password" class="form-control" id="password" name="password">
                                @if ($errors->has('password'))
                                    <span class="text-danger">{{ $errors->first('password') }}</span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="confirmPassword">{{ __('Confirm Password') }}</label>
                                <input type="password" class="form-control" id="confirmPassword"
                                    name="confirmPassword">
                                @if ($errors->has('confirmPassword'))
                                    <span class="text-danger">{{ $errors->first('confirmPassword') }}</span>
                                @endif
                            </div>

                            <div class="mt-4">
                                <button type="submit" class="btn btn-primary">{{ __('Register') }}</button>
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
                    },
                    password: {
                        required: true
                    },
                    confirmPassword : {
                        required: true,
                        equalTo : "#password"
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
                    },
                    password: {
                        required: "Password is required"
                    },
                    confirmPassword: {
                        required: "Password Confirmation is required",
                        equalTo : "Password Confirmation does not match with Password"
                    }
                }
            });
        });
    </script>
@endsection
