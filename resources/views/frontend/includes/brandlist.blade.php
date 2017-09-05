<section class="brands-wrapper gray-bg">
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