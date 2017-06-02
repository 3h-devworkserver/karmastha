@extends('frontend.layouts.app')

@section('title')
{{$category->title}} @if(!empty($setting->tagline))|| {{$setting->tagline}}@endif
@endsection

@section('meta_title')
@if(!empty($category->meta_title)){{$category->meta_title}}@else @if(!empty($category->title)){{$category->title}}@else{{$setting->meta_title}}@endif @endif
@endsection

@section('meta_description')
@if(!empty($category->meta_desc)){{$category->meta_desc}}@else{{$setting->meta_desc}}@endif
@endsection

@section('meta_keyword')
@if(!empty($category->meta_keyword)){{$category->meta_keyword}}@else{{$setting->meta_keyword}} @endif
@endsection

@section('content')

	<div class="breadcrumbs">
	    <div class="container">
	        <div class="row">
	            <div class="col-md-12 col-md-12">
	                <ol class="breadcrumb">
	                    <li><a href="{{url('/')}}">Home</a></li>
	                    <li class="active">{{$category->title}}</li>
	                </ol>
	            </div>
	        </div>
	    </div>
	</div> 
    <div class="product_cat_info">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-md-12">
                    <h4 class="title">{{$category->title}}</h4>
                    {!! $category->description !!}
                </div>    
            </div>
        </div>
    </div>
    {{-- <div class="secondad-banner">
        <div class="container">
            <div class="row">
                    <div class="is-padding banner-static">
                        <div class="col-md-6 col-sm-6 col-sms-12">
                            <div class="col col1">
                                <a href="#">
                                    <img src="{{asset('front-images/block-home7.jpg')}}" alt="block">
                                </a>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6 col-sms-12">
                            <div class="col col2">
                                <a href="#">
                                    <img src="{{asset('front-images/block1-home7.jpg')}}" alt="block1">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div> --}}
	<div class="catagory_container product-listing-category">
	    <div class="container">
	        <div class="row">
	            <div class=" is-padding product_list">
	                <div class="col-md-3 col-sm-3">
	                    <div class="sidebar">
	                        <h4 class="title">categories</h4>
	                        <div class="panel-group category-products" id="accordian"><!--category-productsr-->
	                            <div class="panel panel-default">
	                                <div class="panel-heading">
	                                    <h4 class="panel-title">
	                                        <a data-toggle="collapse" data-parent="#accordian" href="#sportswear">
	                                            <span class="badge pull-right"><i class="fa fa-angle-down"></i></span>
	                                            Sportswear
	                                        </a>
	                                    </h4>
	                                </div>
	                                <div id="sportswear" class="panel-collapse collapse">
	                                    <div class="panel-body">
	                                        <ul>
	                                            <li><a href="#">Nike </a></li>
	                                            <li><a href="#">Under Armour </a></li>
	                                            <li><a href="#">Adidas </a></li>
	                                            <li><a href="#">Puma</a></li>
	                                            <li><a href="#">ASICS </a></li>
	                                        </ul>
	                                    </div>
	                                </div>
	                            </div>
	                            <div class="panel panel-default">
	                                <div class="panel-heading">
	                                    <h4 class="panel-title">
	                                        <a data-toggle="collapse" data-parent="#accordian" href="#mens">
	                                            <span class="badge pull-right"><i class="fa fa-angle-down"></i></span>
	                                            Men's
	                                        </a>
	                                    </h4>
	                                </div>
	                                <div id="mens" class="panel-collapse collapse">
	                                    <div class="panel-body">
	                                        <ul>
	                                            <li><a href="#">Fendi</a></li>
	                                            <li><a href="#">Guess</a></li>
	                                            <li><a href="#">Valentino</a></li>
	                                            <li><a href="#">Dior</a></li>
	                                            <li><a href="#">Versace</a></li>
	                                            <li><a href="#">Armani</a></li>
	                                            <li><a href="#">Prada</a></li>
	                                            <li><a href="#">Dolce and Gabbana</a></li>
	                                            <li><a href="#">Chanel</a></li>
	                                            <li><a href="#">Gucci</a></li>
	                                        </ul>
	                                    </div>
	                                </div>
	                            </div>
	                    
	                            <div class="panel panel-default">
	                                <div class="panel-heading">
	                                    <h4 class="panel-title">
	                                        <a data-toggle="collapse" data-parent="#accordian" href="#womens">
	                                            <span class="badge pull-right"><i class="fa fa-angle-down"></i></span>
	                                            Women's
	                                        </a>
	                                    </h4>
	                                </div>
	                                <div id="womens" class="panel-collapse collapse">
	                                    <div class="panel-body">
	                                        <ul>
	                                            <li><a href="#">Fendi</a></li>
	                                            <li><a href="#">Guess</a></li>
	                                            <li><a href="#">Valentino</a></li>
	                                            <li><a href="#">Dior</a></li>
	                                            <li><a href="#">Versace</a></li>
	                                        </ul>
	                                    </div>
	                                </div>
	                            </div>
	                        </div>
	                        <div class="sidebar_price">
	                            <h4 class="title">price</h4 class="title">
	                            <div class="price-slider">
	                                <label for="amount">Price range:</label>
	                              <input type="text" id="amount" disabled>
	                            </div>
	                            <div id="slider-range"></div>
	                        </div>
	                        <div class="sidebar_brand">
	                            <h4 class="title">brand</h4>
	                            <div class="sidebar_search_form">
	                                <form action="" class="form-horizontal">
	                                    <div class="form-group">
	                                        <button class="btn"><i class="fa fa-search"></i></button>
	                                        <input class="form-control" id="" placeholder="search for brand" type="text">
	                                    </div>
	                                </form>
	                            </div>
	                            <div class="sidebar_checkbox">
	                                <div class="checkbox">
	                                    <input id="checkbox1" type="checkbox" name="check">
	                                    <label for="checkbox1"><span></span>levi's</label>
	                                </div>
	                                <div class="checkbox">
	                                    <input id="checkbox2" type="checkbox">
	                                    <label for="checkbox2"><span></span>wrangler</label>
	                                </div>
	                                <div class="checkbox">
	                                    <input id="checkbox3" type="checkbox">
	                                    <label for="checkbox3"><span></span>united colors of benetton</label>
	                                </div>
	                                <div class="checkbox">
	                                    <input id="checkbox4" type="checkbox">
	                                    <label for="checkbox4"><span></span>peter england</label>
	                                </div>
	                                <div class="checkbox">
	                                    <input id="checkbox5" type="checkbox">
	                                    <label for="checkbox5"><span></span>lee</label>
	                                </div>
	                                <div class="checkbox">
	                                    <input id="checkbox6" type="checkbox">
	                                    <label for="checkbox6"><span></span>puma</label>
	                                </div>
	                            </div>
	                        </div>
	                    </div>
	                </div><!--end side bar -->
	                <div class="col-md-9 col-sm-9" id="cart_items">
	                    <div class="left_bg_color">
	                        @if(count($category->topBanners) > 0 )
	                        <div class="category_slideshow">
	                            <div id="slideshow">
		                            @foreach($category->topBanners as $banner)
		                               	<div>
			                               	<a href="{{$banner->banner_url}}" title="{{$banner->banner_title}}">
			                                 	<img src="{{asset('images/category/banner/'.$banner->banner_image)}}" alt="{{$banner->banner_desc}}">
			                                </a>
		                               	</div>
		                            @endforeach
	                            </div>
	                        </div>
	                        @endif
	                            
	                    <div class="is-padding product-list-container">
	                    	@if(count($category->topBrands) > 0)  	  
	                        <div class="product_list_image">
	                            <h4 class="title">Top Brands</h4>
								
								@foreach($category->topBrands as $brand)
	                            <div class="col-md-4 col-sm-4">
	                                <div class="col-item product-box hvr-glow">
	                                    <figure><a href="{{url('brand/'.$brand->slug.'?category='.$category->url)}}"><img src="{{asset($brand->brand_logo)}}" alt="{{$brand->brand_name}}" class="overlay-image"></a></figure>
	                                    <div class="info">
	                                        <div class="info_product">
	                                            <div class="price col-md-12">
	                                                <h5><a href="{{url('brand/'.$brand->slug.'?category='.$category->url)}}">{{$brand->brand_name}} </a></h5>
	                                            </div>
	                                            <!-- <div class="price col-md-12 no-padd">
	                                                <h5 class="price-text-color">$199.99</h5>
	                                            </div> -->
	                                        </div>
	                                        <!-- <div class="separator clear-left">
	                                            <a class="btn-add" href="cart.html" class="hidden-sm"><i class="fa fa-shopping-cart"></i> Add to cart</a>
	                                            <a class="btn-add" href="product_detail.html" class="hidden-sm"><i class="fa fa-list"></i> Detail</a>
	                                        </div> -->
	                                    </div>
	                                </div>
	                            </div>
								@endforeach
								<?php /* ?>
		                            <div class="col-md-4 col-sm-4">
		                                <div class="col-item product-box hvr-glow">
		                                    <figure><a href="product_list.html"><img src="{{asset('front-images/product/1-800x800.jpg')}}" alt="Avatar" class="overlay-image"></a></figure>
		                                    <div class="info">
		                                        <div class="info_product">
		                                            <div class="price col-md-7">
		                                                <h5><a href="product_detail.html">Vacuum Insulated Travel Tumbler Mug Drinking Cups</a></h5>
		                                            </div>
		                                            <!-- <div class="price col-md-4 no-padd">
		                                                <h5 class="price-text-color">$199.99</h5>
		                                            </div> -->
		                                        </div>
		                                        <!-- <div class="separator clear-left">
		                                            <a class="btn-add" href="#" class="hidden-sm"><i class="fa fa-shopping-cart"></i> Add to cart</a>
		                                            <a class="btn-add" href="#" class="hidden-sm"><i class="fa fa-list"></i> Detail</a>
		                                        </div> -->
		                                    </div>
		                                </div>
		                            </div>

		                            <div class="col-md-4 col-sm-4">
		                                <div class="col-item product-box hvr-glow">
		                                    <figure><a href="product_list.html"><img src="{{asset('front-images/product/4-800x800.jpg')}}" alt="Avatar" class="overlay-image"></a></figure>
		                                    <div class="info">
		                                        <div class="info_product">
		                                            <div class="price col-md-7">
		                                                <h5><a href="product_detail.html">Vacuum Insulated Travel Tumbler Mug Drinking Cups</a></h5>
		                                            </div>
		                                            <!-- <div class="price col-md-4 no-padd">
		                                                <h5 class="price-text-color">$199.99</h5>
		                                            </div> -->
		                                        </div>
		                                        <!-- <div class="separator clear-left">
		                                            <a class="btn-add" href="#" class="hidden-sm"><i class="fa fa-shopping-cart"></i> Add to cart</a>
		                                            <a class="btn-add" href="#" class="hidden-sm"><i class="fa fa-list"></i> Detail</a>
		                                        </div> -->
		                                    </div>
		                                </div>
		                            </div>

		                            <div class="col-md-4 col-sm-4">
		                                <div class="col-item product-box hvr-glow">
		                                    <figure><a href="product_list.html"><img src="{{asset('front-images/product/10-800x800.jpg')}}" alt="Avatar" class="overlay-image"></a></figure>
		                                    <div class="info">
		                                        <div class="info_product">
		                                            <div class="price col-md-7">
		                                                <h5><a href="product_detail.html">Sample Product</a></h5>
		                                            </div>
		                                            <!-- <div class="price col-md-4 no-padd">
		                                                <h5 class="price-text-color">$199.99</h5>
		                                            </div> -->
		                                        </div>
		                                        <!-- <div class="separator clear-left">
		                                            <a class="btn-add" href="#" class="hidden-sm"><i class="fa fa-shopping-cart"></i> Add to cart</a>
		                                            <a class="btn-add" href="#" class="hidden-sm"><i class="fa fa-list"></i> Detail</a>
		                                        </div> -->
		                                    </div>
		                                </div>
		                            </div>

		                            <div class="col-md-4 col-sm-4">
		                                <div class="col-item product-box hvr-glow">
		                                    <figure><a href="product_list.html"><img src="{{asset('front-images/product/5.jpg')}}" alt="Avatar" class="overlay-image"></a></figure>
		                                    <div class="info">
		                                        <div class="info_product">
		                                            <div class="price col-md-7">
		                                                <h5><a href="product_detail.html">Sample Product</a></h5>
		                                            </div>
		                                            <!-- <div class="price col-md-4 no-padd">
		                                                <h5 class="price-text-color">$199.99</h5>
		                                            </div> -->
		                                        </div>
		                                        <!-- <div class="separator clear-left">
		                                            <a class="btn-add" href="#" class="hidden-sm"><i class="fa fa-shopping-cart"></i> Add to cart</a>
		                                            <a class="btn-add" href="#" class="hidden-sm"><i class="fa fa-list"></i> Detail</a>
		                                        </div> -->
		                                    </div>
		                                </div>
		                            </div>

		                            <div class="col-md-4 col-sm-4">
		                                <div class="col-item product-box hvr-glow">
		                                    <figure><a href="product_list.html"><img src="{{asset('front-images/product/6.jpg')}}" alt="Avatar" class="overlay-image"></a></figure>
		                                    <div class="info">
		                                        <div class="info_product">
		                                            <div class="price col-md-7">
		                                                <h5><a href="product_detail.html">Sample Product</a></h5>
		                                            </div>
		                                            <!-- <div class="price col-md-4 no-padd">
		                                                <h5 class="price-text-color">$199.99</h5>
		                                            </div> -->
		                                        </div>
		                                        <!-- <div class="separator clear-left">
		                                            <a class="btn-add" href="#" class="hidden-sm"><i class="fa fa-shopping-cart"></i> Add to cart</a>
		                                            <a class="btn-add" href="#" class="hidden-sm"><i class="fa fa-list"></i> Detail</a>
		                                        </div> -->
		                                    </div>
		                                </div>
		                            </div>

		                            <div class="col-md-4 col-sm-4">
		                                <div class="col-item product-box hvr-glow">
		                                    <figure><a href="product_list.html"><img src="{{asset('front-images/product/7.jpg')}}" alt="Avatar" class="overlay-image"></a></figure>
		                                    <div class="info">
		                                        <div class="info_product">
		                                            <div class="price col-md-7">
		                                                <h5><a href="product_detail.html">Sample Product</a></h5>
		                                            </div>
		                                            <!-- <div class="price col-md-4 no-padd">
		                                                <h5 class="price-text-color">$199.99</h5>
		                                            </div> -->
		                                        </div>
		                                        <!-- <div class="separator clear-left">
		                                            <a class="btn-add" href="#" class="hidden-sm"><i class="fa fa-shopping-cart"></i> Add to cart</a>
		                                            <a class="btn-add" href="#" class="hidden-sm"><i class="fa fa-list"></i> Detail</a>
		                                        </div> -->
		                                    </div>
		                                </div>
		                            </div>

		                            <div class="col-md-4 col-sm-4">
		                                <div class="col-item product-box hvr-glow">
		                                    <figure><a href="product_list.html"><img src="{{asset('front-images/product/8.jpg')}}" alt="Avatar" class="overlay-image"></a></figure>
		                                    <div class="info">
		                                        <div class="info_product">
		                                            <div class="price col-md-7">
		                                                <h5><a href="product_detail.html">Sample Product</a></h5>
		                                            </div>
		                                            <!-- <div class="price col-md-4 no-padd">
		                                                <h5 class="price-text-color">$199.99</h5>
		                                            </div> -->
		                                        </div>
		                                        <!-- <div class="separator clear-left">
		                                            <a class="btn-add" href="#" class="hidden-sm"><i class="fa fa-shopping-cart"></i> Add to cart</a>
		                                            <a class="btn-add" href="#" class="hidden-sm"><i class="fa fa-list"></i> Detail</a>
		                                        </div> -->
		                                    </div>
		                                </div>
		                            </div>

		                            <div class="col-md-4 col-sm-4">
		                                <div class="col-item product-box hvr-glow">
		                                    <figure><a href="product_list.html"><img src="{{asset('front-images/product/9.jpg')}}" alt="Avatar" class="overlay-image"></a></figure>
		                                    <div class="info">
		                                        <div class="info_product">
		                                            <div class="price col-md-7">
		                                                <h5><a href="product_detail.html">Sample Product</a></h5>
		                                            </div>
		                                            <!-- <div class="price col-md-4 no-padd">
		                                                <h5 class="price-text-color">$199.99</h5>
		                                            </div> -->
		                                        </div>
		                                        <!-- <div class="separator clear-left">
		                                            <a class="btn-add" href="#" class="hidden-sm"><i class="fa fa-shopping-cart"></i> Add to cart</a>
		                                            <a class="btn-add" href="#" class="hidden-sm"><i class="fa fa-list"></i> Detail</a>
		                                        </div> -->
		                                    </div>
		                                </div>
		                            </div>

		                            <div class="col-md-4 col-sm-4">
		                                <div class="col-item product-box hvr-glow">
		                                    <figure><a href="product_list.html"><img src="{{asset('front-images/product/10.jpg')}}" alt="Avatar" class="overlay-image"></a></figure>
		                                    <div class="info">
		                                        <div class="info_product">
		                                            <div class="price col-md-7">
		                                                <h5><a href="product_detail.html">Sample Product</a></h5>
		                                            </div>
		                                            <!-- <div class="price col-md-4 no-padd">
		                                                <h5 class="price-text-color">$199.99</h5>
		                                            </div> -->
		                                        </div>
		                                        <!-- <div class="separator clear-left">
		                                            <a class="btn-add" href="#" class="hidden-sm"><i class="fa fa-shopping-cart"></i> Add to cart</a>
		                                            <a class="btn-add" href="#" class="hidden-sm"><i class="fa fa-list"></i> Detail</a>
		                                        </div> -->
		                                    </div>
		                                </div>
		                            </div>
	                            <?php */ ?>
	                        </div><!-- End product list image -->
							@endif
							
							@if(count($category->middleBanners) > 0)
								@foreach($category->middleBanners as $banner)
		                        <div class="is-padding widget rpp-banner">
		                            <h2 class="banner-wrapper">
		                            <a href="{{$banner->banner_url}}" title="{{$banner->banner_desc}}">
		                                <img class="img-lazy-load" alt="{{$banner->banner_desc}}" src="{{asset('images/category/banner/'.$banner->banner_image)}}">
		                            </a>
		                            </h2>
		                        </div>
		                        @endforeach
	                        @endif

	                        <div class="product_list_image is-padding shop_category">
	                            <h4 class="title">shop by category</h4>
								
								<ul class="wp-categories-list">
									@foreach($category->topChilds as $child)
									<li class="col-lg-3 col-md-3 col-sm-3">
										<a class="wp-categories-link maxheight" href="{{url('category/'.$child->url)}}">
											<h5 class="wp-categories-title">{{$child->title}}</h5>
											<img src="{{asset('images/category/'.$child->feat_img)}}" class="wp-categories-listimage">
										</a>
									</li>
									@endforeach
									@foreach($category->moreChilds as $child)
									<li class="col-lg-3 col-md-3 col-sm-3">
										<a class="wp-categories-link maxheight" href="{{url('category/'.$child->url)}}">
											<h5 class="wp-categories-title">{{$child->title}}</h5>
											<img src="{{asset('images/category/'.$child->feat_img)}}" class="wp-categories-listimage">
										</a>
									</li>
									@endforeach
								</ul>	                            

	                        </div><!--End shop by category-->
	                            
	                    </div><!--end product list -->
	                    
	                </div>
	            </div>
	        </div>
	    </div>
	    </div>
	</div><!-- End product list-->


@endsection