@extends('frontend.layouts.app')

@section('content')
    <!-- Start slider container -->
    @include('frontend.includes.banner')
    <!-- End slider container -->

    <!-- Start Member Conainer -->
    @if(count($brands) > 0)
        <div class="top-brands">

            <div class="brands-header">
                <h4 class="title">top brands</h4>
            </div>

            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="brands-img">

                            @foreach($brands as $brand)
                            <div class="col-md-2">
                                <a href="{{$brand->url}}">
                                    <img src="{{asset($brand->brand_logo)}}" alt="{{$brand->brand_name}}">
                                </a>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
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
{!! featured_products() !!}

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


    {!! $page->content!!}


    <!-- Start Brands Conainer -->
    @if(count($members) > 0)
    <div class="member-container">

        <div class="member-header">
            <h4>Business Members</h4>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <ul id="flexisel_slider"> 
                        @foreach($members as $member)
                        <li><img src="{{asset($member->logo)}}" alt="{{$member->Name}}" /></li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div><!-- End Brands Conainer -->
    @endif
@endsection