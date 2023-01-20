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
            <div class="form-title">
                <h2>{{__('Login')}}</h2>
            </div>
            <div class="row justify-content-center align-items-center">
                <div class="col-md-6 mt-3">
                    <div class="form-inr">
                        {{-- <form action="{{ route('userLogin') }}" method="POST" id="loginForm">
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
                        </form> --}}
                        <div class="tab-pane fade show active" id="login" role="tabpanel" aria-labelledby="login-tab">
                            <div class="login-form-inr">
                                <form action="{{ route('userLogin') }}" method="POST">
                                    @csrf
                                    <div class="mb-3 position-relative">
                                        <label for="Email" class="form-label">{{__('Email')}}</label>
                                        <div class="position-relative">
                                            <input type="email" class="form-control" name="email" id="Email">
                                            <i class="fa-solid fa-user input_ic"></i>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="password" class="form-label">{{__('Password')}}</label>
                                        <div class="position-relative">
                                            <input type="password" class="form-control" name="password" id="password">
                                            <i class="fa-solid fa-lock input_ic"></i>
                                        </div>
                                    </div>
                                    <div class="login-bt">
                                        <button type="submit" class="btn btn-success w-100">{{__('LOGIN')}}</button>
                                        <a href="{{ route('register') }}/" class="btn btn-success w-100 mt-2">{{__('REGISTER')}}</a>
                                    </div>
                                </form>
                            </div>
                        </div>
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
