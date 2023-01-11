@php
    $data = footerData();
    $flogo = isset($data['flogo']) ? $data['flogo'] : '';
    // dd($data);
@endphp

<footer class="footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-md-6 mb-md-4">
                <div class="logo_wigets">
                    <div class="footer_logo mb-3">
                        <img src="{{ asset('public/image/'.$flogo)}}" class="w-100"/>
                    </div>
                    <p>{{ isset($data['description']) ? $data['description'] : '' }}</p>
                    <div class="footer_social">
                        <ul>
                            <li>
                                <a href="{{ isset($data['twitter']) ? $data['twitter'] : '#' }}" target="_blank"><i class="fa-brands fa-twitter"></i></a>
                            </li>
                            <li>
                                <a href="{{ isset($data['facebook']) ? $data['facebook'] : '#' }}" target="_blank"><i class="fa-brands fa-facebook-f"></i></a>
                            </li>
                            <li>
                                <a href="{{ isset($data['instagram']) ? $data['instagram'] : '#' }}" target="_blank"><i class="fa-brands fa-instagram"></i></a>
                            </li>
                            <li>
                                <a href="{{ isset($data['linkedin']) ? $data['linkedin'] : '#' }}" target="_blank"><i class="fa-brands fa-linkedin-in"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-6 mb-md-4">
                <div class="footer_link">
                    <h2>Quick Links</h2>
                    <ul>
                        <li>
                            <a href="#">Property List</a>
                        </li>
                        <li>
                            <a href="#">Our Agent</a>
                        </li>
                        <li>
                            <a href="#">Contact Us</a>
                        </li>
                        <li>
                            <a href="#">Our Blog</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="find_us">
                    <h2>Find Us</h2>
                    <ul>
                        <li>
                            <a href="{{ isset($data['iosapplink']) ? $data['iosapplink'] : '#' }}" target="_blank"><img src="{{ asset('public/assets/images/playstore.png')}}" class="w-100"/></a>
                        </li>
                        <li>
                           <a href="{{ isset($data['androidapplink']) ? $data['androidapplink'] : '#' }}" target="_blank"><img src="{{ asset('public/assets/images/applestore.png') }}" class="w-100"/></a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="footer_contact">
                    <h2>Contact Us</h2>
                    <ul>
                        <li>
                            <span><i class="fa-solid fa-location-crosshairs"></i></span>
                            <address>{{ isset($data['address']) ? $data['address'] : '' }}</address>
                        </li>
                        <li>
                            <span><i class="fa-solid fa-phone"></i></span>
                            <p>{{ isset($data['mobile']) ? $data['mobile'] : '' }}</p>
                        </li>
                        <li>
                            <span><i class="fa-solid fa-envelope"></i></span>
                            <a href="mailto:{{ isset($data['email']) ? $data['email'] : '#' }}"><p>{{ isset($data['email']) ? $data['email'] : '' }}</p></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>