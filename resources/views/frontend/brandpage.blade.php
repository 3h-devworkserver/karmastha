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
              <h2 class="sidebar-title-1">{{ $brands->brand_name}}</h2>
              <div class="left-category-list">
                <ul class="list-unstyled">
                  {{-- @if($key == 0 ) --}}
                  @foreach($brands->categorys as $key => $cat)
                      <?php $ids = DB::table('categorys')->select('parent_id')->where('id',$cat->id)->first();
                        $sub = 'sub-child';
                        ?>
                        {{-- @if($cat->parent_id == 0 ) --}}
                        @foreach($cat->childs as $key=>$t)
                          @if(in_array($t->id,$brandids))
                              <li class="dsjhbd">
                                  <span>
                                <a href="#">{{ $t->title }}</a>
                                <font class="c-number"><bdo>11</bdo></font>
                              </span>
                            </li>
                            <ul>
                            @foreach($t->childs as $key=>$th)
                                @if(in_array($th->id,$brandids))
                                    <li class="test">
                                        <span>
                                      <a href="#">{{ $th->title }}</a>
                                      <font class="c-number"><bdo>11</bdo></font>
                                    </span>
                                  </li>
                                  <ul>
                            @foreach($th->childs as $key=>$th1)
                                @if(in_array($th1->id,$brandids))
                                    <li class="test">
                                        <span>
                                      <a href="#">{{ $th1->title }}</a>
                                      <font class="c-number"><bdo>11</bdo></font>
                                    </span>
                                  </li>
                                   <ul>
                            @foreach($th1->childs as $key=>$th2)
                                @if(in_array($th2->id,$brandids))
                                    <li class="test">
                                        <span>
                                      <a href="#">{{ $th2->title }}</a>
                                      <font class="c-number"><bdo>11</bdo></font>
                                    </span>
                                  </li>
                                  @endif
                            @endforeach
        </ul>
                                  @endif
                            @endforeach
        </ul>
                                  @endif
                            @endforeach
        </ul>
                            @endif
                            @endforeach
                      {{-- @endif --}}
                          
                         {{--    @else
                            <li class="sub-sub-child">
                              <span>
                          <a href="#">{{ $cat->title }}</a>
                          <font class="c-number"><bdo>11</bdo></font>
                        </span>
                      </li> --}}
                        
                  @endforeach
                 
                </ul>
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
