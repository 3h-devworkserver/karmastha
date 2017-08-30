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
<section class="page-breadcrumbs pb0">
  <div class="container"> 
    <div class="row">
      <div class="col-md-12">                
       <ol class="breadcrumb">
	                    <li><a href="{{url('/')}}">Home</a></li>
	                    <li class="active">{{$category->title}}</li>
	                </ol>

      </div>  
    </div>
  </div>
</section>


<section class="category-content">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h2 class="section-title-2">categories</h2>
        	   @if(count($category->topBanners) > 0 )
	                        <section class="brand-content pt0 banner-wrapper">
	                            	
	                        	@if(count($category->topBanners) == 1 )
	                            	<div class="banner-category">
		                            <a href="{{$category->topBanners[0]->banner_url}}" title="{{$category->topBanners[0]->banner_title}}">
	                                 	<img src="{{asset('images/category/banner/'.$category->topBanners[0]->banner_image)}}" alt="{{$category->topBanners[0]->banner_desc}}">
	                                </a>
	                               </div>
                               	@else
									<div class="owl-carousel owl-theme" id="slides">
		                            @foreach($category->topBanners as $banner)
                                      		<a href="{{$banner->banner_url}}" title="{{$banner->banner_title}}">
											<div class="item bg-img" style="background-image:url({{asset('images/category/banner/'.$banner->banner_image)}})">
			                            </div>
			                                </a>

		                            @endforeach
                                    </div>
                               	@endif
	                        </section>
	                        @endif
         
        <div class="category-circle text-center">
          <div class="content-circle">
									
          	@foreach($category->topChilds as $key => $child)
          	@if( $key < 4 )
            <div class="item">
              <div class="thumbnail">
                <div class="product-img">
                  <div class="img-wrap">
                    <img src="{{asset('images/category/'.$child->feat_img)}}" alt="">
                  </div>
                </div>
                <div class="caption">
                	<a href="{{ URL::to('/category/'.$child->url) }}">
                  <h3>{{$child->title}}</h3>
                	</a>
                </div>
              </div>
            </div>
		    @endif
			@endforeach
         
           <div class="item">
              <div class="thumbnail cursor" type="button" data-toggle="collapse" data-target="#viewall-dropdown">
                <div class="category-img">
                  {{-- <div class="img-wrap">
                    <span>see more</span>
                  </div> --}}
                  <div class="img-wrap">
                    <div>
                      <span style="display: table-cell; vertical-align: middle;">see more</span>
                    </div>
                  </div>
                </div>
                <div class="caption viewall">
                  <h3>More Categories</h3>
                </div>
              </div>  
            </div>

          </div>

        </div>

      </div>
    </div>
  </div>
</section>
   
@if(count($category->topChilds) > 4 )
<section class="gray-bg collapse" id="viewall-dropdown">
  <div class="container">
    <div class="row">
      <div class="products-wrapper no-scroll viewall-dropdown-content">
         @foreach($category->topChilds as $key => $cat)
                @if($key  >= 4 )
              
        <div class="col-md-3 col-sm-12">
          <div class="item">
            <div class="thumbnail">
              <div class="category-img">
                <div class="img-wrap">
                  <img src="assets/images/portal-circle.jpg" alt="">
                  
                </div>
              </div>
              
              <div class="caption">
                <h3>category title</h3>
              </div>
            </div>
            
          </div>
        </div>
         @endif
                @endforeach
                 @if( count($category->topChilds) > 8 )    
               
        
        <div class="viewmore-btn col-md-12 text-center">
          <a href="#" class="btn-default btn">load more categories</a>
        </div>
@endif
      </div>

    </div>
  </div>
</section>
@endif

   <section class="products-wrapper five-col category-wrapper pt0">
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
              <div class="ribbon"><span>25% dis</span></div>
              <div class="product-img">
                <div class="img-wrap">
                  <img src="assets/images/bag.png" alt="">
                  
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
                <span class="old">$900</span>
                <span class="price">$34.95</span>
              </div>
            </div>
            
          </div>
          <div class="item">
            <div class="thumbnail">
              <div class="product-img">
                <div class="img-wrap">
                  <img src="assets/images/bangle.png" alt="">
                  
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
                <span class="price">$34.95</span>
              </div>
            </div>
          </div>
          <div class="item">
            <div class="thumbnail">
              <div class="ribbon"><span>25% dis</span></div>
              <div class="product-img">
                <div class="img-wrap">
                  <img src="assets/images/bag.png" alt="">
                  
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
                <span class="old">$900</span>
                <span class="price">$34.95</span>
              </div>
            </div>
            
          </div>
          <div class="item">
              <div class="thumbnail">
                  <div class="product-img">
                      <div class="img-wrap">
                          <img src="assets/images/headphone.png" alt="">
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
                    <span class="price">$34.95</span>
                  </div>
              </div>
          </div>
          <div class="item">
            <div class="thumbnail">
              <div class="product-img">
                <div class="img-wrap">
                  <img src="assets/images/bangle.png" alt="">
                  
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
                <span class="price">$34.95</span>
              </div>
            </div>
          </div>

        </div>
      </div>

      
    </div>
  </div>
</section>

<section class="brands-wrapper gray-bg">
  <div class="container">
    <h2 class="section-title-1">Our Brands</h2>
    <div class="brand-list">
      <ul class="list-unstyled list-inline">
       @foreach( $brands as $key => $brand)
        <li><a href="#"><img src="{{ asset('/'.$brand->brand_logo) }}" alt=""></a></li>
        @endforeach
      </ul>
    </div>
  </div>
</section>

@if(count($category->middleBanners) > 0)
<section class="banner-wrapper gray-bg">
	<div class="container">
		<div class="row">	                            	
	                        	@if(count($category->middleBanners) <= 2 )
	                            	@foreach($category->middleBanners as $key => $banner)
			                        <div class="col-md-6 col-sm-6 is-padding widget rpp-banner">
			                            <h2 class="banner-wrapper">
			                            <a href="{{$banner->banner_url}}" title="{{$banner->banner_desc}}">
			                                <img class="img-lazy-load" alt="{{$banner->banner_desc}}" src="{{asset('images/category/banner/'.$banner->banner_image)}}">
			                            </a>
			                            </h2>
			                        </div>
		                        @endforeach
                               	@else
		                            @foreach($category->middleBanners as $key => $banner)
									<div class="owl-carousel owl-theme" id="slides">
                                      		<a href="{{$banner->banner_url}}" title="{{$banner->banner_title}}">
											<div class="item bg-img" style="background-image:url({{asset('images/category/banner/'.$banner->banner_image)}})">
			                            </div>
			                                </a>

		                            @endforeach
                                    </div>
                               	@endif
	                      
			
								
		</div>
	</div>
		                    </section>
		
	 @endif
@endsection