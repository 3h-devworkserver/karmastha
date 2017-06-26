@extends('frontend.layouts.app')

@section('title')
Register @if(!empty($setting->tagline))|| {{$setting->tagline}}@endif
@endsection

@section('content')

<div class="container">
    <div class="row centered-form">
        <div class="col-xs-12 col-sm-8 col-md-5 col-sm-offset-2 col-md-offset-4">
            <div class="panel panel-default join-form">
                <div class="panel-heading"></div>
                <div class="panel-body">
                 @include('includes.partials.messages')
                    {{Form::open(['url'=>'register', 'class'=>'userRegisterForm form-horizontal', 'role'=>'form'])}}
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <input type="email" name="email" id="email" class="form-control input-sm" placeholder="Email">
                            </div>
                        </div>
                        
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <input type="password" name="password" id="password" class="form-control input-sm" placeholder="Password">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <input type="password" name="password_confirmation" class="form-control input-sm" placeholder="Confirm Password">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="row">
                                <div class="col-xs-6 col-sm-6 col-md-6 join_reg_left">
                                    <div class="form-group">
                                        <input type="text" name="fname" id="first_name" class="form-control input-sm" placeholder="First Name">
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6 join_reg_right">
                                    <div class="form-group">
                                        <input type="text" name="lname" id="last_name" class="form-control input-sm" placeholder="Last name">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                                {{-- <input maxlength="20" name="phoneFlagComp" id="phoneFlagComp" size="32" class="form-control input-sm" autocomplete="off" type="tel" placeholder="Mobile Phone" aria-label="Mobile phone" aria-describedby=" "> --}}
                                <input maxlength="20" name="phone" id="phoneFlagComp" size="32" class="form-control input-sm" autocomplete="off" type="tel" placeholder="Mobile Phone">
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                                {{Form::select('user_type',['Customer'=>'Normal User', 'Vendor'=>'Vendor', 'WholeSeller'=>'WholeSeller'],null, ['placeholder'=>'-- Select User Type --', 'class'=>'form-control selectBox'])}}
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group login-info last">
                                <div class="col-md-12 col-sm-12">
                                    <span>By Registering, you agree that you've read and accepted our <a href="#"> User Agreement</a>, you're at least 18 years old, and you consent to our <a href="#"> Privacy Notice</a> and receiving marketing communications from us.</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <button type="submit" class="btn login_reg open-door btn-sm">Register</button>
                            </div>
                        </div>
                    {{Form::close()}}
                </div>
                <div class="panel-footer">
                    Already have an account? <a href="{{url('/login')}}">Login here</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection