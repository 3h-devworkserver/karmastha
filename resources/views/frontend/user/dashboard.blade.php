@extends('frontend.user.layouts.frontend-app')

@section ('title', 'Dashboard')

@section('content')

    <?php 
        $user = Auth::user(); 
        $extrainfo = Auth::user()->profile; 
        $extra = Auth::user()->roles; 
        $info = DB::table('user_information')->where('user_id',$user->id)->first();
       $image = DB::table('user_image')->where('user_id',$user->id)->first();
    ?>

    <div class="col-sm-8 col-md-8 Lcontent-wrap">
        
        @include('includes.partials.messages')

        <div class="userdash-right">

            <div class="oversea-user-profile-root">
                <div class="mui-personal-info">
                    <a class="mui-avatar-a" href="#" target="_blank" data-type="namePic">
                        @if(!empty($image->image))
                        <img class="mui-avatar" src="{{ asset('/images/logo/'.$image->image) }}">
                        @else
                        <img class="mui-avatar" src="{{asset('images/avatar.png')}}">
                        @endif
                    </a>
                    <div class="mui-user-name">
                        <a href="#" target="_blank" data-type="nameText">{{$extrainfo->fname}}</a>
                    </div>
                    <div class="mui-col-normal  mui-basic-info mui-col-first">
                        <div class="J-user-icon">
                            <div class="scc-bid-section-wrap">
                                <a href="#">
                                    <div class="mtl-num-part">
                                        <span class="J-totalNum mtl-num-big" title="0">0</span>
                                        <i class="flaticon-file-1"></i>
                                    </div>
                                    <span class="intro-content">pending order</span>
                                </a>
                                  
                            </div>
                        </div>
                        
                    </div>
                    <div class="mui-col-normal  mui-basic-info">
                        <div class="J-user-icon">
                            <div class="scc-bid-section-wrap">
                                <a href="#">
                                <div class="mtl-num-part">
                                        <span class="J-totalNum mtl-num-big" title="0">0</span>
                                        <i class="flaticon-file"></i>
                                    </div>
                                    <span class="intro-content">completed order</span>
                                </a>
                                
                            </div>
                        </div>
                        
                    </div>
                    <div class="mui-col-normal  mui-basic-info">
                        <div class="J-user-icon">
                            <div class="scc-bid-section-wrap">
                                <a href="#">
                                <div class="mtl-num-part">
                                        <span class="J-totalNum mtl-num-big" title="0">0</span>
                                        <i class="flaticon-file-2"></i>
                                    </div>
                                    <span class="intro-content">canceled order</span>
                                </a>
                                
                            </div>
                        </div>
                        
                    </div>
                    
                </div><!-- End userdash-right-->
            </div>
            <div is="null" class="list-module-wrap">
                <div class="J-scc-preference-entry-box-wrap">
                    <div class="pre-entry-box-text">
                        Hi <span class="J-span-username">{{$extrainfo->fname}}</span>. Please complete your personalized profile to enjoy carefully selected product recommendations, access to selected &amp; verified Trade Assurance sellers, and more.
                    </div>
                    <div class="pre-entry-box-action">
                        <a href="#" class="btn btn-primary open-door scc-preference-btn-medium" data-spm-anchor-id="">Personalize Now</a>
                    </div>
                </div>
                <!-- <div is="null" id="ta-list-head" class="list-module-head">
                    <div is="null" class="list-module-col1 list-module-col">customer name</div>
                    <div is="null" class="list-module-col2 list-module-col">order item</div>
                    <div is="null" class="list-module-col3 list-module-col">order date</div>
                    <div is="null" class="list-module-col4 list-module-col">total price</div>
                    <div is="null" class="list-module-col5 list-module-col">edit</div>
                </div> -->
                {{-- <div is="null" class="list-module-listempty">
                    <div is="null" class="list-module-listempty_title">
                        <i is="null" type="notice" class="fa fa-exclamation-circle list-module-listempty_titleicon" aria-hidden="true"></i><!-- react-text: 344 -->No results.
                        <!-- /react-text -->
                    </div>

                </div> --}}
            </div>
        
           {{--  <div class="oversea-user-profile-root">
                <div class="mui-personal-info">
                        <a class="mui-avatar-a" href="#" target="_blank" data-type="namePic">
                            <img class="mui-avatar" src="{{asset('images/avatar.png')}}">
                        </a>
                    <div class="mui-user-name">
                        <a href="#" target="_blank" data-type="nameText">Pranit</a>
                    </div>
                    <div class="mui-col-normal  mui-basic-info">
                        <div class="J-user-identity">
                            <div class="scc-bid-section-wrap">
                                <div class="scc-business-identity-wrap">
                                    <a target="_blank" href="#" class="scc-business-identity scc-bid-s scc-bid-c"></a>
                                    <a class="scc-business-identity-exp scc-bid-s" href="#" style="display: none;"></a>
                                </div>
                                <a class="J-text" href="#">verify</a>
                            </div>
                        </div>
                        <div class="J-user-verify col-content">

                            <div>
                                 Free Member 1st Year &nbsp;
                                 <a href="#" target="_blank">Upgrade</a>
                            </div>
                        </div>
                    </div>
                    <div class="mui-col-normal mui-favorite">
                        <a id="J-my-minsite" href="#" target="_blank" data-type="minsite">
                            My Minisite
                        </a>
                        <div class="col-content">
                            <a id="J-my-favorite" href="#" target="_blank" data-type="favorite">
                                My Favorites
                            </a>
                        </div>
                    </div>
                    <div class="mui-col-normal mui-business-card">
                        My Business Card
                        <div class="col-content">
                            <a id="J-received-cards" href="#" target="_blank" data-type="cardRecevied" title="Received 0">Received 0</a>
                            <span class="mui-vertical-line">|</span>
                            <a id="J-sent-cards" href="#" target="_blank" data-type="cardSent" title="Sent 0">Sent 0</a>
                        </div>
                    </div>
                    <div class="mui-col-normal mui-accu-voilations">
                        Accumulated Violations
                        <div class="col-content">
                            <a href="#" target="_blank" data-type="points">0 point(s)</a>
                            <span class="mui-vertical-line">|</span>
                            <a href="#" target="_blank" data-type="Times">0 time(s)</a>
                        </div>
                    </div>

                </div><!-- End userdash-right-->
            </div> 

            <div is="null" class="list-module-wrap">
                <div is="null" id="ta-list-head" class="list-module-head">
                    <div is="null" class="list-module-col1 list-module-col">customer name</div>
                    <div is="null" class="list-module-col2 list-module-col">order item</div>
                    <div is="null" class="list-module-col3 list-module-col">order date</div>
                    <div is="null" class="list-module-col4 list-module-col">total price</div>
                    <div is="null" class="list-module-col5 list-module-col">edit</div>
                </div>
                <div is="null" class="list-module-listempty">
                    <div is="null" class="list-module-listempty_title">
                        <i is="null" type="notice" class="fa fa-exclamation-circle list-module-listempty_titleicon" aria-hidden="true"></i><!-- react-text: 344 -->No results.
                        <!-- /react-text -->
                    </div>

                </div>
            </div> --}}
        </div>
    
    </div>
    <div class="col-sm-4 col-md-4 Rcontent-wrap">
        <div class="maui-row-right mt15">
            @include('frontend.user.includes.noticeboard')
            @include('frontend.user.includes.supplier')
        </div>
    </div>
            

@endsection