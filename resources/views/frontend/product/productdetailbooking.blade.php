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

@section('og_image')
@if(count($baseImage) > 0){{url('images/product/'.$product->id.'/base/'.$baseImage[0]->image)}} @endif 
@endsection

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
@if(count($baseImage) > 0) {{url('images/product/'.$product->id.'/base/'.$baseImage[0]->image)}} @endif
@endsection

@section('content')

<section class="page-breadcrumbs pb0">
  <div class="container"> 
    <div class="row">
      <div class="col-md-12"> 
      <?php
        $main = '';
        foreach($product->categorys as $cat){
          if ($cat->parent_id == 0) {
              $main = $cat;
              break;
          }
        }
      ?>               
        <ol class="breadcrumb">
          <li><a href="#">Home</a></li>
          @if(!empty($main))
          <li><a href="{{$main->url}}">{{$main->title}}</a></li>
          @endif
          <li>{{$product->name}}</li>       
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
		                <div class="add-wishlist">
                      <!-- <a href="#" class="wish-list" data-toggle="tooltip" data-placement="left" data-original-title="Add To Wishlist"><i class="la-icon-heart-o"></i></a> -->
                        <a href="{{ URL::to('user/wishlist/store/?id='.$product->id) }}" class="wishlist" data-id="{{ $product->id }}" data-price="{{ productPrice($product->id)}}" data-name="{{ $product->name}}">
                          <i class="la-icon-heart-o"></i>                  
                        </a>
                    </div>

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
              <?php 
                $vendor = getUser($product->user_id);
              ?>
              	@if( (!$vendor->hasRole('Administrator')) && $vendor->hasRole('Vendor'))
                	<span class="brand-name-2">{{$vendor->name}}</span>
                @endif
                <h3 class="text-black-1">{{$product->name}}</h3>
                
                                           
                <!-- single-pro-rating -->
                {{-- <div class="single-pro-rating product-info-item clearfix">
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
                </div> --}}

                <!-- single-product-price -->
                <div class="pro-price product-info-item clearfix">
                	@if($product->productPrice->special_price)
                    	<span class="old">NPR {{$product->productPrice->price}}</span> 
                    @endif
                    <span class="new">@if(!empty($product->productPrice->special_price)) NPR {{$product->productPrice->special_price}} @else NPR {{$product->productPrice->price}} @endif</span> 
                	@if($product->productPrice->special_price)
                    	<span class="incl-dis">{{round(($product->productPrice->price - $product->productPrice->special_price)/$product->productPrice->price*100)}}% off</span>
                    @endif
                </div>

                <!-- stock available -->
                <div class="brand-logo-detail product-info-item text-center clearfix">
                  <div class="single-logo pull-left"><img src="{{asset($product->brand->brand_logo)}}"></div>
                  <!-- <div class="brand-stock-info"><img src="{{asset('images/success.png')}}">Mega Seller! 2,000+ sold in last month</div> -->
                  <div class="stock-available-detail pull-right"><span>In Stock:</span><b>
                      Unavailable
                    </b></div>
                </div>

                {{Form::open(['url'=>'prebooking', 'method'=>'post', 'id'=>'productActionForm'])}} 

                  {{Form::hidden('action', '')}} 
                  {{Form::hidden('product', $product->id)}} 
                  {{Form::hidden('attr_identifier', null, ['class'=>'attrIdentifier'])}}

                  @if(count($tmp) > 0)

                    @foreach($tmp as $key=>$tm)
                      <div class="singleAttribute">
                        @if($tm->attr_type == 'color')
                        <!-- single-pro-color -->
                        <div class="sin-pro-color product-info-item clearfix">
                            <p class="color-title">{{$tm->name}}:</p>
                            <div class="widget-color attrParent form-group">
                                @if(count($tmp2) > 0)
                                  <ul>
                                    @foreach($tmp2 as $tm2)
                                      @if($tm->id == $tm2->attribute_id)
                                      <?php $rand = str_random(4);  ?>
                                      <?php /*
                                      <li style="background-color:{{$tm2->value}};">{{ Form::radio('attr['.$key.']', $tm2->value, false, ['id'=>'attr-'.$rand, 'data-name'=>$tm->name, 'data-identifier'=>$tm->identifier, 'required']) }}<label class="attribute" for="attr-{{$rand}}"><span></span></label></li>
                                      <?php  */ ?>
                                      <li style="background-color:{{$tm2->value}};">{{ Form::radio('attr['.$key.']', $tm2->id, false, ['id'=>'attr-'.$rand, 'class'=>'attrVal','data-value'=>$tm2->value, 'data-name'=>$tm->name, 'required']) }}<label class="attribute" for="attr-{{$rand}}"><span></span></label></li>
                                      @endif
                                      @if ($loop->last)
                                        @if(!empty($tm->short_desc_title))
                                          <a class="btn btn-default pull-right" data-toggle="modal" data-target="#myModal-{{$tm->id}}">{!!$tm->short_desc_title!!}</a>

                                          <!-- Modal -->
                                          <div class="modal fade" id="myModal-{{$tm->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                            <div class="modal-dialog" role="document">
                                              <div class="modal-content">
                                                <div class="modal-header">
                                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                  <h4 class="modal-title" id="myModalLabel">{{$tm->short_desc_title}}</h4>
                                                </div>
                                                <div class="modal-body">
                                                  {!! $tm->short_desc !!}
                                                </div>
                                              </div>
                                            </div>
                                          </div>

                                        @endif
                                      @endif
                                    @endforeach
                                  </ul>
                                @endif
                            </div>
                        </div>
                        @endif
                      
                        @if($tm->attr_type == 'normal')
                        <!-- product size detail -->
                        <div class="product-size-detail product-info-item clearfix">
                            <div class="product-size clearfix attrParent form-group">
                                <p class="color-title pull-left">{{$tm->name}}:</p>
                                @if(count($tmp2) > 0)
                                  {{-- <form class="size-list"> --}}
                                    @foreach($tmp2 as $tm2)
                                      @if($tm->id == $tm2->attribute_id)
                                      <?php $rand = str_random(4);  ?>
                                        {{ Form::radio('attr['.$key.']', $tm2->id, false, ['class'=>'size-list-info attrVal', 'id'=>'attr-'.$rand, 'data-value'=>$tm2->value, 'data-name'=>$tm->name, 'required']) }}<label for="attr-{{$rand}}" class="attribute"><span>{{$tm2->value}}</span></label>
                                      @endif

                                        @if ($loop->last)
                                          @if(!empty($tm->short_desc_title))
                                            <a class="btn btn-default pull-right" data-toggle="modal" data-target="#myModal-{{$tm->id}}">{{$tm->short_desc_title}}</a>

                                            <!-- Modal -->
                                            <div class="modal fade" id="myModal-{{$tm->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                              <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                  <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    <h4 class="modal-title" id="myModalLabel">{{$tm->short_desc_title}}</h4>
                                                  </div>
                                                  <div class="modal-body">
                                                    {!!$tm->short_desc!!}
                                                  </div>
                                                </div>
                                              </div>
                                            </div>

                                          @endif
                                        @endif
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <!-- product size detail end --> 
                        @endif

                        {{Form::hidden('attr_value['.$key.']', null, ['class'=>'attrValue'])}}
                        {{Form::hidden('attr_name['.$key.']', null, ['class'=>'attrName'])}}
                      </div>
                    @endforeach

                    <?php /* ?>
                    @foreach($tmp as $tm)
                      @if($tm->attr_type == 'color')
                      <!-- single-pro-color -->
                      <div class="sin-pro-color product-info-item clearfix">
                          <p class="color-title">{{$tm->name}}:</p>
                          <div class="widget-color attrParent form-group">
                              @if(count($tmp2) > 0)
                                <ul>
                                  @foreach($tmp2 as $tm2)
                                    @if($tm->id == $tm2->id)
                                    <?php $rand = str_random(4);  ?>
                                    <li style="background-color:{{$tm2->value}};">{{ Form::radio('attr[]', $tm2->value, false, ['id'=>'attr-'.$rand ]) }}</li>
                                    {{-- <li style="background-color:{{$tm2->value}};">{{ Form::radio('attr[]', $tm2->value, false, ['id'=>'attr-'.$rand ]) }}<label class="attribute" for="attr-{{$rand}}"><span></span></label></li> --}}
                                    @endif
                                  {{-- <li class="green">{{ Form::radio('attr1', 'green') }}</li>
                                  <li class="yellow">{{ Form::radio('attr1', 'yellow') }}</li>
                                  <li class="blue">{{ Form::radio('attr1', 'blue') }}</li>
                                  <li class="purple">{{ Form::radio('attr1', 'purple') }}</li>
                                  <li class="aqua">{{ Form::radio('attr1', 'aqua') }}</li> --}}
                                  {{-- <li class="green"><a href="#"></a></li>
                                  <li class="yellow"><a href="#"></a></li>
                                  <li class="blue"><a href="#"></a></li>
                                  <li class="purple"><a href="#"></a></li>
                                  <li class="aqua"><a href="#"></a></li> --}}
                                   <?php    
                                      echo print_r($tm);
                                      

                                      ?>
                                  @endforeach
                                </ul>
                              @endif
                          </div>
                      </div>
                      @endif
                    
                      @if($tm->attr_type == 'normal')
                      <!-- product size detail -->
                      <div class="product-size-detail product-info-item clearfix">
                          <div class="product-size clearfix attrParent form-group">
                              <p class="color-title pull-left">{{$tm->name}}:</p>
                              @if(count($tmp2) > 0)
                                {{-- <form class="size-list"> --}}
                                  @foreach($tmp2 as $tm2)
                                    @if($tm->id == $tm2->id)
                                    <?php $rand = str_random(4);  ?>
                                      {{ Form::radio('attr[]', $tm2->value, false, ['class'=>'size-list-info', 'id'=>'attr-'.$rand]) }}
                                      {{-- {{ Form::radio('attr[]', $tm2->value, false, ['class'=>'size-list-info', 'id'=>'attr-'.$rand]) }}<label for="attr-{{$rand}}" class="attribute"><span>{{$tm2->value}}</span></label> --}}
                                      {{-- <input type="text" name="p-size" class="size-list-info" value="{{$tm2->value}}"> --}}
                                    @endif

                                     {{--  <input type="text" name="p-size" class="size-list-info" value="30">
                                      <input type="text" name="p-size" class="size-list-info" value="32">
                                      <input type="text" name="p-size" class="size-list-info" value="40">
                                      <input type="text" name="p-size" class="size-list-info" value="26"> --}}
                                      <?php    
                                      echo print_r($tm);


                                      ?>
                                        @if(!empty($tm->short_desc_title))
                                          <button class="btn btn-default pull-right">{{$tm->short_desc_title}}</button>
                                        @endif
                                      @if ($loop->last)
                                      @endif
                                  @endforeach
                                {{-- </form>    --}}
                              @endif
                          </div>
                      </div>
                      <!-- product size detail end --> 
                      @endif

                    @endforeach
                    <?php */ ?>            
                  @endif                       
                                              
                  <!-- plus-minus-pro-action -->
                  <div class="plus-minus-pro-action product-info-item clearfix">
                      <div class="sin-plus-minus cart-size clearfix">
                          <div class="cart-btn">
                            <a href="javascript:void(0)" class="btn btn-primary open-door " tabindex="-1" data-toggle="modal" data-target="#myModal">
                              <span class="text-capitalize"><i class="fa fa-shopping-cart"></i> book now</span>
                            </a>
                          </div>  
                      </div>
                  </div>
                  <!-- plus-minus-pro-action end -->

                      
                      </div>

                {{Form::close()}}

                <!-- share it -->
                <div class="sin-pro-action product-info-item clearfix">
                    <h3><i class="fa fa-share-alt"></i>share it:</h3>
                      <ul class="action-button list-unstyled">
                        <li>
                            <a title="facebook" tabindex="0" onclick="window.open('http://www.facebook.com/sharer/sharer.php?u={{url()->current()}}', 'sharer', 'toolbar=0,width=620,height=280');" href="javascript: void(0)">
                              <i class="fa fa-facebook"></i>
                            </a>
                        </li>
                        <li>
                            <a title="twitter" tabindex="0" onclick="window.open('http://twitter.com/intent/tweet?status={{url()->current()}}', 'sharer', 'toolbar=0,width=620,height=280');" href="javascript: void(0)">
                              <i class="fa fa-twitter"></i>
                            </a>
                        </li>
                       {{--  <li>
                            <a href="#" title="google" tabindex="0"><i class="fa fa-google-plus-official"></i></a>
                        </li>
                        <li>
                            <a href="#" title="instagram" tabindex="0"><i class="fa fa-instagram"></i></a>
                        </li>
                        <li>
                            <a href="#" title="linkedIn" tabindex="0"><i class="fa fa-linkedin-square"></i></a>
                        </li> --}}
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
                  <!-- <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Reviews (1)</a></li> -->
              </ul>

              <!-- Tab panes -->
              <div class="tab-content">
                  <div role="tabpanel" class="tab-pane active" id="home">
                  {!! $product->detail !!}
                  </div>
                  <div role="tabpanel" class="tab-pane" id="profile">{!! $product->short_desc !!}</div>
                  <!-- <div role="tabpanel" class="tab-pane" id="messages">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</div>  -->
              </div>

            </div>

        </div>
      </div>
  </div>
</section>

<!--
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
-->

<!-- Modal -->
                      <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                              <h4 class="modal-title" id="myModalLabel">Booking Form</h4>
                            </div>
                            {{Form::open(['url'=>'product/prebooking', 'id'=>'preBookingForm'])}}
                              <div class="modal-body">
                                <div class="row">
                                  <div class="col-md-6">
                                    <div class="form-group">
                                      <label for="">Name *</label>
                                      <input type="text" class="form-control" placeholder="Name" name="name">
                                    </div>
                                  </div>
                                  <div class="col-md-6">
                                    <div class="form-group">
                                      <label for="">Email *</label>
                                      <input type="text" class="form-control" placeholder="Email" name="email">
                                    </div>
                                  </div>
                                  <div class="col-md-6">
                                    <div class="form-group">
                                      <label for="">Mobile No. *</label>
                                      <input type="" class="form-control" placeholder="Phone No." name="phone">
                                    </div>
                                  </div>
                                  <div class="col-md-6">
                                    <div class="form-group">
                                      <label for="">Color *</label>
                                        <select class="form-control" name="color">
                                          <option>Black</option>
                                          <option>Silver</option>
                                          <option>Gold</option>
                                        </select>
                                    </div>
                                  </div>
                                </div>
                              </div> <!-- modal body-->
                              <div class="modal-footer">
                                {{-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> --}}
                                <button type="submit" class="btn btn-primary open-door">Submit</button>
                              </div>
                            {{Form::close()}}
                          </div>
                        </div>
                      </div>

@endsection