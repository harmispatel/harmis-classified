<header class="header wow animate__fadeInDown" data-wow-duration="1s" id="header">
    <div class="header-top">
      <div class="container">
        <div class="header-top-main">
          <div class="header-top-left">
            @php
                $loginUserData = Auth::user();
            @endphp
            <span class="phone"><i class="fa-solid fa-phone"></i> +91 123456789</span>
            <span><i class="fa-solid fa-envelope"></i> test@gmail.com</span>
          </div>
          <div class="header-top-right">
                @if (Auth::check())
                <form action="{{ route('userLogout') }}" method="POST">
                    @csrf
                    <button style="border: none;background:none;" name="submit">Logout</button>
                </form>
                    {{-- <a href="{{ route('userLogout') }}" class="nav-link">logout</a> --}}
                @else
                    <a href="/registerform" class="nav-link re-nav-link">Register</a>
                    <a href="{{ route('userLoginForm') }}" class="nav-link">login</a>
                @endif
          </div>
        </div>
      </div>
    </div>
    <div class="header-main">
      <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
          <a class="navbar-brand" href="#">
            <img src="{{ asset ('image/logo.png')}}"/>
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="index.html">Home</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Property
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item active" href="{{route('showProperty')}}">Properties</a></li>
                  <li><a class="dropdown-item" href="#">Properties Detail</a></li>
                </ul>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">About Us</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Gallery</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Contact Us</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </div>
  </header>
