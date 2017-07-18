@extends('frontend.user.layouts.frontend-app')

@section ('title', 'User Profile')

@section('content')
<main class="cd-main-content">
    <nav class="navigate-menu cd-side-nav buyer-version">
        <a class="version-switcher" data-id="version-switcher" data-spm="dswitchb" href="userdash.html">
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
            <li class="has-children active">
                <a href="userdash_buyer.html"><i class="fa fa-home" aria-hidden="true"></i>Home</a>
            </li>
            <li class="has-children">
                <a href="#0"><i class="fa fa-file-text-o" aria-hidden="true"></i>Orders<i class="fa fa-angle-right" aria-hidden="true"></i></a>
                <ul>
                    <li><a href="buyer-allorders.html">All Orders</a></li>
                </ul>
            </li>

            <li class="has-children">
                <a href="#0"><i class="fa fa-list-ul" aria-hidden="true"></i>My list <i class="fa fa-angle-right" aria-hidden="true"></i></a>
                <ul>
                    <li><a href="myfavorites.html">My Favorites</a></li>
                </ul>
            </li>
        </ul>
    </nav>

    <div class="dashboard-content">
        <div class="page-container">
            <div class="row">
                <div class="col-sm-8 col-md-8">
                    <div class="userdash-right">
                        
                        <div is="null" class="list-module-wrap">
                            <div class="personal-info">
                                <?php $user = Auth::user(); 
                                    $extrainfo = Auth::user()->profile; 
                                    $extra = Auth::user()->roles; 
                                   // echo '<pre>'; print_r($extra);
                                ?>
                                <ul>
                                    <li>Name: {{ $user->name }} </li>
                                    <li>Email: {{ $user->email }}</li>
                                    @if( !empty($extrainfo))
                                    <li>First Name: {{ $extrainfo->fname }}</li>
                                    <li>Last Name: {{ $extrainfo->lname }}</li>
                                    <li>Mobile/Phone: {{ $extrainfo->phone }}</li>
                                    @endif
                                </ul>
                            </div>
                            <div class="edit-profileinfo">
                                
                            <form method="post" action="javascript:;" name="eventform" id="eventform" novalidate="novalidate">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                              <div class="form-group">
                                <label>Name<span>*</span></label>
                                <input type="text" class="form-control required fullname" name="fullname" placeholder="Enter Name" value="{{ $user->name }}" />
                              </div>
                              <div class="form-group">
                                <label>Email<span>*</span></label>
                                <input type="email" class="form-control required email" name="email" placeholder="Enter Email" value="{{ $user->email }}"/>
                              </div>
                              
                               <div class="form-group">
                                    <label>First Name<span>*</span></label>
                                    <input type="text" name="fname" id="" cols="30" rows="10"  value="<?php if(!empty( $extrainfo )){ echo $extrainfo->fname; }?>" class="form-control required" placeholder="First Name" />
                                </div> 
                                <div class="form-group">
                                    <label>Last Name<span>*</span></label>
                                    <input type="text" name="lname" id="" cols="30" rows="10"  value="<?php if(!empty( $extrainfo )){ echo $extrainfo->lname; }?>" class="form-control required course" placeholder="Last Name" />
                                </div>
                                <div class="form-group">
                                <label>Phone Number<span>*</span></label>
                                <input type="text" class="form-control required number" value="<?php if(!empty( $extrainfo )){ echo $extrainfo->phone; }?>" name="phone" placeholder="Enter Phone Number" />
                              </div>
                             <input type="submit" class="btn btn-outline" value="Submit">
                              <img src="{{ asset('/img/loading.gif') }}" id="imgloader" style="display:none;" height="20" width="20">
                            </form>
                        </div>

                        </div>
                    </div>
                
                </div>
                <div class="col-sm-4 col-md-4">
                    <div class="maui-row-right mt15">
                        <section class="mh-notice-board" id="J-mh-notice-board-box">
                            <h2>Notice Board</h2>
                            <div class="notice-board-content">
                                <div class="J-supplier-box mh-area-box">
                                    <div class="J-supplier-content mh-content-area prepend-square">
                                        <ul>
                
                                            <li data-action-id="default"><a href="#" title="Important: How was Your Experience Contacting Alibaba for Help?" target="_blank">Important: How was Your Experience Contacting Alibaba for Help?</a> </li>
                
                                            <li data-action-id="default"><a href="#" title="BOOM NEWS! Online Chat service launch!" target="_blank">BOOM NEWS! Online Chat service launch!</a> </li>
                
                                            <li data-action-id="default"><a href="#" title="Your must&ndash;read account management guide is launched! " target="_blank">Your must&ndash;read account management guide is launched! </a> </li>
                
                                            <li data-action-id="default"><a href="#" title="New: Learn to protect Gold Supplier account" target="_blank">New: Learn to protect Gold Supplier account</a> </li>
                
                                            <li data-action-id="default"><a href="#" title="Third-party Services Launch Notice" target="_blank">Third-party Services Launch Notice</a> </li>
                
                                        </ul>
                                    </div>
      
                                    <div class="view-more">
                                      <a target="_blank" href="#">View More</a>
                                    </div>
      
                                </div>   
                            </div>
                        </section>
                        <section class="mh-notice-board" id="J-mh-notice-board-tips">
                            <h2>Suppliers Tips</h2>
                            <div class="notice-board-content">
                                <div style="display:none;" class="J-item-template">
                                    <div class="J-item tips-item">
                                       <h3 class="J-title"></h3>
                                       <p class="J-des"></p>
                                       <div class="more-wrap util-clearfix">
                                            <a target="_blank" href="#" class="J-link mh-read-more"></a>
                                       </div>
                                   </div>
                                </div>
                                <div class="J-mh-tab-pane-buyer mh-area-box"><div class="J-item tips-item" data-action-id="default">
                                       <h3 class="J-title" title="" style="display: none;"></h3>
                                       <p class="J-des" title="Learn how to protect Gold Supplier Account">1. Learn how to protect Gold Supplier Account</p>
                                       <div class="more-wrap util-clearfix">
                                            <a target="_blank" href="#" class="J-link mh-read-more" title="Order with Trade Assurance">View Details&gt;</a>
                                       </div>
                                   </div><div class="J-item tips-item" data-action-id="default">
                                       <h3 class="J-title" title="" style="display: none;"></h3>
                                       <p class="J-des" title="Key points help you get more buyers">2. Key points help you get more buyers</p>
                                       <div class="more-wrap util-clearfix">
                                            <a target="_blank" href="#" class="J-link mh-read-more" title="Start Now">View Details&gt;</a>
                                       </div>
                                   </div><div class="J-item tips-item" data-action-id="default">
                                       <h3 class="J-title" title="" style="display: none;"></h3>
                                       <p class="J-des" title="What if I received spoof email?">3. What if I received spoof email?</p>
                                       <div class="more-wrap util-clearfix">
                                            <a target="_blank" href="#" class="J-link mh-read-more" title="Go Now">View Details&gt;</a>
                                       </div>
                                   </div></div>
                            </div>

                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- content-wrapper -->
</main> <!-- cd-main-content -->


@endsection