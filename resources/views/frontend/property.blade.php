@extends('frontend.common.layout')

@section('content')
    <section class="property-main page-title-bg">
        <div class="container">
            <div class="page-title">
                <h2>{{__('PROPERTIES PAGE')}}</h2>
                <ol class="breadcrumb">
                    <li><a href="#">{{__('HOME')}}</a></li>
                    <li class="active"><a href="">{{__('PROPERTY')}}</a></li>
                </ol>
            </div>
        </div>
    </section>
    <section class="pro-details-main">
        <div class="container">
            <div class="row" style="justify-content: center;">
                <div class="col-lg-3 li-page">
                    <div class="listing-check">
                        <div class="list-op">
                            {{-- <li><a class="dropdown-item" href="#">{{ __('labels.property_list') }}</a> --}}
                            <h3>{{ __('Other Options') }}</h3>
                            <div class="list-inr-op">
                                @forelse ($category as $categoryName)
                                    <div class="custom-control custom-checkbox op-inr">
                                        <input name="category" onclick="getPricewiseProperty(this);" type="radio" value="{{$categoryName->id}}" class="custom-control-input" id="customRadio04">
                                        <label class="custom-control-label" for="customCheck04">{{__($categoryName->name)}}</label>
                                    </div>
                                @empty
                                    <div class="post-wrap col-lg-12 col-md-12 text-center">
                                        <span class="text-secondary">{{__('labels.empty_properties')}}</span>
                                    </div>
                                @endforelse
                            </div>
                            <button class="btn btn-primary" onclick="clearFilter('category')">{{ __('Clear') }}</button>
                        </div>
                        <div class="list-op">
                            <h3>{{ __('Other Options') }}</h3>
                            <div class="list-inr-op">
                                <div class="custom-control custom-checkbox op-inr">
                                    <input name="propertyType" onclick="getPricewiseProperty(this);" value="" type="radio" class="custom-control-input customCheck05" checked/>
                                    <label class="custom-control-label" for="customCheck05">{{ __('For Both') }}</label>
                                </div>
                                <div class="custom-control custom-checkbox op-inr">
                                    <input name="propertyType" onclick="getPricewiseProperty(this);" value="1" type="radio" class="custom-control-input customCheck05">
                                    <label class="custom-control-label" for="customCheck05">{{ __('For Rent') }}</label>
                                </div>
                                <div class="custom-control custom-checkbox op-inr">
                                    <input name="propertyType" onclick="getPricewiseProperty(this);" value="2" type="radio" class="custom-control-input customCheck05">
                                    <label class="custom-control-label" for="customCheck05">{{ __('For Sales') }}</label>
                                </div>
                            </div>
                        </div>
                        <div class="pri-range">
                            <h3>{{ __('Price') }}</h3>
                            <form>
                                <div class="form-group">
                                    <label for="formControlRange"></label>
                                    <span style="font-weight: bold;"></span>
                                    <input style="border: none;background:none; font-weight: bold;" type="text"
                                        id="textInput" value="{{$propertyMaxPrice}}">
                                    <input type="range" min="{{ $propertyMinPrice }}"
                                        max="{{ $propertyMaxPrice }}" name="priceRange" value="{{ $propertyMaxPrice }}"
                                        onchange="getPricewiseProperty(this.value)" class="form-control-range"
                                        id="formControlRange">
                                </div>
                            </form>
                        </div>
                        <div class="bulid-info">
                            <h3>{{ __('Number Of BedRooms') }}</h3>
                            <div class="nu-inr">
                                <input type="hidden" class="badge nu-inr-st bedroom" value="0" />
                                <p style="color:black" class="badge nu-inr-st bedroom">1</p>
                                <p style="color:black" class="badge nu-inr-st bedroom">2</p>
                                <p style="color:black" class="badge nu-inr-st bedroom">3</p>
                                <p style="color:black" class="badge nu-inr-st bedroom">4</p>
                                <p style="color:black" class="badge nu-inr-st bedroom">5+</p>
                            </div>
                            <button class="btn btn-primary" onclick="clearFilter('bedroom')">{{ __('Clear') }}</button>
                        </div>
                        <div class="list-op">
                            <h3>{{ __('Other Options') }}</h3>
                            <div class="list-inr-op">
                                <div class="custom-control custom-checkbox op-inr">
                                    <input name="property_condition" onclick="getPricewiseProperty(this);" value="1" type="radio" class="custom-control-input" id="customRadio1">
                                    <label class="custom-control-label" for="customCheck1">{{ __('Used') }}</label>
                                </div>
                                <div class="custom-control custom-checkbox op-inr">
                                    <input name="property_condition" onclick="getPricewiseProperty(this);" value="2" type="radio" class="custom-control-input" id="customRadio2">
                                    <label class="custom-control-label" for="customCheck2">{{ __('New') }}</label>
                                </div>
                                <div class="custom-control custom-checkbox op-inr">
                                    <input name="property_condition" onclick="getPricewiseProperty(this);" value="3" type="radio" class="custom-control-input" id="customRadio3">
                                    <label class="custom-control-label" for="customCheck3">{{ __('Furnished') }}</label>
                                </div>
                                <div class="custom-control custom-checkbox op-inr">
                                    <input name="property_condition" onclick="getPricewiseProperty(this);" value="4" type="radio" class="custom-control-input" id="customRadio4">
                                    <label class="custom-control-label" for="customCheck4">{{ __('Unfurnished') }}</label>
                                </div>
                                <button class="btn btn-primary" onclick="clearFilter('property_condition')">{{ __('Clear') }}</button>
                            </div>
                        </div>
                        <div class="list-op">
                            <h3>{{ __('Floor') }}</h3>
                            <div class="list-inr-op">
                                <div class="custom-control custom-checkbox op-inr">
                                    <input name="floor" type="radio" value="1" onclick="getPricewiseProperty(this);" class="custom-control-input" id="customCheck6">
                                    <label class="custom-control-label" for="customCheck6">{{ __('Settlement') }}</label>
                                </div>
                                <div class="custom-control custom-checkbox op-inr">
                                    <input name="floor" type="radio" value="2" onclick="getPricewiseProperty(this);"  class="custom-control-input" id="customCheck7">
                                    <label class="custom-control-label" for="customCheck7">{{ __('Semi Ground') }}</label>
                                </div>
                                <div class="custom-control custom-checkbox op-inr">
                                    <input name="floor" type="radio" value="3" onclick="getPricewiseProperty(this);" class="custom-control-input" id="customCheck8">
                                    <label class="custom-control-label" for="customCheck8">{{ __('My Land') }}</label>
                                </div>
                                <div class="custom-control custom-checkbox op-inr">
                                    <input name="floor" type="radio" value="4" onclick="getPricewiseProperty(this);" class="custom-control-input" id="customCheck9">
                                    <label class="custom-control-label" for="customCheck9">{{ __('The First') }}</label>
                                </div>
                                <div class="custom-control custom-checkbox op-inr">
                                    <input name="floor" type="radio" value="5" onclick="getPricewiseProperty(this);" class="custom-control-input" id="customCheck10">
                                    <label class="custom-control-label" for="customCheck10">{{__('The Second')}}</label>
                                </div>
                                <div class="custom-control custom-checkbox op-inr">
                                    <input name="floor" type="radio" value="6" onclick="getPricewiseProperty(this);" class="custom-control-input" id="customCheck11">
                                    <label class="custom-control-label" for="customCheck11">{{__('The Third')}}</label>
                                </div>
                                <div class="custom-control custom-checkbox op-inr">
                                    <input name="floor" type="radio" value="7" onclick="getPricewiseProperty(this);" class="custom-control-input" id="customCheck12">
                                    <label class="custom-control-label" for="customCheck12">{{__('Fourth +')}}</label>
                                </div>
                            </div>
                            <button class="btn btn-primary" onclick="clearFilter('floor')">{{__('Clear')}}</button>
                        </div>
                        <div class="bulid-info">
                            <h3>{{ __('Building Area') }}</h3>
                            <form>
                                <div class="form-group">
                                    <label for="formControlRange"></label>
                                    <input type="range" class="form-control-range" id="formControlRange">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-9 filter-message">
                    <div class="post-wrap col-lg-12 col-md-12 text-center">
                        <span class="text-secondary">{{__('Empty Properties')}}</span>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="row post-grid">
                        @forelse ($property as $showProperty)
                            <div class="post-wrap col-lg-6 col-md-6" onscroll="getPricewiseProperty()" id="scroll">
                                <div class="post-item card ">
                                    <a href="{{ route('propertyDetails',$showProperty->id) }}" class="img-inr">
                                        <img src="{{ url('MainImage/'.$showProperty->image) }}" class="img-fluid card-img "alt="">
                                        <div class="img-pri-abo">
                                            <h3><i class="fa-solid fa-rupee-sign"></i> <strong>
                                            {{ $showProperty->price }}</strong></h3>
                                        </div>
                                        <div class="re-img">
                                            <div class="re-text">
                                                <span>
                                                    {{ $showProperty['property_type'] == 1 ? __('For Rent') : __('For Sales') }}
                                                </span>
                                            </div>
                                        </div>
                                    </a>
                                    <div class="card-body jo-card">
                                        <div class="jo-card-bor">
                                            <h3 class="card-title mb-1"><a href="#">{{ $showProperty->name }}</a>
                                            </h3>
                                            <p class="post-item-text font-weight-light font-sm">
                                                {{ $showProperty->hasOneCountry['name'] }},
                                                {{ $showProperty->haseOneState['name'] }}, {{ $showProperty->address }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                {{$showProperty->content}}
                            </div>
                        @empty
                            <div class="post-wrap col-lg-12 col-md-12 text-center">
                                <span class="text-secondary">{{__('labels.empty_properties')}}</span>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
            <div class="row" style="justify-content: center;">
                <div class="col-12 ajax-load text-center d-none">
                    <p><img src="{{asset('img/loader.png')}}">Load More Post...</p>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('js')
    <script>
        var limit = 4;
        var start = 0;
        var page = 1;
        var total = {{ $totalRecords }};
        var recent = 0;
        var bedroom = 0;
        $('.filter-message').hide();

        // Infinite Scrolling
        $(window).scroll(function() {
            if ($(window).scrollTop() + $(window).height() >= $(document).height() && total != recent) {
                page++;
                limit+=4;
                getPricewiseProperty("scroll");
            }
        });
        // Selected Filter Cleare
        function clearFilter(type="") {
            $('input[name="'+type+'"]:checked').prop("checked",false);

            var bedrooms = document.getElementsByClassName("bedroom");
            bedroom = $(".bedroom").val(null);

            getPricewiseProperty();
        }
        // Main Function
        function getPricewiseProperty(type="") {

            if(type != "scroll")
            {
                page = 1;
                limit = 4;
                $('.post-grid').animate({scrollTop: '0px'}, 1000);
            }

            $('.ajax-load').removeClass('d-none')

            // get value using id, class, name:
            var priceVal = $('#formControlRange').val();
            var localData = $('.post-grid').val();
            var rentSelsPrice = $('input[name="propertyType"]:checked').val();
            var propertyCondition = $('input[name="property_condition"]:checked').val();
            var propertyFloor = $('input[name="floor"]:checked').val();
            var category = $('input[name="category"]:checked').val();
            // set Two Zero after Price using toFixed(2) method:
            var selectPrice = parseFloat($('input[name="priceRange"]').val());
            var afterTwoZero = selectPrice.toFixed(2);
            var ajaxId = 1;
            // set value in inpute box (price):
            document.getElementById('textInput').value = afterTwoZero;

            $.ajax({
                type: "POST",
                url: "/getpropertybyprice",
                dataType: 'json',
                data: {
                    "_token": "{{ csrf_token() }}",
                    "price": priceVal,
                    "localData": localData,
                    "ajaxId": ajaxId,
                    "page":page,
                    "rentSelsPrice": rentSelsPrice,
                    "category": category,
                    "propertyCondition": propertyCondition,
                    "propertyFloor": propertyFloor,
                    "selectPrice": selectPrice,
                    "limit": limit,
                    "start": start,
                    "bedroom": bedroom
                },
                dataType: 'json',
                success: function(res) {
                    if (res != "") {
                        recent = res.records;
                        total = res.total;
                        $('.ajax-load').addClass('d-none')
                        $('.post-grid').html('');
                        $('.post-grid').append(res.html);
                        if (res.total == 0) {
                            $('.filter-message').show();
                        } else {
                            $('.filter-message').hide();
                        }
                        jQuery("#page-pagination").html(res.homePagination)
                    }
                }
            });
        }
        $(document).ready(function(){
            $(".bedroom").click(function() {
                bedroom = $(this).text();
                $(".bedroom").removeClass('active');
                $(this).addClass('active');
                getPricewiseProperty();
            });
        });
    </script>

@endsection
