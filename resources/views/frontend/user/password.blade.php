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
              
                <div class="edit-profileinfo">
                    
                {{ Form::open(['url' => 'password/change', 'method' => 'patch', 'class' => 'profile-form','files'=>'true']) }}                                

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
                  
                   
                 <input type="submit" class="btn btn-outline" value="Submit">
                  <img src="{{ asset('/img/loading.gif') }}" id="imgloader" style="display:none;" height="20" width="20">
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
