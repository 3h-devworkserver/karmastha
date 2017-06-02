@extends('frontend.layouts.app')

@section('title')
{{$setting->title}} @if(!empty($setting->tagline))|| {{$setting->tagline}}@endif
@endsection

@section('meta_title')
@if(!empty($page->meta_title)){{$page->meta_title}}@else @if(!empty($page->title)){{$page->title}}@else{{$setting->meta_title}}@endif @endif
@endsection

@section('meta_description')
@if(!empty($page->meta_desc)){{$page->meta_desc}}@else{{$setting->meta_desc}}@endif
@endsection

@section('meta_keyword')
@if(!empty($page->meta_keyword)){{$page->meta_keyword}}@else{{$setting->meta_keyword}} @endif
@endsection
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
                                <a href="{{'brand/'.$brand->slug}}">
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

    @if(count($page->topStaticBlock) > 0)
    <!-- Start Serive Conainer -->
    <div class="service-container">
        <div class="container">
            <div class="row">
                @foreach($page->topStaticBlock as $block)
                <div class="col-md-4 col-sm-4">
                    <div class="col-item-content">
                        <a href="{{$block->url}}"><img src="{{asset($block->feature_image)}}"></a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- End Serive Conainer -->
    @endif

   
    @if(!empty($page->top_content))
        <?php   
            file_put_contents(base_path() . '/resources/views/frontend/tmp.blade.php', $page->top_content);
                $html = view('frontend.tmp')->render();
            echo $html;
        ?> 
    @endif

    <?php /* ?>
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
    <?php */ ?>

    @if(count($page->bottomStaticBlock) > 0)    
    <!-- Start Serive Conainer -->
    <div class="service-container">
        <div class="container">
            <div class="row">
            @foreach($page->bottomStaticBlock as $block)
                <div class="col-md-4 col-sm-4">
                    <div class="col-item-content">
                        <a href="{{$block->url}}"><img src="{{asset($block->feature_image)}}"></a>
                    </div>
                </div>
            @endforeach
            </div>
        </div>
    </div>
    <!-- End Serive Conainer -->
    @endif

    @if(!empty($page->bottom_content))
        <?php   
            file_put_contents(base_path() . '/resources/views/frontend/tmp.blade.php', $page->bottom_content);
                $html = view('frontend.tmp')->render();
            echo $html;
        ?> 
    @endif

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