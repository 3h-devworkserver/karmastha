<nav class="navigate-menu cd-side-nav buyer-version">
    <a class="version-switcher" data-id="version-switcher" data-spm="dswitchb" href="#">
        <div class="switch-item buyer-switch">
            <div class="switch-text">
                Buy
            </div>
        </div>
        <div class="switch-item supplier-switch">
            <div class="switch-text">
                Sell
            </div>
        </div>
    </a>
    <ul>
        <li class="has-children {{ active_class(Active::checkUriPattern('user/dashboard')) }}">
            <a href="{{url('user/dashboard')}}"><i class="fa fa-home" aria-hidden="true"></i>Home</a>
        </li>

        <li class="has-children {{ active_class(Active::checkUriPattern('user/profile')) }} {{ active_class(Active::checkUriPattern('user/password')) }}">
            <a href="#0"><i class="fa fa-home" aria-hidden="true"></i>Personal Information<i class="fa fa-angle-right" aria-hidden="true"></i></a>
            <ul>
                <li>                
                    <a href="{{ URL::to('user/profile') }}"><i class="fa fa-home" aria-hidden="true"></i>My Profile</a>
                </li>
                <li>                
                    <a href="{{ URL::to('user/password') }}"><i class="fa fa-home" aria-hidden="true"></i>Change Password</a>
                </li> 
            </ul>
        </li>

        <li class="has-children ">
            <a href="#0"><i class="fa fa-file-text-o" aria-hidden="true"></i>Orders<i class="fa fa-angle-right" aria-hidden="true"></i></a>
            <ul>
                <li><a href="{{url('user/orders')}}">All Orders</a></li>
            </ul>
        </li>

        <li class="has-children {{ active_class(Active::checkUriPattern('user/wishlist')) }}">
            <a href="{{url('user/wishlist')}}"><i class="fa fa-home" aria-hidden="true"></i>Wishlist</a>
        </li>

        {{-- <li class="has-children">
            <a href="#0"><i class="fa fa-list-ul" aria-hidden="true"></i>My list <i class="fa fa-angle-right" aria-hidden="true"></i></a>
            <ul>
                <li><a href="{{url('/user/wishlist')}}">My Favorites</a></li>
            </ul>
        </li> --}}
    </ul>
</nav>