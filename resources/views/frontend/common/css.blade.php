{{--
    THIS IS CSS LINK PAGE FOR FRONTSIDE/USERSIDE
    ----------------------------------------------------------------------------------------------
    css.blade.php
    It's Included All CSS Links.
    it is used for Frontside/Userside
    ----------------------------------------------------------------------------------------------
--}}

<!-- Font awesome -->
{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"/>

<!-- css -->
<link rel="stylesheet" href="{{ asset('public/css/bootstrap.min.css')}}"/>
<link rel="stylesheet" href="{{ asset('public/css/animate.css')}}"/>
<link rel="stylesheet" href="{{ asset('public/css/swiper/swiper-bundle.min.css')}}"/> --}}
{{-- <link rel="stylesheet" href="{{ asset('public/plugins/toastr/toastr.min.css')}}"> --}}
{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" /> --}}

<!-- Main style sheet -->
{{-- <link href="{{ asset('public/css/style.css')}}" rel="stylesheet"> --}}

<!-- Google Font -->
{{-- <link href='https://fonts.googleapis.com/css?family=Vollkorn' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'> --}}

{{-- Bootstrap css --}}
{{-- <link href="{{ asset('public/css/bootstrap.min.css') }}" rel="stylesheet"> --}}

{{-- Custom css --}}
{{-- <link href="{{ asset('css/custom.css') }}" rel="stylesheet"> --}}


{{-- Old Style --}}
{{-- <link href="{{ asset('css/style.css')}}" rel="stylesheet"> --}}

<!-- Favicon -->
<link rel="shortcut icon" href="{{ asset('img/favicon.ico') }}" type="image/x-icon">

<!-- Font awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />

<!-- Framework css -->
<link rel="stylesheet" href="{{ asset('public/assets/css/bootstrap.min.css') }}" />

<!-- animation css -->
<link rel="stylesheet" href="{{ asset('public/assets/css/animate.css') }}" />

<!-- swiper slider css -->
<link rel="stylesheet" href="{{ asset('public/assets/css/swiper-bundle.min.css') }}" />

<!-- custom css -->
<link href="{{ asset('public/assets/css/custom.css') }}" rel="stylesheet" type='text/css'>

<!--  Font -->
<link href="{{ asset('public/assets/font/font.css') }}" rel='stylesheet' type='text/css'>

{{-- Google Map Styleseet --}}
<link href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.0.1/leaflet.css" rel="stylesheet" />

{{-- Fonts --}}
@php
    $font = getfontfamily();
@endphp
<style>
    *{
        font-family: <?php echo (isset($font->value)) ? $font->value : '' ?> !important;
    }

    .fa-brands,.fab {
        font-family: "Font Awesome 6 Brands"!important;
    }

    .fa, .far, .fas {
        font-family: "Font Awesome 6 Free"!important;
    }

    .fa-solid{
        font-family: "Font Awesome 6 Free"!important
    }
</style>
@yield('css')
