@extends('frontend.common.layout')

@section('content')
@section('js')

<section class="property-main page-title-bg">
    <div class="container">
        <div class="page-title">
            <h2>{{$propertyDetails->name}}</h2>
            <ol class="breadcrumb">
                <li><a href="#">{{__('HOME')}}</a></li>
                {{-- <li class="active"><a href="">{{__('PROPERTIES DETAILS')}}</a></li> --}}
            </ol>
        </div>
    </div>
</section>

<body class="aa-price-range">
    <section class="property-details-main">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <div class="proprety_img">
                        <img src="{{ url('MainImage/'.$propertyDetails->image) }}" class="w-100 left-img"/>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="proprety_img">
                        @php
                            $muliImg = explode(" ,",$propertyDetails->multiImage);
                        @endphp
                        @foreach ($muliImg as $images)
                            <img src="{{ url('/multiImage/'.$images) }}" class="w-100 side-img"/>
                            @if ($loop->iteration == 3)
                                @break;
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="about-property">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <div class="property-price">
                        <div class="property-price-info">
                            <ul class="price-ul">
                                <li>
                                    <span class="category">{{$propertyDetails->hasOneCategory['name']}}</span>
                                </li>
                                <li>
                                    <span class="bed">{{$propertyDetails->bedroom}} Bed</span>
                                </li>
                                <li>
                                    <span class="bath">{{$propertyDetails->bath}} Bath</span>
                                </li>
                                <li>
                                    <span class="garage">{{$propertyDetails->garage}} Garage</span>
                                </li>
                                {{-- <li>
                                    <span class="sqft">730 sqft</span>
                                </li> --}}
                            </ul>
                            <h2>{{$propertyDetails->name}}</h2>
                            {{-- <label><i class="fa-solid fa-location-dot"></i> 778 Country St. Panama City, FL</label> --}}
                            <label><i class="fa-solid fa-location-dot"></i> {{$propertyDetails->address}}</label>
                        </div>
                        <div class="property_share_lists">
                            <ul class="share_list">
                                <li>
                                    <a href="#"><i class="fa-solid fa-bookmark"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="fa-solid fa-share"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="property-info">
                        <h3>{{__('About Property')}}</h3>
                        <p>{!!$propertyDetails->description!!}</p>
                    </div>
                    <div class="property-advance-fea">
                        <h3>{{__('Advance Features')}}</h3>
                        <ul class="feature_ul row">
                            <li class="col-lg-4 col-md-6">
                                <i class="fa-solid fa-bed"></i>
                                <span>{{$propertyDetails->bedroom}} Bedrooms</span>
                            </li>
                            <li class="col-lg-4 col-md-6">
                                <i class="fa-solid fa-building"></i>
                                <span>{{$propertyDetails->floor}} Floor</span>
                            </li>
                            <li class="col-lg-4 col-md-6">
                                <i class="fa-solid fa-kitchen-set"></i>
                                <span>{{$propertyDetails->kitchen}} Kitchen</span>
                            </li>
                            <li class="col-lg-4 col-md-6">
                                <i class="fa-solid fa-car"></i>
                                <span>{{$propertyDetails->garage}} Car Parking</span>
                            </li>
                            <li class="col-lg-4 col-md-6">
                                <i class="fa-solid fa-building"></i>
                                <span>{{$propertyDetails->build_year}}</span>
                            </li>
                            <li class="col-lg-4 col-md-6">
                                <i class="fa-brands fa-uncharted"></i>
                                <span>730 Sqft</span>
                            </li>
                        </ul>
                    </div>
                    {{-- <div class="property-reviwe">
                        <h3>{{__('Reviwes')}}</h3>
                        <ul class="reviwe_ul">
                            <li>
                                <div class="reviwe_info">
                                    <div class="review_img">
                                        <img src="assets/images/user1.jpg">
                                    </div>
                                    <div class="reviwe_details">
                                        <h4>Agatha J. John</h4>
                                        <span>29TH JULY 2021</span>
                                        <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim laborumab. perspiciatis unde omnis iste natus error.</p>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="reviwe_info">
                                    <div class="review_img">
                                        <img src="assets/images/user2.jpg">
                                    </div>
                                    <div class="reviwe_details">
                                        <h4>Dominic Toretto</h4>
                                        <span>29TH JULY 2021</span>
                                        <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim laborumab. perspiciatis unde omnis iste natus error.</p>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="reviwe_info">
                                    <div class="review_img">
                                        <img src="assets/images/user3.jpg">
                                    </div>
                                    <div class="reviwe_details">
                                        <h4>Tom Holland</h4>
                                        <span>29TH JULY 2021</span>
                                        <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim laborumab. perspiciatis unde omnis iste natus error.</p>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        <div class="text-center">
                            <a href="#" class="reviwe-bt">8 Reviwes</a>
                        </div>
                    </div> --}}
                    {{-- <div class="reviwe-box">
                        <h3>{{__('Write review')}}</h3>
                        <form action="">
                            {{-- @csrf --}}
                            {{-- <div class="row">
                                <div class="col-md-6">
                                    <label for="name" class="form-label">{{__('Name')}}</label>
                                    <input type="text" class="form-control" id="name">
                                </div>
                                <div class="col-md-6">
                                    <label for="email" class="form-label">{{__('Email')}}</label>
                                    <input type="email" class="form-control" id="email">
                                </div>
                                <div class="col-md-12">
                                    <label for="review" class="form-label">{{__('Messages')}}</label>
                                    <textarea class="form-control" id="review" rows="3"></textarea>
                                </div>
                                <div class="col-md-12">
                                    <button class="btn submit-review-bt" type="submit">{{__('Submit Review')}}</button>
                                </div>
                            </div> --}}
                        {{-- </form> --}}
                    {{-- </div> --}}
                </div>
            <div class="col-md-5">
            <div class="agent-info">
                <div class="agent-img">
                    <img src="{{ url('/UserImage/'.$propertyDetails->hasOneUser['image']) }}"/>
                </div>
                <div class="agent-info-inr">
                    <h3>{{$propertyDetails->hasOneUser['name']}}</h3>
                    <p><i class="fa-solid fa-circle-check"></i> Approved</p>
                </div>
                <div class="agent-contact">
                    <button class="btn"><i class="fa-solid fa-message pe-2"></i> {{__('Message')}}</button>
                    <p><i class="fa-solid fa-phone"></i>+91 {{$propertyDetails->hasOneUser['mobile']}}</p>
                </div>
            </div>
        </div>
    </section>
    <!-- jQuery library -->
    <script>
      new WOW().init();
    </script>
</body>

@endsection
@endsection
