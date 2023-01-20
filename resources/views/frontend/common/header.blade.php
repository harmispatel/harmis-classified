{{--
    THIS IS HEADER/NAVBAR PAGE FOR FRONTSIDE/USERSIDE
    ----------------------------------------------------------------------------------------------
    header.blade.php
    It Is Used For Frontside/Userside Header/Navabr.
    ----------------------------------------------------------------------------------------------
--}}

@php
    $multiLang = getLang();
    $curLang = session()->get('lang_code');

    $data = footerData();
    $hlogo = isset($data['hlogo']) ? $data['hlogo'] : '';
@endphp
<header class="header wow animate__fadeInDown" data-wow-duration="1s" id="header">
    <div class="header-main">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container">
                <a class="navbar-brand" href="#">
                    <img src="{{ asset('public/image/'.$hlogo) }}" />
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        {{-- <li class="nav-item dropdown">
                            <a class="nav-link active" aria-current="page" href="{{ route('showProperty',1) }}" id="navbarDropdown1">{{__('Home')}}</a>
                        </li> --}}
                        <li class="nav-item dropdown">
                            <a class="nav-link active dropdown-toggle" aria-current="page" href="#" id="navbarDropdown1" role="button" data-bs-toggle="dropdown" aria-expanded="false">{{ __('HOME') }}</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown1">
                                <li><a class="dropdown-item" href="{{ route('showProperty',1) }}">{{ __('HOME') }}</a></li>
                                <li><a class="dropdown-item" href="{{ route('showProperty',2) }}">{{ __('HOME') }} 2</a></li>
                                <li><a class="dropdown-item" href="{{ route('showProperty',3) }}">{{ __('HOME') }} 3</a></li>
                            </ul>
                        </li>
                        {{-- <li class="nav-item">
                            <a class="nav-link" href="#test">{{__('Gallery')}}</a>
                        </li> --}}
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('property-lists') }}">{{__('Property List')}}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('contactus') }}">{{__('Contact Us')}}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('allblogs') }}">{{__('Blog')}}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('allagent') }}">{{__('Agents')}}</a>
                        </li>
                        <li class="nav-item">
                            @if (Auth::check())
                                <div class="profile_dropdown">
                                    <div class="profile_name">
                                        <img src="{{ ((auth()->user()->image != null)) ? asset('public/userimage/'.auth()->user()->image) : asset('img/blank_user.png') }}"/>
                                        <p>{{ auth()->user()->name }}</p>
                                    </div>
                                    <div class="profile_dropdown_inr">
                                        <ul>
                                            <li><a href="{{ route('userprofile') }}">{{__('Profile')}}</a></li>
                                            @auth
                                            @php
                                                $role = Auth::user();
                                                $roleId = $role['role_id'];
                                            @endphp
                                            @if ($roleId == 9)
                                                <li><a href="{{ route('agentpropertylist')}}">{{__('My Properties')}}</a></li>
                                                <li><a href="{{ route('addagentProperty')}}">{{__('Add Propertys')}}</a></li>
                                            @endif
                                        @endauth
                                            <li onclick="event.preventDefault();document.getElementById('logout-user').submit();"><a>{{__('Logout')}}</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <form action="{{ route('userLogout') }}" id="logout-user" method="POST" class="d-none">
                                    @csrf
                                </form>
                            @else
                                <a class="nav-link" href="{{ route('userLoginForm') }}">{{__('LOGIN')}}</a>
                            @endif
                        </li>
                        <li class="nav-item">
                            <select onchange="setLenguage();" id="language" class="form-control changeLang ms-3">
                                @foreach ($multiLang as $lang)
                                    <option class="langVal" value="{{$lang->code}}" {{ $curLang == $lang->code ? 'selected' : '' }}>{{$lang->name}}</option>
                                @endforeach
                            </select>
                        </li>
                    </ul>
                </div>
                {{-- <div class="modal fade sign_modal" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-sign-main">
                                <button type="button" class="btn-close close-bt" data-bs-dismiss="modal" aria-label="Close"><i class="fa-solid fa-xmark"></i></button>
                                <div class="sign_inr">
                                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link active" id="login-tab" data-bs-toggle="tab" data-bs-target="#login" type="button" role="tab" aria-controls="login" aria-selected="true"><i class="fa-solid fa-right-to-bracket pe-2"></i> {{__('Login')}}</button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link" id="register-tab" data-bs-toggle="tab" data-bs-target="#register" type="button" role="tab" aria-controls="register" aria-selected="false"><i class="fa-solid fa-user-plus pe-2"></i> {{__('Register')}}</button>
                                        </li>
                                    </ul>
                                    <div class="tab-content" id="myTabContent">
                                        <div class="tab-pane fade show active" id="login" role="tabpanel" aria-labelledby="login-tab">
                                            <div class="login-form-inr">
                                                <form action="{{ route('userLogin') }}" method="POST">
                                                    @csrf
                                                    <div class="mb-3 position-relative">
                                                        <label for="Email" class="form-label">{{__('Email address')}}</label>
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
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="register" role="tabpanel" aria-labelledby="register-tab">
                                            <div class="login-form-inr">
                                                <form method="POST" action="{{ route('userRegister') }}" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="mb-3 ">
                                                                <label for="name" class="form-label">{{__('Name')}}</label>
                                                                <div class="position-relative">
                                                                    <input type="text" value="{{ old('name') }}" name="name" class="form-control" id="name" />
                                                                    <i class="fa-solid fa-user input_ic"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="mb-3 ">
                                                                <label for="name" class="form-label">{{__('Mobile Number')}}</label>
                                                                <div class="position-relative">
                                                                    <input type="number" class="form-control" name="mobile" value="{{ old('mobile') }}" id="mobile" />
                                                                    <i class="fa-solid fa-phone input_ic"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="mb-3 ">
                                                                <label for="role" class="form-label">{{__('Role')}}</label>
                                                                <select class="form-select" name="role_id" id="role">
                                                                    <option selected>select menu</option>
                                                                    @foreach (getuserrole() as $role)
                                                                        <option value="{{ $role->id }}" {{ (old('role_id') == $role->id) ? 'selected' : '' }}>{{ $role->name }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="mb-3 ">
                                                                <label for="gendar" class="form-label">{{__('Gendar')}}</label>
                                                                <select class="form-select" name="gender" id="gender">
                                                                    <option value="Male">{{ __('Male') }}</option>
                                                                    <option value="Female">{{ __('Female') }}</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 ">
                                                        <label for="image" class="form-label">{{__('Image')}}</label>
                                                        <input type="file" class="form-control image-input" accept="image/*" name="image" value="{{ old('userimage') }}" id="image">
                                                    </div>
                                                    <div class="mb-3 ">
                                                        <label for="Email" class="form-label">{{__('Email address')}}</label>
                                                        <div class="position-relative">
                                                            <input type="email" class="form-control" value="{{ old('email') }}" name="email" id="Email">
                                                            <i class="fa-solid fa-envelope input_ic"></i>
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="password" class="form-label">{{ __('Password') }}</label>
                                                        <div class="position-relative">
                                                            <input type="password" class="form-control" id="password" name="password">
                                                            <i class="fa-solid fa-lock input_ic"></i>
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="password" class="form-label">{{ __('Confirm Password') }}</label>
                                                        <div class="position-relative">
                                                            <input type="password" class="form-control" id="password" name="confirmPassword">
                                                            <i class="fa-solid fa-lock input_ic"></i>
                                                        </div>
                                                    </div>
                                                    <div class="login-bt">
                                                        <button type="submit" class="btn btn-success w-100">{{__('Register')}}</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>
        </nav>
    </div>
</header>
@if (session('success'))
    <div class="alert alert-warning alert-dismissible fade show alert-massage m-3" role="alert">
        <strong>{{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
@endif

<!-- Error Message -->
@if (session('error'))
    <div class="alert alert-warning alert-dismissible fade show alert-massage m-3" role="alert">
        <strong>{{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
@endif
