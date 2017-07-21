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
      <div class="col-md-3 col-sm-3">
        <div class="thumbnail">
        <div class="ribbon"><span>25% dis</span></div>
          <a href="#">
            <div class="product-img">
              <div class="img-wrap">
                <img src="{{asset('front-images/cap.png')}}" alt="">
              </div>
            </div>
            
          </a>
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
      <div class="col-md-3 col-sm-3">
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
      <div class="col-md-3 col-sm-3">
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
      <div class="col-md-3 col-sm-3">
        <div class="thumbnail">
        <div class="ribbon"><span>25% dis</span></div>
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
      <div class="col-md-3 col-sm-3">
        <div class="thumbnail">
          <a href="#">
            <div class="product-img">
              <div class="img-wrap">
                <img src="{{asset('front-images/cap.png')}}" alt="">
              </div>
            </div>
            
          </a>
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
      <div class="col-md-3 col-sm-3">
        <div class="thumbnail">
          <a href="#">
            <div class="product-img">
              <div class="img-wrap">
                <img src="{{asset('front-images/cap.png')}}" alt="">
              </div>
            </div>
            
          </a>
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
      <div class="col-md-3 col-sm-3">
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
      <div class="col-md-3 col-sm-3">
        <div class="thumbnail">
        <div class="ribbon"><span>25% dis</span></div>
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
      <div class="col-md-3 col-sm-3">
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
      <div class="col-md-3 col-sm-3">
        <div class="thumbnail">
          <a href="#">
            <div class="product-img">
              <div class="img-wrap">
                <img src="{{asset('front-images/cap.png')}}" alt="">
              </div>
            </div>
            
          </a>
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
</section>

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

<section class="brands-wrapper gray-bg pb10">
  <div class="container">
    <h2 class="section-title-1">Our Brands</h2>
    <div class="brand-list">
      <ul class="list-unstyled list-inline">
        <li><a href="#"><img src="{{asset('front-images/brand1.jpg')}}" alt=""></a></li>
        <li><a href="#"><img src="{{asset('front-images/brand2.jpg')}}" alt=""></a></li>
        <li><a href="#"><img src="{{asset('front-images/brand3.jpg')}}" alt=""></a></li>
        <li><a href="#"><img src="{{asset('front-images/brand4.jpg')}}" alt=""></a></li>
        <li><a href="#"><img src="{{asset('front-images/brand5.jpg')}}" alt=""></a></li>
        <li><a href="#"><img src="{{asset('front-images/brand6.jpg')}}" alt=""></a></li>
        <li><a href="#"><img src="{{asset('front-images/brand7.jpg')}}" alt=""></a></li>
        <li><a href="#"><img src="{{asset('front-images/brand8.jpg')}}" alt=""></a></li>
        <li><a href="#"><img src="{{asset('front-images/brand9.jpg')}}" alt=""></a></li>
        <li><a href="#"><img src="{{asset('front-images/brand10.jpg')}}" alt=""></a></li>
        <li><a href="#"><img src="{{asset('front-images/brand5.jpg')}}" alt=""></a></li>
        <li><a href="#"><img src="{{asset('front-images/brand6.jpg')}}" alt=""></a></li>
      </ul>
    </div>
  </div>
</section>

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

<section class="brands-wrapper gray-bg">
  <div class="container">
    <h2 class="section-title-1">Business Member</h2>
    <div class="brand-list">
      <div class="owl-carousel">
        <div class="item">
          <a href="#"><img src="{{asset('front-images/brand1.jpg')}}" alt=""></a>
        </div>
        <div class="item">
          <a href="#"><img src="{{asset('front-images/brand2.jpg')}}" alt=""></a>
        </div>
        <div class="item">
          <a href="#"><img src="{{asset('front-images/brand3.jpg')}}" alt=""></a>
        </div>
        <div class="item">
          <a href="#"><img src="{{asset('front-images/brand4.jpg')}}" alt=""></a>
        </div>
        <div class="item">
          <a href="#"><img src="{{asset('front-images/brand5.jpg')}}" alt=""></a>
        </div>
        <div class="item">
          <a href="#"><img src="{{asset('front-images/brand6.jpg')}}" alt=""></a>
        </div>
        <div class="item">
          <a href="#"><img src="{{asset('front-images/brand7.jpg')}}" alt=""></a>
        </div>
        <div class="item">
          <a href="#"><img src="{{asset('front-images/brand8.jpg')}}" alt=""></a>
        </div>
        <div class="item">
          <a href="#"><img src="{{asset('front-images/brand9.jpg')}}" alt=""></a>
        </div>
        <div class="item">
          <a href="#"><img src="{{asset('front-images/brand10.jpg')}}" alt=""></a>
        </div>
      </div>
      
    </div>
  </div>
</section>

@endsection
