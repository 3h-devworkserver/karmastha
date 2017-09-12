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

@include('frontend.includes.advertisement')

@if( count($tproducts) > 0 )

<section class="products-wrapper pb0">
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

@if( count( $brands) > 0 )
<section class="brands-wrapper gray-bg pb10">
  <div class="container">
    <h2 class="section-title-1">Our Brands</h2>
    <div class="brand-list">
      <ul class="list-unstyled list-inline">
        @foreach( $brands as $key => $brand)
        <li><a href="{{ URL::to('/brand/'.$brand->slug ) }}"><img src="{{ getImageUrl('',$brand->brand_logo) }}" alt=""></a></li>
        @endforeach
      </ul>
    </div>
  </div>
</section>
@endif 

@if(!empty($page->bottom_content))
<section class="steps-wrapper text-center">
  <div class="container">
    {!! $page->bottom_content !!}
  </div>
</section>
@endif
@if( count($members) > 0 )
<section class="brands-wrapper gray-bg">
  <div class="container">
    <h2 class="section-title-1">Business Member</h2>
    <div class="brand-list">
      <div class="owl-carousel">
        @foreach( $members as $key => $member)
        <div class="item">
          @if( $member->url  != '#' || !empty( $member->url))
          <a href="http://{{$member->url}}" target="_blank" alt="">
          @else
          <a href="#">
          @endif
          <div class="member-img" style="background-image: url({{str_replace(' ', '%20', getImageUrl('', $member->logo))}});"></div>
            {{-- <img src="{{asset('/'.$member->logo)}}" alt=""> --}}
          </a>
        </div>
        @endforeach
        
      </div>
      
    </div>
  </div>
</section>
@endif

@endsection
