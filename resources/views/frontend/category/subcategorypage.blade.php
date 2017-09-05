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

	<div class="twocol-sidebar">
		<div class="container">
		    <div class="row">
		      	<div class="left-aside">
			        <div class="col-md-3">
				        <aside class="sidebar">
				            <section class="sidebar-category gray-bg">
				              <h2 class="sidebar-title-1">men's clothing</h2>
				              <div class="left-category-list">
				                <ul class="list-unstyled">
				                  <li>
				                    <span>
				                      <a href="#">T-Shirts &amp; Polos</a>
				                      <font class="c-number"><bdo>74041</bdo></font>
				                    </span>
				                  </li>
				                  <li>
				                    <span>
				                      <a href="#">Shirts </a>
				                      <font class="c-number"><bdo>74041</bdo></font>
				                    </span>
				                  </li>
				                  <li>
				                    <span>
				                      <a href="#">Jeans</a>
				                      <font class="c-number"><bdo>74041</bdo></font>
				                    </span>
				                  </li>
				                  <li>
				                    <span>
				                      <a href="#">Trousers &amp; Chinos</a>
				                      <font class="c-number"><bdo>74041</bdo></font>
				                    </span>
				                  </li>
				                  <li>
				                    <span>
				                      <a href="#">Innerwear &amp; Sleepwear </a>
				                      <font class="c-number"><bdo>74041</bdo></font>
				                    </span>
				                  </li>
				                  <li>
				                    <span>
				                      <a href="#">Sports Wear</a>
				                      <font class="c-number"><bdo>74041</bdo></font>
				                    </span>
				                  </li>
				                  <li>
				                    <span>
				                      <a href="#">Shorts &amp; 3/4ths</a>
				                      <font class="c-number"><bdo>14690</bdo></font>
				                    </span>
				                  </li>
				                  <li>
				                    <span>
				                      <a href="#">Kurtas, Pyjamas &amp; Sherwanis</a>
				                      <font class="c-number"><bdo>7775</bdo></font>
				                    </span>
				                  </li>
				                  <li>
				                    <span>
				                      <a href="#">Suitings &amp; Shirtings </a>
				                      <font class="c-number"><bdo>74041</bdo></font>
				                    </span>
				                  </li>
				                  <li>
				                    <span>
				                      <a href="#">Sweatshirts</a>
				                      <font class="c-number"><bdo>74041</bdo></font>
				                    </span>
				                  </li>
				                  <li>
				                    <span>
				                      <a href="#">Trackpants &amp; Tracksuits </a>
				                      <font class="c-number"><bdo>74041</bdo></font>
				                    </span>
				                  </li>
				                  <li>
				                    <span>
				                      <a href="#">Sweaters</a>
				                      <font class="c-number"><bdo>74041</bdo></font>
				                    </span>
				                  </li>
				                  <li>
				                    <span>
				                      <a href="#">Suits &amp; Blazers</a>
				                      <font class="c-number"><bdo>74041</bdo></font>
				                    </span>
				                  </li>
				                  <li>
				                    <span>
				                      <a href="#">Jackets</a>
				                      <font class="c-number"><bdo>74041</bdo></font>
				                    </span>
				                  </li>
				                  <li>
				                    <span>
				                      <a href="#">Rain Wear</a>
				                      <font class="c-number"><bdo>74041</bdo></font>
				                    </span>
				                  </li>
				                </ul>
				              </div>
				            </section>

				            <section class="pricerange-slider gray-bg">
				              <h2 class="sidebar-title-1">price</h2>
				              <div class="filter-panel">
				                <div  class="range-slider" >
				                    
				                  <input data-addui='slider' data-min='-5' data-max='5' data-range='true' value='-2,2'>
				                </div>
				                <form class="rangerform">
				                  <input type="text" name="minprice" value="Rs 99">
				                  <input type="text" name="maxprice" value="Rs 9000">
				                  <input type="button" onclick="filterProducts()" value="Go" />
				                </form>
				                
				              </div>
				            </section>

				            <section class="sidebar-brand gray-bg">
				                <h2 class="sidebar-title-1">brands</h2>
				                <div class="sidebar_search_form">
				                  <form action="" class="form-horizontal">
				                      <div class="form-group">
				                          <button class="btn"><i class="la-icon-zoom"></i></button>
				                          <input class="form-control" id="" placeholder="Search for Brand" type="text">
				                        </div>
				                    </form>
				                </div>
				                <div class="sidebar_checkbox">
				                    <div class="checkbox">
				                        <input id="checkbox1" type="checkbox" name="check">
				                        <label for="checkbox1"><span></span>Levis</label>
				                        <font class="c-number">
				                           <bdo>800</bdo>
				                        </font>
				                    </div>
				                    <div class="checkbox">
				                        <input id="checkbox2" type="checkbox" name="check">
				                        <label for="checkbox2"><span></span>Jack &amp; Jone</label>
				                        <font class="c-number">
				                           <bdo>123</bdo>
				                        </font>
				                    </div>
				                    <div class="checkbox">
				                        <input id="checkbox3" type="checkbox" name="check">
				                        <label for="checkbox3"><span></span>united colors of benetton</label>
				                        <font class="c-number">
				                           <bdo>456</bdo>
				                        </font>
				                    </div>
				                    <div class="checkbox">
				                        <input id="checkbox4" type="checkbox" name="check">
				                        <label for="checkbox4"><span></span>peter england</label>
				                        <font class="c-number">
				                           <bdo>980</bdo>
				                        </font>
				                    </div>
				                    <div class="checkbox">
				                        <input id="checkbox5" type="checkbox" name="check">
				                        <label for="checkbox5"><span></span>lee</label>
				                        <font class="c-number">
				                           <bdo>400</bdo>
				                        </font>
				                    </div>
				                    <div class="checkbox">
				                        <input id="checkbox6" type="checkbox" name="check">
				                        <label for="checkbox6"><span></span>puma</label>
				                        <font class="c-number">
				                           <bdo>250</bdo>
				                        </font>
				                    </div>
				                    <div class="viewmore-btn">
				                      <a href="#" class="btn-default btn">view more</a>
				                    </div>
				                </div>
				            </section>
				            
				            <section class="sidebar-colors gray-bg">
				              <h2 class="sidebar-title-1">colors</h2>
				                
				                <div class="sidebar_checkbox">
				                    <div class="checkbox">
				                        <input id="checkbox7" type="checkbox" name="check">
				                        <label for="checkbox7"><span></span>black</label>
				                        <font class="c-number">
				                           <bdo>800</bdo>
				                        </font>
				                    </div>
				                    <div class="checkbox">
				                        <input id="checkbox8" type="checkbox" name="check">
				                        <label for="checkbox8"><span></span>blue</label>
				                        <font class="c-number">
				                           <bdo>123</bdo>
				                        </font>
				                    </div>
				                    <div class="checkbox">
				                        <input id="checkbox9" type="checkbox" name="check">
				                        <label for="checkbox9"><span></span>purple</label>
				                        <font class="c-number">
				                           <bdo>456</bdo>
				                        </font>
				                    </div>
				                    <div class="checkbox">
				                        <input id="checkbox10" type="checkbox" name="check">
				                        <label for="checkbox10"><span></span>red</label>
				                        <font class="c-number">
				                           <bdo>980</bdo>
				                        </font>
				                    </div>
				                    <div class="checkbox">
				                        <input id="checkbox11" type="checkbox" name="check">
				                        <label for="checkbox11"><span></span>orange</label>
				                        <font class="c-number">
				                           <bdo>400</bdo>
				                        </font>
				                    </div>
				                    <div class="checkbox">
				                        <input id="checkbox12" type="checkbox" name="check">
				                        <label for="checkbox12"><span></span>yellow</label>
				                        <font class="c-number">
				                           <bdo>250</bdo>
				                        </font>
				                    </div>
				                    <div class="viewmore-btn">
				                      <a href="#" class="btn-default btn">view more</a>
				                    </div>
				                </div>
				            </section>
				            
				            <section class="sidebar-size gray-bg">
				              <h2 class="sidebar-title-1">size</h2>
				                
				                <div class="sidebar_checkbox">
				                    <div class="checkbox">
				                        <input id="checkbox13" type="checkbox" name="check">
				                        <label for="checkbox13"><span></span>Large(L)</label>
				                        <font class="c-number">
				                           <bdo>800</bdo>
				                        </font>
				                    </div>
				                    <div class="checkbox">
				                        <input id="checkbox14" type="checkbox" name="check">
				                        <label for="checkbox14"><span></span>Medium(M)</label>
				                        <font class="c-number">
				                           <bdo>123</bdo>
				                        </font>
				                    </div>
				                    <div class="checkbox">
				                        <input id="checkbox15" type="checkbox" name="check">
				                        <label for="checkbox15"><span></span>Small(S)</label>
				                        <font class="c-number">
				                           <bdo>456</bdo>
				                        </font>
				                    </div>
				                    <div class="checkbox">
				                        <input id="checkbox16" type="checkbox" name="check">
				                        <label for="checkbox16"><span></span>Extra Small(XS)</label>
				                        <font class="c-number">
				                           <bdo>980</bdo>
				                        </font>
				                    </div>
				                    <div class="checkbox">
				                        <input id="checkbox17" type="checkbox" name="check">
				                        <label for="checkbox17"><span></span>Extra Large(XL)</label>
				                        <font class="c-number">
				                           <bdo>400</bdo>
				                        </font>
				                    </div>
				                    <div class="checkbox">
				                        <input id="checkbox18" type="checkbox" name="check">
				                        <label for="checkbox18"><span></span>double Extra Large(XXL)</label>
				                        <font class="c-number">
				                           <bdo>250</bdo>
				                        </font>
				                    </div>
				                    <div class="viewmore-btn">
				                      <a href="#" class="btn-default btn">view more</a>
				                    </div>
				                </div>
				            </section>

				        </aside>
			        </div>
		        </div>
		        <div class="right-sidebar">
		          	<div class="col-md-9">
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
			                  <h2 class="section-title-2">{{$category->title}}</h2>
			                </div>
			                <div class="list-filter pull-right">
			                  <div class="dataTables_length" id="myTable_length">
			                    <!-- <label>Short by:
			                      <select name="myTable_length" aria-controls="myTable" class="">
			                        <option value="10">1</option>
			                        <option value="2">2</option>
			                        <option value="3">3</option>
			                        <option value="4">4</option>
			                      </select> Per page
			                    </label> -->
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

			              <div class="brands-list clearfix">
			                <div class="row">
			                	@foreach($products as $product)
				                  	<div class="col-md-3 col-sm-12">
				                    	<div class="item">
				                    		@include('frontend.includes.productgroup.singleproduct')
					                      	{{-- <div class="thumbnail">
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
						                          <sapn class="old">$900</sapn>
						                          <span class="price">$34.95</span>
						                        </div>
					                      	</div> --}}
				                    	</div>
				                  	</div>
			                    @endforeach


			                  {{-- <div class="col-md-3 col-sm-12">
			                    <div class="item">
			                      <div class="thumbnail">
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
			                          <span class="price">$34.95</span>
			                        </div>
			                      </div>
			                    </div>

			                  </div>

			                  <div class="col-md-3 col-sm-12">
			                    <div class="item">
			                      <div class="thumbnail">
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
			                          <span class="price">$34.95</span>
			                        </div>
			                      </div>
			                    </div>

			                  </div>

			                  <div class="col-md-3 col-sm-12">
			                    <div class="item">
			                      <div class="thumbnail">
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
			                          <span class="price">$34.95</span>
			                        </div>
			                      </div>
			                    </div>

			                  </div> --}}

			                  {{-- <div class="col-md-3 col-sm-12">
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
			                          <sapn class="old">$900</sapn>
			                          <span class="price">$34.95</span>
			                        </div>
			                      </div>
			                    </div>

			                  </div>
			                
			                  <div class="col-md-3 col-sm-12">
			                    <div class="item">
			                      <div class="thumbnail">
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
			                          <span class="price">$34.95</span>
			                        </div>
			                      </div>
			                    </div>

			                  </div>

			                  <div class="col-md-3 col-sm-12">
			                    <div class="item">
			                      <div class="thumbnail">
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
			                          <span class="price">$34.95</span>
			                        </div>
			                      </div>
			                    </div>

			                  </div>

			                  

			                  <div class="col-md-3 col-sm-12">
			                    <div class="item">
			                      <div class="thumbnail">
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
			                          <span class="price">$34.95</span>
			                        </div>
			                      </div>
			                    </div>

			                  </div> --}}

			                </div>
			              </div>

			            </section>

		          	</div>

		        </div>

		    </div>
		</div>
	</div>

@endsection
