<header class="header-wrapper">
  <div class="top-header">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <ul class="list-unstyled list-inline">
                <li><a href="">Job Vacancy </a></li>
                <li><a href="">Hot News</a></li>
                <li><a href="">Events</a></li>
                <li><a href="">Services</a></li>
            </ul>
          </div>
          <div class="col-md-6">
            <ul class="list-unstyled list-inline text-right">
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">@if(Auth::check()) {{Auth::user()->name}} @else My Karmastha @endif<i class="fa fa-angle-down"></i></a>
                    <ul class="dropdown-menu">
                        <li> <a href="{{url('/dashboard')}}">Dashboard</a></li>
                        <li><a href="#">my orders</a></li>
                        <li><a href="#">my account</a></li>
                        <li><a href="#">my favorites</a></li>
                    </ul>
              </li>            
              <li><a href="">Contact</a></li>
              <li><a href="">Help</a></li>                                    
          </ul>
          </div>
        </div>
      </div>
      
  </div>

  <div class="mid-header">
    <div class="container">
      <div class="logo">
        <a href="#"><img src="{{asset('front-images/logo.png')}}" alt=""></a>
      </div>
      <div class="search-box">
        <div class="dropdown">
          
            <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
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
          </div>
          <form action="#">
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Search for item...">
              <span class="input-group-btn">
                <button class="btn btn-default" type="button"><span class="flaticon-search"></span></button>
              </span>
            </div><!-- /input-group -->
          </form>
      </div>
      <div class="mid-right-block">
        <div class="cart-block">
          <a href="#">
            <i class="flaticon-online-shopping-cart"></i>
            <span class="badge">0</span>
            
          </a>
        </div>
        <div class="rentshop-block">
          <a href="#">
            <i class="flaticon-money-bag"></i>
            <span>Rent a Shop</span>
            
          </a>
        </div>
      </div>
    </div>
  </div>

  <nav class="navbar navbar-default">
      <div class="container">
          <div class="third-top-nav">
                <div class="container">
                    <div class="row">
                        <div class="main-header">
                           <section id="main-navigation-container">
          
                                <div class="navigation-items">
                                  <ul>
                                    @foreach($categorys as $category)
                                      <li><a href="{{url('category/'.$category->url)}}">{{$category->title}} <i class="fa fa-angle-down"></i></a>
                                        <section class="submenu-container">
                                          @if(count($category->topChilds) > 0)
                                            <div class="list">
                                              <a href="#" class="category-title">
                                                <h2>top Categories <i class="fa fa-caret-right"></i></h2>
                                              </a>
                                              <ul class="submenu">
                                                @foreach($category->topChilds as $child)
                                                  <li><a href="{{url('category/'.$child->url)}}">{{$child->title}}</a></li>
                                                @endforeach
                                              </ul>      
                                            </div>
                                          @endif

                                          @if(count($category->moreChilds) > 0)
                                            <div class="list">
                                              <a href="#" class="category-title">
                                                <h2>More Categories <i class="fa fa-caret-right"></i></h2>
                                              </a> 
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
      </div>
      
    <!-- /.container-fluid -->
  </nav>

</header>