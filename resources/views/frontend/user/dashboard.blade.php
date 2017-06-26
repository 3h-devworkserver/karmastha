@extends('frontend.user.layouts.frontend-app')

@section ('title', 'Dashboard')

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