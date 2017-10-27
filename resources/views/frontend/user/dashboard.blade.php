@extends('frontend.user.layouts.frontend-app')

@section ('title', 'Dashboard')

@section('content')

    <div class="col-sm-8 col-md-8">
        
        @include('includes.partials.messages')

        <div class="userdash-right">
        
            <div class="oversea-user-profile-root">
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