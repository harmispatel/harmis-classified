<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title> @yield('title')</title>

  @include('common.css')

</head>
<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">
    @include('common.header')

    @include('common.sidebar')

    @yield('content')

    @include('common.footer')

  </div>
  @include('common.js')
</body>
</html>
