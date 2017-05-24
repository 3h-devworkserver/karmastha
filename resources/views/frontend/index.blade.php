@extends('frontend.layouts.app')

@section('content')
    <!-- Start slider container -->
    @include('frontend.includes.banner')
    <!-- End slider container -->

    <!-- Start Member Conainer -->
    <div class="top-brands">

        <div class="brands-header">
            <h4 class="title">top brands</h4>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    
                    <div class="brands-img">
                        <div class="col-md-3">
                            <a href="">
                                <img src="{{asset('front-images/brands-logo/carolina herrera.jpg')}}">
                            </a>
                        </div>
                        <div class="col-md-3">
                            <a href="">
                                <img src="{{asset('front-images/brands-logo/erke a.jpg')}}">
                            </a>
                        </div>
                        <div class="col-md-3">
                            <a href="">
                                <img src="{{asset('front-images/brands-logo/fosil.jpg')}}">
                            </a>
                        </div>
                        <div class="col-md-3">
                            <a href="">
                                <img src="{{asset('front-images/brands-logo/IFB a.jpg')}}">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Top brands Conainer -->

    <!-- Start Serive Conainer -->
    <div class="service-container">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-4">
                    <div class="col-item-content">
                        <a href="#"><img src="{{asset('front-images/DesktopSlider_NP_1.jpg')}}"></a>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4">
                    <div class="col-item-content">
                        <a href="#"><img src="{{asset('front-images/DesktopSlider_NP_2.jpg')}}"></a>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4">
                    <div class="col-item-content">
                        <a href="#"><img src="{{asset('front-images/DesktopSlider_NP_3.jpg')}}"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Serive Conainer -->

    <!-- Start Hot product -->
    <div class="msp-container">
        <div class="container">
                <div class="row">
                    <div class="col-md-9">
                        <h4 class="title">Hot Products</h3>
                    </div>
                    <div class="col-md-3">
                        <!-- Controls -->
                        <div class="controls pull-right hidden-xs">
                            <a class="left fa fa-chevron-left" href="#carousel-example-hot" data-slide="prev"></a>
                            <a class="right fa fa-chevron-right " href="#carousel-example-hot" data-slide="next"></a>
                        </div>
                    </div>
                </div>
                <div id="carousel-example-hot" class="carousel slide hidden-xs" data-ride="carousel" data-interval="false">
                    <!-- Wrapper for slides -->
                    <div class="carousel-inner">
                        <div class="item active">
                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="col-item">
                                        <div class="photo">
                                            <a href="">
                                                <p class="any-offer">50% Discount</p>
                                                <img src="{{asset('front-images/product/1.jpg')}}" alt="a" /></a>
                                        </div>
                                        <div class="info">
                                        
                                                <div class="price col-md-7">
                                                    <h5><a href="product_detail.html">Sample Product</a></h5>
                                                </div>
                                                <div class="price col-md-4 no-padd">
                                                    <h5 class="price-text-color">
                                                          $199.99</h5>
                                                </div>
                                            </div>
                                            <div class="separator clear-left">
                                                <a class="btn-add" href="cart.html" class="hidden-sm"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                                                <a class="btn-add" href="product_list.html" class="hidden-sm"><i class="fa fa-list"></i> Detail</a>
                                            </div>
                                            <div class="clearfix">
                                      
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="col-item">
                                        <div class="photo">
                                            <a href="">
                                                <img src="{{asset('front-images/product/2.jpg')}}" alt="a" /></a>
                                        </div>
                                        <div class="info">
                                        
                                                <div class="price col-md-7">
                                                    <h5><a href="product_detail.html">Sample Product</a></h5>
                                                </div>
                                                <div class="price col-md-4 no-padd">
                                                    <h5 class="price-text-color">
                                                          $199.99</h5>
                                                </div>
                                            </div>
                                            <div class="separator clear-left">
                                                <a class="btn-add" href="#" class="hidden-sm"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                                                <a class="btn-add" href="#" class="hidden-sm"><i class="fa fa-list"></i> Detail</a>
                                            </div>
                                            <div class="clearfix">
                                      
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="col-item">
                                        <div class="photo">
                                            <a href="">
                                                <img src="{{asset('front-images/product/3.jpg')}}" alt="a" /></a>
                                        </div>
                                        <div class="info">
                                        
                                                <div class="price col-md-7">
                                                    <h5><a href="product_detail.html">Sample Product</a></h5>
                                                </div>
                                                <div class="price col-md-4 no-padd">
                                                    <h5 class="price-text-color">
                                                          $199.99</h5>
                                                </div>
                                            </div>
                                            <div class="separator clear-left">
                                                <a class="btn-add" href="#" class="hidden-sm"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                                                <a class="btn-add" href="#" class="hidden-sm"><i class="fa fa-list"></i> Detail</a>
                                            </div>
                                            <div class="clearfix">
                                      
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="col-item">
                                        <div class="photo">
                                            <a href="">
                                                <img src="{{asset('front-images/product/1.jpg')}}" alt="a" /></a>
                                        </div>
                                        <div class="info">
                                        
                                                <div class="price col-md-7">
                                                    <h5><a href="product_detail.html">Sample Product</a></h5>
                                                </div>
                                                <div class="price col-md-4 no-padd">
                                                    <h5 class="price-text-color">
                                                          $199.99</h5>
                                                </div>
                                            </div>
                                            <div class="separator clear-left">
                                                <a class="btn-add" href="#" class="hidden-sm"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                                                <a class="btn-add" href="#" class="hidden-sm"><i class="fa fa-list"></i> Detail</a>
                                            </div>
                                            <div class="clearfix">
                                      
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="col-item">
                                        <div class="photo">
                                            <a href="">
                                                <img src="{{asset('front-images/product/2.jpg')}}" alt="a" /></a>
                                        </div>
                                        <div class="info">
                                        
                                                <div class="price col-md-7">
                                                    <h5><a href="product_detail.html">Sample Product</a></h5>
                                                </div>
                                                <div class="price col-md-4 no-padd">
                                                    <h5 class="price-text-color">
                                                          $199.99</h5>
                                                </div>
                                            </div>
                                            <div class="separator clear-left">
                                                <a class="btn-add" href="#" class="hidden-sm"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                                                <a class="btn-add" href="#" class="hidden-sm"><i class="fa fa-list"></i> Detail</a>
                                            </div>
                                            <div class="clearfix">
                                      
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="col-item">
                                        <div class="photo">
                                            <a href="">
                                                <img src="{{asset('front-images/product/3.jpg')}}" alt="a" /></a>
                                        </div>
                                        <div class="info">
                                        
                                                <div class="price col-md-7">
                                                    <h5><a href="product_detail.html">Sample Product</a></h5>
                                                </div>
                                                <div class="price col-md-4 no-padd">
                                                    <h5 class="price-text-color">
                                                          $199.99</h5>
                                                </div>
                                            </div>
                                            <div class="separator clear-left">
                                                <a class="btn-add" href="#" class="hidden-sm"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                                                <a class="btn-add" href="#" class="hidden-sm"><i class="fa fa-list"></i> Detail</a>
                                            </div>
                                            <div class="clearfix">
                                      
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="col-item">
                                        <div class="photo">
                                            <a href="">
                                                <img src="{{asset('front-images/product/1.jpg')}}" alt="a" /></a>
                                        </div>
                                        <div class="info">
                                        
                                                <div class="price col-md-7">
                                                    <h5><a href="product_detail.html">Sample Product</a></h5>
                                                </div>
                                                <div class="price col-md-4 no-padd">
                                                    <h5 class="price-text-color">
                                                          $199.99</h5>
                                                </div>
                                            </div>
                                            <div class="separator clear-left">
                                                <a class="btn-add" href="#" class="hidden-sm"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                                                <a class="btn-add" href="#" class="hidden-sm"><i class="fa fa-list"></i> Detail</a>
                                            </div>
                                            <div class="clearfix">
                                      
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="col-item">
                                        <div class="photo">
                                            <a href="">
                                                <img src="{{asset('front-images/product/2.jpg')}}" alt="a" /></a>
                                        </div>
                                        <div class="info">
                                        
                                                <div class="price col-md-7">
                                                    <h5><a href="product_detail.html">Sample Product</a></h5>
                                                </div>
                                                <div class="price col-md-4 no-padd">
                                                    <h5 class="price-text-color">
                                                          $199.99</h5>
                                                </div>
                                            </div>
                                            <div class="separator clear-left">
                                                <a class="btn-add" href="#" class="hidden-sm"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                                                <a class="btn-add" href="#" class="hidden-sm"><i class="fa fa-list"></i> Detail</a>
                                            </div>
                                            <div class="clearfix">
                                      
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
    <!-- End Hot product -->

    <!-- Start Electronic product -->
    <div class="msp-container">
        <div class="container">
                <div class="row">
                    <div class="col-md-9">
                        <h4 class="title">Electronic</h3>
                    </div>
                    <div class="col-md-3">
                        <!-- Controls -->
                        <div class="controls pull-right hidden-xs">
                            <a class="left fa fa-chevron-left" href="#carousel-example-electronic" data-slide="prev"></a>
                            <a class="right fa fa-chevron-right " href="#carousel-example-electronic" data-slide="next"></a>
                        </div>
                    </div>
                </div>
                <div id="carousel-example-electronic" class="carousel slide hidden-xs" data-ride="carousel" data-interval="false">
                    <!-- Wrapper for slides -->
                    <div class="carousel-inner">
                        <div class="item active">
                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="col-item">
                                        <div class="photo">
                                            <a href="">
                                                <p class="any-offer">50% Discount</p>
                                                <img src="{{asset('front-images/product/1.jpg')}}" alt="a" /></a>
                                        </div>
                                        <div class="info">
                                            <div class="price col-md-7">
                                                <h5><a href="product_detail.html">Sample Product</a></h5>
                                            </div>
                                            <div class="price col-md-4 no-padd">
                                                <h5 class="price-text-color">
                                                      $199.99</h5>
                                            </div>
                                        </div>
                                            <div class="separator clear-left">
                                                <a class="btn-add" href="#" class="hidden-sm"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                                                <a class="btn-add" href="#" class="hidden-sm"><i class="fa fa-list"></i> Detail</a>
                                            </div>
                                            <div class="clearfix">
                                      
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="col-item">
                                        <div class="photo">
                                            <a href="">
                                                <img src="{{asset('front-images/product/2.jpg')}}" alt="a" /></a>
                                        </div>
                                        <div class="info">
                                                
                                                <div class="price col-md-7">
                                                    <h5><a href="product_detail.html">Sample Product</a></h5>
                                                </div>
                                                <div class="price col-md-4 no-padd">
                                                    <h5 class="price-text-color">
                                                          $199.99</h5>
                                                </div>
                                            </div>
                                            <div class="separator clear-left">
                                                <a class="btn-add" href="#" class="hidden-sm"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                                                <a class="btn-add" href="#" class="hidden-sm"><i class="fa fa-list"></i> Detail</a>
                                            </div>
                                            <div class="clearfix">
                                      
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="col-item">
                                        <div class="photo">
                                            <a href="">
                                                <img src="{{asset('front-images/product/3.jpg')}}" alt="a" /></a>
                                        </div>
                                        <div class="info">
                                        
                                                <div class="price col-md-7">
                                                    <h5><a href="product_detail.html">Sample Product</a></h5>
                                                </div>
                                                <div class="price col-md-4 no-padd">
                                                    <h5 class="price-text-color">
                                                          $199.99</h5>
                                                </div>
                                            </div>
                                            <div class="separator clear-left">
                                                <a class="btn-add" href="#" class="hidden-sm"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                                                <a class="btn-add" href="#" class="hidden-sm"><i class="fa fa-list"></i> Detail</a>
                                            </div>
                                            <div class="clearfix">
                                      
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="col-item">
                                        <div class="photo">
                                            <a href="">
                                                <img src="{{asset('front-images/product/1.jpg')}}" alt="a" /></a>
                                        </div>
                                        <div class="info">
                                        
                                                <div class="price col-md-7">
                                                    <h5><a href="product_detail.html">Sample Product</a></h5>
                                                </div>
                                                <div class="price col-md-4 no-padd">
                                                    <h5 class="price-text-color">
                                                          $199.99</h5>
                                                </div>
                                            </div>
                                            <div class="separator clear-left">
                                                <a class="btn-add" href="#" class="hidden-sm"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                                                <a class="btn-add" href="#" class="hidden-sm"><i class="fa fa-list"></i> Detail</a>
                                            </div>
                                            <div class="clearfix">
                                      
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="col-item">
                                        <div class="photo">
                                            <a href="">
                                                <img src="{{asset('front-images/product/2.jpg')}}" alt="a" /></a>
                                        </div>
                                        <div class="info">
                                        
                                                <div class="price col-md-7">
                                                    <h5><a href="product_detail.html">Sample Product</a></h5>
                                                </div>
                                                <div class="price col-md-4 no-padd">
                                                    <h5 class="price-text-color">
                                                          $199.99</h5>
                                                </div>
                                            </div>
                                            <div class="separator clear-left">
                                                <a class="btn-add" href="#" class="hidden-sm"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                                                <a class="btn-add" href="#" class="hidden-sm"><i class="fa fa-list"></i> Detail</a>
                                            </div>
                                            <div class="clearfix">
                                      
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="col-item">
                                        <div class="photo">
                                            <a href="">
                                                <img src="{{asset('front-images/product/3.jpg')}}" alt="a" /></a>
                                        </div>
                                        <div class="info">
                                        
                                                <div class="price col-md-7">
                                                    <h5><a href="product_detail.html">Sample Product</a></h5>
                                                </div>
                                                <div class="price col-md-4 no-padd">
                                                    <h5 class="price-text-color">
                                                          $199.99</h5>
                                                </div>
                                            </div>
                                            <div class="separator clear-left">
                                                <a class="btn-add" href="#" class="hidden-sm"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                                                <a class="btn-add" href="#" class="hidden-sm"><i class="fa fa-list"></i> Detail</a>
                                            </div>
                                            <div class="clearfix">
                                      
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="col-item">
                                        <div class="photo">
                                            <a href="">
                                                <img src="{{asset('front-images/product/1.jpg')}}" alt="a" /></a>
                                        </div>
                                        <div class="info">
                                        
                                                <div class="price col-md-7">
                                                    <h5><a href="product_detail.html">Sample Product</a></h5>
                                                </div>
                                                <div class="price col-md-4 no-padd">
                                                    <h5 class="price-text-color">
                                                          $199.99</h5>
                                                </div>
                                            </div>
                                            <div class="separator clear-left">
                                                <a class="btn-add" href="#" class="hidden-sm"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                                                <a class="btn-add" href="#" class="hidden-sm"><i class="fa fa-list"></i> Detail</a>
                                            </div>
                                            <div class="clearfix">
                                      
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="col-item">
                                        <div class="photo">
                                            <a href="">
                                                <img src="{{asset('front-images/product/2.jpg')}}" alt="a" /></a>
                                        </div>
                                        <div class="info">
                                        
                                                <div class="price col-md-7">
                                                    <h5><a href="product_detail.html">Sample Product</a></h5>
                                                </div>
                                                <div class="price col-md-4 no-padd">
                                                    <h5 class="price-text-color">
                                                          $199.99</h5>
                                                </div>
                                            </div>
                                            <div class="separator clear-left">
                                                <a class="btn-add" href="#" class="hidden-sm"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                                                <a class="btn-add" href="#" class="hidden-sm"><i class="fa fa-list"></i> Detail</a>
                                            </div>
                                            <div class="clearfix">
                                      
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
    <!-- End Electronic product -->

    <!-- Start middle banner -->
    <div class="mid-add-banner">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-item-banner">
                    <img src="{{asset('front-images/add-banner/oneplus_mid.jpg')}}">
                </div>
            </div>
        </div>
    </div>

    <!-- Start Deal -->
    <div class="msp-container">
        <div class="container">
                <div class="row">
                    <div class="col-md-9">
                        <h4 class="title">Deal of day</h4>
                    </div>
                    <div class="col-md-3">
                        <!-- Controls -->
                        <div class="controls pull-right hidden-xs">
                            <a class="left fa fa-chevron-left" href="#carousel-example-deal" data-slide="prev"></a>
                            <a class="right fa fa-chevron-right " href="#carousel-example-deal" data-slide="next"></a>
                        </div>
                    </div>
                </div>
                <div id="carousel-example-deal" class="carousel slide hidden-xs" data-ride="carousel" data-interval="false">
                    <!-- Wrapper for slides -->
                    <div class="carousel-inner">
                        <div class="item active">
                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="col-item">
                                        <div class="photo">
                                            <a href="">
                                                <p class="any-offer">50% Discount</p>
                                                <img src="{{asset('front-images/product/1.jpg')}}" alt="a" /></a>
                                        </div>
                                        <div class="info">
                                        
                                                <div class="price col-md-7">
                                                    <h5><a href="product_detail.html">Sample Product</a></h5>
                                                </div>
                                                <div class="price col-md-4 no-padd">
                                                    <h5 class="price-text-color">
                                                          $199.99</h5>
                                                </div>
                                            </div>
                                            <div class="separator clear-left">
                                                <a class="btn-add" href="#" class="hidden-sm"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                                                <a class="btn-add" href="#" class="hidden-sm"><i class="fa fa-list"></i> Detail</a>
                                            </div>
                                            <div class="clearfix">
                                      
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="col-item">
                                        <div class="photo">
                                            <a href="">
                                                <img src="{{asset('front-images/product/2.jpg')}}" alt="a" /></a>
                                        </div>
                                        <div class="info">
                                        
                                                <div class="price col-md-7">
                                                    <h5><a href="product_detail.html">Sample Product</a></h5>
                                                </div>
                                                <div class="price col-md-4 no-padd">
                                                    <h5 class="price-text-color">
                                                          $199.99</h5>
                                                </div>
                                            </div>
                                            <div class="separator clear-left">
                                                <a class="btn-add" href="#" class="hidden-sm"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                                                <a class="btn-add" href="#" class="hidden-sm"><i class="fa fa-list"></i> Detail</a>
                                            </div>
                                            <div class="clearfix">
                                      
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="col-item">
                                        <div class="photo">
                                            <a href="">
                                                <img src="{{asset('front-images/product/3.jpg')}}" alt="a" /></a>
                                        </div>
                                        <div class="info">
                                        
                                                <div class="price col-md-7">
                                                    <h5><a href="product_detail.html">Sample Product</a></h5>
                                                </div>
                                                <div class="price col-md-4 no-padd">
                                                    <h5 class="price-text-color">
                                                          $199.99</h5>
                                                </div>
                                            </div>
                                            <div class="separator clear-left">
                                                <a class="btn-add" href="#" class="hidden-sm"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                                                <a class="btn-add" href="#" class="hidden-sm"><i class="fa fa-list"></i> Detail</a>
                                            </div>
                                            <div class="clearfix">
                                      
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="col-item">
                                        <div class="photo">
                                            <a href="">
                                                <img src="{{asset('front-images/product/1.jpg')}}" alt="a" /></a>
                                        </div>
                                        <div class="info">
                                        
                                                <div class="price col-md-7">
                                                    <h5><a href="product_detail.html">Sample Product</a></h5>
                                                </div>
                                                <div class="price col-md-4 no-padd">
                                                    <h5 class="price-text-color">
                                                          $199.99</h5>
                                                </div>
                                            </div>
                                            <div class="separator clear-left">
                                                <a class="btn-add" href="#" class="hidden-sm"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                                                <a class="btn-add" href="#" class="hidden-sm"><i class="fa fa-list"></i> Detail</a>
                                            </div>
                                            <div class="clearfix">
                                      
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="col-item">
                                        <div class="photo">
                                            <a href="">
                                                <img src="{{asset('front-images/product/2.jpg')}}" alt="a" /></a>
                                        </div>
                                        <div class="info">
                                        
                                                <div class="price col-md-7">
                                                    <h5><a href="product_detail.html">Sample Product</a></h5>
                                                </div>
                                                <div class="price col-md-4 no-padd">
                                                    <h5 class="price-text-color">
                                                          $199.99</h5>
                                                </div>
                                            </div>
                                            <div class="separator clear-left">
                                                <a class="btn-add" href="#" class="hidden-sm"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                                                <a class="btn-add" href="#" class="hidden-sm"><i class="fa fa-list"></i> Detail</a>
                                            </div>
                                            <div class="clearfix">
                                      
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="col-item">
                                        <div class="photo">
                                            <a href="">
                                                <img src="{{asset('front-images/product/3.jpg')}}" alt="a" /></a>
                                        </div>
                                        <div class="info">
                                        
                                                <div class="price col-md-7">
                                                    <h5><a href="product_detail.html">Sample Product</a></h5>
                                                </div>
                                                <div class="price col-md-4 no-padd">
                                                    <h5 class="price-text-color">
                                                          $199.99</h5>
                                                </div>
                                            </div>
                                            <div class="separator clear-left">
                                                <a class="btn-add" href="#" class="hidden-sm"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                                                <a class="btn-add" href="#" class="hidden-sm"><i class="fa fa-list"></i> Detail</a>
                                            </div>
                                            <div class="clearfix">
                                      
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="col-item">
                                        <div class="photo">
                                            <a href="">
                                                <img src="{{asset('front-images/product/1.jpg')}}" alt="a" /></a>
                                        </div>
                                        <div class="info">
                                        
                                                <div class="price col-md-7">
                                                    <h5><a href="product_detail.html">Sample Product</a></h5>
                                                </div>
                                                <div class="price col-md-4 no-padd">
                                                    <h5 class="price-text-color">
                                                          $199.99</h5>
                                                </div>
                                            </div>
                                            <div class="separator clear-left">
                                                <a class="btn-add" href="#" class="hidden-sm"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                                                <a class="btn-add" href="#" class="hidden-sm"><i class="fa fa-list"></i> Detail</a>
                                            </div>
                                            <div class="clearfix">
                                      
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="col-item">
                                        <div class="photo">
                                            <a href="">
                                                <img src="{{asset('front-images/product/2.jpg')}}" alt="a" /></a>
                                        </div>
                                        <div class="info">
                                        
                                                <div class="price col-md-7">
                                                    <h5><a href="product_detail.html">Sample Product</a></h5>
                                                </div>
                                                <div class="price col-md-4 no-padd">
                                                    <h5 class="price-text-color">
                                                          $199.99</h5>
                                                </div>
                                            </div>
                                            <div class="separator clear-left">
                                                <a class="btn-add" href="#" class="hidden-sm"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                                                <a class="btn-add" href="#" class="hidden-sm"><i class="fa fa-list"></i> Detail</a>
                                            </div>
                                            <div class="clearfix">
                                      
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
    <!-- End Deal -->

    <!-- Start Festival Special -->
    <div class="msp-container">
        <div class="container">
                <div class="row">
                    <div class="col-md-9">
                        <h4 class="title">Festival Special</h3>
                    </div>
                    <div class="col-md-3">
                        <!-- Controls -->
                        <div class="controls pull-right hidden-xs">
                            <a class="left fa fa-chevron-left" href="#carousel-example-festival" data-slide="prev"></a>
                            <a class="right fa fa-chevron-right " href="#carousel-example-festival" data-slide="next"></a>
                        </div>
                    </div>
                </div>
                <div id="carousel-example-festival" class="carousel slide hidden-xs" data-ride="carousel" data-interval="false">
                    <!-- Wrapper for slides -->
                    <div class="carousel-inner">
                        <div class="item active">
                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="col-item">
                                        <div class="photo">
                                            <a href="">
                                                <p class="any-offer">50% Discount</p>
                                                <img src="{{asset('front-images/product/1.jpg')}}" alt="a" /></a>
                                        </div>
                                        <div class="info">
                                        
                                                <div class="price col-md-7">
                                                    <h5><a href="product_detail.html">Sample Product</a></h5>
                                                </div>
                                                <div class="price col-md-4 no-padd">
                                                    <h5 class="price-text-color">
                                                          $199.99</h5>
                                                </div>
                                            </div>
                                            <div class="separator clear-left">
                                                <a class="btn-add" href="#" class="hidden-sm"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                                                <a class="btn-add" href="#" class="hidden-sm"><i class="fa fa-list"></i> Detail</a>
                                            </div>
                                            <div class="clearfix">
                                      
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="col-item">
                                        <div class="photo">
                                            <a href="">
                                                <img src="{{asset('front-images/product/2.jpg')}}" alt="a" /></a>
                                        </div>
                                        <div class="info">
                                        
                                                <div class="price col-md-7">
                                                    <h5><a href="product_detail.html">Sample Product</a></h5>
                                                </div>
                                                <div class="price col-md-4 no-padd">
                                                    <h5 class="price-text-color">
                                                          $199.99</h5>
                                                </div>
                                            </div>
                                            <div class="separator clear-left">
                                                <a class="btn-add" href="#" class="hidden-sm"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                                                <a class="btn-add" href="#" class="hidden-sm"><i class="fa fa-list"></i> Detail</a>
                                            </div>
                                            <div class="clearfix">
                                      
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="col-item">
                                        <div class="photo">
                                            <a href="">
                                                <img src="{{asset('front-images/product/3.jpg')}}" alt="a" /></a>
                                        </div>
                                        <div class="info">
                                        
                                                <div class="price col-md-7">
                                                    <h5><a href="product_detail.html">Sample Product</a></h5>
                                                </div>
                                                <div class="price col-md-4 no-padd">
                                                    <h5 class="price-text-color">
                                                          $199.99</h5>
                                                </div>
                                            </div>
                                            <div class="separator clear-left">
                                                <a class="btn-add" href="#" class="hidden-sm"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                                                <a class="btn-add" href="#" class="hidden-sm"><i class="fa fa-list"></i> Detail</a>
                                            </div>
                                            <div class="clearfix">
                                      
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="col-item">
                                        <div class="photo">
                                            <a href="">
                                                <img src="{{asset('front-images/product/1.jpg')}}" alt="a" /></a>
                                        </div>
                                        <div class="info">
                                        
                                                <div class="price col-md-7">
                                                    <h5><a href="product_detail.html">Sample Product</a></h5>
                                                </div>
                                                <div class="price col-md-4 no-padd">
                                                    <h5 class="price-text-color">
                                                          $199.99</h5>
                                                </div>
                                            </div>
                                            <div class="separator clear-left">
                                                <a class="btn-add" href="#" class="hidden-sm"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                                                <a class="btn-add" href="#" class="hidden-sm"><i class="fa fa-list"></i> Detail</a>
                                            </div>
                                            <div class="clearfix">
                                      
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="col-item">
                                        <div class="photo">
                                            <a href="">
                                                <img src="{{asset('front-images/product/2.jpg')}}" alt="a" /></a>
                                        </div>
                                        <div class="info">
                                        
                                                <div class="price col-md-7">
                                                    <h5><a href="product_detail.html">Sample Product</a></h5>
                                                </div>
                                                <div class="price col-md-4 no-padd">
                                                    <h5 class="price-text-color">
                                                          $199.99</h5>
                                                </div>
                                            </div>
                                            <div class="separator clear-left">
                                                <a class="btn-add" href="#" class="hidden-sm"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                                                <a class="btn-add" href="#" class="hidden-sm"><i class="fa fa-list"></i> Detail</a>
                                            </div>
                                            <div class="clearfix">
                                      
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="col-item">
                                        <div class="photo">
                                            <a href="">
                                                <img src="{{asset('front-images/product/3.jpg')}}" alt="a" /></a>
                                        </div>
                                        <div class="info">
                                        
                                                <div class="price col-md-7">
                                                    <h5><a href="product_detail.html">Sample Product</a></h5>
                                                </div>
                                                <div class="price col-md-4 no-padd">
                                                    <h5 class="price-text-color">
                                                          $199.99</h5>
                                                </div>
                                            </div>
                                            <div class="separator clear-left">
                                                <a class="btn-add" href="#" class="hidden-sm"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                                                <a class="btn-add" href="#" class="hidden-sm"><i class="fa fa-list"></i> Detail</a>
                                            </div>
                                            <div class="clearfix">
                                      
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="col-item">
                                        <div class="photo">
                                            <a href="">
                                                <img src="{{asset('front-images/product/1.jpg')}}" alt="a" /></a>
                                        </div>
                                        <div class="info">
                                        
                                                <div class="price col-md-7">
                                                    <h5><a href="product_detail.html">Sample Product</a></h5>
                                                </div>
                                                <div class="price col-md-4 no-padd">
                                                    <h5 class="price-text-color">
                                                          $199.99</h5>
                                                </div>
                                            </div>
                                            <div class="separator clear-left">
                                                <a class="btn-add" href="#" class="hidden-sm"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                                                <a class="btn-add" href="#" class="hidden-sm"><i class="fa fa-list"></i> Detail</a>
                                            </div>
                                            <div class="clearfix">
                                      
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="col-item">
                                        <div class="photo">
                                            <a href="">
                                                <img src="{{asset('front-images/product/2.jpg')}}" alt="a" /></a>
                                        </div>
                                        <div class="info">
                                        
                                                <div class="price col-md-7">
                                                    <h5><a href="product_detail.html">Sample Product</a></h5>
                                                </div>
                                                <div class="price col-md-4 no-padd">
                                                    <h5 class="price-text-color">
                                                          $199.99</h5>
                                                </div>
                                            </div>
                                            <div class="separator clear-left">
                                                <a class="btn-add" href="#" class="hidden-sm"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                                                <a class="btn-add" href="#" class="hidden-sm"><i class="fa fa-list"></i> Detail</a>
                                            </div>
                                            <div class="clearfix">
                                      
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div><!-- End Festival special -->


    <!-- Start Serive Conainer -->
    <div class="service-container">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-4">
                    <div class="col-item-content">
                        <a href="#"><img src="{{asset('front-images/DesktopSlider_NP_1.jpg')}}"></a>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4">
                    <div class="col-item-content">
                        <a href="#"><img src="{{asset('front-images/DesktopSlider_NP_2.jpg')}}"></a>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4">
                    <div class="col-item-content">
                        <a href="#"><img src="{{asset('front-images/DesktopSlider_NP_3.jpg')}}"></a>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- End Serive Conainer -->


    <!-- Start parallex content -->
    <div id="doingbusiness" class="doing-business" >
        <section class="story-approach">
            <h4 class="title text-center">doing business on karmastha is really easy</h4>
            <div id="business-slider" class="business-carousal">
                <div class="business-outer">
                    <div class="business-wrapper clearfix">
                        <div class="item-wrapper">
                            <div class="item">
                                <div class="business-content list-content">
                                    <h3>Step 1</h3>
                                    <h2>List your products</h2>
                                    <p>Uploading your products is really simple through our self-serve tool. We also help you put together an attractive catalog by connecting you with industry experts.</p>
                                    <div class="cards">
                                        <div class="card-desc">
                                            <div class="card-img-holder">
                                                <span class="how how-1"></span>
                                            </div>
                                            <div class="card-cont">
                                                <p>Easy to use<br>self-serve portal</p>
                                            </div>
                                        </div>

                                        <div class="card-desc">
                                            <div class="card-img-holder">
                                                <span class="how how-2"></span>
                                            </div>
                                            <div class="card-cont">
                                                <p>Catalog &#38; photo-shoot<br>partners across India</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="item-wrapper">
                            <div class="item">
                                <div class="business-content sell-content">
                                    <h3>Step 2</h3>
                                    <h2>Sell across India</h2>
                                    <p>Maximise your online sales; attract more buyers and achieve higher conversion rates.</p>
                                    <div class="cards">
                                        <div class="card-desc">
                                            <div class="card-img-holder">
                                                <span class="how how-3"></span>
                                            </div>
                                            <div class="card-cont">
                                                <p>Easy<br>dashboard</p>
                                            </div>
                                        </div>
                                        <div class="card-desc">
                                            <div class="card-img-holder">
                                                <span class="how how-4"></span>
                                            </div>
                                            <div class="card-cont">
                                                <p>Promotions<br>and advertising</p>
                                            </div>
                                        </div>
                                        <div class="card-desc third-card">
                                            <div class="card-img-holder">
                                                <span class="how how-5"></span>
                                            </div>
                                            <div class="card-cont">
                                                <p>Analytics<br>support</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="item-wrapper">
                            <div class="item">
                                <div class="business-content sell-content">
                                    <h3>Step 3</h3>
                                    <h2>Ship with ease</h2>
                                    <p>Enjoy hassle-free pick-up and delivery across India through our logistics services and sell across the nation!</p>
                                    <div class="cards">
                                        <div class="card-desc">
                                            <div class="card-img-holder">
                                                <span class="how how-6"></span>
                                            </div>
                                            <div class="card-cont">
                                                <p>Dedicated<br>pick-up service</p>
                                            </div>
                                        </div>
                                        <div class="card-desc">
                                            <div class="card-img-holder">
                                                <span class="how how-7"></span>
                                            </div>
                                            <div class="card-cont">
                                                <p>Packaging support</p>
                                            </div>
                                        </div>
                                        <div class="card-desc third-card">
                                            <div class="card-img-holder">
                                                <span class="how how-8"></span>
                                            </div>
                                            <div class="card-cont">
                                                <p>Pan-India reach</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="item-wrapper">
                            <div class="item">
                                <div class="business-content sell-content">
                                    <h3>Step 4</h3>
                                    <h2>Earn big</h2>
                                    <p>Make use of the host of services that we offer and earn more. Our payments process is the fastest in the industry - get your payments within 7-14 days of sales!</p>
                                    <div class="cards">
                                        <div class="card-desc">
                                            <div class="card-img-holder">
                                                <span class="how how-9"></span>
                                            </div>
                                            <div class="card-cont">
                                                <p>Fastest payments settlements<br>in the industry</p>
                                            </div>
                                        </div>
                                        <div class="card-desc">
                                            <div class="card-img-holder">
                                                <span class="how how-10"></span>
                                            </div>
                                            <div class="card-cont">
                                                <p>Lending partner<br>network</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="item-wrapper">
                            <div class="item form-item">
                                <div class="start-selling-form">
                                    <h2>Start Selling</h2>
                                    <form action="/" method="post" accept-charset="UTF-8" class="slp_seller_form">
                                        <div>
                                            <div class="form-type-textfield form-item-email form-item form-group">
                                                <input id="useremail" type="text" placeholder="Email ID" name="email" class="form-control form-text required">
                                            </div>
                                            <div class="form-type-textfield form-item-phone form-item form-group">
                                                <input id="userphone" type="text" placeholder="Phone Number" name="phone" class="form-control form-text required">
                                            </div>
                                            <button id="edit-submit--3" value="Start Selling" type="submit" onClick="_gaq.push(['_trackEvent', 'SLP', 'Start_Selling', 'Doing_business']);" class="btn btn-default form-submit">Start Selling</button>
                                        </div>
                                    </form>

                                    <div class="clearfix">
                                        <div class="left left-block">
                                            <p>More Than</p>
                                            <h3>1,00,000</h3>
                                            <p>Online Sellers</p>
                                            <a href="/slp/slp-categories/success-stories" class="link-to">Read Success Stories</a>
                                        </div>
                                    </div><!--a.start-selling-form.slp_seller_form(href="#")-->
                                </div>
                            </div>
                        </div>    

                    </div>
                </div>
            </div>


            <!-- <div class="owl-pagination">
                <div class="owl-page active">
                    <span class="owl-number-1">1</span>
                </div>
                <div class="owl-page">
                    <span class="owl-number-2">2</span>
                </div>
                <div class="owl-page">
                    <span class="owl-number-3">3</span>
                </div>
                <div class="owl-page">
                    <span class="owl-number-4">4</span>
                </div>
                <div class="owl-page">
                    <span class="owl-number-5">5</span>
                </div>
            </div>  -->
        </section>
    </div><!-- Other normal contents-->


    <!-- Start Brands Conainer -->
    <div class="member-container">

        <div class="member-header">
            <h4>Business Members</h4>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <ul id="flexisel_slider"> 
                        <li><img src="{{asset('front-images/company-logo/1.jpg')}}" /></li>
                        <li><img src="{{asset('front-images/company-logo/2.jpg')}}" /></li>    
                        <li><img src="{{asset('front-images/company-logo/3.jpg')}}" /></li>     
                        <li><img src="{{asset('front-images/company-logo/4.png')}}" /></li> 
                        <li><img src="{{asset('front-images/company-logo/5.jpg')}}" /></li>                                                          
                    </ul>
                </div>
            </div>
        </div>
    </div><!-- End Brands Conainer -->

@endsection