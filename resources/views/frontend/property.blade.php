@extends('frontend.common.layout')

@section('content')
    <section class="property-main page-title-bg">
        <div class="container">
            <div class="page-title">
                <h2>PROPERTIES PAGE</h2>
                <ol class="breadcrumb">
                    <li><a href="#">HOME</a></li>
                    <li class="active"><a href="">PROPERTIES</a></li>
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
                                <h3>Other Options</h3>
                                <div class="list-inr-op">
                                    <div class="custom-control custom-checkbox op-inr">
                                        <input type="checkbox" class="custom-control-input" id="customCheck01">
                                        <label class="custom-control-label" for="customCheck01">Flat</label>
                                    </div>
                                    <div class="custom-control custom-checkbox op-inr">
                                        <input type="checkbox" class="custom-control-input" id="customCheck02">
                                        <label class="custom-control-label" for="customCheck02">Villa / House</label>
                                    </div>
                                    <div class="custom-control custom-checkbox op-inr">
                                        <input type="checkbox" class="custom-control-input" id="customCheck03">
                                        <label class="custom-control-label" for="customCheck03">Land</label>
                                    </div>
                                    <div class="custom-control custom-checkbox op-inr">
                                        <input type="checkbox" class="custom-control-input" id="customCheck04">
                                        <label class="custom-control-label" for="customCheck04">Farm</label>
                                    </div>
                                </div>
                            </div>
                            <div class="list-op">
                                <h3>Other Options</h3>
                                <div class="list-inr-op">
                                    <div class="custom-control custom-checkbox op-inr">
                                        <input name="propertyType" onclick="getPropertyType();" value="" type="radio" class="custom-control-input customCheck05">
                                        <label class="custom-control-label" for="customCheck05">For Both</label>
                                    </div>
                                    <div class="custom-control custom-checkbox op-inr">
                                        <input name="propertyType" onclick="getPropertyType();" value="1" type="radio" class="custom-control-input customCheck05">
                                        <label class="custom-control-label" for="customCheck05">For Rent</label>
                                    </div>
                                    <div class="custom-control custom-checkbox op-inr">
                                        <input name="propertyType" onclick="getPropertyType();" value="2" type="radio" class="custom-control-input customCheck05">
                                        <label class="custom-control-label" for="customCheck05">For Sales</label>
                                    </div>
                                </div>
                            </div>
                            <div class="pri-range">
                                <h3>Price</h3>
                                <form>
                                    <div class="form-group">
                                        <label for="formControlRange"></label>
                                        <span style="font-weight: bold;"></span>
                                        <input style="border: none;background:none; font-weight: bold;" type="text"
                                            id="textInput" value="{{ $propertyMaxPrice }}">
                                        <input type="range" alert(priceVal) min="{{ $propertyMinPrice }}"
                                            max="{{ $propertyMaxPrice }}" name="priceRange" value="{{ $propertyMaxPrice }}"
                                            onchange="getPricewiseProperty(this.value)" class="form-control-range"
                                            id="formControlRange">
                                    </div>
                                </form>
                            </div>
                            <div class="bulid-info">
                                <h3>Number Of Bedrooms</h3>
                                <div class="nu-inr">
                                    <a herf="#" class="badge nu-inr-st">Studio</a>
                                    <a herf="#" class="badge nu-inr-st active">1</a>
                                    <a herf="#" class="badge nu-inr-st">2</a>
                                    <a herf="#" class="badge nu-inr-st">3</a>
                                    <a herf="#" class="badge nu-inr-st">4</a>
                                    <a herf="#" class="badge nu-inr-st">5+</a>
                                </div>
                            </div>
                            <div class="list-op">
                                <h3>Other Options</h3>
                                <div class="list-inr-op">
                                    <div class="custom-control custom-checkbox op-inr">
                                        <input type="checkbox" class="custom-control-input" id="customCheck1">
                                        <label class="custom-control-label" for="customCheck1">Used</label>
                                    </div>
                                    <div class="custom-control custom-checkbox op-inr">
                                        <input type="checkbox" class="custom-control-input" id="customCheck2">
                                        <label class="custom-control-label" for="customCheck2">New</label>
                                    </div>
                                    <div class="custom-control custom-checkbox op-inr">
                                        <input type="checkbox" class="custom-control-input" id="customCheck3">
                                        <label class="custom-control-label" for="customCheck3">Furnished</label>
                                    </div>
                                    <div class="custom-control custom-checkbox op-inr">
                                        <input type="checkbox" class="custom-control-input" id="customCheck4">
                                        <label class="custom-control-label" for="customCheck4">Unfurnished</label>
                                    </div>
                                </div>
                            </div>
                            <div class="list-op">
                                <h3>Floor</h3>
                                <div class="list-inr-op">
                                    <div class="custom-control custom-checkbox op-inr">
                                        <input type="checkbox" class="custom-control-input" id="customCheck6">
                                        <label class="custom-control-label" for="customCheck6">Settlement</label>
                                    </div>
                                    <div class="custom-control custom-checkbox op-inr">
                                        <input type="checkbox" class="custom-control-input" id="customCheck7">
                                        <label class="custom-control-label" for="customCheck7">Semi ground</label>
                                    </div>
                                    <div class="custom-control custom-checkbox op-inr">
                                        <input type="checkbox" class="custom-control-input" id="customCheck8">
                                        <label class="custom-control-label" for="customCheck8">My land</label>
                                    </div>
                                    <div class="custom-control custom-checkbox op-inr">
                                        <input type="checkbox" class="custom-control-input" id="customCheck9">
                                        <label class="custom-control-label" for="customCheck9">The First</label>
                                    </div>
                                    <div class="custom-control custom-checkbox op-inr">
                                        <input type="checkbox" class="custom-control-input" id="customCheck10">
                                        <label class="custom-control-label" for="customCheck10">The Second</label>
                                    </div>
                                    <div class="custom-control custom-checkbox op-inr">
                                        <input type="checkbox" class="custom-control-input" id="customCheck11">
                                        <label class="custom-control-label" for="customCheck11">The Third</label>
                                    </div>
                                    <div class="custom-control custom-checkbox op-inr">
                                        <input type="checkbox" class="custom-control-input" id="customCheck12">
                                        <label class="custom-control-label" for="customCheck12">Fourth +</label>
                                    </div>
                                </div>
                            </div>
                            <div class="bulid-info">
                                <h3>Building Area</h3>
                                <form>
                                    <div class="form-group">
                                        <label for="formControlRange"></label>
                                        <input type="range" class="form-control-range" id="formControlRange">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                <div class="col-md-9">
                    <div class="row post-grid">
                        @forelse ($property as $showProperty)
                            <div class="post-wrap col-lg-6 col-md-6">
                                <div class="post-item card ">
                                    <a href="#" class="img-inr">
                                        <img src="{{ asset('image/house1.png') }}" class="img-fluid card-img "alt="">
                                        <div class="img-pri-abo">
                                            <h3><i class="fa-solid fa-rupee-sign"></i> <strong>.
                                            {{ $showProperty->price }}</strong></h3>
                                        </div>
                                        <div class="re-img">
                                            <div class="re-text">
                                                <span>
                                                    {{ $showProperty['property_type'] == 1 ? 'For Rent' : 'For Sales' }}
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
                            </div>
                        @empty
                            <div class="post-wrap col-lg-12 col-md-12 text-center">
                                <span class="text-secondary">{{__('labels.empty_properties')}}</span>
                            </div>
                        @endforelse


                    </div>
                </div>
                <div class="ajax-load text-center" style="display:none">
                    <p><img src="{{asset('img/loader.png')}}">Load More Post...</p>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('js')
    <script>
        function getPricewiseProperty(val) {
            var priceVal = $('#formControlRange').val();
            var rentSelsPrice = $('input[name="propertyType"]:checked').val();
            var ajaxId = 1;
            document.getElementById('textInput').value = val;
            $.ajax({
                type: "POST",
                url: "/getpropertybyprice",
                dataType: 'json',
                data: {
                    "_token": "{{ csrf_token() }}",
                    "price": priceVal,
                    "ajaxId": ajaxId,
                    "rentSelsPrice": rentSelsPrice
                },
                dataType: 'json',
                success: function(res) {
                    $('.post-grid').html('');
                    $('.post-grid').append(res.html);
                    jQuery("#page-pagination").html(res.homePagination)
                }
            });
        }

        function getPropertyType(val){
            var rent = $('input[name="propertyType"]:checked').val();
            var priceValue = $('#formControlRange').val();
            $.ajax({
                url: "{{ route('getRent')}}",
                type: "POST",
                data: {
                    '_token': "{{ csrf_token() }}",
                    'rent': rent,
                    'priceValue': priceValue
                },
                success: function(res) {
                $('.post-grid').html('');
                $('.post-grid').append(res.html);
                jQuery("#page-pagination").html(res.homePagination)
            }
            });
        }
    </script>
@endsection
