@extends('frontend.layouts.app')

@section('title')
Login @if(!empty($setting->tagline))|| {{$setting->tagline}}@endif
@endsection

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-sm-8 col-xs-12 pull-left">
            <div class="login-txt-left">
                <a href="#">
                    <p class="trade">trade asurance</p>
                    <p class="protect_order">let us protect your order</p>
                    <p class="deli_payment">from payment to delivery</p>
                    <a class="btn learn-more open-door" href="#">learn more</a>
                </a>
            </div>
        </div>
        <div class="col-md-4 col-sm-4 col-xs-12 pull-right">
            <div class="panel panel-default join-form">
                <div class="panel-heading"></div>
                <div class="panel-body">

                @include('includes.partials.messages')

                {{Form::open(['url'=>'/login', 'id'=>'login_form', 'class'=>'form-horizontal', 'role'=>'form'])}}
                    {{-- <form class="form-horizontal" id="login_form" role="form"> --}}
                    <div class="form-group">
                        <div class="col-md-12 col-sm-12">
                        {{Form::email('email', null, ['class'=>'form-control', 'id'=>'inputEmail3', 'placeholder'=>'Email', 'required'])}}
                            {{-- <input type="email" class="form-control" id="inputEmail3" placeholder="Email" required> --}}
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12 col-sm-12">
                        {{Form::input('password', 'password', null, ['class'=>'form-control', 'id'=>'inputPassword3', 'placeholder'=>'Password', 'required'])}}
                            {{-- <input type="password" class="form-control" id="inputPassword3" placeholder="Password" required> --}}
                        </div>
                    </div>
                    <div class="form-group log_info_pass">
                        <div class="col-md-12 col-sm-12">
                            <div class="row">
                                <div class="col-md-5 col-sm-5 col-xs-12 pull-left">
                                    <div class="checkbox">
                                        <input id="checkbox1" type="checkbox" name="remember">
                                        <label for="checkbox1"><span></span>Remember</label>
                                    </div>
                                </div>
                                <div class="col-md-7 col-sm-7 col-xs-12 pull-right">
                                    <div class="checkbox">
                                        {{-- <a href="#">Text a temporary password</a> --}}
                                        <a href="{{url('password/reset')}}">Forgot your password?</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12 col-sm-12">
                            <button type="submit" class="btn login_reg open-door btn-sm">Sign in</button>
                        </div>
                    </div>
                    <div class="form-group login-info last">
                        <div class="col-md-12 col-sm-12">
                            <span>Using a public or shared device? Uncheck to protect your account.<a href="#">Learn more</a></span>
                        </div>
                    </div>
                    {{-- </form> --}}
                    {{Form::close()}}
                </div>
                <div class="panel-footer">
                    Not Registred? <a href="{{url('/register')}}">Register here</a></div>
            </div>
        </div>
    </div>
</div>

@endsection

