@extends('frontend.common.layout')

@section('content')

<section class="pro-details-main">
    <div class="container">
        <div class="row">
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
                              <input type="checkbox" class="custom-control-input" id="customCheck05">
                              <label class="custom-control-label" for="customCheck05">In Installments</label>
                            </div>
                            <div class="custom-control custom-checkbox op-inr">
                              <input type="checkbox" class="custom-control-input" id="customCheck06">
                              <label class="custom-control-label" for="customCheck06">Directly From Owner</label>
                            </div>
                        </div>
                    </div>
                    <div class="pri-range">
                        <h3>Price</h3>
                        <form>
                          <div class="form-group">
                            <label for="formControlRange"></label>
                            <span style="font-weight: bold;">$.</span>
                            <input style="border: none;background:none; font-weight: bold;" type="text" id="textInput" value="{{$propertyMaxPrice}}">
                            <input type="range" alert(priceVal) min="{{$propertyMinPrice}}" max="{{$propertyMaxPrice}}" name="priceRange" value="{{$propertyMaxPrice}}" onchange="getPricewiseProperty(this.value)" class="form-control-range" id="formControlRange">
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
                <div class="row post-grid" >

                    @include('frontend.data')
                    <div>
                        <button id="load" onclick="infinetScroller()"> Load More </button>
                    </div>
                    {{-- <div id="page-pagination">
                    {!! $property->links() !!}
                    <style>
                        .w-5{
                        display:none;
                        }
                        </style>

                    </div> --}}
                </div>
                <div class="ajax-load text-center" style="display:none">
                    <p><img src="{{asset('img/loader.png')}}">Load More Post...</p>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection

<script>


    function getPricewiseProperty(val)
    {
        var priceVal = $('#formControlRange').val();
        var ajaxId = 1;
        document.getElementById('textInput').value=val;
        $.ajax({
            type:"POST",
            url: "/getpropertybyprice",
            dataType:   'json',
            data: {
                "_token": "{{ csrf_token() }}",
                "price": priceVal,
                "ajaxId":ajaxId
            },
            dataType: 'json',
            success: function(res){
                alert(ajaxId)
                // console.log(res);
                $('.post-grid').html('');
                $('.post-grid').append(res.html);
                jQuery("#page-pagination").html(res.homePagination)
           }
        });
    }


</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    function loadMoreData(page)
   {
      $.ajax({
         url:'?page=' + page,
         type:'get',
         beforeSend: function()
         {
            $(".ajax-load").show();
         }
      })
      .done(function(data){

         if(data.html == ""){
            $('.ajax-load').html("No more Posts Found!");
            return;
         }
         $('.ajax-load').hide();
         $(".post-grid").append(data.html);
      });


   }
   //function for Scroll Event
   var page =1;
   $(window).scroll(function(){
      if($(window).scrollTop() + $(window).height() >= $(document).height()){
         page++;
         loadMoreData(page);
      }
   });
</script>
