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
   
	<div class="catagory_container is-padding">
            <div class="container">
                <div class="row">
                    <div class="product_list">
                        <div class="col-md-3 col-sm-3">
                            <div class="sidebar">
                            @if(count($category->childs) > 0)
                            <h4 class="title">categories</h4>
                            <div class="panel-group category-products" id="accordian"><!--category-productsr-->

                                @if(count($category->topChilds) >0 )
                                    @include('frontend.category.sidebarcategory', ['childs'=>$category->topChilds])
                                @endif
                                @if(count($category->moreChilds) >0 )
                                    @include('frontend.category.sidebarcategory', ['childs'=>$category->moreChilds])
                                @endif

                            </div>
                            @endif
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
                        @if(count($products) > 0)
                        <div class="col-md-9 col-sm-9" id="cart_items">
                           <div class="left_bg_color">
                                <div class="product-list-container">
                                    <div class="product_list_image">
                                    
                                    @foreach($products as $product)
                                        <div class="col-md-4 col-sm-4">
                                            <div class="product-box hvr-glow">
                                                <figure><a href="{{url('product/'.$product->slug)}}"><img src="{{asset('images/product/'.$product->id.'/small/'.$product->productListImage[0]->image)}}" alt="{{$product->name}}" class="overlay-image"></a></figure>

                                                <div class="info">
                                                    <div class="info_product">
                                                        <div class="price col-md-7">
                                                            <h5><a href="{{url('product/'.$product->slug)}}">{{$product->name}}</a></h5>
                                                        </div>
                                                        <div class="price col-md-4 no-padd">
                                                            <h5 class="price-text-color">
                                                                @if(!empty($product->productPrice->special_price)) NPR {{$product->productPrice->special_price}} @else NPR {{$product->productPrice->price}} 
                                                                @endif
                                                            </h5>
                                                        </div>
                                                    </div>
                                                    <div class="separator clear-left">
                                                        <a class="btn-add" href="#" class="hidden-sm"><i class="fa fa-heart"></i> Add to Wishlist</a>
                                                        <a class="btn-add" target="_blank" href="{{url('product/'.$product->slug)}}" class="hidden-sm"><i class="fa fa-list"></i> Detail</a>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    @endforeach

                                    
                                </div><!-- End product list image -->
                                
                            </div>
                        </div>
                    </div>
                    @endif

                    </div>
                </div>
            </div><!-- End product list-->


    <!-- START QUICKVIEW PRODUCT -->
    <div id="quickview-wrapper">
        <!-- Modal -->
        <div class="modal fade" id="productModal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <section id="page-content" class="page-wrapper">

                            <!-- SHOP SECTION START -->
                            <div class="shop-section mb-80">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-12 col-xs-12">
                                            <!-- single-product-area start -->
                                            <div class="single-product-area mb-80">
                                                <div class="row">
                                                    <!-- imgs-zoom-area start -->
                                                    <div class="col-md-5 col-sm-5 col-xs-12">
                                                        
                                                        <div class="imgs-zoom-area">
                                                            <div class="product-info-Wishlist">
                                                            <a href="#" data-toggle="tooltip" title="Add To Wishlist" class="w-list" data-placement="left"><i class="fa fa-heart"></i></a>
                                                        </div>
                                                            <img id="zoom_03" src="assets/images/product/6.jpg" data-zoom-image="assets/images/product/6.jpg" alt="">
                                                            <div class="row">
                                                                <div class="col-xs-12">
                                                                    <div id="gallery_01" class="carousel-btn slick-arrow-3 mt-30">
                                                                        <div class="p-c thumb-image">
                                                                            <a href="#" data-image="assets/images/product/2.jpg" data-zoom-image="assets/images/product/2.jpg">
                                                                                <img class="zoom_03" src="assets/images/product/2.jpg" alt="">
                                                                            </a>
                                                                        </div>
                                                                        
                                                                        <div class="p-c">
                                                                            <a href="#" data-image="assets/images/product/6.jpg" data-zoom-image="assets/images/product/6.jpg">
                                                                                <img class="zoom_03" src="assets/images/product/6.jpg" alt="">
                                                                            </a>
                                                                        </div>
                                                                        <div class="p-c">
                                                                            <a href="#" data-image="assets/images/product/7.jpg" data-zoom-image="assets/images/product/7.jpg">
                                                                                <img class="zoom_03" src="assets/images/product/7.jpg" alt="">
                                                                            </a>
                                                                        </div>
                                                                        <div class="p-c">
                                                                            <a href="#" data-image="assets/images/product/8.jpg" data-zoom-image="assets/images/product/8.jpg">
                                                                                <img class="zoom_03" src="assets/images/product/8.jpg" alt="">
                                                                            </a>
                                                                        </div>
                                                                        <div class="p-c">
                                                                            <a href="#" data-image="assets/images/product/9.jpg" data-zoom-image="assets/images/product/9.jpg">
                                                                                <img class="zoom_03" src="assets/images/product/9.jpg" alt="">
                                                                            </a>
                                                                        </div>
                                                                        <div class="p-c">
                                                                            <a href="#" data-image="assets/images/product/10.jpg" data-zoom-image="assets/images/product/10.jpg">
                                                                                <img class="zoom_03" src="assets/images/product/10.jpg" alt="">
                                                                            </a>
                                                                        </div>
                                                                        <div class="p-c">
                                                                            <a href="#" data-image="assets/images/product/11.jpg" data-zoom-image="assets/images/product/11.jpg">
                                                                                <img class="zoom_03" src="assets/images/product/11.jpg" alt="">
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- imgs-zoom-area end -->
                                                    <!-- single-product-info start -->
                                                    <div class="col-md-7 col-sm-7 col-xs-12"> 
                                                        <div class="single-product-info">
                                                            <h3 class="text-black-1">Dummy Product Name </h3>
                                                            <h6 class="brand-name-2">brand name</h6>
                                                           
                                                            <!-- single-pro-rating -->
                                                            <div class="single-pro-rating product-info-item clearfix">
                                                                <div class="pro-rating sin-pro-rating f-right">
                                                                    <a href="#" tabindex="0">35<i class="fa fa-star"></i></a>
                                                                    <span class="text-black-5"><b>27</b> Rating &amp; <b>32 </b>Review</span>
                                                                </div>
                                                            </div>
                                                            <!-- single-product-price -->
                                                            <div class="pro-price product-info-item">
                                                                <span class="new">Price: $ 869.00</span> 
                                                                <span class="old">$900</span> 
                                                                <span class="incl-taxes">(incliding all taxes)</span>
                                                            </div>

                                                            <!-- single-pro-color -->
                                                            <div class="sin-pro-color product-info-item">
                                                                <p class="color-title">Color</p>
                                                                <div class="widget-color">
                                                                    <ul>
                                                                        <li class="color-1"><a href="#"></a></li>
                                                                        <li class="color-2"><a href="#"></a></li>
                                                                        <li class="color-3"><a href="#"></a></li>
                                                                        <li class="color-4"><a href="#"></a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                                
                                                            
                                                            
                                                            <!-- plus-minus-pro-action -->
                                                            <div class="plus-minus-pro-action product-info-item clearfix">
                                                                <div class="sin-plus-minus cart-quantity pull-left clearfix">
                                                                    <p class="color-title pull-left">size</p>
                                                                    <div class="cart-plus-minus pull-left">
                                                                        <input type="text" value="02" name="qtybutton" class="cart-plus-minus-box">
                                                                    </div>   
                                                                </div>
                                                                <div class="sin-plus-minus cart-size clearfix">
                                                                    <p class="color-title pull-left">Qty</p>
                                                                    <div class="cart-plus-minus pull-left">
                                                                        <input type="text" value="02" name="qtybutton" class="cart-plus-minus-box">
                                                                    </div>   
                                                                </div>
                                                            </div>
                                                            <!-- plus-minus-pro-action end -->
                                                            
                                                            <div class="product-info-detail product-info-item">
                                                                <h4 class="title">detail</h4>
                                                                <p>There are many variations of passages of Lorem Ipsum available, but the majo Rity have be suffered alteration in some form, by injected humou or randomis Rity have be suffered alteration in some form, by injected humou or randomis words which donot look even slightly believable. If you are going to use a passage Lorem Ipsum.</p>
                                                            </div>

                                                            <div class="product-info-offer product-info-item">
                                                                <h4 class="title">Offer</h4>
                                                                <ul>
                                                                    <li>no cost: Emi from ###</li>
                                                                    <li>return in 3 days</li>
                                                                    <li>discount offer</li>
                                                                </ul>
                                                            </div>
                                                            <div class="product-info-released product-info-item">
                                                                <p>released on <span class="date">2017-08-12</span>saturday. <span class="open-order">pre order open now!</span></p>
                                                            </div>
                                                            <div class="product-info-item">
                                                                <a href="#" class="button open-door extra-small button-black" tabindex="-1">
                                                                        <span class="text-capitalize"><i class="fa fa-shopping-cart"></i> add to cart</span>
                                                                </a>
                                                                <a href="#" class="button open-door extra-small button-black" tabindex="-1">
                                                                        <span class="text-capitalize"><i class="fa fa-external-link"></i> pre order</span>
                                                                </a>
                                                            </div>
                                                            <div class="sin-pro-action product-info-item">
                                                                <h3>share on :</h3>
                                                                <ul class="action-button">
                                                                    <li>
                                                                        <a href="#" title="facebook" tabindex="0"><i class="fa fa-facebook"></i></a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="#" title="twitter" tabindex="0"><i class="fa fa-twitter"></i></a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="#" title="google" tabindex="0"><i class="fa fa-google-plus-official"></i></a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="#" title="instagram" tabindex="0"><i class="fa fa-instagram"></i></a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="#" title="linkedIn" tabindex="0"><i class="fa fa-linkedin-square"></i></a>
                                                                    </li>
                                                                    </ul>
                                                            </div>
                                                        </div>    
                                                    </div>
                                                    <!-- single-product-info end -->
                                                </div>
                                                
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            <!-- SHOP SECTION END -->             

                        </section>
                        <!-- End page content -->
                    </div><!-- .modal-body -->
                </div><!-- .modal-content -->
            </div><!-- .modal-dialog -->
        </div>
        <!-- END Modal -->
    </div>
    <!-- END QUICKVIEW PRODUCT -->


@endsection