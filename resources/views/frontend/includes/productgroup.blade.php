<section class="products-wrapper {{ !empty($productGroup->feat_img) ? 'four-col' : 'five-col' }} category-wrapper">
  <div class="container">
    <div class="row">
        <div class="col-md-12">
          <div class="section-title">
              <h2>{{$productGroup->title}}</h2>
          </div>
        </div>
    </div>
    <div class="row mt30">
      @if(!empty($productGroup->feat_img))
        <div class="col-md-3 col-sm-3">
          <div class="featured-category">
              <a href="#">
                <img src="{{asset('images/productgroup/'.$productGroup->feat_img)}}" alt="Image">
              </a>
          </div>
        </div>
      @endif
      <div class="{{ !empty($productGroup->feat_img) ? 'col-md-9 col-sm-9' : 'col-md-12 col-sm-12' }}">
        <div class="owl-carousel">
          @foreach($productGroup->products as $product)
            <div class="item">
              <div class="thumbnail">
                <div class="product-img">
                  <div class="img-wrap">
                    <img src="{{asset('images/product/'.$product->id.'/small/'.$product->productFirstListImage())}}" alt="{{$product->name}}">
                    
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
          @endforeach
        </div>
        </div>

      
    </div>
  </div>
</section>