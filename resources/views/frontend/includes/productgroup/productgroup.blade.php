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
              @if(!empty($productGroup->url))
              <a href="{{url($productGroup->url)}}" target="_blank">
              @endif
                {{-- <img src="{{asset('images/productgroup/'.$productGroup->feat_img)}}" alt="Image"> --}}
                <img src="{{getImageUrl('images/productgroup/',$productGroup->feat_img)}}" alt="Image">
              @if(!empty($productGroup->url))
              </a>
              @endif
          </div>
        </div>
      @endif
      <div class="{{ !empty($productGroup->feat_img) ? 'col-md-9 col-sm-9' : 'col-md-12 col-sm-12' }}">
        <div class="owl-carousel productgroup-section">
          @foreach($productGroup->productsLimit as $product)
            <div class="item">
              @include('frontend.includes.productgroup.singleproduct')
            </div>
          @endforeach
        </div>
        </div>

      
    </div>
  </div>
</section>