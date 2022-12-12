{{--
    THIS IS PROPERTIES LIST PAGE FOR FRONTSIDE/USERSIDE
    ----------------------------------------------------------------------------------------------
    property.blade.php
    It Displayed All Product Frontside/userside Home Page.
    ----------------------------------------------------------------------------------------------
--}}

@extends('frontend.common.layout')

@section('content')
    <section class="property-main page-title-bg">
        <div class="container">
            <div class="filter_btn">
                <div class="filter_btn_group" role="group" aria-label="Basic example">
                    <button id="2" value="2" type="button" class="btn btn-primary propertyType">{{ __('For Sales') }}</button>
                    <button id="1" value="1" type="button" class="btn btn-primary propertyType">{{ __('For Rent') }}</button>
                    <button id="0" value="0" type="button" class="btn btn-primary propertyType active">{{ __('Both') }}</button>
                </div>
            </div>
            <div class="shadow-lg p-3 mb-5 bg-body rounded">
                <div class="row justify-content-center">
                    <div class="col-lg-8 col-md-6">
                        <div class="input-group mb-2">
                            <input class="form-control" id="search" type="text" placeholder="Search For Property..." aria-label="Example text with button addon" aria-describedby="button-addon1" name="search" required/>
                            <div class="input-group-append">
                                <button class="btn btn-success" onclick="getPropertyList('filterClick')" type="submit">{{ __('Search') }}</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-center mt-4">
                    <div class="row">
                        <div class="col-lg-2 col-md-6 mb-md-3">
                            <div class="pro_info_main">
                                <div class="pro_info" id="bedroomOpen">{{ __('Property Bedroom') }} <i class="fa-solid fa-chevron-down"></i></div>
                                <div class="pro_info_box" id="bedroomDiv">
                                    <div class="pro_info_box_inr" id="bedroomClose">
                                        <div class="form-check check_item_box">
                                            <input name="propertyBedroom" onclick="selectedBedroom(event)" class="form-check-input check_item_input" type="checkbox" value="1" id="propertyBedroom1">
                                            <label class="form-check-label check_item_label" for="propertyBedroom1">
                                                {{ __('1 BHK') }}
                                                <i class="fa-solid fa-plus input_uncheck"></i>
                                                <i class="fa-solid fa-check input_check"></i>
                                            </label>
                                        </div>
                                        <div class="form-check check_item_box">
                                            <input name="propertyBedroom" onclick="selectedBedroom(event)" class="form-check-input check_item_input" type="checkbox" value="2" id="propertyBedroom2">
                                            <label class="form-check-label check_item_label" for="propertyBedroom2">
                                                {{ __('2 BHK') }}
                                                <i class="fa-solid fa-plus input_uncheck"></i>
                                                <i class="fa-solid fa-check input_check"></i>
                                            </label>
                                        </div>
                                        <div class="form-check check_item_box">
                                            <input name="propertyBedroom" onclick="selectedBedroom(event)" class="form-check-input check_item_input" type="checkbox" value="3" id="propertyBedroom3">
                                            <label class="form-check-label check_item_label" for="propertyBedroom3">
                                                {{ __('3 BHK') }}
                                                <i class="fa-solid fa-plus input_uncheck"></i>
                                                <i class="fa-solid fa-check input_check"></i>
                                            </label>
                                        </div>
                                        <div class="form-check check_item_box">
                                            <input name="propertyBedroom" onclick="selectedBedroom(event)" class="form-check-input check_item_input" type="checkbox" value="4" id="propertyBedroom4">
                                            <label class="form-check-label check_item_label" for="propertyBedroom4">
                                                {{ __('4 BHK') }}
                                                <i class="fa-solid fa-plus input_uncheck"></i>
                                                <i class="fa-solid fa-check input_check"></i>
                                            </label>
                                        </div>
                                        <div class="form-check check_item_box">
                                            <input name="propertyBedroom" onclick="selectedBedroom(event)" class="form-check-input check_item_input" type="checkbox" value="5+" id="propertyBedroom5">
                                            <label class="form-check-label check_item_label" for="propertyBedroom5">
                                                {{ __('5+ BHK') }}
                                                <i class="fa-solid fa-plus input_uncheck"></i>
                                                <i class="fa-solid fa-check input_check"></i>
                                            </label>
                                        </div>
                                        <div class="form-check check_item_box">
                                            <button class="btn btn-sm btn-success reset_bt" onclick="selectedBedroom(1)">{{ __('reset') }}</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-6 mb-md-3">
                            <div class="pro_info_main">
                                <div class="pro_info" id="open">{{ __('Property Catrgory') }} <i class="fa-solid fa-chevron-down"></i></div>
                                <div class="pro_info_box" id="categoryDiv">
                                    <div class="pro_info_box_inr">
                                        @foreach ($category as $categoryName)
                                            <div class="form-check check_item_box">
                                                <input name="categoryInput" onclick="selectedCategory()" class="form-check-input check_item_input" type="checkbox" value="{{$categoryName->id}}" id="flexCheckDefault{{$categoryName->id}}">
                                                <label class="form-check-label check_item_label" for="flexCheckDefault{{$categoryName->id}}">
                                                    {{$categoryName->name}}
                                                    <i class="fa-solid fa-plus input_uncheck"></i>
                                                    <i class="fa-solid fa-check input_check"></i>
                                                </label>
                                            </div>
                                        @endforeach
                                        <div class="form-check check_item_box">
                                            <button class="btn btn-sm btn-success reset_bt" onclick="selectedCategory(1)">{{ __('reset') }}</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-6 mb-md-3">
                            <div class="pro_info_main">
                                <div class="pro_info" id="conditionOpen">{{ __('Property Condition') }} <i class="fa-solid fa-chevron-down"></i></div>
                                <div class="pro_info_box" id="conditionDiv">
                                    <div class="pro_info_box_inr" id="bedroomClose">
                                        <div class="form-check check_item_box">
                                            <input name="propertyCondition" onclick="selectedCondition()" class="form-check-input check_item_input" type="checkbox" value="1" id="propertyCondition1">
                                            <label class="form-check-label check_item_label" for="propertyCondition1">
                                                {{ __('Used') }}
                                                <i class="fa-solid fa-plus input_uncheck"></i>
                                                <i class="fa-solid fa-check input_check"></i>
                                            </label>
                                        </div>
                                        <div class="form-check check_item_box">
                                            <input name="propertyCondition" onclick="selectedCondition()" class="form-check-input check_item_input" type="checkbox" value="2" id="propertyCondition2">
                                            <label class="form-check-label check_item_label" for="propertyCondition2">
                                                {{ __('New') }}
                                                <i class="fa-solid fa-plus input_uncheck"></i>
                                                <i class="fa-solid fa-check input_check"></i>
                                            </label>
                                        </div>
                                        <div class="form-check check_item_box">
                                            <input name="propertyCondition" onclick="selectedCondition()" class="form-check-input check_item_input" type="checkbox" value="3" id="propertyCondition3">
                                            <label class="form-check-label check_item_label" for="propertyCondition3">
                                                {{ __('Furnished') }}
                                                <i class="fa-solid fa-plus input_uncheck"></i>
                                                <i class="fa-solid fa-check input_check"></i>
                                            </label>
                                        </div>
                                        <div class="form-check check_item_box">
                                            <input name="propertyCondition" onclick="selectedCondition()" class="form-check-input check_item_input" type="checkbox" value="4" id="propertyCondition4">
                                            <label class="form-check-label check_item_label" for="propertyCondition4">
                                                {{ __('Unfurnished') }}
                                                <i class="fa-solid fa-plus input_uncheck"></i>
                                                <i class="fa-solid fa-check input_check"></i>
                                            </label>
                                        </div>
                                        <div class="form-check check_item_box">
                                            <button class="btn btn-sm btn-success reset_bt" onclick="selectedCondition(1)">{{ __('reset') }}</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 mb-md-3">
                            <div class="pro_info_main">
                                <div class="pro_info" id="floorOpen">{{ __('Property Floor') }} <i class="fa-solid fa-chevron-down"></i></div>
                                <div class="pro_info_box" id="floorDiv">
                                    <div class="pro_info_box_inr">
                                        <div class="form-check check_item_box">
                                            <input name="propertyFloor" onclick="selectedFloor()" class="form-check-input check_item_input" type="checkbox" value="1" id="propertyFloor1">
                                            <label class="form-check-label check_item_label" for="propertyFloor1">
                                                {{ __('Settlement') }}
                                                <i class="fa-solid fa-plus input_uncheck"></i>
                                                <i class="fa-solid fa-check input_check"></i>
                                            </label>
                                        </div>
                                        <div class="form-check check_item_box">
                                            <input name="propertyFloor" onclick="selectedFloor()" class="form-check-input check_item_input" type="checkbox" value="2" id="propertyFloor2">
                                            <label class="form-check-label check_item_label" for="propertyFloor2">
                                                {{ __('Semi Ground') }}
                                                <i class="fa-solid fa-plus input_uncheck"></i>
                                                <i class="fa-solid fa-check input_check"></i>
                                            </label>
                                        </div>
                                        <div class="form-check check_item_box">
                                            <input name="propertyFloor" onclick="selectedFloor()" class="form-check-input check_item_input" type="checkbox" value="3" id="propertyFloor3">
                                            <label class="form-check-label check_item_label" for="propertyFloor3">
                                                {{ __('My Land') }}
                                                <i class="fa-solid fa-plus input_uncheck"></i>
                                                <i class="fa-solid fa-check input_check"></i>
                                            </label>
                                        </div>
                                        <div class="form-check check_item_box">
                                            <input name="propertyFloor" onclick="selectedFloor()" class="form-check-input check_item_input" type="checkbox" value="4" id="propertyFloor4">
                                            <label class="form-check-label check_item_label" for="propertyFloor4">
                                                {{ __('The First') }}
                                                <i class="fa-solid fa-plus input_uncheck"></i>
                                                <i class="fa-solid fa-check input_check"></i>
                                            </label>
                                        </div>
                                        <div class="form-check check_item_box">
                                            <input name="propertyFloor" onclick="selectedFloor()" class="form-check-input check_item_input" type="checkbox" value="5" id="propertyFloor5">
                                            <label class="form-check-label check_item_label" for="propertyFloor5">
                                                {{ __('The Second') }}
                                                <i class="fa-solid fa-plus input_uncheck"></i>
                                                <i class="fa-solid fa-check input_check"></i>
                                            </label>
                                        </div>
                                        <div class="form-check check_item_box">
                                            <input name="propertyFloor" onclick="selectedFloor()" class="form-check-input check_item_input" type="checkbox" value="6" id="propertyFloor6">
                                            <label class="form-check-label check_item_label" for="propertyFloor6">
                                                {{ __('The Third') }}
                                                <i class="fa-solid fa-plus input_uncheck"></i>
                                                <i class="fa-solid fa-check input_check"></i>
                                            </label>
                                        </div>
                                        <div class="form-check check_item_box">
                                            <input name="propertyFloor" onclick="selectedFloor()" class="form-check-input check_item_input" type="checkbox" value="7" id="propertyFloor7">
                                            <label class="form-check-label check_item_label" for="propertyFloor7">
                                                {{ __('Fourth +') }}
                                                <i class="fa-solid fa-plus input_uncheck"></i>
                                                <i class="fa-solid fa-check input_check"></i>
                                            </label>
                                        </div>
                                        <div class="form-check check_item_box">
                                            <button class="btn btn-sm btn-success reset_bt" onclick="selectedFloor(1)">{{ __('reset') }}</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 mb-md-3">
                            <div class="pro_info_main">
                                <div class="pro_info" id="propertyPriceOpen">{{ __('Property Price Range') }} <i class="fa-solid fa-chevron-down"></i></div>
                                <div class="pro_info_box" id="priceDiv">
                                    <div class="pro_info_box_inr">
                                        <div class="form-check check_item_box">
                                            <form>
                                                <div class="form-group">
                                                    <div class="d-flex align-items-center">
                                                        <input type="range" min="{{ $propertyMinPrice }}"max="{{ $propertyMaxPrice }}" name="priceRange" value="{{ $propertyMaxPrice }}" onchange="getPropertyList('filterClick')" class="form-control-range" id="formControlRange">
                                                        <input class="text-center fw-bold" style="border: none;background:none;" type="text" id="textInput" value="{{$propertyMaxPrice}}">
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="pro-details-main">
        <div class="container">
            <div class="row" style="justify-content: center;">
                <div class="col-md-12 filter-message">
                    <div class="post-wrap col-lg-12 col-md-12 text-center">
                        <span class="text-secondary">{{__('Empty Properties')}}</span>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="d-block">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <p class="m-0" id="total">{{ __('Total Property') }}:{{ $totalRecords }}</p>
                            <div class="view_list_bt m-0">
                                <button class="view border-0 " onclick="view('list')" id="list-view" value="list"><i class="fa-solid fa-list"></i> {{ __('List View') }}</button>
                                <button class="view border-0 d-none" onclick="view('grid')" id="grid-view" value="grid"><i class="fa fa-th"></i> {{ __('Grid View') }}</button>
                            </div>
                        </div>
                    </div>
                    <div class="masonry post-grid">
                        <input type="hidden" id="view" name="view" value="list">
                        @forelse ($property as $showProperty)
                            <div class="item" onscroll="getPropertyList()" id="scroll">
                                <div class="post-item card ">
                                    <a href="{{ route('propertyDetails',$showProperty->slug) }}" class="img-inr">
                                        <img src="{{ url('public/multiImage/'.$showProperty->image) }}" class="img-fluid card-img "alt="">
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
                                                {{ $showProperty->address }}
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
                    <div class="row align-items-center post-list d-none">
                        @forelse ($property as $showProperty)
                            <div class="col-md-4 mb-3">
                                <div class="list_img">
                                    <a href="javascript:void(0)" onclick="myClick(0)" class="img_inr">
                                        <img src="{{ url('public/multiImage/'.$showProperty->image) }}" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <a href="{{ route('propertyDetails',$showProperty->slug) }}" class="text-dark" style="text-decoration: none;">
                                    <div class="list_pro_info">
                                        <div class="property_detail">
                                            <div class="sl-item highlighted">
                                                <div class="property_name">
                                                    <h2 class="d-inline-block">{{ $showProperty->name }}</h2>
                                                    <span class="ms-2">@if ($showProperty["property_type"] == 1){{ __('For Rent')}}@else{{ __('For Sales') }}@endif</span>
                                                </div>
                                                {!! ($showProperty->floor != '' && !empty($showProperty->floor)) ? '<div class="property_detail_inr"><span>Floor:-</span><span>'.$showProperty->floor.'</span></div>' : '' !!}
                                                {!! ($showProperty->bedroom != '' && !empty($showProperty->bedroom)) ? '<div class="property_detail_inr"><span>Bedroom:-</span><span>'.$showProperty->bedroom.'</span></div>' : '' !!}
                                                {!! ($showProperty->building_area != 0 && !empty($showProperty->building_area)) ? '<div class="property_detail_inr"><span>sq.ft.:-</span><span>'.$showProperty->building_area.'</span></div>' : '' !!}
                                                {!! ($showProperty->price != 0 && !empty($showProperty->price)) ? '<div class="property_detail_inr"><span>Price:-</span><span>'.$showProperty->price.'</span></div>' : '' !!}
                                                <div class="property_detail_inr">
                                                    <span>Addres:-</span><span onclick="myClick(0)">{{ $showProperty->address }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
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
                    <p><img src="{{asset('public/img/loader.png')}}">{{ __('Load More Post') }}...</p>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('js')
    <script>
        // Listview and Gridview
        function view(val) {
            if (val === 'grid') {
                $('.post-list').addClass('d-none');
                $('.post-grid').removeClass('d-none');
                $('#grid-view').addClass('d-none');
                $('#list-view').removeClass('d-none');
            }
            if (val === 'list') {
                $('.post-list').removeClass('d-none');
                $('.post-grid').addClass('d-none');
                $('#list-view').addClass('d-none');
                $('#grid-view').removeClass('d-none');
            }
        }

        var limit = 6;
        var start = 0;
        var page = 1;
        var total = {{ $totalRecords }};
        var recent = 0;
        var rentSelsPrice = null;
        var bedroom = 0;
        var markers = []
        var gmarkers = []
        var categoryInput = []
        var conditionInput = []
        var floorInput = []
        var bedroomInput = []
        var map;
        $('.filter-message').hide();

        // Infinite Scrolling
        $(window).scroll(function() {

            if ($(window).scrollTop() + $(window).height() >= $(document).height() && total != recent) {
            page++;
            limit+=6;
            getPropertyList("scroll");
            }
        });

        // Clear filter
        function clearFilter(type="") {

            page = 1;
            start = 0;
            limit = 6;
            $('#map-property-lists').html('');

            $('input[name="'+type+'"]:checked').prop("checked",false);

            getPropertyList();
        }

        // Get Property Filter Result by Property Type
        $('.propertyType').click(function () {
            rentSelsPrice = this.id

            $(this).siblings().removeClass('active')
            $(this).addClass('active');


            page = 1;
            start = 0;
            limit = 6;
            $('#map-property-lists').html('');
            getPropertyList('propertyTypeFilter');
        })

        // Clear Property Badroom Filter
        function clearBedroomFilter(type="") {
            $(this).addClass('active');
          
            page = 1;
            start = 0;
            limit = 6;
            $('#map-property-lists').html('');

            var bedrooms = document.getElementsByClassName("bedroom");
            bedroom = $(".bedroom").val(null);

            getPropertyList();
        }

        // Property Bedrooms Multi Selecet.
        function selectedBedroom(event){
            if (event == 1) {
                $("input[name='propertyBedroom']").prop('checked', false);
            }
            else{
                event.stopPropagation();
            }

            page = 1;
            start = 0;
            limit = 6;
            $('#map-property-lists').html('');
            bedroomInput = [];
            $("input[name='propertyBedroom']:checked").each(function() {
                bedroomInput.push($(this).val());
            });
           
            getPropertyList();
        }


        // Property Floor Multi Select.
        function selectedFloor(type){            
            if (type == 1) {
                $("input[name='propertyFloor']").prop('checked', false);
            }
            page = 1;
            start = 0;
            limit = 6;
            $('#map-property-lists').html('');
            floorInput = [];
            $("input[name='propertyFloor']:checked").each(function() {
                floorInput.push($(this).val());
            });
            // alert(floorInput);
            getPropertyList();
        }

        // Property Condition Multi Select.
        function selectedCondition(type){
            if (type == 1) {
                $("input[name='propertyCondition']").prop('checked', false);
            }

            page = 1;
            start = 0;
            limit = 6;
            $('#map-property-lists').html('');
            conditionInput = [];
            $("input[name='propertyCondition']:checked").each(function() {
                conditionInput.push($(this).val());
            });
            // alert(conditionInput);
            getPropertyList();
        }

        // Category Multi Select.
        function selectedCategory(type){
            if (type == 1) {
                $("input[name='categoryInput']").prop('checked', false);
            }

            page = 1;
            start = 0;
            limit = 6;
            $('#map-property-lists').html('');
            categoryInput = [];
            $("input[name='categoryInput']:checked").each(function() {
                categoryInput.push($(this).val());
            });
            getPropertyList();
        }

        // Get All property by Filter / Scrolling.
        function getPropertyList(type="") {

            if(type != "scroll")
            {
                page = 1;
                limit = 6;
                $('#map-property-lists').animate({scrollTop: '0px'}, 1000);
            }

            // Category Filter.
            if(type == "filterClick" )
            {
                page = 1;
                start = 0;
                limit = 6;
                $('#map-property-lists').html('');
            }
            $('.ajax-load').removeClass('d-none')
            var priceVal = $('#formControlRange').val();
            var localData = $('#map-property-lists').val();
            var view = $('#view').val();

            var propertyCondition = conditionInput;
            var propertyBedRoom = bedroomInput;
            var propertyFloor = floorInput;
            var category = categoryInput;

            var search = $('#search').val();
            // set Two Zero after Price using toFixed(2) method:
            var selectPrice = parseFloat($('input[name="priceRange"]').val());
            var afterTwoZero = selectPrice.toFixed(2);
            var ajaxId = 1;

            // set value in inpute box (price):
            document.getElementById('textInput').value = afterTwoZero;

            $.ajax({
                type: "POST",
                url: "{{ url('list-scroll') }}",
                dataType: 'json',
                data: {
                    "_token"            : "{{ csrf_token() }}",
                    "price"             : priceVal,
                    "localData"         : localData,
                    "ajaxId"            : ajaxId,
                    "page"              : page,
                    "rentSelsPrice"     : rentSelsPrice,
                    "category"          : category,
                    "propertyCondition" : propertyCondition,
                    "propertyFloor"     : propertyFloor,
                    "propertyBedRoom"   : propertyBedRoom,
                    "selectPrice"       : selectPrice,
                    "limit"             : limit,
                    "start"             : start,
                    "bedroom"           : bedroom,
                    "search"            : search,
                    "request_page"      : "propertyHome",
                    "view"              : view
                },
                dataType: 'json',

                success: function(res) {
                    if (res) {
                        recent = res.records;
                        total = res.total;
                        $('#total').text('{{ __("Total Property") }}: '+ total)
                        $('.ajax-load').addClass('d-none')
                        $('.post-grid').html('');
                        $('.post-list').html('');
                        $('.post-grid').append(res.html);
                        $('.post-list').append(res.listview);
                        if (res.total == 0) {
                            $('.filter-message').show();
                        } else {
                            $('.filter-message').hide();
                        }
                        $("#page-pagination").html(res.homePagination)

                    }
                }
            });
        }

        $(document).ready(function(){
            $('.property_detail_inr_info').click(function(){
                $('.property_detail_inr_info').removeClass("active");
                $(this).addClass("active");
            });
        });

            // Category Dropdown Open Close.
            jQuery("#open").click(function(){
                jQuery("#categoryDiv").toggle();
                $('#open').toggleClass('active');
            })

            // Property Condition Dorpdown Open Close.
            jQuery("#conditionOpen").click(function(){
                jQuery("#conditionDiv").toggle();
                $('#conditionOpen').toggleClass('active');
            })

            // Property Floor Dorpdown Open Close.
            jQuery("#floorOpen").click(function(){
                jQuery("#floorDiv").toggle();
                $('#floorOpen').toggleClass('active');
            })

            // Property Bedroom Dorpdown Open Close.
            jQuery("#bedroomOpen").click(function(){
                jQuery("#bedroomDiv").toggle();
                $('#bedroomOpen').toggleClass('active');
            })

            // Property Price Dorpdown Open Close.
            jQuery("#propertyPriceOpen").click(function(){
                jQuery("#priceDiv").toggle();
                $('#propertyPriceOpen').toggleClass('active');
            })

            // Search Filter Events
            document.addEventListener('click', function handleClickOutsideBox(event) {
                const box = document.getElementById('open');
                if (!box.contains(event.target)) {
                    jQuery("#categoryDiv").hide();
                    $('#open').removeClass("active");
                }
            });

            document.addEventListener('click', function handleClickOutsideBox(event) {
                const box = document.getElementById('conditionOpen');
                if (!box.contains(event.target)) {
                    jQuery("#conditionDiv").hide();
                    $('#conditionOpen').removeClass("active");
                }
            });

            document.addEventListener('click', function handleClickOutsideBox(event) {
                const box = document.getElementById('floorOpen');
                if (!box.contains(event.target)) {
                    jQuery("#floorDiv").hide();
                    $('#floorOpen').removeClass("active");
                }
            });

            document.addEventListener('click', function handleClickOutsideBox(event) {
                const box = document.getElementById('bedroomOpen');
                if (!box.contains(event.target)) {
                    $('#bedroomOpen').removeClass('active')
                    jQuery("#bedroomDiv").hide();
                }
            });

            document.addEventListener('click', function handleClickOutsideBox(event) {
                const box = document.getElementById('propertyPriceOpen');
                if (!box.contains(event.target)) {
                    jQuery("#priceDiv").hide();
                    $('#propertyPriceOpen').removeClass("active");
                }
            });

            $("#bedroomDiv").on("click", function(event){
                event.stopPropagation();
            });

            $("#categoryDiv").on("click", function(event){
                event.stopPropagation();
            });

            $("#conditionDiv").on("click", function(event){
                event.stopPropagation();
            });

            $("#floorDiv").on("click", function(event){
                event.stopPropagation();
            });

            $("#priceDiv").on("click", function(event){
                event.stopPropagation();
            });
    </script>
@endsection
