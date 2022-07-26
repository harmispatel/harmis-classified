<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> @yield('title')</title>

    @include('frontend.common.css')

</head>
<body class="aa-price-range">
    <div id="aa-preloader-area">
        <div class="pulse"></div>
    </div>
    @include('frontend.common.header')

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
    @yield('content')
    {{-- <section class="pro-details-main">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 li-page">
                    <div class="listing-check">
                        <!-- <div class="ad-box">
                            <input type="text" name="" placeholder="Add Number">
                        </div> -->
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
                                <input type="range" class="form-control-range" id="formControlRange">
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
                        <!-- post item : minimal -->
                        <div class="post-wrap col-lg-6 col-md-6">
                            <div class="post-item card ">
                                <a href="#" class="img-inr">
                                    <img src="{{ asset ('image/house1.png')}}" class="img-fluid card-img " alt="">
                                    <div class="img-pri-abo">
                                        <h3><i class="fa-solid fa-rupee-sign"></i> <strong>. 12,33,56,456</strong></h3>
                                    </div>
                                    <div class="re-img">
                                        <div class="re-text">
                                            <span>For Rent</span>
                                        </div>
                                    </div>
                                </a>
                                <div class="card-body jo-card">
                                    <div class="jo-card-bor">
                                        <h3 class="card-title mb-1"><a href="#">Studio Apartment</a></h3>
                                        <p class="post-item-text font-weight-light font-sm">23 Cross, HRBR Layout, Bangalore</p>
                                    </div>
                                    <div class="jo-in-card">
                                        <div class="post-item-meta d-flex align-items-center justify-content-between">
                                            <div class="font-xs text-muted post-item-date d-flex justify-content-center mr-auto jo-card-inr">
                                                <i class="fa-solid fa-bed"></i> <p>3 bed</p>
                                            </div>
                                            <div class="font-xs text-muted post-item-date d-flex justify-content-center mr-auto jo-card-inr">
                                                <i class="fa-solid fa-bath"></i> <p>2 bath</p>
                                            </div>
                                            <div class="font-xs text-muted post-item-date d-flex justify-content-center jo-card-inr">
                                                <i class="fa-solid fa-car"></i> <p>2 Parking</p>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="#" class="her-abo">
                                        <i class="fa-solid fa-heart"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="post-wrap col-lg-6 col-md-6">
                            <div class="post-item card ">
                                <a href="#" class="img-inr">
                                    <img src="{{ asset ('image/house2.png')}}" class="img-fluid card-img " alt="">
                                    <div class="img-pri-abo">
                                        <h3><i class="fa-solid fa-rupee-sign"></i> <strong>. 12,33,56,456</strong></h3>
                                    </div>
                                    <div class="re-img">
                                        <div class="re-text">
                                            <span>For Sale</span>
                                        </div>
                                    </div>
                                </a>
                                <div class="card-body jo-card">
                                  <div class="jo-card-bor">
                                        <h3 class="card-title mb-1"><a href="#">Studio Apartment</a></h3>
                                        <p class="post-item-text font-weight-light font-sm">23 Cross, HRBR Layout, Bangalore</p>
                                    </div>
                                    <div class="jo-in-card">
                                        <div class="post-item-meta d-flex align-items-center justify-content-between">
                                            <div class="font-xs text-muted post-item-date d-flex justify-content-center mr-auto jo-card-inr">
                                                <i class="fa-solid fa-bed"></i> <p>3 bed</p>
                                            </div>
                                            <div class="font-xs text-muted post-item-date d-flex justify-content-center mr-auto jo-card-inr">
                                                <i class="fa-solid fa-bath"></i> <p>2 bath</p>
                                            </div>
                                            <div class="font-xs text-muted post-item-date d-flex justify-content-center jo-card-inr">
                                              <i class="fa-solid fa-car"></i> <p>2 Parking</p>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="#" class="her-abo">
                                        <i class="fa-solid fa-heart"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="post-wrap col-lg-6 col-md-6">
                            <div class="post-item card ">
                                <a href="#" class="img-inr">
                                    <img src="{{ asset ('image/house1.png')}}" class="img-fluid card-img " alt="">
                                    <div class="img-pri-abo">
                                        <h3><i class="fa-solid fa-rupee-sign"></i> <strong>. 12,33,56,456</strong></h3>
                                    </div>
                                    <div class="re-img">
                                        <div class="re-text">
                                            <span>For Rent</span>
                                        </div>
                                    </div>
                                </a>
                                <div class="card-body jo-card">
                                    <div class="jo-card-bor">
                                        <h3 class="card-title mb-1"><a href="#">Studio Apartment</a></h3>
                                        <p class="post-item-text font-weight-light font-sm">23 Cross, HRBR Layout, Bangalore</p>
                                    </div>
                                    <div class="jo-in-card">
                                        <div class="post-item-meta d-flex align-items-center justify-content-between">
                                            <div class="font-xs text-muted post-item-date d-flex justify-content-center mr-auto jo-card-inr">
                                                <i class="fa-solid fa-bed"></i> <p>3 bed</p>
                                            </div>
                                            <div class="font-xs text-muted post-item-date d-flex justify-content-center mr-auto jo-card-inr">
                                                <i class="fa-solid fa-bath"></i> <p>2 bath</p>
                                            </div>
                                            <div class="font-xs text-muted post-item-date d-flex justify-content-center jo-card-inr">
                                                <i class="fa-solid fa-car"></i> <p>2 Parking</p>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="#" class="her-abo">
                                        <i class="fa-solid fa-heart"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="post-wrap col-lg-6 col-md-6">
                            <div class="post-item card ">
                                <a href="#" class="img-inr">
                                    <img src="{{ asset ('image/house2.png')}}" class="img-fluid card-img " alt="">
                                    <div class="img-pri-abo">
                                        <h3><i class="fa-solid fa-rupee-sign"></i> <strong>. 12,33,56,456</strong></h3>
                                    </div>
                                    <div class="re-img">
                                        <div class="re-text">
                                            <span>For Sale</span>
                                        </div>
                                    </div>
                                </a>
                                <div class="card-body jo-card">
                                  <div class="jo-card-bor">
                                        <h3 class="card-title mb-1"><a href="#">Studio Apartment</a></h3>
                                        <p class="post-item-text font-weight-light font-sm">23 Cross, HRBR Layout, Bangalore</p>
                                    </div>
                                    <div class="jo-in-card">
                                        <div class="post-item-meta d-flex align-items-center justify-content-between">
                                            <div class="font-xs text-muted post-item-date d-flex justify-content-center mr-auto jo-card-inr">
                                                <i class="fa-solid fa-bed"></i> <p>3 bed</p>
                                            </div>
                                            <div class="font-xs text-muted post-item-date d-flex justify-content-center mr-auto jo-card-inr">
                                                <i class="fa-solid fa-bath"></i> <p>2 bath</p>
                                            </div>
                                            <div class="font-xs text-muted post-item-date d-flex justify-content-center jo-card-inr">
                                              <i class="fa-solid fa-car"></i> <p>2 Parking</p>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="#" class="her-abo">
                                        <i class="fa-solid fa-heart"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="post-wrap col-lg-6 col-md-6">
                            <div class="post-item card ">
                                <a href="#" class="img-inr">
                                    <img src="{{ asset ('image/house1.png')}}" class="img-fluid card-img " alt="">
                                    <div class="img-pri-abo">
                                        <h3><i class="fa-solid fa-rupee-sign"></i> <strong>. 12,33,56,456</strong></h3>
                                    </div>
                                    <div class="re-img">
                                        <div class="re-text">
                                            <span>For Rent</span>
                                        </div>
                                    </div>
                                </a>
                                <div class="card-body jo-card">
                                    <div class="jo-card-bor">
                                        <h3 class="card-title mb-1"><a href="#">Studio Apartment</a></h3>
                                        <p class="post-item-text font-weight-light font-sm">23 Cross, HRBR Layout, Bangalore</p>
                                    </div>
                                    <div class="jo-in-card">
                                        <div class="post-item-meta d-flex align-items-center justify-content-between">
                                            <div class="font-xs text-muted post-item-date d-flex justify-content-center mr-auto jo-card-inr">
                                                <i class="fa-solid fa-bed"></i> <p>3 bed</p>
                                            </div>
                                            <div class="font-xs text-muted post-item-date d-flex justify-content-center mr-auto jo-card-inr">
                                                <i class="fa-solid fa-bath"></i> <p>2 bath</p>
                                            </div>
                                            <div class="font-xs text-muted post-item-date d-flex justify-content-center jo-card-inr">
                                                <i class="fa-solid fa-car"></i> <p>2 Parking</p>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="#" class="her-abo">
                                        <i class="fa-solid fa-heart"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="post-wrap col-lg-6 col-md-6">
                            <div class="post-item card ">
                                <a href="#" class="img-inr">
                                    <img src="{{ asset ('image/house2.png')}}" class="img-fluid card-img " alt="">
                                    <div class="img-pri-abo">
                                        <h3><i class="fa-solid fa-rupee-sign"></i> <strong>. 12,33,56,456</strong></h3>
                                    </div>
                                    <div class="re-img">
                                        <div class="re-text">
                                            <span>For Sale</span>
                                        </div>
                                    </div>
                                </a>
                                <div class="card-body jo-card">
                                  <div class="jo-card-bor">
                                        <h3 class="card-title mb-1"><a href="#">Studio Apartment</a></h3>
                                        <p class="post-item-text font-weight-light font-sm">23 Cross, HRBR Layout, Bangalore</p>
                                    </div>
                                    <div class="jo-in-card">
                                        <div class="post-item-meta d-flex align-items-center justify-content-between">
                                            <div class="font-xs text-muted post-item-date d-flex justify-content-center mr-auto jo-card-inr">
                                                <i class="fa-solid fa-bed"></i> <p>3 bed</p>
                                            </div>
                                            <div class="font-xs text-muted post-item-date d-flex justify-content-center mr-auto jo-card-inr">
                                                <i class="fa-solid fa-bath"></i> <p>2 bath</p>
                                            </div>
                                            <div class="font-xs text-muted post-item-date d-flex justify-content-center jo-card-inr">
                                              <i class="fa-solid fa-car"></i> <p>2 Parking</p>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="#" class="her-abo">
                                        <i class="fa-solid fa-heart"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    @include('frontend.common.js')

</body>
</html>
