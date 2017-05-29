    <?php /* ?>
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

<?php */ ?>

<!doctype html>

<!--[if lt IE 7 ]> <html class="ie ie6 ie-lt10 ie-lt9 ie-lt8 ie-lt7 no-js" lang="en"> <![endif]-->
<!--[if IE 7 ]>    <html class="ie ie7 ie-lt10 ie-lt9 ie-lt8 no-js" lang="en"> <![endif]-->
<!--[if IE 8 ]>    <html class="ie ie8 ie-lt10 ie-lt9 no-js" lang="en"> <![endif]-->
<!--[if IE 9 ]>    <html class="ie ie9 ie-lt10 no-js" lang="en"> <![endif]-->
<!--[if gt IE 9]><!--><html class="no-js" lang="en"><!--<![endif]-->
<!-- the "no-js" class is for Modernizr. --> 

<head id="www-sitename-com" data-template-set="html5-reset">

    <meta charset="utf-8">
    
    <!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    
    <title>Home || Page</title>
    
    <meta name="title" content="@yield('title', $setting->meta_title)" />
    <meta name="description" content="@yield('description', $setting->meta_desc)" />
    <meta name="keyword" content="@yield('keyword', $setting->meta_keyword)" />
    <meta name="author" content="@yield('author', 'Karmastha')" />
    <!-- Google will often use this as its description of your page/site. Make it good. -->
    
    <meta name="google-site-verification" content="" />
    <!-- Speaking of Google, don't forget to set your site up: http://google.com/webmasters -->
    
    <meta name="Copyright" content="" />
    
    <!--  Mobile Viewport Fix
    http://j.mp/mobileviewport & http://davidbcalhoun.com/2010/viewport-metatag
    device-width : Occupy full width of the screen in its current orientation
    initial-scale = 1.0 retains dimensions instead of zooming out if page height > device height
    maximum-scale = 1.0 retains dimensions instead of zooming in if page width < device width
    -->
    <!-- Uncomment to use; use thoughtfully!
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    -->

    <!-- Iconifier might be helpful for generating favicons and touch icons: http://iconifier.net -->
    <link rel="shortcut icon" href="@if(!empty($setting->favicon)){{asset('images/logo/favicon/'.$setting->favicon)}} @endif" />
    <!-- This is the traditional favicon.
         - size: 16x16 or 32x32
         - transparency is OK -->
         
    <link rel="apple-touch-icon" href="@if(!empty($setting->favicon)){{asset('images/logo/favicon/'.$setting->favicon)}} @endif" />
    <!-- The is the icon for iOS's Web Clip and other things.
         - size: 57x57 for older iPhones, 72x72 for iPads, 114x114 for retina display (IMHO, just go ahead and use the biggest one)
         - To prevent iOS from applying its styles to the icon name it thusly: apple-touch-icon-precomposed.png
         - Transparency is not recommended (iOS will put a black BG behind the icon) -->
    
    <!-- This is an un-minified, complete version of Modernizr. 
         Before you move to production, you should generate a custom build that only has the detects you need. -->
    
    <script src="{{asset('js/frontend/modernizr-2.6.2.dev.js')}}"></script>
    
    <!-- Application-specific meta tags -->
    <!-- Windows 8 -->
    <meta name="application-name" content="" /> 
    <meta name="msapplication-TileColor" content="" /> 
    <meta name="msapplication-TileImage" content="" />
    <!-- Twitter -->
    <meta name="twitter:card" content="">
    <meta name="twitter:site" content="">
    <meta name="twitter:title" content="">
    <meta name="twitter:description" content="">
    <meta name="twitter:url" content="">
    <!-- Facebook -->
    <meta property="og:title" content="" />
    <meta property="og:description" content="" />
    <meta property="og:url" content="" />
    <meta property="og:image" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Styles -->
    @yield('before-styles')

    <!-- Check if the language is set to RTL, so apply the RTL layouts -->
    <!-- Otherwise apply the normal LTR layouts -->
    @langRTL
        {{ Html::style(getRtlCss(mix('css/frontend.css'))) }}
    @else
        {{ Html::style(mix('css/frontend.css')) }}
    @endif

    <!-- concatenate and minify for production -->
    {{-- <link rel="stylesheet" type="text/css" href="{{asset('css/frontend/font-awesome.min.css')}}"> --}}

   {{--  <link href="https://fonts.googleapis.com/css?family=Arimo|Lato:300,400" rel="stylesheet"> 
    <link rel="stylesheet" type="text/css" href="{{asset('css/frontend/bootstrap.min.css')}}"> --}}

    <link rel="stylesheet" type="text/css" href="{{asset('css/frontend/jquery.fancybox.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/frontend/slick.css')}}">
    <link rel="stylesheet" href="{{asset('css/frontend/style.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('css/frontend/responsive.css')}}">

    @yield('after-styles')
    <script src="{{asset('js/frontend/jquery-1.9.1.min.js')}}"></script>

    <!-- <scrip  src="//cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.5/ScrollMagic.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.5/plugins/debug.addIndicators.min.js"></script> -->
   <!--  <scrip type="text/javascript" src="assets/js/ScrollMagic.js"></script>
   <script type="text/javascript" src="assets/js/debug.addIndicators.js"></script>
   <script type="text/javascript" src="assets/js/TweenMax.min.js"></script>
   <script type="text/javascript" src="assets/js/animation.gsap.js"></script> -->
     <!-- <script type="text/javascript" src="assets/js/parallex.min.js"></script>  -->

    <script src="{{asset('js/frontend/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/frontend/jquery.flexisel.js')}}"></script>
    @if(!empty($setting))
        @if(!empty($setting->misc_javascript))
            {!! $setting->misc_javascript !!}
        @endif
    @endif
    
</head>

<body class="{{$class}}">

<div class="main-container">
    @include('frontend.includes.header')
</div>
    <div class="wrapper">
        @yield('content')

        <!-- Starts footer container -->
        @include('frontend.includes.footer')
        <!-- Ends footer container -->

    </div>

       <!-- End footer Conainer -->
        
    
<!-- Prompt IE 6 users to install Chrome Frame. Remove this if you support IE 6.
         http://chromium.org/developers/how-tos/chrome-frame-getting-started -->
<!--[if lt IE 7]><p class=chromeframe>Your browser is <em>ancient!</em> <a href="http://browsehappy.com/">Upgrade to a different browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to experience this site.</p><![endif]-->

<!-- Grab Google CDN's jQuery. fall back to local if necessary -->
<!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script>window.jQuery || document.write("<script src='assets/js/jquery-1.9.1.min.js'>\x3C/script>")</script>
 -->
<!-- this is where we put our custom functions -->
<!-- don't forget to concatenate and minify if needed -->

<!-- <script src="assets/js/functions.js"></script> -->

<!-- Scripts -->
@yield('before-scripts')

<!-- jquery.nivo.slider js -->
<script src="{{asset('js/frontend/jquery.nivo.slider.js')}}"></script>
<!-- All js plugins included in this file. -->
<script src="{{asset('js/frontend/plugins.js')}}"></script>
<script src="{{asset('js/frontend/main.js')}}"></script>
<script src="{{asset('js/frontend/custom.js')}}"></script>

@yield('after-scripts')

<!-- <script type="text/javascript">

    $(function () { // wait for document ready
                            // init
                            var controller = new ScrollMagic.Controller();

                            // define movement of panels
                            var wipeAnimation = new TimelineMax()
                                // animate to second panel
                                .to("#slideContainer", 0.5, {z: -150})      // move back in 3D space
                                .to("#slideContainer", 1,   {x: "-25%"})    // move in to first panel
                                .to("#slideContainer", 0.5, {z: 0})             // move back to origin in 3D space
                                // animate to third panel
                                .to("#slideContainer", 0.5, {z: -150, delay: 1})
                                .to("#slideContainer", 1,   {x: "-50%"})
                                .to("#slideContainer", 0.5, {z: 0})
                                // animate to forth panel
                                .to("#slideContainer", 0.5, {z: -150, delay: 1})
                                .to("#slideContainer", 1,   {x: "-75%"})
                                .to("#slideContainer", 0.5, {z: 0});

                            // create scene to pin and link animation
                            new ScrollMagic.Scene({
                                    triggerElement: "#pinContainer",
                                    triggerHook: "onLeave",
                                    duration: "500%"
                                })
                                .setPin("#pinContainer")
                                .setTween(wipeAnimation)
                                .addIndicators() // add indicators (requires plugin)
                                .addTo(controller);
                        });

</script> -->
<!-- Asynchronous google analytics; this is the official snippet.
     Replace UA-XXXXXX-XX with your site's ID and uncomment to enable.
     
<script>

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-XXXXXX-XX']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
-->

@include('includes.partials.ga')
  
</body>
</html>


