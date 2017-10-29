<div class="brands-wrapper member">
      <div class="brand-wrap">
        <h2 class="section-title-1">Business Member</h2>
        <div class="brand-list">
          <ul class="list-unstyled list-inline">
            @foreach(  $members as $key => $member)
                @if( $member->url  != '#' || !empty( $member->url))
                <li><a href="http://{{$member->url}}" target="_blank" alt="" class="member-img"><img src="{{ asset('/'.$member->logo) }}" alt=""></a></li>
                @else
                <li><a href="#"><img src="{{ asset('/'.$member->logo) }}" alt=""></a></li>
                @endif
            @endforeach
          </ul>
        </div>
      </div>
</div>

<?php /*
<div class="brands-wrapper member">
    <h2 class="section-title-1">Business Member</h2>
    <div class="brand-list">
      <div class="owl-carousel">
        @foreach( $members as $key => $member)
        <div class="item">
          @if( $member->url  != '#' || !empty( $member->url))
          <a href="http://{{$member->url}}" target="_blank" alt="" class="member-img">
          @else
          <a href="#" class="member-img">
          @endif
          {{-- <div class="member-img" style="background-image: url({{str_replace(' ', '%20', getImageUrl('', $member->logo))}});"></div> --}}
            <img src="{{asset('/'.$member->logo)}}" alt="">
          </a>
        </div>
        @endforeach
        
      </div>
      
    </div>
</div>
*/ ?>