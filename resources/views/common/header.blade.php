{{--
    THIS IS HEADER/NAVBAR PAGE FOR ADMIN PANEL
    ----------------------------------------------------------------------------------------------
    header.blade.php
    It Is Used For Admin Panel's Top/Navabr Part
    ----------------------------------------------------------------------------------------------
--}}

<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>
  </ul>
  <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <div class="dropdown-divider"></div>
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="false">
                        <img src="{{ ( (auth()->user()->image != '') || (auth()->user()->image != null) ) ? asset('public/userimage/'.auth()->user()->image) : asset('public/img/blank_user.png') }}" class="m-0 me-2 img-circle" width="30" height="30">
                        {{ ucwords(auth()->user()->name) }}
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right" style="left: inherit; right: 0px; width: 500px; padding: 0">
                        {{-- <div class="dropdown-divider"></div> --}}
                        <a href="{{ route('profile') }}" class="dropdown-item">
                            <div class="media">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        <i class="fa fa-user-circle pr-2"></i>Profile
                                    </h3>
                                </div>
                            </div>
                        </a>
                        <a onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="dropdown-item text-center bg-light">
                            <i class="fas fa-sign-out-alt"></i> Logout
                        </a>
                        <form action="{{ route('adminLogout') }}" id="logout-form" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
            </div>
        </li>
    </ul>
</nav>
  <!--End Navbar -->
