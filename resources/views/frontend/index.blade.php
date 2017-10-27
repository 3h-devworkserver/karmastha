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

@include('frontend.includes.banner')


<section class="new-offer">
  <div class="container">
    <div class="offer-image bg-img" style="background-image:url('http://192.168.0.23/karmastha/public/images/44.jpg')">
        <div class="offer-cap">
          <h3 class="color-title">New offer</h3>
          <button class="btn btn-outline">book now</button>
        </div>
    </div>
  </div>
</section>

<?php /* ?>
@include('frontend.includes.advertisement')
<?php */ ?>

<?php /* ?>
@if( count($tproducts) > 0 )
<section class="products-wrapper">
  <div class="container">
    <div class="row">
        <div class="col-md-12">
          <div class="section-title">
              <h2>Trending</h2>
          </div>
        </div>
    </div>
    <div class="row products-fluid fluid-nosapce mt30">
      @foreach( $tproducts as $key => $tproduct)
      <div class="col-md-3 col-sm-3">
        <?php  $product = $tproduct; ?>
        @include('frontend.includes.productgroup.singleproduct')
      </div>
      @endforeach
    </div>
  </div>
</section>
@endif
<?php */ ?>

@if(count($categoryDisplays) > 0)
@foreach($categoryDisplays as $categoryDisplay)
<section class="products-wrapper {{ !empty($categoryDisplay->second_img) ? 'four-col' : 'five-col' }} category-wrapper">
  <div class="container">
    <div class="row">
        <div class="col-md-12">
          <div class="section-title">
              <h2>{{$categoryDisplay->title}}</h2>
              <ul class="list-unstyled list-inline">
              @foreach($categoryDisplay->childsLimitWithOrder as $cat)
                <li class="catChild" data-id="cat-{{$cat->id}}"><a href="javascript:void(0)">{{$cat->title}}</a></li>
              @endforeach
              </ul>
              @if( count($categoryDisplay->childs) > 4 )
                <a href="{{url('category/'.$categoryDisplay->url)}}" class="viewmore"><i class="fa fa-plus-circle"></i>More Categories</a>
              @endif
          </div>
        </div>
    </div>
    <div class="row mt30">
      @if(!empty($categoryDisplay->second_img))
        <div class="col-md-3 col-sm-3">
          <div class="featured-category">
              @if(!empty($categoryDisplay->img_url))
              <a href="{{url($categoryDisplay->img_url)}}" target="_blank">
              @endif
                <img src="{{getImageUrl('images/category/second/', $categoryDisplay->second_img)}}" alt="Image">
              @if(!empty($categoryDisplay->img_url))
              </a>
              @endif
          </div>
        </div>
      @endif
    
      <div class="{{ !empty($categoryDisplay->second_img) ? 'col-md-9 col-sm-9' : 'col-md-12 col-sm-12' }}">
        <div class="owl-carousel catSelect productgroup-section cat-{{$categoryDisplay->id}}">
          @foreach($categoryDisplay->productsLimit as $product)
            <div class="item">
              @include('frontend.includes.productgroup.singleproduct')
            </div>
          @endforeach
        </div>

        @foreach($categoryDisplay->childsLimitWithOrder as $cat)
        <div class="owl-carousel catSelect productgroup-section cat-{{$cat->id}}" style="display: none;">
          @foreach($cat->productsLimit as $product)
            <div class="item">
              @include('frontend.includes.productgroup.singleproduct')
            </div>
          @endforeach
        </div>
        @endforeach
      </div>

      
    </div>
  </div>
</section>
@endforeach
@endif

@if(!empty($page->top_content))
  <?php   
    file_put_contents(base_path() . '/resources/views/frontend/tmp.blade.php', $page->top_content);
        $html = view('frontend.tmp')->render();
    echo $html;
  ?> 
@endif

{{-- <!-- top brands -->
{!! top_brand_list() !!} --}}

@if(!empty($page->bottom_content))
  <?php   
    file_put_contents(base_path() . '/resources/views/frontend/tmp.blade.php', $page->bottom_content);
        $html = view('frontend.tmp')->render();
    echo $html;
  ?> 
@endif


@if (session()->get('flash_payment_success'))
  <!-- Modal -->
  <div class="modal fade" id="paymentSuccessModal" tabindex="-1" role="dialog" aria-labelledby="paymentSuccessModalLabel" aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                  </button>
                   <h4 class="modal-title" id="paymentSuccessModalLabel">Payment Successful..</h4>

              </div>
              {{-- <div class="modal-body">
                  <p>However the account provided is not known.
                      <BR>If you just got invited to the group, please wait for a day to have the database synchronized.</p>
                  <p>You will now be shown the Demo site.</p>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
              </div> --}}
          </div>
      </div>
  </div>
@endif

@endsection
