{{--
    THIS IS LOGIN PAGE FOR USER
    ----------------------------------------------------------------------------------------------
    login.blade.php
    It Displayed User Login Form.
    ----------------------------------------------------------------------------------------------
--}}

@extends('frontend.common.layout')

@section('title', 'Login')

@section('content')
    <section class="form-main">
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-md-6 mt-3">
                    <div class="form-inr">
                        <form action="{{ route('userLogin') }}" method="POST" id="loginForm">
                            @csrf
                            <div class="form-group">
                                <label for="email">{{__('labels.email')}}</label>
                                <input type="email" class="form-control" id="email" name="email">
                                @if ($errors->has('email'))
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="password">{{__('labels.password')}}</label>
                                <input type="password" class="form-control" id="password" name="password">
                                @if ($errors->has('password'))
                                    <span class="text-danger">{{ $errors->first('password') }}</span>
                                @endif
                            </div>

                            <div class="mt-4 align-items-center d-flex justify-content-between">
                                <button type="submit" class="btn btn-primary">{{__('labels.login')}}</button>
                                <a href="{{ route('register') }}/" style="text-decoration: none;">{{__('labels.register')}}</a>
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
            // Validate the Login Form
            $("#loginForm").validate({
                rules: {
                    email: {
                        required: true,
                        email: true
                    },
                    password: {
                        required: true
                    }
                },
                messages : {
                    email: {
                        required: "Email is required",
                        email: "Please enter a valid email address"
                    },
                    password: {
                        required: "Password is required"
                    }
                }
            });
        });
    </script>
@endsection
