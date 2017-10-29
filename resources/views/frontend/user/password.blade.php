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
    
    <div class="col-sm-12 col-md-12 Fullcontent-wrap">
        <div class="userdash-right">
        
              @include('includes.partials.messages')
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
            <div class="dashboardBorder">
                    <h3 class="title-dashboardbg">required</h3>
                <div class="reqpattern profilehead-wrap">
                    
                {{ Form::open(['url' => 'password/change', 'method' => 'patch', 'class' => 'profile-form userCpassword','files'=>'true']) }}                                

                  <input type="hidden" value="{{$user->id}}" name="user_id">
                  <div class="form-group">
                    <label>Old Password<span>*</span></label>
                    <input type="password" class="form-control required oldpassword" name="old_password" placeholder="Enter Old Password" value="" />
                  </div>
                  <div class="form-group">
                    <label>New Password<span>*</span></label>
                    <input type="password" class="form-control required password" name="password" placeholder="Enter New Password" value="" />
                  </div>
                  <div class="form-group">
                    <label>Retype New password<span>*</span></label>
                    <input type="password" class="form-control required confirm_password" name="confirm_password" placeholder="Enter Confirm Password" value="" />
                  </div>                 
                   
                 <input type="submit" class="btn btn-primary open-door" value="Submit">
                  <img src="{{ asset('/img/loading.gif') }}" id="imgloader" style="display:none;" height="20" width="20">
                {{ Form::close() }}
            </div>

            </div>
            </section>
        </div>
    
    </div>
    <div class="col-sm-4 col-md-4">
        {{-- <div class="maui-row-right mt15">
            @include('frontend.user.includes.noticeboard')
            @include('frontend.user.includes.supplier')
        </div> --}}
    </div>
            
@endsection
