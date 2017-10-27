@extends('frontend.user.layouts.frontend-app')

@section ('title', 'User Profile')

@section('content')

<?php 
    $user = Auth::user(); 
    $extrainfo = Auth::user()->profile; 
    $extra = Auth::user()->roles; 
    $info = DB::table('user_information')->where('user_id',$user->id)->first();
   
?>
    
    <div class="col-sm-8 col-md-8">
    
        <div class="userdash-right">
            @include('includes.partials.messages')

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

                    
                    <div class="personal-info row">
                      <div class="col-md-12">
                        <h2>Personal Information</h2>
                      </div>                      
                      <input type="hidden" value="{{$user->id}}" name="user_id">
                      <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                          <label>Name<span>*</span></label>
                          <input type="text" class="form-control required fullname" name="fullname" placeholder="Enter Name" value="{{ $user->name }}" />
                        </div>
                      </div>
                    <div class="col-md-6 col-sm-6">
                      <div class="form-group">
                        <label>Email<span>*</span></label>
                        <input type="email" class="form-control required email" name="email" placeholder="Enter Email" value="{{ $user->email }}" disabled/>
                      </div></div>
                      <div class="col-md-6 col-sm-6">
                    
                      <div class="form-group">
                          <label>First Name<span>*</span></label>
                          <input type="text" name="fname" id="" cols="30" rows="10"  value="<?php if(!empty( $extrainfo )){ echo $extrainfo->fname; }?>" class="form-control required" placeholder="First Name" />
                      </div> </div>
                      <div class="col-md-6 col-sm-6">

                      <div class="form-group">
                          <label>Last Name<span>*</span></label>
                          <input type="text" name="lname" id="" cols="30" rows="10"  value="<?php if(!empty( $extrainfo )){ echo $extrainfo->lname; }?>" class="form-control required" placeholder="Last Name" />
                      </div></div>
                      <div class="col-md-6 col-sm-6">

                      <div class="form-group">
                          <label>Upload profile image<span>*</span></label>
                          <input type="file" name="pimage" onchange="readfeatured10(this,'upload-img');" class="" />
                          @if(!empty($extrainfo->image))
                          <div class="bg-img upload-img" style="background-image:url('{{ asset('/images/logo/'.$extrainfo->image) }}');">                                      
                          </div>
                          @else
                          <div class="upload-img"></div>
                          @endif
                      </div></div>
                        <div class="col-md-6 col-sm-6">    
                      <div class="form-group">
                        <label>Phone Number<span>*</span></label>
                        <input type="text" class="form-control required number" value="<?php if(!empty( $extrainfo )){ echo $extrainfo->phone; }?>" name="phone" placeholder="Enter Phone Number" />
                      </div>
</div>
                    </div>

                    <div class="address-info row">
                      <div class="row">
                        <div class="col-md-12">
                          <h2>Contact Address</h2>
                        </div>
                      </div>
                      <div class="col-md-6 col-sm-6">  
                      <div class="form-group">
                        <label>Street<span>*</span></label>
                        <input type="text" class="form-control required" value="<?php if(!empty( $extrainfo )){ echo $extrainfo->street; }?>" name="street" placeholder="Enter street" />
                      </div>
                      </div>
                      <div class="col-md-6 col-sm-6">  
                      <div class="form-group">
                        <label>Zone<span>*</span></label>
                        {{Form::select('zone', $zones, (!empty($extrainfo)) ?$extrainfo->zone : null, ['placeholder'=>'-- Select Zone --','class' => 'form-control zone required selectBox'])}}
                      </div>
                      </div>
                      <div class="col-md-6 col-sm-6">  
                      <div class="form-group">
                        <label>District<span>*</span></label>
                        <select class="form-control required district selectBox" name="district" data-district ="{{(!empty($extrainfo)) ?$extrainfo->district : ''}}" required>
                          <option selected="selected" disabled="disabled" value="" hidden="hidden">-- Select District --</option>
                          {{-- <option value="">-- Select District --</option> --}}
                          @foreach($districts as $district)
                          <option class="hide" data-attr="{{$district->zone_id}}" value="{{$district->district_id}}">{{$district->district_name}}</option>
                          @endforeach
                        </select>
                      </div>
                      </div>
                      <div class="col-md-6 col-sm-6">  
                      <div class="form-group">
                        <label>City<span>*</span></label>
                        <input type="text" class="form-control required" value="<?php if(!empty( $extrainfo )){ echo $extrainfo->city; }?>" name="city" placeholder="Enter city" />
                      </div>
                      </div>
                      <div class="col-md-6 col-sm-6">  
                      <div class="form-group">
                        <label>Bussiness Type</label>
                        <select name="business_type" class="business_type form-control selectBox">
                          <option value="0">Please select one</option>
                          <option value="4" <?php if($extra[0]->id == 4){ echo 'selected';}?>>Retailer/Vendor</option>
                          <option value="6" <?php if($extra[0]->id == 6){ echo 'selected';}?>>Wholesaler/Distributor</option>
                        </select>
                      </div>
                      </div>
                      <div class="col-md-6 col-sm-6">  
                      
                      <div class="form-group radio">
                        <label>Website</label>
                        <input type="radio" id="website" name="website" class="have_one required" value="1" <?php if(!empty($info->website) ){ if($info->website == 1){ echo 'checked';}}?> > <label for="website" id="have_one"><span></span>I have one</label>
                        <input type="radio" id="other" name="website" class="dont_have_one" value="0" <?php if( !empty($info->website) ){ if( $info->website == 0){ echo 'checked';} }?>> <label for="other" id="tested"><span></span>I don't have one</label>
                      </div>
                      </div>
                      <div class="col-md-6 col-sm-6">  
                      <div class="form-group opentext" style="<?php if( !empty( $info->website) ) { if( $info->website == 0){ echo 'display:none;'; } }?>" >
                        <input type="text" name="website_url" placeholder="http://www.example.com" value="<?php if(!empty( $info ) ) { if($info->website != 0 ){ echo $info->website_url; } } ?>" class="form-control website_url <?php if(!empty( $info ) ) { if( $info->website != 0 ){ echo 'required'; } }?>">
                      </div>
                      </div>

                    </div>



                    <div class="company-address">
                    <div class="row">
                      <div class="col-md-12">
                        <h2>Company Address</h2>
                      </div>
                    </div>
                      <div class="address-info row">
                      <div class="col-md-6 col-sm-6">  
                        <div class="form-group">
                          <label>Street</label>
                          <input type="text" class="form-control" value="<?php if(!empty( $info )){ echo $info->c_street; }?>" name="c_street" placeholder="Enter street" />
                        </div>
                        </div>
                        <div class="col-md-6 col-sm-6">  
                        <div class="form-group">
                          <label>Zone<span>*</span></label>
                          {{Form::select('c_zone', $zones, (!empty($info)) ?$info->c_zone : null, ['placeholder'=>'-- Select Zone --','class' => 'form-control cZone required selectBox'])}}
                        </div>
                        </div>
                        <div class="col-md-6 col-sm-6">  
                        
                        <div class="form-group">
                          <label>District<span>*</span></label>
                          <select class="form-control required cDistrict selectBox" name="c_district" data-district ="{{(!empty($info)) ?$info->c_district : ''}}" required>
                              <option selected="selected" disabled="disabled" value="" hidden="hidden">-- Select District --</option>
                              {{-- <option value="">-- Select District --</option> --}}
                              @foreach($districts as $district)
                              <option class="hide" data-attr="{{$district->zone_id}}" value="{{$district->district_id}}">{{$district->district_name}}</option>
                              @endforeach
                          </select>
                        </div>
                        </div>
                        <div class="col-md-6 col-sm-6">  
                        <div class="form-group">
                          <label>City</label>
                          <input type="text" class="form-control" value="<?php if(!empty( $info )){ echo $info->c_city; }?>" name="c_city" placeholder="Enter city" />
                        </div>
                        </div>

                        <div class="col-md-6 col-sm-6">  

                        <div class="form-group">
                          <label>Company Introduction</label>
                          <textarea name="c_description" placeholder="Enter text" class="form-control"/><?php if(!empty( $info )){ echo $info->c_description; }?></textarea>
                        </div>
                        </div>
                        <div class="col-md-6 col-sm-6">  
                        <div class="form-group">
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
                      </div>
                      <input type="submit" class="btn btn-primary open-door" value="Update">
                      <img src="{{ asset('/img/loading.gif') }}" id="imgloader" style="display:none;" height="20" width="20">
                    </div>
                  {{ Form::close() }}
                </div>

            </div>
        </div>
    </div>

    <div class="col-sm-4 col-md-4">
        <div class="maui-row-right mt15">
            @include('frontend.user.includes.noticeboard')
            @include('frontend.user.includes.supplier')
        </div>
    </div>
            

@endsection
