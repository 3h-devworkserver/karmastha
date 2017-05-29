<header class="navbar-fixed-to">
    <div class="top-nav">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="pull-left">
                        <ul class="left-top-nav">
                            <li><a href="">Job Vacancy </a></li>
                            <li><a href="">Hot News</a></li>
                            <li><a href="">Events</a></li>
                            <li><a href="">Services</a></li>
                        </ul>
                    </div>

                    <div class="pull-right">
                        <ul class="right-top-nav">
                            <li>
                                <div class="dropdown topnav-rgt">
                                    <a href="login.html" class="dropbtn">my karmastha</a>
                                    <div class="dropdown-content">
                                        <a href="#">my orders</a>
                                        <a href="#">my account</a>
                                        <a href="#">my favorites</a>
                                    </div>
                                </div>
                            </li>
                            <li><a href=""><i class="fa fa-user" aria-hidden="true"></i>Contact</a></li>
                            <li><a href=""><i class="fa fa-info" aria-hidden="true"></i>Help</a></li>                                    
                        </ul>
                    </div>
                </div>
            </div>
        </div>      <!-- end of Top Nav -->
    </div>
    <div class="second-top-nav">
        <div class="container">
            <div class="row">
                <div class="nav-logo col-xs-12 col-sm-2 col-md-2">
                    @if(!empty($setting->logo))
                        <a href="{{url('/')}}"><img src="{{asset('images/logo/'.$setting->logo)}}" alt=""></a>
                    @endif
                </div>
                

                <div class="center-search-nav col-xs-12 col-sm-8 col-md-8">
                    <div class="col-md-3 col-sm-3">
                        <div class="dropdown">
                            <button id="dLabel" class="top-category-button" data-target="#" data-toggle="dropdown" role="button" aria-haspopup="true">
                            All Category
                                <span class="caret"></span>
                            </button>

                            <ul class="dropdown-menu multi-level top-category-dropdown" role="menu" aria-labelledby="dLabel" id="top-category-dropdown">

                                <li class="dropdown-submenu">
                                    <a tabindex="-1" href="#" class="sub-dropdown-menu">Books &amp; Audible</a>
                                    <ul class="dropdown-menu" id="inner-dropdown-menu">
                                        <div class="inner-dropdown-content">
                                            <div class="col-md-8 col-sm-8">

                                                <h4>Category Name</h4>

                                                <div class="list-group inner-content-list">
                                                    <a href="#" class="list-group-item active">
                                                        <h4 class="list-group-item-heading">List group item heading</h4>
                                                        <p class="list-group-item-text">Lorem ipsum dolor sit amet, consectetur.</p>
                                                    </a>
                                                </div>


                                                <div class="list-group inner-content-list">
                                                    <a href="#" class="list-group-item active">
                                                        <h4 class="list-group-item-heading">List group item heading</h4>
                                                        <p class="list-group-item-text">Lorem ipsum dolor sit amet, consectetur.</p>
                                                    </a>
                                                </div>

                                                <div class="list-group inner-content-list">
                                                    <a href="#" class="list-group-item active">
                                                        <h4 class="list-group-item-heading">List group item heading</h4>
                                                        <p class="list-group-item-text">Lorem ipsum dolor sit amet, consectetur.</p>
                                                    </a>
                                                </div>

                                                <div class="list-group inner-content-list">
                                                    <a href="#" class="list-group-item active">
                                                        <h4 class="list-group-item-heading">List group item heading</h4>
                                                        <p class="list-group-item-text">Lorem ipsum dolor sit amet, consectetur.</p>
                                                    </a>
                                                </div>

                                                <div class="list-group inner-content-list">
                                                    <a href="#" class="list-group-item active">
                                                        <h4 class="list-group-item-heading">List group item heading</h4>
                                                        <p class="list-group-item-text">Lorem ipsum dolor sit amet, consectetur.</p>
                                                    </a>
                                                </div>


                                            </div>
                                            <div class="right-offer-img col-md-4 col-sm-4">
                                                <a href="#">
                                                    <img src="{{asset('front-images/offer/1.jpg')}}" alt=" Best Laptop Offer" title="Offer in Laptop with the discount uptp 40%">
                                                </a>
                                            </div>
                                        </div>
                                    </ul>
                                </li>


                                <li>
                                    <a href="" class="sub-dropdown-menu">Movies,Music &amp; Games</a>
                                </li>
                                <li>
                                    <a href="" class="sub-dropdown-menu">Electronics &amp; Computer</a>
                                </li>
                                <li>
                                    <a href="" class="sub-dropdown-menu">Home, Garden &amp; Tools</a>
                                </li>
                                <li>
                                    <a href="" class="sub-dropdown-menu">Beauty, Health &amp; Grocery</a>
                                </li>
                                <li>
                                    <a href="" class="sub-dropdown-menu">Clothing, Shoes &amp; Jewelry</a>
                                </li>
                                <li>
                                    <a href="" class="sub-dropdown-menu">Handmade</a>
                                </li>
                                <li>
                                    <a href="" class="sub-dropdown-menu">Sports &amp; Outdoors</a>
                                </li>
                                <li>
                                    <a href="" class="sub-dropdown-menu">Automotive &amp; Industrail</a>
                                </li>
                                <li>
                                    <a href="" class="sub-dropdown-menu">Homes Services</a>
                                </li>
                                <li>
                                    <a href="" class="sub-dropdown-menu">Tranding Fashion</a>
                                </li>

                            </ul>
                        </div>
                    </div>

                    <div class="col-xs-12 col-md-7 col-sm-7 product-search-box">
                        <form action="" class="form-horizontal">
                            <div class="form-group">
                                <input class="form-control" id="" placeholder="search for product" type="text">
                                <button class="col-md-2 col-sm-2 btn open-door">Search</button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="second-right-nav col-xs-12 col-sm-2 col-md-2">
                    <div class="cart-left pull-left">
                        <a href="#" class="is-ralative cart-button ">
                            <div class="cart-btn-left"></div>
                            <div class="cart-btn-title">Sopping <br> Cart</div>
                            <span class="nav-label animated bounceIn">1</span>
                        </a>
                    </div>
                    <div class="cart-right pull-right">
                        <a href="#" class="is-ralative cart-button ">
                            <div class="cart-btn-right"></div>
                            <div class="cart-btn-title">Rent a <br> Shop</div>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- End of second-top-nav -->
    <!-- End of second-top-nav -->
    <div class="third-top-nav">
        <div class="container">
            <div class="row">
                <div class="main-header">
                     <section id="main-navigation-container">
                        <nav>
  
                            <section class="navigation-items">
                                <ul>
                                    @foreach($categorys as $category)
                                        <li><a href="{{url('category/'.$category->url)}}">{{$category->title}} <i class="fa fa-angle-down"></i></a>
                                            @if(count($category->childs) > 0 || (!empty($category->feat_img)) )
                                            <section class="submenu-container">
                                                @if(count($category->topChilds) > 0)
                                                <div class="list">
                                                   <a href="#" class="category-title"><h2>top Categories <i class="fa fa-caret-right"></i>  </h2>
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
                                                    <a href="#" class="category-title"><h2>More Categories <i class="fa fa-caret-right"></i></h2></a> 
                                                    <ul class="submenu">
                                                        @foreach($category->moreChilds as $child)
                                                            <li><a href="{{url('category/'.$child->url)}}">{{$child->title}}</a></li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                                @endif
                                                
                                                <!--
                                                <div class="list">
                                                    <a href="#" class="category-title"><h2>top Categories <i class="fa fa-caret-right"></i></h2></a>
                                                    <ul class="submenu">
                                                        <li><a href="#">men's</a></li>
                                                        <li><a href="#">women's</a></li>
                                                        <li><a href="#">kid's</a></li>
                                                        <li><a href="#">shoes</a></li>
                                                    </ul>
                                                </div>
                                                -->
                                                
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
                                            @endif
                                        </li>
                                    @endforeach
                                    <?php /* ?>
                                        <li><a href="#">cosmetic <i class="fa fa-angle-down"></i></a>
                                            <section class="submenu-container">
                                                <div class="list">
                                               <a href="#" class="category-title"><h2>top Categories <i class="fa fa-caret-right"></i>  </h2>
                                               </a>
                                                <ul class="submenu">
                                                <li><a href="#">men's</a></li>
                                                <li><a href="#">women's</a></li>
                                                <li><a href="#">kid's</a></li>
                                                <li><a href="#">shoes</a></li>
                                            </ul>
                                            
                                          </div>
                                          <div class="list">
                                            <a href="#" class="category-title"><h2>More Categories <i class="fa fa-caret-right"></i></h2></a> 
                                            <ul class="submenu">
                                                <li><a href="#">Handbags &amp; Accessories</a></li>
                                                <li><a href="#">Health &amp; Beauty</a></li>
                                                <li><a href="#">Jewellery &amp; Watches</a></li>
                                            </ul>
                                            </div>
                                          <div class="list">
                                             <a href="#" class="category-title"><h2>top Categories <i class="fa fa-caret-right"></i></h2></a>
                                            <ul class="submenu">
                                                <li><a href="#">men's</a></li>
                                                <li><a href="#">women's</a></li>
                                                <li><a href="#">kid's</a></li>
                                                <li><a href="#">shoes</a></li>
                                            </ul>

                                              
                                          </div>
                                          
                                          <div class="list image-content">
                                            <div class="right-image-content full-width">
                                                <ul class="submenu">
                                                   <li><img src="{{asset('front-images/nav-brand/3.jpg')}}"></li>
                                                </ul>
                                            </div>
                                            
                                            
                                          </div>
                                         
                                            </section>
                                        </li>
                                        <li><a href="#">fancy items <i class="fa fa-angle-down"></i></a>
                                            <section class="submenu-container">
                                                <div class="list">
                                               <a href="#" class="category-title"><h2>top Categories <i class="fa fa-caret-right"></i>  </h2>
                                               </a>
                                                <ul class="submenu">
                                                <li><a href="#">men's</a></li>
                                                <li><a href="#">women's</a></li>
                                                <li><a href="#">kid's</a></li>
                                                <li><a href="#">shoes</a></li>
                                            </ul>
                                            
                                          </div>
                                          <div class="list">
                                            <a href="#" class="category-title"><h2>More Categories <i class="fa fa-caret-right"></i></h2></a> 
                                            <ul class="submenu">
                                                <li><a href="#">Handbags &amp; Accessories</a></li>
                                                <li><a href="#">Health &amp; Beauty</a></li>
                                                <li><a href="#">Jewellery &amp; Watches</a></li>
                                            </ul>
                                            </div>
                                          <div class="list">
                                             <a href="#" class="category-title"><h2>top Categories <i class="fa fa-caret-right"></i></h2></a>
                                            <ul class="submenu">
                                                <li><a href="#">men's</a></li>
                                                <li><a href="#">women's</a></li>
                                                <li><a href="#">kid's</a></li>
                                                <li><a href="#">shoes</a></li>
                                            </ul>

                                              
                                          </div>
                                          
                                          <div class="list image-content">
                                            <div class="right-image-content">
                                                <ul class="submenu">
                                                   <li><img src="{{asset('front-images/nav-brand/1.jpg')}}"></li>
                                                   <li><img src="{{asset('front-images/nav-brand/5.jpg')}}"></li>
                                                   <li><img src="{{asset('front-images/nav-brand/1.jpg')}}"></li>
                                                   <li><img src="{{asset('front-images/nav-brand/5.jpg')}}"></li>
                                                </ul>
                                            </div> 
                                            
                                          </div>
                                         
                                            </section>
                                        </li>
                                        <li><a href="#">office supply <i class="fa fa-angle-down"></i></a></li>
                                    <?php */ ?>
                                    
                                </ul>
                            </section>              
                      </nav>
                  </section>
                </div>
            </div>
        </div>
    </div>
</header>