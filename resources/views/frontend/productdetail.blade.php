@extends('frontend.layouts.app')

@section('title')
{{$product->name}} @if(!empty($setting->tagline))|| {{$setting->tagline}}@endif
@endsection

@section('meta_title')
@if(!empty($product->meta_title)){{$product->meta_title}}@else @if(!empty($product->name)){{$product->title}}@else{{$setting->meta_title}}@endif @endif
@endsection

@section('meta_description')
@if(!empty($product->meta_desc)){{$product->meta_desc}}@else{{$setting->meta_desc}}@endif
@endsection

@section('meta_keyword')
@if(!empty($product->meta_keyword)){{$product->meta_keyword}}@else{{$setting->meta_keyword}} @endif
@endsection

@section('og_title')
{{$product->name}}
@endsection

@section('og_desc')
{!!$product->short_desc!!}
@endsection

@section('og_url')
{{url()->current()}}
@endsection

@section('og_image'){{url('images/product/'.$product->id.'/base/'.$baseImage[0]->image)}}@endsection

@section('tw_title')
{{$product->name}}
@endsection

@section('tw_desc')
{!!$product->short_desc!!}
@endsection

@section('tw_url')
{{url()->current()}}
@endsection

@section('tw_image')
{{url('images/product/'.$product->id.'/base/'.$baseImage[0]->image)}}
@endsection

@section('content')

	<!-- <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-md-12">
                    <ol class="breadcrumb">
                        <li><a href="#">Home</a></li>
                        <li class="active">men's clothing</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>  -->

    <!-- Start page content -->
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
                                    
                                    @if(count($baseImage) > 0)
                                    <div class="imgs-zoom-area">
                                        <div class="product-info-Wishlist">
                                            <a href="#" data-toggle="tooltip" title="Add To Wishlist" class="w-list" data-placement="left"><i class="fa fa-heart"></i></a>
                                        </div>
                                        <img id="zoom_03" src="{{asset('images/product/'.$product->id.'/original/'.$baseImage[0]->image)}}" data-zoom-image="{{asset('images/product/'.$product->id.'/original/'.$baseImage[0]->image)}}" alt="{{$product->name}}">
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <div id="gallery_01" class="carousel-btn slick-arrow-3 mt-30">
                                                @foreach($baseImage as $image)
                                                    <div class="p-c">
                                                        <a href="#" data-image="{{asset('images/product/'.$product->id.'/original/'.$image->image)}}" data-zoom-image="{{asset('images/product/'.$product->id.'/original/'.$image->image)}}">
                                                            <img class="zoom_03" src="{{asset('images/product/'.$product->id.'/original/'.$image->image)}}" alt="">
                                                        </a>
                                                    </div>
                                                @endforeach
                                                    
                                                    {{-- <div class="p-c">
                                                        <a href="#" data-image="{{asset('front-images/product/6.jpg')}}" data-zoom-image="{{asset('front-images/product/6.jpg')}}">
                                                            <img class="zoom_03" src="{{asset('front-images/product/6.jpg')}}" alt="">
                                                        </a>
                                                    </div> --}}
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                                <!-- imgs-zoom-area end -->
                                <!-- single-product-info start -->
                                <div class="col-md-7 col-sm-7 col-xs-12"> 
                                    <div class="single-product-info">
                                        <h3 class="text-black-1">{{$product->name}}</h3>
                                        @if(!empty($product->brand))
                                        <h6 class="brand-name-2">{{$product->brand->brand_name}}</h6>
                                        @endif

                                        <!-- single-pro-rating -->
                                        <!--
                                        <div class="single-pro-rating product-info-item clearfix">
                                            <div class="pro-rating sin-pro-rating f-right">
                                                <a href="#" tabindex="0">35<i class="fa fa-star"></i></a>
                                                <span class="text-black-5"><b>27</b> Rating &amp; <b>32 </b>Review</span>
                                            </div>
                                        </div>-->

                                        <!-- single-product-price -->
                                        <div class="pro-price product-info-item">
                                            <span class="new">
                                            Price:@if(!empty($product->productPrice->special_price)) NPR {{$product->productPrice->special_price}} @else NPR {{$product->productPrice->price}} @endif
                                            </span> 
                                            @if($product->productPrice->special_price)
                                            <span class="old">NPR {{$product->productPrice->special_price}}</span> 
                                            @endif
                                            <span class="incl-taxes">(including all taxes)</span>
                                        </div>

                                        @if(count($product->productAttributesWithOrder) > 0)

                                            @foreach($product->productAttributesWithOrder as $attr)

                                                @if($attr->attr_type == 'textfield')
                                                <div class="product-info-detail product-info-item">
                                                    <h5 class="title">{{$attr->attr_name}}</h5>
                                                    {!!$attr->value_text!!}
                                                </div>
                                                @endif

                                                @if($attr->attr_type == 'textarea')
                                                <div class="product-info-detail product-info-item">
                                                    <h5 class="title">{{$attr->attr_name}}</h5>
                                                    {!!$attr->value_textarea!!}
                                                </div>
                                                @endif

                                                @if($attr->attr_type == 'dropdown')
                                                <div class="product-info-detail product-info-item attribute-section">
                                                    <h5 class="title">{{$attr->attr_name}}</h5>
                                                    <?php 
                                                        $val = explode(',',$attr->value_dropdown);
                                                    ?>
                                                    {{Form::select('test', $val, null, ['placeholder'=>'-- Select --', 'class'=>'form-control selectBox'])}}
                                                </div>
                                                @endif

                                                <?php /* ?>
                                                @if($attr->attr_type == 'number')
                                                <div class="product-info-detail product-info-item">
                                                    
                                                    <div class="sin-plus-minus cart-size clearfix">
                                                        <p class="color-title pull-left">{{$attr->attr_name}}</p>
                                                        <div class="cart-plus-minus pull-left">
                                                            <input type="text" value="{{$attr->value_number_min}}" min="{{$attr->value_number_min}}" max="{{$attr->value_number_max}}" name="qtybutton" class="cart-plus-minus-box">
                                                        </div>   
                                                    </div>
                                                </div>
                                                @endif
                                                <?php */ ?>

                                            @endforeach

                                        @endif

                                        {{-- <!-- single-pro-color -->
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
                                        </div> --}}
                                            
                                        
                                        
                                        <!-- plus-minus-pro-action -->
                                        <div class="plus-minus-pro-action product-info-item clearfix">
                                            {{-- <div class="sin-plus-minus cart-quantity pull-left clearfix">
                                                <p class="color-title pull-left">size</p>
                                                <div class="cart-plus-minus pull-left">
                                                    <input type="text" value="02" name="qtybutton" class="cart-plus-minus-box">
                                                </div>   
                                            </div> --}}
                                            <div class="sin-plus-minus cart-size clearfix">
                                                <p class="color-title pull-left">Qty</p>
                                                <div class="cart-plus-minus pull-left">
                                                    @if($product->productInventory->manage_stock == 1)
                                                    {{Form::text('qtybutton', 1 ,['class'=>'cart-plus-minus-box', 'min'=>"1", 'max'=>$product->productInventory->quantity])}}
                                                    @else
                                                    {{Form::text('qtybutton', 1 ,['class'=>'cart-plus-minus-box', 'min'=>'1'])}}
                                                    @endif
                                                    {{-- <input type="text" value="02" name="qtybutton" class="cart-plus-minus-box"> --}}
                                                </div>   
                                            </div>
                                            
                                        </div>
                                        <!-- plus-minus-pro-action end -->

                                        @if(!empty($product->short_desc))
                                        <div class="product-info-detail product-info-item">
                                            <h4 class="title">detail</h4>
                                            {!!$product->short_desc!!}
                                            {{-- <p>There are many variations of passages of Lorem Ipsum available, but the majo Rity have be suffered alteration in some form, by injected humou or randomis Rity have be suffered alteration in some form, by injected humou or randomis words which donot look even slightly believable. If you are going to use a passage Lorem Ipsum.</p> --}}
                                        </div>
                                        @endif
                                        
                                        @if(!empty($product->offer))
                                        <div class="product-info-offer product-info-item">
                                            <h4 class="title">Offer</h4>
                                            {!!$product->offer!!}
                                            {{-- <ul>
                                                <li>no cost: Emi from ###</li>
                                                <li>return in 3 days</li>
                                                <li>discount offer</li>
                                            </ul> --}}
                                        </div>
                                        @endif
                                        
                                        @if(!empty($product->release_note))
                                        <div class="product-info-released product-info-item">
                                           {!! $product->release_note !!}
                                        </div>
                                        @endif

                                        <div class="product-info-item">
                                            <a href="cart.html" class="button open-door extra-small button-black" tabindex="-1">
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
                                                    <a title="facebook" tabindex="0" onclick="window.open('http://www.facebook.com/sharer/sharer.php?u={{url()->current()}}', 'sharer', 'toolbar=0,width=620,height=280');" href="javascript: void(0)"><i class="fa fa-facebook"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a title="twitter" tabindex="0" onclick="window.open('http://twitter.com/intent/tweet?status={{url()->current()}}', 'sharer', 'toolbar=0,width=620,height=280');" href="javascript: void(0)"><i class="fa fa-twitter"></i>
                                                    </a>
                                                </li>
                                                {{-- <li>
                                                    <a href="#" title="google" tabindex="0"><i class="fa fa-google-plus-official"></i></a>
                                                </li>
                                                <li>
                                                    <a href="#" title="instagram" tabindex="0"><i class="fa fa-instagram"></i></a>
                                                </li>
                                                <li>
                                                    <a href="#" title="linkedIn" tabindex="0"><i class="fa fa-linkedin-square"></i></a>
                                                </li> --}}
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

    <div class="product-info-payment">
            <div class="container">
                <div class="row">
                    <div class="col-md-5 col-sm-5 col-xs-12">
                         <div class="payment-opt">
                            <h4>payment option</h4>
                            <ul>
                                <li><a href="#"><img src="{{asset('front-images/payment/1.png')}}"></a></li>
                                <li><a href="#"><img src="{{asset('front-images/payment/2.png')}}"></a></li>
                                <li><a href="#"><img src="{{asset('front-images/payment/3.png')}}"></a></li>
                                <li><a href="#"><img src="{{asset('front-images/payment/4.png')}}"></a></li>
                            </ul>
                         </div>   
                    </div>

                    @if(!empty($product->return_policy))
                    <div class="col-md-7 col-sm-7 col-xs-12">
                        <div class="return-policy">
                            <h4>return policy</h4>
                            {!! $product->return_policy !!}
                            {{-- <p>There are many variations of passages of Lorem Ipsum available, but the majo Rity have be suffered alteration in some form, by injected humou or randomis Rity have be suffered alteration in some form, by injected humou or randomis words which donot look even slightly believable. If you are going to use a passage Lorem Ipsum.</p> --}}
                        </div>
                    </div>
                    @endif
                </div>
            </div>
    </div>

    @if(!empty($product->detail))
    <div class="product-specify">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="product-det-spec">
                        <h4>product detail/specification</h4>
                        {!! $product->detail !!}
                        
                    </div>
                </div>    
            </div>
        </div>
    </div>
    @endif

    <?php /* ?>
    <div class="customer-review" id="reviews">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="post-header text-center">
                        <div class="line-head"><h4 class="title"> <span>customer review <b class="customer-count">(0)</b> </span> </h4></div>
                        <small class="post-reviews">There are no reviews for this post</small>
                        <button type="button" class="btn open-door wrt-review" type="button" data-toggle="collapse" data-target="#postreview" aria-expanded="false" aria-controls="collapseExample">write review</button>
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-12 wrt-review">
                        <div class="collapse post-review-form" id="postreview">
                            <!-- Form Area -->
                            <div class="inner review-form">
                                <!-- Form -->
                                <form id="wt-review" method="post" action="#">
                                    <!-- Left Inputs -->
                                    <div class="col-xs-6 wow animated slideInLeft" data-wow-delay=".5s">
                                        <!-- Name -->
                                        <input type="text" name="name" id="name" required="required" class="form" placeholder="Name" />
                                        <!-- Email -->
                                        <input type="email" name="mail" id="mail" required="required" class="form" placeholder="Email" />
                                        <!-- Subject -->
                                        <input type="text" name="subject" id="subject" required="required" class="form" placeholder="Subject" />
                                    </div><!-- End Left Inputs -->
                                    <!-- Right Inputs -->
                                    <div class="col-xs-6 wow animated slideInRight" data-wow-delay=".5s">
                                        <!-- Message -->
                                        <textarea name="message" id="message" class="form textarea"  placeholder="Message"></textarea>
                                    </div><!-- End Right Inputs -->
                                    <!-- Bottom Submit -->
                                    <div class="relative fullwidth col-xs-12">
                                        <!-- Send Button -->
                                        <button type="submit" id="submit" name="submit" class="form-btn open-door semibold">Send Message</button> 
                                    </div><!-- End Bottom Submit -->
                                    <!-- Clear -->
                                    <div class="clear"></div>
                                </form>

                                <!-- Your Mail Message -->
                                <div class="mail-message-area">
                                    <!-- Message -->
                                    <div class="alert gray-bg mail-message not-visible-message">
                                        <strong>Thank You !</strong> Your email has been delivered.
                                    </div>
                                </div>

                            </div><!-- End inner Form Area -->
                        </div>
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-12 media-review">
                        <ul id="comments_list" class="comments_list">
                            <li class="media mt-30">
                                <div class="media-left">
                                    <a href="#"><img class="media-object" src="assets/images/author/1.jpg" alt="#"></a>
                                </div>
                                <div class="media-body">
                                    <div class="clearfix">
                                        <div class="name-commenter pull-left">
                                            <h6 class="media-heading"><a href="#">Gerald Barnes</a></h6>
                                            <p class="mb-10">27 Jun, 2016 at 2:30pm</p>
                                        </div>
                                        <div class="pull-right">
                                            <a href="#" class="reply-comment">
                                                <i class="fa fa-reply"></i>
                                                reply
                                            </a>
                                        </div>
                                    </div>
                                    <div class="comment-section">
                                        <p class="mb">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer accumsan egestas</p>
                                    </div>
                                </div>
                                <ul id="reply_div" class="comments-list reply-list">
                                    <li>
                                        <div class="media-left">
                                            <a href="#"><img class="media-object" src="assets/images/author/1.jpg" alt="#"></a>
                                        </div>
                                        <div class="media-body">
                                            <div class="clearfix">
                                                <div class="name-commenter pull-left">
                                                    <h6 class="media-heading"><a href="#">Gerald Barnes</a></h6>
                                                    <p class="mb-10">27 Jun, 2016 at 2:30pm</p>
                                                </div>
                                            </div>
                                            <div class="comment-section">
                                                <p class="mb">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer accumsan egestas</p>
                                            </div>
                                        </div>
                                    </li>       
                                </ul>
                            </li>
                            <li class="media mt-30">
                                <div class="media-left">
                                    <a href="#"><img class="media-object" src="assets/images/author/2.jpg" alt="#"></a>
                                </div>
                                <div class="media-body">
                                    <div class="clearfix">
                                        <div class="name-commenter pull-left">
                                            <h6 class="media-heading"><a href="#">Gerald Barnes</a></h6>
                                            <p class="mb-10">27 Jun, 2016 at 2:30pm</p>
                                        </div>
                                        <div class="pull-right">
                                            <a href="#" class="reply-comment" data-toggle="collapse" data-target="#postreply" aria-expanded="false" aria-controls="collapseExample">
                                                <i class="fa fa-reply"></i>
                                                reply
                                            </a>
                                        </div>
                                    </div>
                                    <div class="comment-section">
                                        <p class="mb">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer accumsan egestas</p>
                                    </div>
                                </div>
                                <ul id="reply_div" class="comments-list reply-list">
                                    <li>
                                        <div class="media-left">
                                            <a href="#"><img class="media-object" src="assets/images/author/2.jpg" alt="#"></a>
                                        </div>
                                        <div class="media-body">
                                            <div class="clearfix">
                                                <div class="name-commenter pull-left">
                                                    <h6 class="media-heading"><a href="#">Gerald Barnes</a></h6>
                                                    <p class="mb-10">27 Jun, 2016 at 2:30pm</p>
                                                </div>
                                            </div>
                                            <div class="comment-section">
                                                <p class="mb">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer accumsan egestas</p>
                                            </div>
                                        </div>
                                    </li>       
                                </ul>
                            </li>
                            
                        </ul>    
                    </div>    
                </div>
            </div>
        </div>
    </div>

    <div class="releted-post msp-container">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="related-post-container">
                        <div class="line-head"><h4 class="title"> <span>related post </span> </h4></div>
                        <div class="row">
                            <div class="col-md-3 col-sm-3">
                                <div class="col-item">

                                    <div class="photo">
                                        <a href="#">
                                            <img src="assets/images/product/1.jpg" alt="a" />
                                        </a>
                                    </div>
                                    <div class="info">
                                            <div class="price col-md-7">
                                                <h5><a href="product_detail.html">Sample Product</a></h5>
                                            </div>
                                            <div class="price col-md-4 no-padd">
                                                <h5 class="price-text-color">$199.99</h5>
                                            </div>
                                        </div>
                                        <div class="separator clear-left">
                                            <a class="btn-add" href="#" class="hidden-sm"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                                            <a href="product_detail.html" class="btn-add" href="product_list.html" class="hidden-sm"><i class="fa fa-list"></i> Detail</a>
                                        </div>
                                        <div class="clearfix">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-3">
                                <div class="col-item">
                                    <div class="photo">
                                        <a href="#">
                                            <img src="assets/images/product/1.jpg" alt="a" />
                                        </a>
                                    </div>
                                    <div class="info">
                                            <div class="price col-md-7">
                                                <h5><a href="product_detail.html">Sample Product</a></h5>
                                            </div>
                                            <div class="price col-md-4 no-padd">
                                                <h5 class="price-text-color">$199.99</h5>
                                            </div>
                                        </div>
                                        <div class="separator clear-left">
                                            <a class="btn-add" href="#" class="hidden-sm"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                                            <a class="btn-add" href="product_list.html" class="hidden-sm"><i class="fa fa-list"></i> Detail</a>
                                        </div>
                                        <div class="clearfix">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-3">
                                <div class="col-item">
                                    <div class="photo">
                                        <a href="#">
                                            <img src="assets/images/product/1.jpg" alt="a" />
                                        </a>
                                    </div>
                                    <div class="info">
                                            <div class="price col-md-7">
                                                <h5><a href="product_detail.html">Sample Product</a></h5>
                                            </div>
                                            <div class="price col-md-4 no-padd">
                                                <h5 class="price-text-color">$199.99</h5>
                                            </div>
                                        </div>
                                        <div class="separator clear-left">
                                            <a class="btn-add" href="#" class="hidden-sm"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                                            <a class="btn-add" href="product_list.html" class="hidden-sm"><i class="fa fa-list"></i> Detail</a>
                                        </div>
                                        <div class="clearfix">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-3">
                                <div class="col-item">
                                    <div class="photo">
                                        <a href="#">
                                            <img src="assets/images/product/1.jpg" alt="a" />
                                        </a>
                                    </div>
                                    <div class="info">
                                            <div class="price col-md-7">
                                                <h5><a href="product_detail.html">Sample Product</a></h5>
                                            </div>
                                            <div class="price col-md-4 no-padd">
                                                <h5 class="price-text-color">$199.99</h5>
                                            </div>
                                        </div>
                                        <div class="separator clear-left">
                                            <a class="btn-add" href="#" class="hidden-sm"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                                            <a class="btn-add" href="product_list.html" class="hidden-sm"><i class="fa fa-list"></i> Detail</a>
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

    <div class="history-post msp-container">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="related-post-container">
                        <div class="line-head lg-border"><h4 class="title"> <span>recommendation based on your browsing history </span> <small>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer accumsan egestas</small> </h4></div>
                        <div class="row">
                            <div class="col-md-3 col-sm-3">
                                <div class="col-item">
                                    <div class="photo">
                                        <a href="#">
                                            <img src="assets/images/product/1.jpg" alt="a" />
                                        </a>
                                    </div>
                                    <div class="info">
                                            <div class="price col-md-7">
                                                <h5><a href="product_detail.html">Sample Product</a></h5>
                                            </div>
                                            <div class="price col-md-4 no-padd">
                                                <h5 class="price-text-color">$199.99</h5>
                                            </div>
                                        </div>
                                        <div class="separator clear-left">
                                            <a class="btn-add" href="#" class="hidden-sm"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                                            <a class="btn-add" href="product_list.html" class="hidden-sm"><i class="fa fa-list"></i> Detail</a>
                                        </div>
                                        <div class="clearfix">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-3">
                                <div class="col-item">
                                    <div class="photo">
                                        <a href="#">
                                            <img src="assets/images/product/1.jpg" alt="a" />
                                        </a>
                                    </div>
                                    <div class="info">
                                            <div class="price col-md-7">
                                                <h5><a href="product_detail.html">Sample Product</a></h5>
                                            </div>
                                            <div class="price col-md-4 no-padd">
                                                <h5 class="price-text-color">$199.99</h5>
                                            </div>
                                        </div>
                                        <div class="separator clear-left">
                                            <a class="btn-add" href="#" class="hidden-sm"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                                            <a class="btn-add" href="product_list.html" class="hidden-sm"><i class="fa fa-list"></i> Detail</a>
                                        </div>
                                        <div class="clearfix">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-3">
                                <div class="col-item">
                                    <div class="photo">
                                        <a href="#">
                                            <img src="assets/images/product/1.jpg" alt="a" />
                                        </a>
                                    </div>
                                    <div class="info">
                                            <div class="price col-md-7">
                                                <h5><a href="product_detail.html">Sample Product</a></h5>
                                            </div>
                                            <div class="price col-md-4 no-padd">
                                                <h5 class="price-text-color">$199.99</h5>
                                            </div>
                                        </div>
                                        <div class="separator clear-left">
                                            <a class="btn-add" href="#" class="hidden-sm"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                                            <a class="btn-add" href="product_list.html" class="hidden-sm"><i class="fa fa-list"></i> Detail</a>
                                        </div>
                                        <div class="clearfix">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-3">
                                <div class="col-item">
                                    <div class="photo">
                                        <a href="#">
                                            <img src="assets/images/product/1.jpg" alt="a" />
                                        </a>
                                    </div>
                                    <div class="info">
                                            <div class="price col-md-7">
                                                <h5><a href="product_detail.html">Sample Product</a></h5>
                                            </div>
                                            <div class="price col-md-4 no-padd">
                                                <h5 class="price-text-color">$199.99</h5>
                                            </div>
                                        </div>
                                        <div class="separator clear-left">
                                            <a class="btn-add" href="#" class="hidden-sm"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                                            <a class="btn-add" href="product_list.html" class="hidden-sm"><i class="fa fa-list"></i> Detail</a>
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
    <!-- End product list--> 
    <?php  */ ?>

@endsection