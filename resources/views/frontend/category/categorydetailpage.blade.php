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
      <div class="col-md-12 col-md-12">
	                <ol class="breadcrumb">
	                    <li><a href="{{url('/')}}">Home</a></li>
	                    <li class="active">{{$category->title}}</li>
	                </ol>
	            </div>  
    </div>
  </div>
</section>
    
	<div class="twocol-sidebar">
	    <div class="container">
	        <div class="row">
	            <div class="left-aside">
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
	                    </div>
	                </div><!--end side bar -->
	                </div><!--end left aside -->
	                <div class="right-sidebar">
	                <div class="col-md-9 col-sm-9" id="cart_items">
	                    <div class="left_bg_color">
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
	                            

	                    <section class="products-wrapper pt0">
							<div class="title-header-list">
							                <div class="pull-left">
							                  <h2 class="section-title-2">{{ $category->title }}</h2>
							                </div>
							                <div class="list-filter pull-right">
							                  <div class="dataTables_length" id="myTable_length">
							                    <label>Short by:
							                      <select name="myTable_length" aria-controls="myTable" class="">
							                        <option value="10">1</option>
							                        <option value="2">2</option>
							                        <option value="3">3</option>
							                        <option value="4">4</option>
							                      </select> Per page
							                    </label>
							                    <label>Short by:
							                      <select name="myTable_length" aria-controls="myTable" class="">
							                        <option value="10">popularity</option>
							                        <option value="25">newest</option>
							                        <option value="50">old</option>
							                      </select>
							                    </label>
							                  </div>

							                </div>
							 </div>
							 @if( $products )
 							 <div class="brands-list clearfix">
				                <div class="row">
				                	@foreach( $products as $key => $tproduct)
				                	<?php 

				                	$pimages = DB::table('product_gallery')->where('product_id',$tproduct->id)->orderby('image_order')->first(); 
				                	?>
				                     @if( $tproduct->special_price !=  $tproduct->price && $tproduct->special_price != '')
				                	 <?php 
							               $p = ( $tproduct->price - $tproduct->special_price);
							               $dis = round( ( $p / $tproduct->price ) * 100 );
									
									  ?>
				                      @endif 
				                  <div class="col-md-3 col-sm-12">
				                    <div class="item">
				                      <div class="thumbnail">
				                      	@if( $tproduct->special_price !=  $tproduct->price && $tproduct->special_price != '')
				                        <div class="ribbon"><span>{{ $dis }}% dis</span></div>
				                        @endif 
				                        <div class="product-img">
				                          <div class="img-wrap">
				                          	@if(!empty($pimages))
				                            <img src="{{ asset('/images/product/'.$tproduct->id.'/base/'. $pimages->image ) }}" alt="">
				                            @endif
				                          </div>
				                        </div>
				                        <?php 
								          $wishlistadded = DB::table('product_wishlist')->where('product_id', $tproduct->id)->first(); 
								          ?>
				                        <div class="action">
				                          <a href="{{ URL::to('wishlist/store/?id='.$tproduct->id) }}" class="wishlist" data-id="{{ $tproduct->id }}" data-price="{{ $tproduct->price}}" data-name="{{ $tproduct->name}}">
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
				                          <h3><a href="#">{{ $tproduct->name }}</a></h3>
            								<sapn class=" @if( $tproduct->special_price != '')
{{ trans('old') }} @endif ">{{ $tproduct->price}}</sapn>
            								<span class="price">{{ $tproduct->special_price}}</span>
				                        </div>
				                      </div>
				                    </div>

				                  </div>
				                  @endforeach
				                  </div>
				                  </div>
				                  @endif
							  <div class="data-pegination">
							                <nav aria-label="Page navigation example">
							           {{ $products->links() }}
							                </nav>
							              </div>

	                    </section><!--end product list -->
	                    
	                </div>
	            </div>
	            </div> <!-- end right aside -->
	        </div>
	    </div>
	    </div>
	</div><!-- End product list-->

@endsection