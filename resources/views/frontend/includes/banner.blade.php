<?php //echo '<pre>'; print_r($sliders); ?>
@if( count($sliders) > 0 )
<section class="banner-wrapper pb0">
  <div class="container">
    <div class="row">
      <div class="col-md-9 col-sm-9">
        <div class="owl-carousel">
          @foreach( $sliders as $key => $slider)
          <div class="item bg-img" style="background-image: url({{asset('/'.$slider->Slider_image)}});">

          </div>
          @endforeach
        
        </div>

      </div>
      @if( !empty($ads->first_image ))
      <div class="col-md-3 col-sm-3">

        {{-- <a href="#"> --}}
          <div class="advertisement bg-img" style="background-image: url({{asset($ads->first_image)}});">

          </div>
        {{-- </a> --}}
      </div>
      @endif
    </div>
  </div>
</section>
@endif