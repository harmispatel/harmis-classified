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

    <section class="property-main page-title-bg">
      <div class="container">
        <div class="page-title">
            <h2>PROPERTIES PAGE</h2>
            <ol class="breadcrumb">
                <li><a href="#">HOME</a></li>
                <li class="active"><a href="">PROPERTIES</a></li>
            </ol>
        </div>
      </div>
    </section>
    
    @yield('content')
    
    @include('frontend.common.js')
</body>
</html>
