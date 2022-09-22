    @php
        $multiLang = getLang();
        $curLang = session()->get('lang_code');
        // echo '<pre>';
        // print_r($curLang);
        // exit;
    @endphp
    <header class="header wow animate__fadeInDown" data-wow-duration="1s" id="header">
        <div class="header-top" onload="getLanguage()">
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
                        <select  onchange="setLenguage();" id="language" class="form-control changeLang mr-3">
                            @foreach ($multiLang as $lang)
                                <option class="langVal" value="{{$lang->code}}" {{ $curLang == $lang->code ? 'selected' : '' }}>{{$lang->name}}</option>
                            @endforeach
                            {{-- <option class="langVal" value="en" {{ session()->get('locale') == 'en' ? 'selected' : '' }}>English</option>
                            <option class="langVal" value="fr" {{ session()->get('locale') == 'fr' ? 'selected' : '' }}>French</option>
                            <option class="langVal" value="ar" {{ session()->get('locale') == 'ar' ? 'selected' : '' }}>Arabic</option>
                            <option class="langVal" value="ge" {{ session()->get('locale') == 'ge' ? 'selected' : '' }}>German</option> --}}
                        </select>

                        @if (Auth::check())
                            <form action="{{ route('userLogout') }}" method="POST">
                                @csrf
                                <button style="border: none;background:none;" name="submit">{{ __('Logout') }}</button>
                            </form>
                        @else
                            <a href="/registerform" class="nav-link re-nav-link">{{ __('REGISTER') }}</a>
                            <a href="{{ route('userLoginForm') }}" class="nav-link">{{ __('Login') }}</a>
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
                                <a class="nav-link" aria-current="page" href="/">{{ __('HOME') }}</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    {{ __('PROPERTY') }}
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    {{-- <li><a class="dropdown-item" href="{{ route('showProperty') }}">{{ __('Properties') }}</a></li> --}}
                                    <li><a class="dropdown-item" href="{{ route('property-details.index') }}">{{ __('Property List') }}</a></li>
                                    @auth
                                    @php
                                    $role = Auth::user();
                                    $roleId = $role['role_id'];
                                    @endphp
                                        @if ($roleId == 9 )
                                            <li><a class="dropdown-item" href="{{ route ('create')}}">Add Property</a></li>
                                        @endif
                                    @endauth
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">{{ __('ABOUT US') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">{{ __('GALLERY') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">{{ __('CONTACT US') }}</a>
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
    crossorigin="anonymous">
</script>
<script>
    // var url = "{{ route('changeLang') }}";

    // $(".changeLang").change(function(){
    //     window.location.href = url + "?lang="+ $(this).val();
    // });

function setLenguage()
{
    var lang = $('#language :selected').val();
    $.ajax({
            type: "GET",
            url: "{{url('set-language')}}",
            data: {
                'lang': lang,
            },
            dataType: 'json',

            success: function(res) {

                if(res.success == 1)
                {
                    location.reload();
                }
            }
        });


}
//    $(document).ready(function () {
//         var lang = $('#lang').val();
//         $.ajax({
//             type: "GET",
//             url: "{{route('get_languages')}}",
//             dataType: 'json',

//             success: function(res) {
//                 $('#language').append(res.lang);
//             }
//         });
//    });
</script>
