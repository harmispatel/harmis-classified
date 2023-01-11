{{--
    THIS IS PROPERTIES LIST PAGE FOR FRONTSIDE/USERSIDE
    ----------------------------------------------------------------------------------------------
    theme_one.blade.php
    It Displayed All Product Frontside/userside Home Page.
    ----------------------------------------------------------------------------------------------
--}}

@extends('frontend.common.layout')
@php
    $property_agents = isset($property['agents']) ? $property['agents'] : [];
    $blogs = isset($property['blogs']) ? $property['blogs'] : [];

    // Import Carbon
    use Carbon\Carbon;
@endphp
@section('content')
    <!-- slider-sectiom  -->
    <section class="home-slide wow animate__fadeInUp" data-wow-duration="1s">
        <div class="swiper">
            <div class="swiper-wrapper">
                @foreach ($property['sliders'] as $slider)
                    <div class="swiper-slide">
                        <strong class="title text-uppercase">{{ $slider->title }}</strong>
                        <strong class="sub-title text-capitalize">{{ $slider->description }}</strong>
                        <img class="img-fluid" style="background-image: url('{{asset('public/slider_image/'.$slider->image)}}')" />
                    </div>                    
                @endforeach
            </div>
            <div class="swiper-button-next"><i class="fas fa-arrow-right"></i></div>
            <div class="swiper-button-prev"><i class="fas fa-arrow-left"></i></div>
        </div>
    </section>


    <!-- Featured Real Estate  Start -->
    <section class="property_sec" id="test">
        <div class="container">
            <div class="section_title">
                <span>Featured</span>
                <h2>Recently New Added</h2>
            </div>
            <div class="row">
                @forelse ($property['resentPropertys'] as $resentProperty)
                    <div class="col-lg-4 col-md-6">
                        <a href="{{ route("propertyDetails",$resentProperty->slug) }}" class="img-inr">
                            <div class="listing_img">
                                {{-- <img src="{{ asset('public/multiImage/'.$resentProperty->image)}}" class="img-fluid " alt=""> --}}
                                <img src="{{ (file_exists(public_path('multiImage/'.$resentProperty->image)) && !empty($resentProperty->image)) ? asset('public/multiImage/'.$resentProperty->image) : asset('public/multiImage/pronotfound.jpg') }}" class="img-fluid " alt="">
                            </div>
                            <div class="listing_content">
                                <div class="listing_title">
                                    <h2>{{ $resentProperty->name }}</h2>
                                    <p>{{ substr($resentProperty->address,0,50) }}...</p>
                                </div>
                                <div class="listing_fea">
                                    <ul>
                                        <li class="mb-2">
                                            <span class=""><i class="fa-solid fa-object-ungroup"></i></span>
                                            <h4> {{$resentProperty->building_area}} Square foot</h4>
                                        </li>
                                        <li class="mb-2">
                                            <span class=""><i class="fa-solid fa-bed "></i></span>
                                            <h4>{{ $resentProperty->bedroom }} Bedrooms</h4>
                                        </li>
                                        <li>
                                            <span class=""><i class="fa-solid fa-bath"></i></span>
                                            <h4>{{$resentProperty->bath}} Bathrooms</h4>
                                        </li>
                                        <li>
                                            <span class=""><i class="fa-solid fa-car"></i></span>
                                            <h4>{{$resentProperty->garage}} Garages</h4>
                                        </li>
                                    </ul>
                                </div>
                                <div class="list_prize"> $ {{ $resentProperty->price }}</div>
                            </div>
                        </a>
                    </div>
                @empty
                    <div class="text-center">
                        <p>Property Not Available</p>
                    </div>
                @endforelse
            </div>
            <div class="view-bt text-center">
                <a href="{{ route('property-lists') }}" class="btn view-bt-inr">View More</a>
            </div>
        </div>
    </section>
    <!-- Featured Real Estate End -->

    @forelse ($property['data'] as $key => $item)
        <section class="property_sec property_sec_bg">
            <div class="container">
                <div class="section_title">
                    <h2>{{ $key }} for Sale</h2>
                </div>
                <div class="row">
                    @forelse ($item[0] as $property)
                        @forelse ($property as $data)
                            @if ($data['property_type'] == 2)
                                <div class="col-lg-4 col-md-6">
                                    <a href="{{ route("propertyDetails",$data['slug']) }}" class="img-inr">
                                        <div class="listing_img">
                                            <img src="{{ (file_exists(public_path('multiImage/'.$data['image'])) && !empty($data['image'])) ? asset('public/multiImage/'.$data['image']) : asset('public/multiImage/pronotfound.jpg') }}" class="img-fluid " alt="">
                                        </div>
                                        <div class="listing_content">
                                            <div class="listing_title">
                                                <h2>{{ $data['name'] }}</h2>
                                                <p>{{ substr($data['address'],0,50) }}...</p>
                                            </div>
                                            <div class="listing_fea">
                                                <ul>
                                                    <li class="mb-2">
                                                        <span class=""><i class="fa-solid fa-object-ungroup"></i></span>
                                                        <h4> {{$data['building_area']}} Square foot</h4>
                                                    </li>
                                                    <li class="mb-2">
                                                        <span class=""><i class="fa-solid fa-bed "></i></span>
                                                        <h4>{{ $data['bedroom'] }} Bedrooms</h4>
                                                    </li>
                                                    <li>
                                                        <span class=""><i class="fa-solid fa-bath"></i></span>
                                                        <h4>{{$data['bath']}} Bathrooms</h4>
                                                    </li>
                                                    <li>
                                                        <span class=""><i class="fa-solid fa-car"></i></span>
                                                        <h4>{{$data['garage']}} Garages</h4>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="list_prize"> $ {{ $data['price'] }}</div>
                                        </div>
                                    </a>
                                </div>
                            @endif
                        @empty
                            <h1>Property Not Available</h1>
                        @endforelse
                    @empty
                        <div class="text-center">
                            <p>Property Not Available</p>
                        </div>
                    @endforelse
                </div>
                <div class="view-bt text-center">
                    <a href="{{ route('property-lists') }}" class="btn view-bt-inr">View More</a>
                </div>
            </div>
        </section>
        <section class="property_sec">
            <div class="container">
                <div class="section_title">
                    <h2>{{ $key }} for Rent</h2>
                </div>
                <div class="row">
                    @forelse ($item[0] as $property)
                        @forelse ($property as $data)
                            @if ($data['property_type'] == 1)
                                <div class="col-lg-4 col-md-6">
                                    <a href="{{ route("propertyDetails",$data['slug']) }}" class="img-inr">
                                        <div class="listing_img">
                                            {{-- <img src="{{ asset('public/multiImage/'.$data['image'])}}" class="img-fluid " alt=""> --}}
                                            <img src="{{ (file_exists(public_path('multiImage/'.$data['image'])) && !empty($data['image'])) ? asset('public/multiImage/'.$data['image']) : asset('public/multiImage/pronotfound.jpg') }}" class="img-fluid " alt="">
                                        </div>
                                        <div class="listing_content">
                                            <div class="listing_title">
                                                <h2>{{ $data['name'] }}</h2>
                                                <p>{{ substr($data['address'],0,50) }}...</p>
                                            </div>
                                            <div class="listing_fea">
                                                <ul>
                                                    <li class="mb-2">
                                                        <span class=""><i class="fa-solid fa-object-ungroup"></i></span>
                                                        <h4> {{$data['building_area']}} Square foot</h4>
                                                    </li>
                                                    <li class="mb-2">
                                                        <span class=""><i class="fa-solid fa-bed "></i></span>
                                                        <h4>{{ $data['bedroom'] }} Bedrooms</h4>
                                                    </li>
                                                    <li>
                                                        <span class=""><i class="fa-solid fa-bath"></i></span>
                                                        <h4>{{$data['bath']}} Bathrooms</h4>
                                                    </li>
                                                    <li>
                                                        <span class=""><i class="fa-solid fa-car"></i></span>
                                                        <h4>{{$data['garage']}} Garages</h4>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="list_prize"> $ {{ $data['price'] }}</div>
                                        </div>
                                    </a>
                                </div>
                            @endif
                        @empty
                            <h1>Property Not Available</h1>
                        @endforelse
                    @empty
                        <div class="text-center">
                            <p>Property Not Available</p>
                        </div>
                    @endforelse
                </div>
                <div class="view-bt text-center">
                    <a href="{{ route('property-lists') }}" class="btn view-bt-inr">View More</a>
                </div>
            </div>
        </section>
    @empty

    @endforelse
    <section class="property_sec property_sec_bg agent-slider">
        <div class="container">
            <div class="section_title">
                <span>{{__('Agent')}}</span>
                <h2>{{__('Meet Our Agent')}}</h2>
            </div>
            <div class="agent-swiper position-relative">
                <div class="swiper">
                    <div class="swiper-wrapper">
                        @if (count($property_agents) > 0)                     
                            @foreach ($property_agents as $key => $agent)
                                <a class="swiper-slide" href="{{ route('agentdetail',Crypt::encrypt($agent->id)) }}" >
                                    <div class="agent_main">
                                        <div class="agent_img">
                                            <img src="{{ (file_exists(public_path('userimage/'.$agent->image)) && !empty($agent->image)) ? asset('public/userimage/'.$agent->image) : asset('public/multiImage/pronotfound.jpg') }}" class="img-fluid"/>
                                        </div>
                                        <div class="agent_info_inr">
                                            <h2>{{ $agent->name }}</h2>
                                        </div>
                                    </div>
                                </a>
                            @endforeach
                        @endif
                    </div>
                </div>
                <div class="swiper-pagination"></div>
            </div>
            <div class="view-bt text-center">
                <a href="{{ route('allagent') }}" class="btn view-bt-inr">View More</a>
            </div>
        </div>
    </section>

    @if (count($blogs) > 0)
        <section class="property_sec blog_sec">
            <div class="container">
                <div class="section_title">
                    <span>Blog</span>
                    <h2>Our Property Blog</h2>
                </div>
                <div class="row">
                    @foreach ($blogs as $blog)
                        <div class="col-md-6 col-lg-4 mb-md-3">
                            <div class="blog_post">
                                <a href="{{ route('showblog',Crypt::encrypt($blog->id)) }}">
                                    <div class="blog_post_img">
                                        <img src="{{ (file_exists(public_path('blog_image/'.$blog->image)) && !empty($blog->image)) ? asset('public/blog_image/'.$blog->image) : asset('public/blog_image/imgnotfound.png') }}" class="w-100"/>
                                    </div>
                                    <div class="blog_info">
                                        <h2>{{ $blog->title }}</h2>
                                        <div class="blog_info_inr">
                                            <div class="blog_date">  
                                                <label><i class="fa-solid fa-calendar-days"></i> <span>{{Carbon::parse($blog['created_at'])->diffForHumans()}}</span></label>
                                            </div>
                                            <div class="blog_view">
                                                <label><i class="fa-solid fa-eye"></i><span>{{ $blog->view }}</span> </label>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="view-bt text-center">
                    <a href="{{ url('allblogs') }}" class="btn view-bt-inr">View More</a>
                </div>
            </div>
        </section>
    @endif

    <section class="app_section">
        <div class="container">
            <div class="section_title">
                <span>App</span>
                <h2>Download Our App</h2>
            </div>
            <div class="row align-itmes-center">
                <div class="col-md-6">
                    <div class="application_img">
                        <img/>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="application_info">
                        <h3>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dummy text of the printing and typesetting industry.</h3>
                        <div class="app_img">
                            <a href="#"><img src="{{ asset('public/assets/images/applestore.png')}}" class="w-100" /></a>
                            <a href="#"><img src="{{ asset('public/assets/images/playstore.png')}}" class="w-100" /></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

