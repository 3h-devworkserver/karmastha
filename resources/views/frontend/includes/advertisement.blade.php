@if(!empty($ads->second_image) || !empty($ads->third_image) || !empty($ads->fourth_image) || !empty($ads->fifth_image) )
<section class="advertisement-wrappers pb0">
  <div class="container">
    <div class="row">
      @if(!empty($ads->second_image))
      <div class="col-md-3">
        <img src="{{asset($ads->second_image)}}" alt="">
      </div>
      @endif
      @if(!empty($ads->third_image) || !empty( $ads->fourth_image))
      <div class="col-md-4">
        @if(!empty($ads->third_image))
        <img src="{{asset($ads->third_image)}}" alt="" class="mb10">
        @endif
        @if(!empty($ads->fourth_image))
        <img src="{{asset($ads->fourth_image)}}" alt="">
        @endif
      </div>
      @endif

      @if(!empty($ads->fifth_image))
      <div class="col-md-5">
        <img src="{{asset($ads->fifth_image)}}" alt="">
      </div>
    @endif
    </div>
  </div>
</section>
@endif