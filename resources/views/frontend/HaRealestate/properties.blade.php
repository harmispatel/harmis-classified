<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>HaRealestate | Home</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">

    <!-- Font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"/>

    <!-- css -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="assets/css/animate.css"/>
    <link rel="stylesheet" href="assets/css/swiper-bundle.min.css"/>

    <!-- Main style sheet -->
    <link href="assets/css/custom.css" rel="stylesheet">


    <!-- Google Font -->
    <link href='https://fonts.googleapis.com/css?family=Vollkorn' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

  </head>
  <body class="aa-price-range">
    <!-- Pre Loader -->
    <div id="aa-preloader-area">
      <div class="pulse"></div>
    </div>
    <!-- SCROLL TOP BUTTON -->
      <!-- <a class="scrollToTop" href="#"><i class="fa fa-angle-double-up"></i></a> -->
    <!-- END SCROLL TOP BUTTON -->

    <!-- Start header section -->

    <header class="header wow animate__fadeInDown" data-wow-duration="1s" id="header">
      <div class="header-top">
        <div class="container">
          <div class="header-top-main">
            <div class="header-top-left">
              <span class="phone"><i class="fa-solid fa-phone"></i> +91 3333333333</span>
              <span><i class="fa-solid fa-envelope"></i> admin@gmail.com</span>
            </div>
            <div class="header-top-right">
              <a href="#" class="nav-link re-nav-link">Register</a>
              <a href="#" class="nav-link">login</a>
            </div>
          </div>
        </div>
      </div>
      <div class="header-main">
        <nav class="navbar navbar-expand-lg navbar-light">
          <div class="container">
            <a class="navbar-brand" href="#">
              <img src="assets/images/logo.png"/>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                  <a class="nav-link" aria-current="page" href="index.html">Home</a>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Property
                  </a>
                  <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item active" href="properties.html">Properties</a></li>
                    <li><a class="dropdown-item" href="#">Properties Detail</a></li>
                  </ul>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">About Us</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Gallery</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Contact Us</a>
                </li>
              </ul>
            </div>
          </div>
        </nav>
      </div>
    </header>


    <!-- slider-sectiom  -->

    <section class="property-main page-title-bg">
      <div class="container">
        {{-- <div class="page-title">
            <h2>PROPERTIES PAGE</h2>
            <ol class="breadcrumb">
                <li><a href="#">HOME</a></li>
                <li class="active"><a href="">PROPERTIES</a></li>
            </ol>
        </div> --}}
      </div>
    </section>

    <section class="pro-details-main">
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
                                    <img src="assets/images/house1.png" class="img-fluid card-img " alt="">
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
                                    <img src="assets/images/house2.png" class="img-fluid card-img " alt="">
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
                                    <img src="assets/images/house1.png" class="img-fluid card-img " alt="">
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
                                    <img src="assets/images/house2.png" class="img-fluid card-img " alt="">
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
                                    <img src="assets/images/house1.png" class="img-fluid card-img " alt="">
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
                                    <img src="assets/images/house2.png" class="img-fluid card-img " alt="">
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
    </section>




    <!-- jQuery library -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/swiper-bundle.min.js"></script>
    <script src="assets/js/wow.min.js"></script>
    <script src="assets/js/custom.js"></script>
    <script>
      new WOW().init();
    </script>

  </body>
</html>
