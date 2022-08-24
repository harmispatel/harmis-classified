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
                    <select class="form-control changeLang mr-3">
                        <option value="en" {{ session()->get('locale') == 'en' ? 'selected' : '' }}>English</option>
                        <option value="fr" {{ session()->get('locale') == 'fr' ? 'selected' : '' }}>French</option>
                    </select>

                    @if (Auth::check())
                        <form action="{{ route('userLogout') }}" method="POST">
                            @csrf
                            <button style="border: none;background:none;" name="submit">{{ __('labels.logout') }}</button>
                        </form>
                    @else
                        <a href="/registerform" class="nav-link re-nav-link">{{ __('labels.register') }}</a>
                        <a href="{{ route('userLoginForm') }}" class="nav-link">{{ __('labels.login') }}</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="header-main">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container">
                <a class="navbar-brand" href="#">
                    <img src="{{ asset('image/logo.png') }}" />
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="#">{{ __('labels.home') }}</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                {{ __('labels.property') }}
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item active" href="{{ route('showProperty') }}">{{ __('labels.properties') }}</a>
                                </li>
                                <li><a class="dropdown-item" href="#">Property List</a></li>
                                @auth
                                @php
                                $role = Auth::user();
                                $aroleId = $role['role_id'];
                                @endphp
                                    @if ($aroleId == 9 )
                                        <li><a class="dropdown-item" href="{{ route ('create')}}">Add Property</a></li>
                                    @endif
                                @endauth
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">{{ __('labels.about_us') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">{{ __('labels.gallery') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">{{ __('labels.contact_us') }}</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</header>

<script
    src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
    crossorigin="anonymous"
></script>
<script>
    var url = "{{ route('changeLang') }}";

    $(".changeLang").change(function(){
        window.location.href = url + "?lang="+ $(this).val();
    });
</script>
