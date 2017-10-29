@extends('frontend.user.layouts.frontend-app')

@section ('title', 'User Profile')

@section('content')

<?php 
    $user = Auth::user(); 
    $extrainfo = Auth::user()->profile; 
    $extra = Auth::user()->roles; 
    $info = DB::table('user_information')->where('user_id',$user->id)->first();
   $image = DB::table('user_image')->where('user_id',$user->id)->first();
?>
    
    
    {{-- <div class="col-sm-8 col-md-8"> --}}
    


            <div class="col-sm-12 col-md-12 Fullcontent-wrap">
              @include('includes.partials.messages')
              <div class="userdash-right">
                <section class="profilehead-wrap">
                  <div class="text-center col-md-3">
                  @if(!empty($image->image))
                    <img src="{{ asset('/images/logo/'.$image->image) }}" class="avatar img-circle img-thumbnail" alt="avatar"> 
                    @else
                    <img src="" class="avatar img-circle img-thumbnail" alt="avatar">
                    @endif
                    <h6><a href="{{ URL::to('user/image') }}">Upload photo</a></h6>
                  </div> 
                  <div class="col-md-9">
                    <div class="phead-rtContent">
                      
                      <table class="info-table">
                        <tbody><tr class="info-proj proj-account" data-role="account">
                            <td class="info-proj-title">Your Member ID:</td>
                            <td class="info-proj-value" data-proj="value">@if(!empty($user->id)){{ $user->id }}@endif</td>
                            <td class="info-proj-operate"></td>
                            <td class="info-proj-operate"></td>
                        </tr>
                        <tr class="info-proj proj-email" data-role="email">
                            <td class="info-proj-title">Your Email:</td>
                            <td class="info-proj-value" data-proj="value">@if(!empty($user->email)){{ $user->email }}@endif</td>
                            <td class="info-proj-operate"><a href="{{ URL::to('user/password') }}" class="memberbtn_user">Change Password</a></td>
                            <td></td>
                        </tr>
                        
                        </tbody>
                      </table>
                      
                    </div>
                  </div>
                </section>

                <section class="required_wrap">
                  {{ Form::open(['url' => 'profile/update/'.$user->id, 'method' => 'patch', 'class' => 'profile-form','files'=>'true']) }}
                  <div class="dashboardBorder">
                    <h3 class="title-dashboardbg">required</h3>
                    <div class="reqpattern profilehead-wrap">
                        <div class="form-group user_radio">
                          <label class="col-lg-3 control-label">business pattern</label>
                          <div class="col-lg-9 useradio">
                            <input id="represent" name="b_pattern" class="represent_user required" value="1" type="radio" <?php if(!empty($extrainfo->b_pattern)) { if($extrainfo->b_pattern == '1') { echo 'checked = checked'; }} ?> > <label for="represent" id="represent"><span></span>I represent a company</label>
                            <input id="notrepresent" name="b_pattern" class="user_notrepresent" value="0" type="radio" <?php if(!empty($extrainfo->b_pattern)) { if($extrainfo->b_pattern == '0') { echo 'checked = checked'; }} ?> > <label for="notrepresent" id="notrepresent" ><span></span>I donot represent a company</label>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-lg-3 control-label">Name</label>
                          <div class="col-lg-4">
                            <input class="form-control" name="fname" value="@if(!empty($extrainfo->fname)){{ $extrainfo->fname }}@endif" type="text">
                          </div>
                          <div class="col-lg-4">
                            <input class="form-control" name="lname" value="@if(!empty($extrainfo->lname)){{ $extrainfo->lname }}@endif" type="text">
                          </div>

                        </div>
                        <div class="form-group user_radio">
                          <label class="col-lg-3 control-label">i am <i class="fa fa-lock"></i></label>
                          <div class="col-lg-9 useradio">
                            <input id="male" name="gender_profile" class="male_profile" value="1" aria-required="true" type="radio" @if(!empty($extrainfo->gender)) @if($extrainfo->gender == '1') {{ trans('checked') }} @endif @endif> <label for="male" id="male_user"><span></span>male</label>
                            <input id="female" name="gender_profile" class="female_user" value="0" type="radio" @if(!empty($extrainfo->gender)) @if($extrainfo->gender == '0') {{ trans('checked') }} @endif @endif> <label for="female" id="tested"><span></span>female</label>
                            <input id="other_user" name="gender_profile" class="other_profile" value="2" type="radio" @if(!empty($extrainfo->gender)) @if($extrainfo->gender == '2') {{ trans('checked') }} @endif @endif> <label for="other_user" id="user_other"><span></span>other</label>
                          </div>
                        </div>
                        <div class="form-group @if($extrainfo->b_pattern == '0') hide @endif" id="job_title">
                          <label class="col-lg-3 control-label">job title</label>
                          <div class="col-lg-9">
                            <input class="form-control" name="job_title" value="@if(!empty($extrainfo->job_title)){{ $extrainfo->job_title }}@endif" type="text">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-lg-3 control-label">Email address <i class="fa fa-lock"></i></label>
                          <div class="col-lg-9">
                            <input class="form-control email" name="email" value="{{ $user->email }}" type="text" disabled>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-lg-3 control-label">contact address</label>
                            <div class="col-lg-9">
                              <div class="user-formcontrol">
                                <label class="col-lg-2 control-label">street</label>
                                <input class="col-lg-10 form-control" name="street" value="@if(!empty($extrainfo->street)){{ $extrainfo->street }}@endif" type="text">
                              </div>
                              <div class="user-formcontrol">
                                <label class="col-lg-2 control-label">city</label>
                                <input class="col-lg-10 form-control" name="city" value="@if(!empty($extrainfo->city)){{ $extrainfo->city }}@endif" type="text">
                              </div>
                              <div class="user-formcontrol">
                                <label class="col-lg-2 control-label">province</label>
                                <input class="col-lg-10 form-control" name="province" value="@if(!empty($extrainfo->zone)){{ $extrainfo->zone }}@endif" type="text">
                              </div>
                              <div class="user-formcontrol">
                                <label class="col-lg-2 control-label">country</label>
                                <input class="col-lg-10 form-control" name="country" value="@if(!empty($extrainfo->country)){{ $extrainfo->country }}@endif" type="text">
                              </div>
                            </div>
                        
                        </div>
                        
                        <div class="form-group">
                          <label class="col-lg-3 control-label">tel</label>
                          
                            <div class="col-lg-9">
                              <div class="user-formcontrol col-lg-3 user_tel">
                                <label>country code</label>
                                <input class="form-control" name="code" value="@if(!empty($extrainfo->code)){{ $extrainfo->code }}@endif" type="text">
                              </div>

                              <div class="user-formcontrol col-lg-3 user_tel">
                                <label>area code</label>
                                <input class="form-control" name="areacode" value="@if(!empty($extrainfo->areacode)){{ $extrainfo->areacode }}@endif" type="text">
                              </div>

                              <div class="user-formcontrol col-lg-3  user_tel">
                                <label>number</label>
                                <input class="form-control" name="number" value="@if(!empty($extrainfo->phone)){{ $extrainfo->phone }}@endif" type="text">
                              </div>
                              
                            </div>
                        
                        </div>
                        <div class="form-group">
                          <label class="col-lg-3 control-label">fax</label>
                            <div class="col-lg-9">
                              <div class="user-formcontrol col-lg-3 user_tel">
                                <label>country code</label>
                                <input class="form-control" name="faxcode" value="@if(!empty($extrainfo->faxcode)){{ $extrainfo->faxcode }}@endif" type="text">
                              </div>

                              <div class="user-formcontrol col-lg-3 user_tel">
                                <label>area code</label>
                                <input class="form-control" name="faxareacode" value="@if(!empty($extrainfo->faxareacode)){{ $extrainfo->faxareacode }}@endif" type="text">
                              </div>

                              <div class="user-formcontrol col-lg-3  user_tel">
                                <label>number</label>
                                <input class="form-control" name="faxnumber" value="@if(!empty($extrainfo->fax)){{ $extrainfo->fax }}@endif" type="text">
                              </div>
                              
                            </div>
                        
                        </div>
                    </div>
                  </div><!-- dashboardBorder -->

                  <div class="dashboardBorder">
                    <h3 class="title-dashboardbg">company info</h3>
                    <div class="reqpattern profilehead-wrap">
                        <div class="form-group">
                          <label class="col-lg-3 control-label">company name</label>
                          <div class="col-lg-9">
                            <input class="form-control" name="c_name" value="@if(!empty( $info->c_name )) {{ $info->c_name }} @endif" type="text">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-lg-3 control-label">Business type</label>
                          <div class="col-lg-9">
                            <div class="ui-select">
                              <select id="user_company" class="form-control user_Ctype" name="business_type">
                              <option value="">--Select option--</option>
                                <option value="vendor" <?php if( !empty($info->b_type) ){ if( $info->b_type == 'vendor'){ echo 'selected';} }?>>Retailer/Vendor</option>
                                <option value="wholesaler" <?php if( !empty($info->b_type) ){ if( $info->b_type == 'wholesaler'){ echo 'selected';} }?>>Distributor/Wholesaler</option>
                                <option value="buyer" <?php if( !empty($info->b_type) ){ if( $info->b_type == 'buyer'){ echo 'selected';} }?>>Buyer</option>
                              </select>
                            </div>
                          </div>

                        </div>
                         
                        <div class="form-group">
                          <label class="col-lg-3 control-label">website</label>
                          <div class="col-lg-9 useradio">
                           <input type="radio" id="website" name="website" class="have_one required" value="1" <?php if(!empty($info->website) ){ if($info->website == '1'){ echo 'checked = checked';}}?> > <label for="website" id="have_one"><span></span>I have one</label>
                           <input type="radio" id="other" name="website" class="dont_have_one" value="0" <?php if( !empty($info->website) ){ if( $info->website == '0'){ echo 'checked = checked';} }?>> <label for="other" id="tested"><span></span>I don't have one</label>
                      
                          <div class="form-group opentext" style="<?php if( !empty( $info->website) ) { if( $info->website == '0'){ echo 'display:none;'; } }?>" >
                        <input type="text" name="website_url" placeholder="http://www.example.com" value="<?php if(!empty( $info ) ) { if($info->website != 0 ){ echo $info->website_url; } } ?>" class="form-control website_url <?php if(!empty( $info ) ) { if( $info->website != 0 ){ echo 'required'; } }?>">
                            <span class="form-BContent">Example: http://www.example.com</span>
                      </div>

                          </div>
                        </div>
                       
                        <div class="form-group  @if($extrainfo->b_pattern == '0') hide @endif"  id="company_intro">
                          <label class="col-lg-3 control-label">company introduction</label>
                          <div class="col-lg-9 useradio">
                           <textarea class="form-control" name="c_description">@if(!empty($info->c_description)){{ $info->c_description}}@endif</textarea>
                          </div>
                        </div>
                        <div class="form-group @if($extrainfo->b_pattern == '0') hide @endif" id="company_logo">
                          <label class="col-lg-3 control-label">company logo</label>
                          <div class="col-lg-9 useradio">
                            <div class="box_body">
                              <label class="btn btn-primary btn-bs-file">
                                <i class="fa fa-folder-open"></i>
                                upload image
                                {{-- <input type="file" name="pimage" onchange="readfeatured10(this,'upload-img');" class="" /> --}}
                                <input type="file" class="btn btn-primary open-door profile_browse" name="c_logo" onchange="readfeatured10(this,'featured-img');"/>
                              </label>
                            </div>
                          @if(!empty($info->c_logo ))
                            <div class="bg-img featured-img" style="background-image:url('{{ asset('images/logo/'.$info->c_logo) }}');">
                              
                            </div>
                          @else
                            <div class="featured-img"></div>
                          @endif
                           {{-- <button class="btn btn-primary open-door profile_browse">browse</button> --}}
                          </div>
                        </div>
                         <div class="form-group @if($extrainfo->b_pattern == '1') hide @endif" id="business_exp">
                          <label class="col-lg-3 control-label">business experience</label>
                          <div class="col-lg-9 useradio">
                           <textarea class="form-control" name="b_experience">@if(!empty($info->b_experience)){{ $info->b_experience}}@endif</textarea>
                          </div>
                        </div>
                    </div>
                  </div><!-- dashboardBorder -->

                  <button class="btn btn-primary open-door">submit</button>
               {{ Form::close() }}                
               </section> 
                    
            </div>

       
            

@endsection
