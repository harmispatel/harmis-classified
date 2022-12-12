{{--
    THIS IS LAYOUT PAGE FOR FRONTSIDE/USERSIDE
    ----------------------------------------------------------------------------------------------
    layout.blade.php
    It's Included Some layout like..
    - head
    - header
    - layout
    - footer
    - script
    ----------------------------------------------------------------------------------------------
--}}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> @yield('title')</title>

    @include('frontend.common.css')

</head>
<body class="aa-price-range">
    <div id="aa-preloader-area">
        <div class="pulse"></div>
    </div>
    
    @include('frontend.common.header')

    @yield('content')
    
    @include('frontend.common.js')
</body>
</html>
