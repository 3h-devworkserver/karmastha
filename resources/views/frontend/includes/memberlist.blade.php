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