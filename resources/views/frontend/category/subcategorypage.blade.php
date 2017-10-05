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


	@if(!empty($categories) && count($categories) > 1)
		<section class="relatedSearch">
		 	<div class="container">
		  		<div class="row">
			      	<div class="col-md-12">                
			   			<div class="related-keyword">
			    			<span>Related searches:</span>
			    			@foreach($categories as $key=> $cat)
			    				@if($key < App\Models\Category::getRelatedSearchLimit())
					    			@if($cat->id != $category->id)
								    <a class="related-keyword-links" href="{{asset('category/'.$cat->url)}}">{{$cat->title}}</a>
								    @endif
								@endif
							@endforeach
			   			</div>
			   		</div>
		  		</div>
		 	</div>
		</section>
	@else
		<section class="page-breadcrumbs pb0">
		  	<div class="container"> 
			    <div class="row">
			      	<div class="col-md-12">                
			        	<ol class="breadcrumb">
			                <li><a href="{{url('/')}}">Home</a></li>
			                <?php  $i = count($catArray); ?>
			                @while($i > 0)
			                <li><a href="{{url('/'.$catArray[--$i]->url)}}">{{$catArray[$i]->title}}</a></li>
			                @endwhile
			                <li class="active">{{$category->title}}</li>
		            	</ol>
			      	</div>  
			    </div>
		  	</div>
		</section>
	@endif

	{{Form::open(['url'=>'/productsorting', 'method'=>'get'])}}
		{{Form::hidden('cat_id', $category->id)}}
		<div class="twocol-sidebar">
			<div class="container">
			    <div class="row">
			      	<div class="left-aside">
				        <div class="col-md-3">
					        <aside class="sidebar">
					            <section class="sidebar-category gray-bg">
					            	<?php $count = count($catArray); --$count; ?>
					              <h2 class="sidebar-title-1 sidebar-heading">{{$catArray[--$count]->title}}</h2>
					              <div class="left-category-list">
					              	@if(count($catArray[$count]->childsWithOrder) > 0)
						                <ul class="list-unstyled">
							                @foreach($catArray[$count]->childsWithOrder as $key=>$cat)
							                  	<li class="@if($cat->url == $category->url) active @endif @if($key > 4) hide @endif ">
							                    	<span>
								                      	<a href="{{url('category/'.$cat->url)}}">{{$cat->title}}</a>
								                      	<!-- <font class="c-number"><bdo>74041</bdo></font> -->
							                    	</span>
							                  	</li>
							                @endforeach
						                </ul>
					                @endif
					                @if(count($catArray[$count]->childsWithOrder) > 4)
					                	<div class="viewmore-btn">
											<a href="javascript:void(0)" class="btn-default btn catViewAll">View more</a>
					                    </div>
					                @endif
					              </div>
					            </section>
								
				                  	<div class="panel panel-default">
						            	<section class="pricerange-slider gray-bg">

					                      	<div class="panel-heading" role="tab" id="headingOne">
					                      		<h2 class="panel-title sidebar-title-1">
					                      			<a data-toggle="collapse"  href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
							                        price</a>
							                    </h2>
					                      	</div>
						                    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
						                    	<div class="filter-panel">
									                <div  class="range-slider" >
									                	<div id="slider-price"></div>
									                	<div class="slider-values">
									                		<div class="slider-price-from">
									                            <span>NPR</span>
									                            <input id="price-from" class="input-price sortChange" type="text" value="0" data-min="0" placeholder="Min" name="minprice"/> 
								                            </div>
									                		<div class="slider-price-to">
									                            <span>NPR</span>
									                            <input id="price-to" class="input-price sortChange" type="text" value="{{(empty($category->max_price))? 10000 : $category->max_price }}" data-step="100" data-max="{{(empty($category->max_price))? 10000 : $category->max_price }}" placeholder="Max" name="maxprice" />
								                            </div>
								                        </div>
									                    
									                  {{-- <input data-class="sortChange" name ="pricerange" data-addui='slider' data-min='10' data-max='20000' data-range='true' data-step='100' value='100,1900'> --}}
									                </div>
									                {{-- <form class="rangerform"> --}}
									                  {{-- <input type="text" name="minprice" value="99" class="sortChange">
									                  <input type="text" name="maxprice" value="1900" class="sortChange">
									                  <input type="button" onclick="filterProducts()" value="Go" /> --}}
									                {{-- </form> --}}
								              	</div>
						                    </div>
						                </section>
				                  	</div>

									@if(count($category->brands) > 0)
				                  	<div class="panel panel-default">
						            	<section class="sidebar-brand gray-bg">
					                      	<div class="panel-heading" role="tab" id="headingTwo">
					                      		<h2 class="panel-title sidebar-title-1">
					                      			<a data-toggle="collapse" href="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
								                        brands</a>
								                </h2>
					                      	</div>
						                    <div id="collapseTwo" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingTwo">
						                          	<div class="sidebar_checkbox parent">
														@foreach($category->brands as $key=>$brand)
									                    <div class="checkbox child @if($key > 4) hide @endif">
									                        <input id="checkbox{{$key}}" type="checkbox" name="brand[]" value="{{$brand->id}}" class="sortChange brand-{{$brand->id}}" data-name="{{$brand->brand_name}}">
									                        <label for="checkbox{{$key}}"><span></span>{{$brand->brand_name}}</label>
									                        <!--
									                        <font class="c-number">
									                           <bdo>800</bdo>
									                        </font> -->
									                    </div>
									                    @endforeach
									                    @if(count($category->brands) > 4 )
									                    <div class="viewmore-btn">
									                      <a href="javascript:void(0)" class="btn-default btn viewAll">view more</a>
									                    </div>
									                    @endif
									                </div>
						                    </div>
						                </section>
				                  	</div>
				                  	@endif


				                  <?php /*
	
					            <section class="pricerange-slider gray-bg">
					              <h2 class="sidebar-title-1">price</h2>
					              <div class="filter-panel">
					                <div  class="range-slider" >
					                    
					                  <input data-class="sortChange" name ="pricerange" data-addui='slider' data-min='10' data-max='20000' data-range='true' data-step='100' value='100,1900'>
					                </div>
					                {{-- <form class="rangerform"> --}}
					                  {{-- <input type="text" name="minprice" value="99" class="sortChange">
					                  <input type="text" name="maxprice" value="1900" class="sortChange">
					                  <input type="button" onclick="filterProducts()" value="Go" /> --}}
					                {{-- </form> --}}
					                
					              </div>
					            </section>

								@if(count($category->brands) > 0)
					            <section class="sidebar-brand gray-bg">
					                <h2 class="sidebar-title-1">brands</h2>
					                <div class="sidebar_checkbox">
										@foreach($category->brands as $key=>$brand)
					                    <div class="checkbox">
					                        <input id="checkbox{{$key}}" type="checkbox" name="brand[]" value="{{$brand->id}}" class="sortChange">
					                        <label for="checkbox{{$key}}"><span></span>{{$brand->brand_name}}</label>
					                        <!--
					                        <font class="c-number">
					                           <bdo>800</bdo>
					                        </font> -->
					                    </div>
					                    @endforeach
					                    <div class="viewmore-btn">
					                      <a href="#" class="btn-default btn">view more</a>
					                    </div>
					                </div>
					            </section>
					            @endif
					            */ ?>
					            
					            <!--
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
					            </section>  -->

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
					                    <label><span>Sort by:</span>
						                    <select name="popularity" aria-controls="myTable" class="sortChange selectBox">
						                        <option value="popular">popularity</option>
						                        <option value="new">newest</option>
						                        <option value="fromLowToHigh">Price Low to High</option>
						                        <option value="fromHighToLow">Price High to Low</option>
						                    </select>
					                    </label>
					                  </div>

					                </div>
					            </div>

					            <div class="sortingCriteria">
					            	<div class="sortingCriterion criteriaBrand hide">
					            		<span>Brand:</span>
					            	</div>
					            	<div class="sortingCriterion criteriaPrice hide">
					            		<span>Price:</span>
					            	</div>
					            </div>
							
								<div class="brands-list clearfix">
						      		@include('frontend.includes.categoryproductlist')
						      	</div>

				            </section>

			          	</div>

			        </div>

			    </div>
			</div>
		</div>
		
		<button class="btn btn-success sortingProcess hide" type="submit">Sorting</button>

	{{Form::close()}}


@endsection
