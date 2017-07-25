<header class="navbar-fixed-top cd-main-header">
  <div class="dashboard-header">
          <div class="row">
              <div class="nav-logo col-xs-12 col-sm-3 col-md-3">
                  @if(!empty($setting->logo))
                        <a href="{{url('/')}}"><img src="{{asset('images/logo/'.$setting->logo)}}" alt="@if(!empty($setting->title)) $setting->title @endif"></a>
                    @endif
              </div>
              <?php $user = Auth::user(); 
                    $extrainfo = Auth::user()->profile; 
              ?>
              <a href="#0" class="cd-nav-trigger">Menu<span></span></a>
              <div class="main-header col-xs-12 col-sm-9 col-md-9">
                   <section id="main-navigation-container">
                      <nav>

                          <section class="navigation-items">
                              <ul>
                                  <li class="myaccount"><a href="#"><span class="avatar_wrap"><img src="{{asset('/images/avatar.png')}}"></span><span class="avatar-text">my account</span> <i class="fa fa-angle-down"></i></a>
                                      <section class="submenu-container">
                                          <div class="list">
                                         </a>
                                          <ul class="submenu">
                                          <li id="submenu-avatar">
                                            @if(!empty($extrainfo->image))
                                             <a href="#"><img src="{{asset('/images/logo/'.$extrainfo->image)}}"></a> 
                                             @endif
                                          </li>

                                          <li> Hello, <a href="#"><span>{{ $user->name }}</span><i class="fa fa-address-card" aria-hidden="true"></i></a></li>
                                          <li><a href="{{ URL::to('/dashboard/profile') }}"><span>my account</span></a><a href="{{ URL::to('/logout') }}"> <span>signout</span></a></li>
                                          
                                      </ul> 
                                    </div>  
                                    <div class="list"> 
                                          <ul>
                                          <li class="header-detail-content">
                                              <h3 class="header-message-title">
                                                  <i class="fa fa-bell-o" aria-hidden="true"></i>
                                                  Notice
                                              </h3>
                                              <div data-role="message">
                                                  <ul class="ui-header-message"></ul>
                                              </div>
                                          </li>
                                      </ul>
                                    </div>                                   
                                      </section>
                                  </li>
                                  <li class="helpmenu"><a href="#">help <i class="fa fa-angle-down"></i></a>
                                      <section class="submenu-container">
                                          <div class="list">
                                         <a href="#" class="category-title"><h2>top Categories <i class="fa fa-caret-right"></i>  </h2>
                                         </a>
                                          <ul class="submenu">
                                          <li><a href="product.html">men's</a></li>
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
                                             <li><img src="{{asset('front-images/nav-brand/2.jpg')}}"></li>
                                          </ul>
                                      </div>
                                      
                                    </div>
                                   
                                      </section>
                                  </li>
                                  <li class="trademenu"><a href="#">trade assurance</a>
                                  </li>
                              </ul>
                          </section>              
                    </nav>
                </section>
              </div>
          </div>
  </div>
</header>