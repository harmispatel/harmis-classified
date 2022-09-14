<!-- Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
  <a href="#" class="brand-link">
    <img src="{{ asset ('img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">Harmis-classified</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->


    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
            <a href="/dashboard" class="nav-link {{ Route::currentRouteName() == 'dashboard' ? 'active' : '' }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>Dashboard</p>
            </a>
        </li>
            <li class="nav-item menu-open">

                <a href="#" class="nav-link {{ Route::currentRouteName() == 'show_user.index' || Route::currentRouteName() == 'show_role.index' ? 'active' : '' }}">
                {{-- <a href="/" class="nav-link"> --}}
                <i class="nav-icon fas fa-users"></i>
                <p>
                    User Management
                    <i class="right fas fa-angle-left"></i>
                </p>
                </a>
                <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{route('show_user.index')}}" class="nav-link {{ Route::currentRouteName() == 'show_user.index' ? 'active' : '' }}">
                    <i class="far fa-user"></i>
                    <p>Users</p>
                    </a>
                </li>
                <li class="nav-item" >
                    <a href="{{route('show_role.index')}}" class="nav-link {{ Route::currentRouteName() == 'show_role.index' ? 'active' : ''}}">
                    <i class="fab fa-critical-role"></i>
                    <p>Roles</p>
                    </a>
                </li>
                </ul>
            </li>
            <li class="nav-item menu-open">
                <a href="#" class="nav-link {{ Route::currentRouteName() == 'country.index'|| Route::currentRouteName() == 'propertie.index' || Route::currentRouteName() == 'category.index' || Route::currentRouteName() == 'state.index' ? 'active' : '' }}">
                {{-- <a href="/" class="nav-link"> --}}
                <i class="nav-icon fas fa-users"></i>
                <p>Settings<i class="right fas fa-angle-left"></i></p>
                </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{route('country.index')}}" class="nav-link {{ Route::currentRouteName() == 'country.index' ? 'active' : '' }}">
                    <i class="far fa-user"></i>
                    <p>Countries</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('state.index')}}" class="nav-link {{ Route::currentRouteName() == 'state.index' ? 'active' : '' }}">
                    <i class="fab fa-critical-role"></i>
                    <p>States</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('propertie.index')}}" class="nav-link {{ Route::currentRouteName() == 'propertie.index' ? 'active' : '' }}">
                    <i class="fab fa-critical-role"></i>
                    <p>Properties</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('category.index')}}" class="nav-link {{ Route::currentRouteName() == 'category.index' ? 'active' : '' }}">
                    <i class="fab fa-critical-role"></i>
                    <p>category</p>
                    </a>
                </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="/language" class="nav-link {{ Route::currentRouteName() == 'language' ? 'active' : '' }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>Language</p>
            </a>
        </li>
      </ul>
    </nav>
  </div>
</aside>
<script async src="https://docs.opencv.org/master/opencv.js" type="text/javascript"></script>
<script>

</script>
