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

<section class="page-breadcrumbs pb0">
  <div class="container"> 
    <div class="row">
      <div class="col-md-12">                
        <ol class="breadcrumb">
          <li><a href="{{ URL::to('/') }}">Home</a></li>
          <li>{{ $brands->brand_name}}</li>
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
            <section class="brand-content pt0 pb0">
              <div class="brand-detail gray-bg">
                <div class="product-logo">
                  <img src="{{ asset('/'.$brands->brand_logo) }}" alt=""><span>{{ $brands->brand_name}}</span>
                </div>
                @if(!empty($brands->description))
                <div class="brand-info-detail">
                  {!! $brands->description !!}
                </div>
                <div class="viewmore-btn">
                  <a href="#" class="btn-default btn">view more</a>
                </div>
                @endif 
              </div>

            </section>

            <section class="small-circle-brand pt0">
              <div class="category-circle text-center mt30">
                <div class="content-circle">
              @foreach($brands->categorys as $key => $cat)
              @if( $key < 4 )
                  <div class="item">
                    <div class="thumbnail">
                      <div class="product-img">
                        <div class="img-wrap">
                          <img src="{{asset('images/category/'.$cat->feat_img)}}" alt="">
                        </div>
                      </div>
                      <div class="caption">
                        <h3>{{ $cat->title }}</h3>
                      </div>
                    </div>
                  </div>
              @endif
            @endforeach
           
            <div class="item">
              <div class="thumbnail">
                <div class="product-img">
                  <div class="img-wrap">
                    <span>view all</span>
                  </div>
                </div>
                <div class="caption cursor" type="button" class="viewall" data-toggle="collapse" data-target="#viewall-dropdown">
                  <h3>More Brand Categories</h3>
                </div>
              </div>
                
            </div>

                </div>

              </div>
            </section>
            @if(count($brands->categorys) > 4 )
            <section class="gray-bg collapse collapse-small" id="viewall-dropdown">
              <div class="products-wrapper no-scroll viewall-dropdown-content">
                @foreach($brands->categorys as $key => $cat)
                @if($key  >= 4 )
                <div class="col-md-3 col-sm-12">
                  <div class="item">
                    <div class="thumbnail">
                      <div class="product-img">
                        <div class="img-wrap">
                         <img src="{{asset('images/category/'.$cat->feat_img)}}" alt="">
                        </div>
                      </div>
                      
                      <div class="caption">
                        <h3>{{ $cat->title }}</h3>
                      </div>
                    </div>
                    
                  </div>
                </div>
                @endif
                @endforeach
                 @if( count($brands->categorys) > 8 )    
                <div class="viewmore-btn col-md-12 text-center">
                  <a href="#" class="btn-default btn">load more categories</a>
                </div>
                @endif
              </div>
            </section>
            @endif
            <section class="products-wrapper pt0">
              <div class="section-title">
                <h2>Trending</h2>
              </div>

              <div class="brands-list mt30">
                <div class="row">
                  <div class="col-md-3 col-sm-12">
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

                  </div>

                  <div class="col-md-3 col-sm-12">
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

                  </div>

                </div>
              </div>
            </section>

          </div>

        </div>

      </div>
    </div>

  </div>
@endsection
