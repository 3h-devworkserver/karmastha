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

@include('frontend.includes.banner')

@include('frontend.includes.advertisement')

@if( count($tproducts) > 0 )
<section class="products-wrapper pb0">
  <div class="container">
    <div class="row">
        <div class="col-md-12">
          <div class="section-title">
              <h2>Trending</h2>
          </div>
        </div>
    </div>
    <div class="row products-fluid fluid-nosapce mt30">
      @foreach( $tproducts as $key => $tproduct)
      <div class="col-md-3 col-sm-3">
        <div class="thumbnail">
          <?php 
                $price = $tproduct->productPrice;
                $p = ( $price->price - $price->special_price);
                $dis = round( ( $p / $price->price ) * 100 );
                
          ?>
        <div class="ribbon"><span>{{ $dis }}% dis</span></div>
          <a href="#">
            <div class="product-img">
              <div class="img-wrap">
                <img src="{{ asset('/images/product/'.$tproduct->id.'/base/'. $tproduct->productFirstListImage() ) }}" alt="">
              </div>
            </div>
            
          </a>
          <div class="action">
            {{-- <form action="{{ url('/wishlist') }}" method="POST" class="side-by-side wishlist">
                    {!! csrf_field() !!}
                    <input type="hidden" name="id" value="{{ $product->id }}">
                    <input type="hidden" name="name" value="{{ $product->name }}">
                    <input type="hidden" name="price" value="{{ $product->price }}">
                    <input type="submit" class="btn btn-primary btn-lg" value="Add to Wishlist">
                </form> --}}
            <a href="{{ URL::to('wishlist/store/?id='.$tproduct->id) }}" class="wishlist" data-id="{{ $tproduct->id }}" data-price="{{ $price->price}}" data-name="{{ $tproduct->name}}">
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
            <sapn class="old">{{ $price->price}}</sapn>
            <span class="price">{{ $price->special_price}}</span>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>
@endif
<section class="products-wrapper four-col category-wrapper">
  <div class="container">
    <div class="row">
        <div class="col-md-12">
          <div class="section-title">
              <h2>Fashion</h2>
              <ul class="list-unstyled list-inline">
                <li><a href="#">Jeans</a></li>
                <li><a href="#">Wedding</a></li>
                <li><a href="#">T-shirt</a></li>
                <li><a href="#">Vestons</a></li>
              </ul>
              <a href="#" class="viewmore"><i class="fa fa-plus-circle"></i>More Categories</a>
          </div>
        </div>
    </div>
    <div class="row mt30">
      <div class="col-md-3 col-sm-3">
        <div class="featured-category">
            <a href="#">
              <img src="{{asset('front-images/addbanner1.jpg')}}" alt="">
            </a>
        </div>
      </div>
      <div class="col-md-9 col-sm-9">
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
                <h3><a href="#">product title</a></h3>
                <span class="price">$34.95</span>
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
                <h3><a href="#">product title</a></h3>
                <span class="price">$34.95</span>
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
                <h3><a href="#">product title</a></h3>
                <sapn class="old">$900</sapn>
                <span class="price">$34.95</span>
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
                      <h3><a href="#">product title</a></h3>
                      <span class="price">$34.95</span>
                  </div>
              </div>
          </div>

        </div>
      </div>

      
    </div>
  </div>
</section>
@if( count( $brands) > 0 )
<section class="brands-wrapper gray-bg pb10">
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
@endif 
<section class="steps-wrapper text-center">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
          <h2 class="section-title-1">doing business on karmastha is really easy</h2>
      </div>
    </div>
    <div class="row">
      <div class="col-md-3 col-sm-3">
        <i class="flaticon-list"></i>
        <h4>List your products</h4>
        <p>
          Uploading your products is really simple through our self-serve tool. We also help you put together an attractive catalog by connecting you with industry experts.
        </p>
      </div>
      <div class="col-md-3 col-sm-3">
        <i class="flaticon-full-items-inside-a-shopping-bag"></i>
        <h4>Sell across India</h4>
        <p>
          Maximise your online sales; attract more buyers and achieve higher conversion rates.
        </p>
      </div>
      <div class="col-md-3 col-sm-3">
        <i class="flaticon-trolley"></i>
        <h4>Ship with ease</h4>
        <p>
          Enjoy hassle-free pick-up and delivery across India through our logistics services and sell across the nation!
        </p>
      </div>
      <div class="col-md-3 col-sm-3">
        <i class="flaticon-money-bag"></i>
        <h4>Earn big</h4>
        <p>
          Make use of the host of services that we offer and earn more. Our payments process is the fastest in the industry - get your payments within 7-14 days of sales!
        </p>
      </div>
    </div>
  </div>
</section>
@if( count($members) > 0 )
<section class="brands-wrapper gray-bg">
  <div class="container">
    <h2 class="section-title-1">Business Member</h2>
    <div class="brand-list">
      <div class="owl-carousel">
        @foreach( $members as $key => $member)
        <div class="item">
          @if( $member->url  != '#' || !empty( $member->url))
          <a href="http://{{$member->url}}" target="_blank" alt="">
          @else
          <a href="#">
            @endif
            <img src="{{asset('/'.$member->logo)}}" alt="">
          </a>
        </div>
        @endforeach
        
      </div>
      
    </div>
  </div>
</section>
@endif

@endsection
