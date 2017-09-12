<header class="header-wrapper">
  <div class="top-header" id="topslide-header">
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-sm-6">
              <ul class="list-unstyled list-inline hover-dropdown">
                <li><a href="">Job Vacancy </a></li>
                <li><a href="">Hot News</a></li>
                <li><a href="">Events</a></li>
                <li><a href="">Services</a></li>
                <li><a href="">Brand</a></li>
            </ul> 
          </div>
          <div class="col-md-6 col-sm-6">
            <ul class="list-unstyled list-inline text-right hover-dropdown">
              <li class="dropdown topnav-rgt">
               <!--  <a href="#" class="dropbtn">My Karmastha <i class="fa fa-angle-down"></i></a> -->
               <a href="#" class="dropdown-toggle dropbtn">@if(Auth::check()) {{Auth::user()->name}} @else My Karmastha @endif <i class="fa fa-angle-down"></i></a>
                  <ul class="dropdown-menu dropdown-content">
                    <li><a href="{{url('/dashboard')}}">dashboard</a></li>
                    <li><a href="#">my orders</a></li>
                    <li><a href="profile.html">my account</a></li>
                    <li><a href="{{ URL::to('/wishlist') }}">my favorites  @if( !empty($wishlist)) ( {{  $wishlist }} ) @endif</a></li>
                  </ul>
              </li>            
              <li><a href="">Contact</a></li>
              <li><a href="">Help</a></li>                                    
            </ul>
          </div>
        </div>
      </div>

  </div>
  
   <div class="responsive-top-header">
    <div class="container">
      <div class="row">
        
          <div id="menu-wrapper">
          
            <div id="mySidenav" class="sidenav">
              <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&#10005;</a>
              
            <div class="ap-ddmenu-header">
              <a class="ap-ddmenu-back" href="#"><i class="fa fa-angle-left"></i></a>
              <div class="ap-ddmenu-current-text"></div>
            </div>
            <ul id="menu">
              <li><a href="#">Breaking News</a>
                <ul>
                  <li><a href="#">Entertainment</a></li>
                  <li><a href="#">Politics</a></li>
                  <li><a href="#">A&amp;E</a></li>
                  <li><a href="#">Sports</a>
                <ul>
                  <li><a href="#">Baseball</a></li>
                  <li><a href="#">Basketball</a></li>
                  <li><a href="#">A really long label would wrap nicely as you can see</a></li>
                  <li><a href="#">Swimming</a>
                <ul>
                  <li><a href="#">High School</a></li>
                  <li><a href="#">College</a></li>
                  <li><a href="#">Professional</a>
                <ul>
                  <li><a href="#">Mens Swimming</a>
                    <ul>
                      <li><a href="#">News</a></li>
                      <li><a href="#">Events</a></li>
                      <li><a href="#">Awards</a></li>
                      <li><a href="#">Schedule</a></li>
                      <li><a href="#">Team Members</a></li>
                      <li><a href="#">Fan Site</a></li>
                    </ul>
                  </li>
                  <li><a href="#">Womens Swimming</a>
                    <ul>
                      <li><a href="#">News</a></li>
                      <li><a href="#">Events</a></li>
                      <li><a href="#">Awards</a></li>
                      <li><a href="#">Schedule</a></li>
                      <li><a href="#">Team Members</a></li>
                      <li><a href="#">Fan Site</a></li>
                    </ul>
                  </li>
                </ul>
              </li>
              <li><a href="#">Adult Recreational</a></li>
              <li><a href="#">Youth Recreational</a></li>
              <li><a href="#">Senior Recreational</a></li>
            </ul>
            </li>
              <li><a href="#">Tennis</a></li>
              <li><a href="#">Ice Skating</a></li>
              <li><a href="#">Javascript Programming</a></li>
              <li><a href="#">Running</a></li>
              <li><a href="#">Walking</a></li>
            </ul>
            </li>
              <li><a href="#">Local</a></li>
              <li><a href="#">Health</a></li>
            </ul>
            </li>
          <li><a href="#">Entertainment</a>
          <ul>
            <li><a href="#">Celebrity news</a></li>
            <li><a href="#">Gossip</a></li>
            <li><a href="#">Movies</a></li>
            <li><a href="#">Music</a>
            <ul>
              <li><a href="#">Alternative</a></li>
              <li><a href="#">Country</a></li>
              <li><a href="#">Dance</a></li>
              <li><a href="#">Electronica</a></li>
              <li><a href="#">Metal</a></li>
              <li><a href="#">Pop</a></li>
              <li><a href="#">Rock</a>
                <ul>
                  <li><a href="#">Bands</a>
                    <ul>
                      <li><a href="#">Dokken</a></li>
                    </ul>
                  </li>
                  <li><a href="#">Fan Clubs</a></li>
                  <li><a href="#">Songs</a></li>
                </ul>
              </li>
            </ul>
            </li>
            <li><a href="#">Slide shows</a></li>
            <li><a href="#">Red carpet</a></li>
          </ul>
          </li>
          <li><a href="#">Finance</a>
          <ul>
            <li><a href="#">Personal</a>
            <ul>
              <li><a href="#">Loans</a></li>
              <li><a href="#">Savings</a></li>
              <li><a href="#">Mortgage</a></li>
              <li><a href="#">Debt</a></li>
            </ul>
            </li>
            <li><a href="#">Business</a></li>
          </ul>
          </li>
          <li><a href="#">Food &#38; Cooking</a>
          <ul>
            <li><a href="#">Breakfast</a></li>
            <li><a href="#">Lunch</a></li>
            <li><a href="#">Dinner</a></li>
            <li><a href="#">Dessert</a>
              <ul>
                <li><a href="#">Dump Cake</a></li>
                <li><a href="#">Doritos</a></li>
                <li><a href="#">Both please.</a></li>
              </ul>
            </li>
          </ul>
          </li>
          <li><a href="#">Lifestyle</a></li>
          <li><a href="#">News</a></li>
          <li><a href="#">Politics</a></li>
          <li><a href="#">Sports</a>
            <ul>
              <li><a href="#">Baseball</a></li>
              <li><a href="#">Basketball</a></li>
              <li><a href="#">Swimming</a>
              <ul>
                <li><a href="#">High School</a></li>
                <li><a href="#">College</a></li>
                <li><a href="#">Professional</a>
                <ul>
                  <li><a href="#">Mens Swimming</a>
                  <ul>
                      <li><a href="#">News</a></li>
                      <li><a href="#">Events</a></li>
                      <li><a href="#">Awards</a></li>
                      <li><a href="#">Schedule</a></li>
                      <li><a href="#">Team Members</a></li>
                      <li><a href="#">Fan Site</a></li>
                    </ul>
                  </li>
                  <li><a href="#">Womens Swimming</a>
                  <ul>
                    <li><a href="#">News</a></li>
                    <li><a href="#">Events</a></li>
                    <li><a href="#">Awards</a></li>
                    <li><a href="#">Schedule</a></li>
                    <li><a href="#">Team Members</a></li>
                    <li><a href="#">Fan Site</a></li>
                  </ul>
                  </li>
                </ul>
                </li>
                <li><a href="#">Adult Recreational</a></li>
                <li><a href="#">Youth Recreational</a></li>
                <li><a href="#">Senior Recreational</a></li>
              </ul>
              </li>
                <li><a href="#">Tennis</a></li>
                <li><a href="#">Ice Skating</a></li>
                <li><a href="#">Javascript Programming</a></li>
                <li><a href="#">Running</a></li>
                <li><a href="#">Walking</a></li>
            </ul>
            </li>
          </ul>
        </div>
      </div>  
        <div class="nav-toggle">
          
          <div class="top-nav-toggle">
            <a href="#toggle-search" class="top-search-iocn animate"><span class="fa fa-search"></span></a>
            <a role="button" class="total-calculate" data-toggle="collapse" href="#topslide-header" aria-expanded="false" aria-controls="collapseheadernav"><i class="fa fa-ellipsis-v" aria-hidden="true"></i></a>
            <div id="hamburger" onclick="openNav()">
              <span></span>
              <span></span>
              <span></span>
            </div>

          </div>
          <div class="search-box">
            <div class="dropdown">
            <select class="dropdown-menu selectBox" aria-labelledby="dropdownMenu1" name="catname">
              <option value=""></i> All Categories </option>
              @foreach($categorys as $key => $cat)
              <option value="{{ $cat->id }}"> {{ $cat->title }}</option>
              @endforeach
            </select>
            {{-- <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
            <i class="flaticon-bars"></i>
              All categories
              <i class="fa fa-angle-down"></i>
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
              <li><a href="#">Fashion</a></li>
              <li><a href="#">Furniture</a></li>
              <li><a href="#">Electronics</a></li>
              <li><a href="#">Books</a></li>
              <li><a href="#">Sports</a></li>
              <li><a href="#" class="viewmore"><i class="fa fa-plus-circle"></i>More Categories</a></li>
            </ul>
 --}}          </div>

         <div class="bootsnipp-search animate">
           <form action="#" method="GET" role="search">
             <div class="input-group">
               <input type="text" class="form-control" name="ressearch" placeholder="Search for item...">
               <span class="input-group-btn">
                 <button class="btn btn-danger" type="reset"><span class="fa fa-times"></span></button>
               </span>
             </div>
           </form>
         </div>
        </div><!-- End Search-box -->

        </div>
      </div>
    </div>
  </div>

  <div class="mid-header">
    <div class="container">
      <div class="logo">
        @if(!empty($setting->logo))
        @endif
        <a href="{{ URL::to('/') }}"><img src="{{asset('front-images/logo.png')}}" alt=""></a>
      </div>
      <div class="search-box">
        <div class="dropdown">
          
            {{-- <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
            <i class="flaticon-bars"></i>
              All categories
              <i class="fa fa-angle-down"></i>
            </button> --}}
            <select class="dropdown-menu selectBox" aria-labelledby="dropdownMenu1" name="catname">
              <option value=""></i> All Categories </option>
              @foreach($categorys as $key => $cat)
              <option value="{{ $cat->id }}"> {{ $cat->title }}</option>
              @endforeach
            </select>
            {{-- <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
              @foreach($categorys as $key => $cat)
              <li><a href="#">{{ $cat->title }}</a></li>
              @endforeach
            </ul> --}}

            {{-- <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
              <li><a href="#">Fashion</a></li>
              <li><a href="#">Furniture</a></li>
              <li><a href="#">Electronics</a></li>
              <li><a href="#">Books</a></li>
              <li><a href="#">Sports</a></li>
              <li><a href="#" class="viewmore"><i class="fa fa-plus-circle"></i>More Categories</a></li>
            </ul> --}}

          </div>
          <form action="#">
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Search for item...">
              <span class="input-group-btn">
                <button class="btn btn-default" type="button"><span class="fa fa-search"></span></button>
              </span>
            </div><!-- /input-group -->
          </form>
      </div>
      <div class="mid-right-block">
        <div class="cart-block">
          <a href="{{url('/cart')}}">
            <i class="flaticon-online-shopping-cart"></i>
            <span class="badge"> @if( !empty(countCartItems()) ) {{countCartItems()}} @else 0 @endif</span>
            
          </a>
        </div>
        <div class="rentshop-block">
          <a href="{{url('/login')}}">
            <i class="flaticon-money-bag"></i>
            <span>Rent a Shop</span>
            
          </a>
        </div>
      </div>
    </div>
  </div>

  <nav class="navbar navbar-default megamenu">
          <div class="third-top-nav">
                <div class="container">
                    <div class="row">
                        <div class="main-header col-md-12">
                          <section id="main-navigation-container">
          
                                <div class="navigation-items">
                                  <ul>
                                    @foreach($categorys as $category)
                                      <li><a href="javascript:void(0);">{{$category->title}} <i class="fa fa-angle-down"></i></a>
                                        <section class="submenu-container">
                                          @if(count($category->topChilds) > 0)
                                            <div class="list">
                                                <h2 class="category-title">Top Categories</h2>
                                              <ul class="submenu">
                                                @foreach($category->topChilds as $child)
                                                  <li><a href="{{url('category/'.$child->url)}}">{{$child->title}}</a></li>
                                                @endforeach
                                              </ul>      
                                            </div>
                                          @endif

                                          @if(count($category->moreChilds) > 0)
                                            <div class="list">
                                                <h2 class="category-title">More Categories</h2>
                                              <ul class="submenu">
                                                @foreach($category->moreChilds as $child)
                                                  <li><a href="{{url('category/'.$child->url)}}">{{$child->title}}</a></li>
                                                @endforeach
                                              </ul>
                                            </div>
                                          @endif

                                          <!--
                                          <div class="list">
                                            <a href="#" class="category-title">
                                              <h2>top Categories <i class="fa fa-caret-right"></i></h2>
                                            </a>
                                            <ul class="submenu">
                                                <li><a href="#">men's</a></li>
                                                <li><a href="#">women's</a></li>
                                                <li><a href="#">kid's</a></li>
                                                <li><a href="#">shoes</a></li>
                                            </ul>   
                                          </div>   -->

                                          @if(!empty($category->feat_img) )
                                            <div class="list image-content">
                                              <div class="right-image-content full-width">
                                                  <ul class="submenu">
                                                    <li><img src="{{asset('images/category/'.$category->feat_img)}}"></li>
                                                  </ul>
                                              </div>     
                                            </div>
                                          @endif
                                               
                                        </section>
                                      </li>
                                    @endforeach

                                  </ul>
                                </div> 

                          </section>  
                        </div>
                      </div>
                    </div>
                  </div>

      
    <!-- /.container-fluid -->
  </nav>

  
</header>