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
         
        @if(count($category->childsWithOrder) > 0 )
        <div class="category-circle text-center">
          <div class="content-circle">

          	@foreach($category->childsWithOrder as $key => $child)
          	  @if( $key < 6 )
                <div class="item">
                  <a href="{{ URL::to('/category/'.$child->url) }}">
                    <div class="thumbnail">
                      <div class="product-img">
                        <div class="img-wrap">
                          <img src="{{asset('images/category/'.$child->feat_img)}}" alt="">
                        </div>
                      </div>
                      <div class="caption">
                        <h3>{{$child->title}}</h3>
                      </div>
                    </div>
                  </a>
                </div>
      		    @endif
      			@endforeach
            
            @if(count($category->childsWithOrder) > 6 )
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
            @endif

          </div>
        </div>
        @endif

      </div>
    </div>
  </div>
</section>
   
@if(count($category->childsWithOrder) > 6 )
<section class="gray-bg collapse" id="viewall-dropdown">
  <div class="container">
    <div class="row">
      <div class="products-wrapper no-scroll viewall-dropdown-content">
        @foreach($category->childsWithOrder as $key => $cat)
          @if($key >= 6 )
            <div class="col-md-2 col-sm-12">
              <div class="item">
                <div class="thumbnail">
                  <div class="category-img">
                    <div class="img-wrap">
                      <img src="{{asset('images/category/'.$cat->feat_img)}}" alt="">
                    </div>
                  </div>
                  
                  <div class="caption">
                    <h3>{{$cat->title}}</h3>
                  </div>
                </div>
                
              </div>
            </div>
          @endif
        @endforeach

      </div>
    </div>
  </div>
</section>
@endif

<!-- trending product -->
{!! product_group(1) !!}

<!-- top brands -->
{!! top_brand_list() !!}

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
        <div class="owl-carousel owl-theme" id="slides">
          @foreach($category->middleBanners as $key => $banner)
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