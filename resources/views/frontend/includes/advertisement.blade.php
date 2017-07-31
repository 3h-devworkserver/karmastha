@if(!empty($ads->second_image) || !empty($ads->third_image) || !empty($ads->fourth_image) || !empty($ads->fifth_image) )
<section class="advertisement-wrappers pb0">
  <div class="container">
    <div class="row">
      @if(!empty($ads->second_image))
      <div class="col-md-3">
        <a href="{{ $ads->second_url }}">
        <img src="{{asset($ads->second_image)}}" alt="">
      </a>
      </div>
      @endif
      @if(!empty($ads->third_image) || !empty( $ads->fourth_image))
      <div class="col-md-4">
        @if(!empty($ads->third_image))
        <a href="{{ $ads->third_url }}">
        <img src="{{asset($ads->third_image)}}" alt="" class="mb10">
      </a>
        @endif
        @if(!empty($ads->fourth_image))
        <a href="{{ $ads->fourth_url }}">
        <img src="{{asset($ads->fourth_image)}}" alt="">
        </a>
        @endif
      </div>
      @endif

      @if(!empty($ads->fifth_image))
      <div class="col-md-5">
        <a href="{{ $ads->fifth_url }}">
        <img src="{{asset($ads->fifth_image)}}" alt="">
        </a>
      </div>
    @endif
    </div>
  </div>
</section>
@endif