@extends('frontend.user.layouts.frontend-app')

@section ('title', 'User Profile')

@section('content')

<?php 
                                    $user = Auth::user(); 
                                    $extrainfo = Auth::user()->profile; 
                                    $extra = Auth::user()->roles; 
                                    $info = DB::table('user_information')->where('user_id',$user->id)->first();
                                   
                                ?>
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
            <li class="has-children">
                <a href="userdash_buyer.html"><i class="fa fa-home" aria-hidden="true"></i>Home</a>
            </li>
            <li class="has-children active">
                <a href="#0"><i class="fa fa-home" aria-hidden="true"></i>Personal Information</a>
                <ul>
                    <li>                
                        <a href="{{ URL::to('/dashboard/profile') }}"><i class="fa fa-home" aria-hidden="true"></i>My Profile</a>
                    </li> 
                    
                </ul>
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
                                
                           <!-- <div class="personal-info">
                                 <ul>
                                    <li>Name: {{ $user->name }} </li>
                                    <li>Email: {{ $user->email }}</li>
                                    @if( !empty($extrainfo))
                                    <li>First Name: {{ $extrainfo->fname }}</li>
                                    <li>Last Name: {{ $extrainfo->lname }}</li>
                                    <li>Mobile/Phone: {{ $extrainfo->phone }}</li>
                                    @endif
                                </ul> 
                            </div>-->
                            <div class="edit-profileinfo">
                                
                            {{ Form::open(['url' => 'profile/update/'.$user->id, 'method' => 'patch', 'class' => 'profile-form','files'=>'true']) }}                                

                              <input type="hidden" value="{{$user->id}}" name="user_id">
                              <div class="form-group">
                                <label>Name<span>*</span></label>
                                <input type="text" class="form-control required fullname" name="fullname" placeholder="Enter Name" value="{{ $user->name }}" />
                              </div>
                              <div class="form-group">
                                <label>Email<span>*</span></label>
                                <input type="email" class="form-control required email" name="email" placeholder="Enter Email" value="{{ $user->email }}" disabled/>
                              </div>
                              
                               <div class="form-group">
                                    <label>First Name<span>*</span></label>
                                    <input type="text" name="fname" id="" cols="30" rows="10"  value="<?php if(!empty( $extrainfo )){ echo $extrainfo->fname; }?>" class="form-control required" placeholder="First Name" />
                                </div> 
                                <div class="form-group">
                                    <label>Last Name<span>*</span></label>
                                    <input type="text" name="lname" id="" cols="30" rows="10"  value="<?php if(!empty( $extrainfo )){ echo $extrainfo->lname; }?>" class="form-control required" placeholder="Last Name" />
                                </div>
                                <div class="form-group">
                                    <label>Upload profile image<span>*</span></label>
                                    <input type="file" name="pimage" onchange="readfeatured10(this,'upload-img');" class="" />
                                    @if(!empty($extrainfo->image))
                                    <div class="bg-img upload-img" style="background-image:url('{{ asset('/images/logo/'.$extrainfo->image) }}');">                                      
                                    </div>
                                    @else
                                    <div class="upload-img"></div>
                                    @endif
                                </div>
                                <div class="form-group">
                                <label>Phone Number<span>*</span></label>
                                <input type="text" class="form-control required number" value="<?php if(!empty( $extrainfo )){ echo $extrainfo->phone; }?>" name="phone" placeholder="Enter Phone Number" />
                              </div>
                              <div class="form-group">
                                <h2>Contact Address</h2>
                                <div class="address-info">
                                <label>Street<span>*</span></label>
                                <input type="text" class="form-control required" value="<?php if(!empty( $extrainfo )){ echo $extrainfo->street; }?>" name="street" placeholder="Enter street" />
                                <label>City<span>*</span></label>
                                <input type="text" class="form-control required" value="<?php if(!empty( $extrainfo )){ echo $extrainfo->city; }?>" name="city" placeholder="Enter city" />
                                <label>Zone<span>*</span></label>
                                <input type="text" class="form-control required" value="<?php if(!empty( $extrainfo )){ echo $extrainfo->zone; }?>" name="zone" placeholder="Enter zone" />
                                </div>
                              </div>

                              <div class="form-group">
                                <label>Bussiness Type</label>
                                <select name="business_type" class="business_type form-control">
                                  <option value="0">Please select one</option>
                                  <option value="4" <?php if($extra[0]->id == 4){ echo 'selected';}?>>Retailer/Vendor</option>
                                  <option value="6" <?php if($extra[0]->id == 6){ echo 'selected';}?>>Wholesaler/Distributor</option>
                                </select>
                              </div>
                              
                              <div class="form-group radio">
                                <label>Website</label>
                                <input type="radio" id="website" name="website" class="have_one required" value="1" <?php if(!empty($info->website) ){ if($info->website == 1){ echo 'checked';}}?> > <label for="website" id="have_one"><span></span>I have one</label>
                                <input type="radio" id="other" name="website" class="dont_have_one" value="0" <?php if( !empty($info->website) ){ if( $info->website == 0){ echo 'checked';} }?>> <label for="other" id="tested"><span></span>I don't have one</label>
                              </div>
                              <div class="form-group opentext" style="<?php if( !empty( $info->website) ) { if( $info->website == 0){ echo 'display:none;'; } }?>" >
                                <input type="text" name="website_url" placeholder="http://www.example.com" value="<?php if(!empty( $info ) ) { if($info->website != 0 ){ echo $info->website_url; } } ?>" class="form-control website_url <?php if(!empty( $info ) ) { if( $info->website != 0 ){ echo 'required'; } }?>">
                              </div>


                                <div class="form-group company-address">
                                <h2>Company Address</h2>
                                <div class="address-info">
                                <label>Street</label>
                                <input type="text" class="form-control" value="<?php if(!empty( $info )){ echo $info->c_street; }?>" name="c_street" placeholder="Enter street" />
                                <label>City</label>
                                <input type="text" class="form-control" value="<?php if(!empty( $info )){ echo $info->c_city; }?>" name="c_city" placeholder="Enter city" />
                                <label>Zone</label>
                                <input type="text" class="form-control" value="<?php if(!empty( $info )){ echo $info->c_zone; }?>" name="c_zone" placeholder="Enter zone" />
                                <label>Company Introduction</label>
                                <textarea name="c_description" placeholder="Enter text" class="form-control"/><?php if(!empty( $info )){ echo $info->c_description; }?></textarea>
                                <label>Logo</label>
                                <input type="file" class="" name="c_logo" onchange="readfeatured10(this,'featured-img');"/>
                                @if(!empty($info->c_logo ))
                                  <div class="bg-img featured-img" style="background-image:url('{{ asset('images/logo/'.$info->c_logo) }}');">
                                    
                                  </div>
                                  @else
                                  <div class="featured-img"></div>
                                  @endif
                                </div>
                              </div>
                             <input type="submit" class="btn btn-outline" value="Submit">
                              <img src="{{ asset('/img/loading.gif') }}" id="imgloader" style="display:none;" height="20" width="20">
                            {{ Form::close() }}
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
