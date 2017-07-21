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

<section class="page-breadcrumbs pb0">
  <div class="container"> 
    <div class="row">
      <div class="col-md-12">                
        <ol class="breadcrumb">
          <li><a href="#">Home</a></li>
          <li><a href="#">Categories</a></li>
          <li>Headphones</li>       
        </ol>

      </div>  
    </div>
  </div>
</section>

<div class="twocol-sidebar">
  <div class="container">
    <div class="row">
      <div class="left-aside">
        <div class="col-md-6">
          <aside class="sidebar">
            <section class="sidebar-category pt0">
              	@if(count($baseImage) > 0)
	              	<div class="xzoom-container">
		                <div class="add-wishlist"><a href="#" class="wish-list" data-toggle="tooltip" data-placement="left" data-original-title="Add To Wishlist"><i class="la-icon-heart-o"></i></a></div>

		                <img class="xzoom" id="xzoom-default" src="{{asset('images/product/'.$product->id.'/original/'.$baseImage[0]->image)}}" xoriginal="{{asset('images/product/'.$product->id.'/original/'.$baseImage[0]->image)}}" />
		                <div class="xzoom-thumbs">
		                	@foreach($baseImage as $image)
			                  	<a href="{{asset('images/product/'.$product->id.'/original/'.$image->image)}}"><img class="xzoom-gallery" width="80" src="{{asset('images/product/'.$product->id.'/original/'.$image->image)}}"  xpreview="{{asset('images/product/'.$product->id.'/original/'.$image->image)}}"></a>
			                @endforeach
		                </div>
	              	</div>
             	@endif

            </section>

          </aside>
        </div>
        </div>
        <div class="right-sidebar">
          <div class="col-md-6">
            <section class="brand-content pt0">
              
              <div class="single-product-info">
              	@if(!empty($product->brand))
                	<span class="brand-name-2">{{$product->brand->brand_name}}</span>
                @endif
                <h3 class="text-black-1">{{$product->name}}</h3>
                
                                           
                <!-- single-pro-rating -->
                <div class="single-pro-rating product-info-item clearfix">
                    <div class="pro-rating sin-pro-rating f-right">
                        <a href="#" tabindex="0">
                          <i class="la-icon-star"></i>
                          <i class="la-icon-star"></i>
                          <i class="la-icon-star"></i>
                          <i class="la-icon-star"></i>
                          <i class="la-icon-star"></i>
                          </a>
                        <span class="text-black-5"><b></b>(no reviews yet)</span>
                        <span class="w-review"><b>Write a Review</b></span>
                    </div>
                </div>
                <!-- single-product-price -->
                <div class="pro-price product-info-item clearfix">
                	@if($product->productPrice->special_price)
                    	<span class="old">NPR {{$product->productPrice->price}}</span> 
                    @endif
                    <span class="new">@if(!empty($product->productPrice->special_price)) NPR {{$product->productPrice->special_price}} @else NPR {{$product->productPrice->price}} @endif</span> 
                	@if($product->productPrice->special_price)
                    	<span class="incl-dis">{{custom_number_format(($product->productPrice->price - $product->productPrice->special_price)/$product->productPrice->price*100)}}% off</span>
                    @endif
                </div>
                
                <!-- stock available -->
                <div class="brand-logo-detail product-info-item text-center clearfix">
                  <div class="single-logo pull-left"><img src="{{asset($product->brand->brand_logo)}}"></div>
                  <div class="brand-stock-info"><img src="{{asset('images/success.png')}}">Mega Seller! 2,000+ sold in last month</div>
                  <div class="stock-available-detail pull-right"><span>In Stock:</span><b>Available</b></div>
                </div>

                <!-- single-pro-color -->
                <div class="sin-pro-color product-info-item clearfix">
                    <p class="color-title">Color:</p>
                    <div class="widget-color">
                        <ul>
                            <li class="red"><a href="#"></a></li>
                            <li class="green"><a href="#"></a></li>
                            <li class="yellow"><a href="#"></a></li>
                            <li class="blue"><a href="#"></a></li>
                            <li class="purple"><a href="#"></a></li>
                            <li class="aqua"><a href="#"></a></li>
                        </ul>
                    </div>
                </div>
                                                
                <!-- product size detail -->
                <div class="product-size-detail product-info-item clearfix">
                    <div class="product-size clearfix">
                        <p class="color-title pull-left">Size:</p>
                        <form class="size-list">
                            <input type="text" name="p-size" class="size-list-info" value="28">
                            <input type="text" name="p-size" class="size-list-info" value="30">
                            <input type="text" name="p-size" class="size-list-info" value="32">
                            <input type="text" name="p-size" class="size-list-info" value="40">
                            <input type="text" name="p-size" class="size-list-info" value="26">
                            <button class="btn btn-default pull-right">size chart</button>
                        </form>   
                    </div>
                </div>
                <!-- product size detail end -->                        
                                            
                <!-- plus-minus-pro-action -->
                <div class="plus-minus-pro-action product-info-item clearfix">
                    <div class="sin-plus-minus cart-size clearfix">
                        <p class="color-title pull-left">Qty:</p>
                        <div class="qty-section">                   
                        <div>
                            <div class="btn-minus"><i class="fa fa-angle-down qty-input"></i></div>
                            <input value="1" />
                            <div class="btn-plus"><i class="fa fa-angle-up qty-input"></i></div>
                        </div>
                    </div>        
                        <div class="cart-btn">
                          <a href="cart.html" class="btn btn-primary open-door" tabindex="-1">
                            <span class="text-capitalize"><i class="fa fa-shopping-cart"></i> add to cart</span>
                          </a>
                        </div>  
                    </div>
                    
                </div>
                <!-- plus-minus-pro-action end -->

                <!-- share it -->
                <div class="sin-pro-action product-info-item clearfix">
                    <h3><i class="fa fa-share-alt"></i>share it:</h3>
                    <ul class="action-button list-unstyled">
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

            </section>

          </div>

        </div>

      </div>
    </div>

</div>

<section class="product-detail-tabs">
  <div class="container">
      <div class="row">
        <div class="col-md-12">
           <!-- Nav tabs -->
           <div class="card gray-bg">
              <ul class="nav nav-tabs" role="tablist">
                  <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Description</a></li>
                  <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Additional information</a></li>
                  <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Reviews (1)</a></li>
              </ul>

              <!-- Tab panes -->
              <div class="tab-content">
                  <div role="tabpanel" class="tab-pane active" id="home">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</div>
                  <div role="tabpanel" class="tab-pane" id="profile">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</div>
                  <div role="tabpanel" class="tab-pane" id="messages">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</div>
              </div>

            </div>

        </div>
      </div>
  </div>
</section>

<section class="products-wrapper four-col category-wrapper pt0">
  <div class="container">
    <div class="row">
        <div class="col-md-12">
          <div class="section-title">
              <h2>Trending</h2>
              <a href="#" class="viewmore"></a>
          </div>
        </div>
    </div>
    <div class="row mt30">
      <div class="col-md-12 col-sm-12">
        <div class="owl-carousel">
          <div class="item">
            <div class="thumbnail">
              <div class="product-img">
                <div class="img-wrap">
                  <img src="{{asset('front-images/bag.png')}}" alt="">
                  
                </div>
              </div>
              <div class="action">
                <a href="#" class="wishlist">
                  <i class="la-icon-heart-o"></i>                  
                </a>
              </div>
              <div class="caption">
                <p class="card-text" data-test-info-type="productRating">
                  <span class="rating--small">
                    <span class="icon-star icon--ratingEmpty">
                      <i class="la-icon-star"></i>
                    </span>
                    <span class="icon-star icon--ratingEmpty">
                      <i class="la-icon-star"></i>
                    </span>
                    <span class="icon-star icon--ratingEmpty">
                      <i class="la-icon-star"></i>
                    </span>
                    <span class="icon-star icon--ratingEmpty">
                      <i class="la-icon-star"></i>
                    </span>
                    <span class="icon-star icon--ratingEmpty">
                      <i class="la-icon-star"></i>
                    </span>
                  </span>
                </p>
                <h3>product title</h3>
                <p class="price">$34.95</p>
              </div>
            </div>
            
          </div>
          <div class="item">
            <div class="thumbnail">
              <div class="product-img">
                <div class="img-wrap">
                  <img src="{{asset('front-images/bangle.png')}}" alt="">
                  
                </div>
              </div>
              <div class="action">
                <a href="#" class="wishlist">
                  <i class="la-icon-heart-o"></i>                  
                </a>
              </div>
              <div class="caption">
              <p class="card-text" data-test-info-type="productRating">
                  <span class="rating--small">
                    <span class="icon-star icon--ratingEmpty">
                      <i class="la-icon-star"></i>
                    </span>
                    <span class="icon-star icon--ratingEmpty">
                      <i class="la-icon-star"></i>
                    </span>
                    <span class="icon-star icon--ratingEmpty">
                      <i class="la-icon-star"></i>
                    </span>
                    <span class="icon-star icon--ratingEmpty">
                      <i class="la-icon-star"></i>
                    </span>
                    <span class="icon-star icon--ratingEmpty">
                      <i class="la-icon-star"></i>
                    </span>
                  </span>
                </p>
                <h3>product title</h3>
                <p class="price">$34.95</p>
              </div>
            </div>
          </div>
          <div class="item">
              <div class="thumbnail">
                  <div class="product-img">
                      <div class="img-wrap">
                          <img src="{{asset('front-images/headphone.png')}}" alt="">
                      </div>
                  </div>
                  <div class="action">
                      <a href="#" class="wishlist">
                          <i class="la-icon-heart-o"></i>
                      </a>
                  </div>
                  <div class="caption">
                    <p class="card-text" data-test-info-type="productRating">
                      <span class="rating--small">
                        <span class="icon-star icon--ratingEmpty">
                          <i class="la-icon-star"></i>
                        </span>
                        <span class="icon-star icon--ratingEmpty">
                          <i class="la-icon-star"></i>
                        </span>
                        <span class="icon-star icon--ratingEmpty">
                          <i class="la-icon-star"></i>
                        </span>
                        <span class="icon-star icon--ratingEmpty">
                          <i class="la-icon-star"></i>
                        </span>
                        <span class="icon-star icon--ratingEmpty">
                          <i class="la-icon-star"></i>
                        </span>
                      </span>
                    </p>
                    <h3>product title</h3>
                    <p class="price">$34.95</p>
                  </div>
              </div>
          </div>
          <div class="item">
            <div class="thumbnail">
              <div class="product-img">
                <div class="img-wrap">
                  <img src="{{asset('front-images/bangle.png')}}" alt="">
                  
                </div>
              </div>
              <div class="action">
                <a href="#" class="wishlist">
                  <i class="la-icon-heart-o"></i>                  
                </a>
              </div>
              <div class="caption">
                <p class="card-text" data-test-info-type="productRating">
                    <span class="rating--small">
                      <span class="icon-star icon--ratingEmpty">
                        <i class="la-icon-star"></i>
                      </span>
                      <span class="icon-star icon--ratingEmpty">
                        <i class="la-icon-star"></i>
                      </span>
                      <span class="icon-star icon--ratingEmpty">
                        <i class="la-icon-star"></i>
                      </span>
                      <span class="icon-star icon--ratingEmpty">
                        <i class="la-icon-star"></i>
                      </span>
                      <span class="icon-star icon--ratingEmpty">
                        <i class="la-icon-star"></i>
                      </span>
                    </span>
                  </p>
                <h3>product title</h3>
                <p class="price">$34.95</p>
              </div>
            </div>
          </div>

        </div>
      </div>

      
    </div>
  </div>
</section>

@endsection