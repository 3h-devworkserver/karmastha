<div class="thumbnail">
  @if(!empty($product->productPrice->special_price))
    <div class="ribbon"><span>{{round(($product->productPrice->price - $product->productPrice->special_price)/$product->productPrice->price*100)}}% off</span></div>
  @endif
  <div class="product-img">
    <a href="{{url('/product/'.$product->slug)}}" target="_blank">
      <div class="img-wrap">
        <img src="{{asset('images/product/'.$product->id.'/small/'.$product->productFirstListImage())}}" alt="{{$product->name}}">
        
      </div>
    </a>
  </div>
  <div class="action">
  <a href="{{ URL::to('wishlist/store/?id='.$product->id) }}" class="wishlist" data-id="{{ $product->id }}" data-price="{{ productPrice($product->id)}}" data-name="{{ $product->name}}">
      <i class="la-icon-heart-o"></i>                  
    </a>
  </div>
  <a href="{{url('/product/'.$product->slug)}}" target="_blank">
  <div class="caption">
  <!--
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
    </p> -->
    <h3>{{$product->name}}</h3>
    @if(!empty($product->productPrice->special_price))
    <span class="old">NPR {{ $product->productPrice->price}}</span>
    @endif
    <span class="price">NPR {{ productPrice($product->id)}}</span>
  </div>
  </a>
</div>