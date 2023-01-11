{{--
    THIS IS PROPERTIES LIST PAGE WITH MAP FOR FRONTSIDE/USERSIDE
    ----------------------------------------------------------------------------------------------
    propertyList.blade.php
    It Displayed All Product With Map And Map Makers Frontside/userside Home Page.
    ----------------------------------------------------------------------------------------------
--}}
@extends('frontend.common.layout')
@section('content')
<section class="property-main page-title-bg home_bg">
    <div class="container">

        {{-- <div class="filter_btn">
            <div class="filter_btn_group" role="group" aria-label="Basic example">
                <button id="2" value="2" type="button" class="btn btn-primary propertyType">For Sales</button>
                <button id="1" value="1" type="button" class="btn btn-primary propertyType">For Rent</button>
                <button id="0" value="0" type="button" class="btn btn-primary propertyType active">Both</button>
            </div>
        </div> --}}

        <div class="main_search_box p-3 mb-5">
            <div class="pro_page_title text-center">
                <h2>Find Your Property</h2>
            </div>
            {{-- <div class="row justify-content-center">
                <div class="col-lg-8 col-md-6">
                    <div class="input-group mb-2">
                        <input class="form-control" id="search" type="text" placeholder="Search For Property... " aria-label="Example text with button addon" aria-describedby="button-addon1" name="search" required/>
                        <div class="input-group-append">
                            <button class="btn btn-success" onclick="getPropertyList('filterClick')" type="submit">Search</button>
                        </div>
                    </div>
                </div>
            </div> --}}
            <div class="text-center mt-4">
                <div class="row">
                    <div class="col-lg-4 col-md-6 mb-md-3">
                        <div class="pro_info_main">
                            <div class="pro_info" id="protypeOpen">{{ __('Property Type') }} <i class="fa-solid fa-chevron-down"></i></div>
                            <div class="pro_info_box" id="protypeDiv">
                                <div class="pro_info_box_inr" id="protypeClose">
                                    <div class="form-check check_item_box">
                                        <input name="protypeInput" class="form-check-input check_item_input propertyType" type="radio" value="2" id="protypeInpute1">
                                        <label class="form-check-label check_item_label" for="protypeInpute1">
                                            {{__('For Sales')}}
                                            <i class="fa-solid fa-plus input_uncheck"></i>
                                            <i class="fa-solid fa-check input_check"></i>
                                        </label>
                                    </div>
                                    <div class="form-check check_item_box">
                                        <input name="protypeInput" class="form-check-input check_item_input propertyType" type="radio" value="1" id="protypeInpute2">
                                        <label class="form-check-label check_item_label" for="protypeInpute2">
                                            {{__('For Rent')}}
                                            <i class="fa-solid fa-plus input_uncheck"></i>
                                            <i class="fa-solid fa-check input_check"></i>
                                        </label>
                                    </div>
                                    <div class="form-check check_item_box">
                                        <input name="protypeInput" class="form-check-input check_item_input propertyType" checked type="radio" value="0" id="protypeInpute3">
                                        <label class="form-check-label check_item_label" for="protypeInpute3">
                                            {{__('Both')}}
                                            <i class="fa-solid fa-plus input_uncheck"></i>
                                            <i class="fa-solid fa-check input_check"></i>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 mb-md-3">
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
                    <div class="col-lg-4 col-md-6 mb-md-3">
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
                    <div class="col-lg-4 col-md-6 mb-md-3">
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
                    <div class="col-lg-4 col-md-6 mb-md-3">
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
                    <div class="col-lg-4 col-md-6 mb-md-3">
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

<section class="property_list_main">
    <div class="property_list_title">
        <h2>{{__('Property List')}}</h2>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <div class="propety-map">
                    <div id="map" class="w-100" style="height:600px"></div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="property-inr-listing" id="map-property-lists">
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@section('js')
    <script type="text/javascript">
        var limit = 4;
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
        var markerCluster;
        $('.filter-message').hide();

        // Infinite Scrolling
        $(window).scroll(function() {
            if ($(window).scrollTop() + $(window).height() >= $(document).height() && total != recent) {
                page++;
                start = (page -1) * limit
                limit;
                var forPage = total/limit;
                var roundPage = Math.ceil(forPage);

                if(page <= roundPage)
                {
                    getPropertyList("scroll");
                }
            }
        });

        // clear filter results
        function clearFilter(type="") {

            if(markerCluster){
                markerCluster.removeMarkers(markers);
            }
            markers = [];
            page = 1;
            start = 0;
            limit = 4;
            $('#map-property-lists').html('');
            $('input[name="'+type+'"]:checked').prop("checked",false);
            getPropertyList();
        }

        // property listig by property type
        $('.propertyType').click(function () {
            rentSelsPrice = $(this).val();
            $(this).addClass('active');

            $(this).siblings().removeClass('active')
            $(this).addClass('active');

            if(markerCluster){
                markerCluster.removeMarkers(markers);
            }

            markers = [];
            page = 1;
            start = 0;
            limit = 4;
            $('#map-property-lists').html('');
            getPropertyList('propertyTypeFilter');
        });

        // Clear Property Badroom Filter
        function clearBedroomFilter(type="") {
            $(this).addClass('active');
            if(markerCluster){
                markerCluster.removeMarkers(markers);
            }
            markers = [];
            page = 1;
            start = 0;
            limit = 4;
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

            if(markerCluster){
                markerCluster.removeMarkers(markers);
            }

            markers = [];
            page = 1;
            start = 0;
            limit = 4;
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

            if(markerCluster){
                markerCluster.removeMarkers(markers);
            }
            markers = [];
            page = 1;
            start = 0;
            limit = 4;
            $('#map-property-lists').html('');
            floorInput = [];
            $("input[name='propertyFloor']:checked").each(function() {
                floorInput.push($(this).val());
            });
            getPropertyList();
        }

        // Property Condition Multi Select.
        function selectedCondition(type){
            if (type == 1) {
                $("input[name='propertyCondition']").prop('checked', false);
            }

            if(markerCluster){
                markerCluster.removeMarkers(markers);
            }
            markers = [];
            page = 1;
            start = 0;
            limit = 4;
            $('#map-property-lists').html('');
            conditionInput = [];
            $("input[name='propertyCondition']:checked").each(function() {
                conditionInput.push($(this).val());
            });
            getPropertyList();
        }

        // Category Multi Select.
        function selectedCategory(type){
            if (type == 1) {
                $("input[name='categoryInput']").prop('checked', false);
            }

            if(markerCluster){
                markerCluster.removeMarkers(markers);
            }
            markers = [];
            page = 1;
            start = 0;
            limit = 4;
            $('#map-property-lists').html('');
            categoryInput = [];
            $("input[name='categoryInput']:checked").each(function() {
                categoryInput.push($(this).val());
            });
            getPropertyList();
        }

        // Get Property Filter Result
        function getPropertyList(type="") {
            if(type != "scroll")
            {
                page = 1;
                limit = 4;
                $('#map-property-lists').animate({scrollTop: '0px'}, 1000);
            }

            // Category Filter.
            if(type == "filterClick" )
            {
                if(markerCluster){
                    markerCluster.removeMarkers(markers);
                }

                markers = [];
                page = 1;
                start = 0;
                limit = 4;
                $('#map-property-lists').html('');
            }

            $('.ajax-load').removeClass('d-none')
            var priceVal = $('#formControlRange').val();
            var localData = $('#map-property-lists').val();

            var propertyCondition = conditionInput;
            var propertyBedRoom = bedroomInput;
            var propertyFloor = floorInput;
            var category = categoryInput;

            // var search = $('#search').val();
            var selectPrice = parseFloat($('input[name="priceRange"]').val());
            var afterTwoZero = selectPrice.toFixed(2);
            var ajaxId = 1;
            document.getElementById('textInput').value = afterTwoZero;
            $.ajax({
                type: "POST",
                url: "{{ route('listScroll') }}",
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
                    // "search"            : search
                },
                dataType: 'json',
                success: function(res) {
                    if (res) {
                        recent = res.records;
                        total = res.total;
                        $('.ajax-load').addClass('d-none');
                        $('#map-property-lists').append(res.html);
                        $('#property-total').text("{{ __('Total Properties') }} " + res.total);
                        $("#page-pagination").html(res.homePagination)

                        // this is from controller to blade Pass Array:
                        if(markerCluster){
                            markerCluster.removeMarkers(markers);
                        }
                        var listPro = res.propertyList;
                        const infoWindow = new google.maps.InfoWindow({
                            content: "",
                            disableAutoPan: true,
                        });

                        let markersajax = listPro.map((propertyData, i) => {
                            if (infoWindow) infoWindow.close();

                            // Show map marker on google map.
                            const marker = new google.maps.Marker({
                                position:{lat:Number(propertyData.latitude), lng:Number(propertyData.longitude)},
                                content: propertyData.name,
                                icon: '{{ asset("image/map-icon.png") }}',
                            });

                            // open info window when marker is clicked
                            marker.addListener("click", () => {
                                var property_type = propertyData.property_type;
                                if(propertyData.property_type == 1){
                                    property_type = "For Rent";
                                }
                                else{
                                    property_type = "For Sales";
                                }

                                // Map marker click and show propery detail
                                infoWindow.setContent('<a href="{{ asset("single-property-details") }}/'+ propertyData.slug +'" class="img-inr property_list_card">\
                                                            <figure class="m-0">\
                                                                <img src="{{ asset("multiImage") }}/'+ propertyData.image +'" class="img-fluid" alt="" />\
                                                            </figure>\
                                                            <div class="property_list-info">\
                                                                <div class="property_list_inr">\
                                                                    <span class="prize">$ '+ propertyData.price +'</span>\
                                                                    <h2>'+ propertyData.name +'</h2>\
                                                                    <p>'+ propertyData.address +'</p>\
                                                                </div>\
                                                            </div>\
                                                            <div class="property_more_info">\
                                                                <div class="inner">\
                                                                    <div class="col">\
                                                                        <span><i class="fa-solid fa-bed"></i></span>\
                                                                        <h4>'+ propertyData.bedroom +' Bed</h4>\
                                                                    </div>\
                                                                    <div class="col">\
                                                                        <span><i class="fa-solid fa-bath"></i></span>\
                                                                        <h4>'+ propertyData.bath +' Bath</h4>\
                                                                    </div>\
                                                                    <div class="col">\
                                                                        <span><i class="fa-solid fa-car"></i></span>\
                                                                        <h4>'+ propertyData.garage +' Garage</h4>\
                                                                    </div>\
                                                                    <div class="col">\
                                                                        <span><i class="fa-solid fa-object-ungroup"></i></span>\
                                                                        <h4>'+ propertyData.building_area +' Sq.ft</h4>\
                                                                    </div>\
                                                                </div>\
                                                            </div>\
                                                        </a>');
                                infoWindow.open(map, marker);

                                $('.property_detail_inr_info').removeClass("active");
                                $('#property'+propertyData.id).addClass("active");

                                // map marker click scrolling property list and showing top selected property.
                                document.getElementById('map-property-lists').getElementsByClassName('active')[0].scrollIntoView({behavior: "smooth"})
                                infoWindow.addListener('closeclick', ()=>{
                                    $('.property_detail_inr_info').removeClass('active');
                                });
                                $('.gm-ui-hover-effect').on('click', function(){
                                    $('.property_detail_inr_info').removeClass('active');
                                });
                            });
                            markers.push(marker);
                            return marker;
                        });
                        if(markers.length > 0 && map){
                            markerCluster = new MarkerClusterer(map, markers, {
                                imagePath: 'https://cdn.rawgit.com/googlemaps/js-marker-clusterer/gh-pages/images/m'
                            });
                        }
                    }
                }
            });
        }

        // Call Current Location Function:
        function initMap() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showPosition, showError)
                    getPropertyList("load");
                } else {
                x.innerHTML = "Geolocation is not supported by this browser.";
            }
        }

        // marker Cluster position
        function showPosition(position) {
            return new Promise(function(resolve, reject) {
                // Get latitude ande longitude:
                lat = position.coords.latitude;
                lon = position.coords.longitude;

                if(!map){
                    map = new google.maps.Map(document.getElementById('map'), {
                        zoom: 5,
                        center: new google.maps.LatLng(lat, lon)
                    });
                    markerCluster = new MarkerClusterer(map, markers, {
                        imagePath: 'https://cdn.rawgit.com/googlemaps/js-marker-clusterer/gh-pages/images/m'
                    });
                }
                resolve({map})
            });
        }

        // show map errors
        function showError(error) {
            switch (error.code) {
                case error.PERMISSION_DENIED:
                    // x.innerHTML = "User denied the request for Geolocation."
                    console.log("User denied the request for Geolocation.");
                    break;
                case error.POSITION_UNAVAILABLE:
                    x.innerHTML = "Location information is unavailable."
                    break;
                case error.TIMEOUT:
                    x.innerHTML = "The request to get user location timed out."
                    break;
                case error.UNKNOWN_ERROR:
                    x.innerHTML = "An unknown error occurred."
                    break;
            }
        }

        // google map marker click event
        function myClick(id) {
            google.maps.event.trigger(markers[id], 'click');
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

        // Property Bedroom Dorpdown Open Close.
        jQuery("#protypeOpen").click(function(){
            jQuery("#protypeDiv").toggle();
            $('#protypeOpen').toggleClass('active');
        })

        // Property Price Dorpdown Open Close.
        jQuery("#propertyPriceOpen").click(function(){
            jQuery("#priceDiv").toggle();
            $('#propertyPriceOpen').toggleClass('active');
        })


        // Category Dropdown Open Close.
        document.addEventListener('click', function handleClickOutsideBox(event) {
            const box = document.getElementById('open');
            if (!box.contains(event.target)) {
                jQuery("#categoryDiv").hide();
                $('#open').removeClass("active");
            }
        });

        // Property Condition Dropdown Open Close.
        document.addEventListener('click', function handleClickOutsideBox(event) {
            const box = document.getElementById('conditionOpen');
            if (!box.contains(event.target)) {
                jQuery("#conditionDiv").hide();
                $('#conditionOpen').removeClass("active");
            }
        });

        // Property Floor Dorpdown Open Close.
        document.addEventListener('click', function handleClickOutsideBox(event) {
            const box = document.getElementById('floorOpen');
            if (!box.contains(event.target)) {
                jQuery("#floorDiv").hide();
                $('#floorOpen').removeClass("active");
            }
        });

        // Property badroom Dorpdown Open Close.
        document.addEventListener('click', function handleClickOutsideBox(event) {
            const box = document.getElementById('bedroomOpen');
            if (!box.contains(event.target)) {
                $('#bedroomOpen').removeClass('active')
                jQuery("#bedroomDiv").hide();
            }
        });

        // Property type Dorpdown Open Close.
        document.addEventListener('click', function handleClickOutsideBox(event) {
            const box = document.getElementById('protypeOpen');
            if (!box.contains(event.target)) {
                $('#protypeOpen').removeClass('active')
                jQuery("#protypeDiv").hide();
            }
        });

        // Price Dorpdown Open Close.
        document.addEventListener('click', function handleClickOutsideBox(event) {
            const box = document.getElementById('propertyPriceOpen');
            if (!box.contains(event.target)) {
                jQuery("#priceDiv").hide();
                $('#propertyPriceOpen').removeClass("active");
            }
        });

        // Search filter events stop
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

        $("#protypeDiv").on("click", function(event){
            event.stopPropagation();
        });

    </script>

@endsection
