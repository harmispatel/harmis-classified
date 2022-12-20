{{--
    THIS IS SIDEBAR PAGE FOR ADMINPANEL
    ----------------------------------------------------------------------------------------------
    sidebar.blade.php
    It's Displayed Sidebar Part
    ----------------------------------------------------------------------------------------------
--}}

<!-- Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
  <a href="#" class="brand-link">
    <img src="{{ (auth()->user()->image != '') ? asset('public/userimage/'.auth()->user()->image) : asset('public/img/blank_user.png') }}" alt="AdminL Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">Harmis-classified</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
            <a href="{{ route('dashboard') }}" class="nav-link {{ Route::currentRouteName() == 'dashboard' ? 'active' : '' }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>Dashboard</p>
            </a>
        </li>
            <li class="nav-item {{ (Route::currentRouteName() == 'show_user.index') || (Route::currentRouteName() == 'show_role.index') || (Route::currentRouteName() == 'show_user.create') || (Route::currentRouteName() == 'show_role.create') ? 'menu-open' : '' }}">
                <a href="#" class="nav-link {{ Route::currentRouteName() == 'show_user.index' || Route::currentRouteName() == 'show_role.index' ? 'active' : '' }}">
                    <i class="nav-icon fas fa-users"></i>
                    <p>User Management<i class="right fas fa-angle-left"></i></p>
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
            <li class="nav-item {{ (Route::currentRouteName() == 'country.index') || (Route::currentRouteName() == 'state.index') || (Route::currentRouteName() == 'propertie.index') || (Route::currentRouteName() == 'category.index') || (Route::currentRouteName() == 'propertie.create') || (Route::currentRouteName() == 'category.create') || (Route::currentRouteName() == 'category.edit') || (Route::currentRouteName() == 'propertie.edit') ? 'menu-open' : '' }}">
                <a href="#" class="nav-link {{ Route::currentRouteName() == 'country.index'|| Route::currentRouteName() == 'propertie.index' || Route::currentRouteName() == 'category.index' || Route::currentRouteName() == 'state.index' ? 'active' : '' }}">
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
                <a href="{{route('languages.index')}}" class="nav-link {{ Route::currentRouteName() == 'languages.index' ? 'active' : '' }}">
                <i class="nav-icon fas fa-language" aria-hidden="true"></i>
                <p>Language</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('labels.index')}}" class="nav-link {{ Route::currentRouteName() == 'labels.index' ? 'active' : '' }}">
                    <i class="fa fa-tag"></i>
                    <p>Labels</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('theme.index')}}" class="nav-link {{ Route::currentRouteName() == 'theme.index' ? 'active' : '' }}">
                    <i class="fab fa-themeisle"></i>
                    <p>Layout</p>
                </a>
            </li>
        </ul>
    </nav>
  </div>
</aside>

