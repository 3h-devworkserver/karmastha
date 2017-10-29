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
    
    <title>@yield('title', $setting->title)</title>
    
    <meta name="title" content="@yield('meta_title', $setting->meta_title)" />
    <meta name="description" content="@yield('meta_description', $setting->meta_desc)" />
    <meta name="keyword" content="@yield('meta_keyword', $setting->meta_keyword)" />
    <meta name="author" content="@yield('meta_author', 'Karmastha')" />
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
    <meta name="twitter:card" content="@yield('tw_card', '')">
    <meta name="twitter:site" content="@yield('tw_site', '')">
    <meta name="twitter:title" content="@yield('tw_title', '')">
    <meta name="twitter:description" content="@yield('tw_desc', '')">
    <meta name="twitter:url" content="@yield('tw_url', '')">
    <meta name="twitter:image" content="@yield('tw_image', '')">
    <!-- Facebook -->
    <meta property="og:title" content="@yield('og_title', '')" />
    <meta property="og:description" content="@yield('og_desc', '')" />
    <meta property="og:url" content="@yield('og_url', '')" />
    <meta property="og:image" content="@yield('og_image', '')" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Styles -->
    @yield('before-styles')

    <!-- Check if the language is set to RTL, so apply the RTL layouts -->
    <!-- Otherwise apply the normal LTR layouts -->
    <!-- @langRTL
        {{ Html::style(getRtlCss(mix('css/frontend.css'))) }}
    @else
        {{ Html::style(mix('css/frontend.css')) }}
    @endif -->

    <!-- concatenate and minify for production -->
    {{-- <link rel="stylesheet" type="text/css" href="{{asset('css/frontend/font-awesome.min.css')}}">  --}}
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">

    <link href="https://fonts.googleapis.com/css?family=Arimo|Lato:300,400" rel="stylesheet"> 
    <link rel="stylesheet" type="text/css" href="{{asset('css/frontend/bootstrap.min.css')}}"> 
    <link rel="stylesheet" type="text/css" href="{{asset('css/frontend/sumoselect.css')}}">
    
    <link rel="stylesheet" type="text/css" href="{{asset('font/flaticon.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/frontend/ap-drilldown-menu.css')}}">
    {{ Html::style('css/backend/plugin/datatables/dataTables.bootstrap.min.css') }}
    <link rel="stylesheet" type="text/css" href="{{asset('css/dashboard/userdash.css')}}">
    <link rel="stylesheet" href="{{asset('css/frontend/style.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('css/dashboard/dashboard-style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/frontend/responsive.css')}}">

    @yield('after-styles')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="{{asset('js/dashboard/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/dashboard/jquery.flexisel.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/backend/jquery.validate.js')}}"></script>
    <script>
        var base_url = '{{ URL::to("") }}';
        var full_current_url = '{{ URL::full() }}';
        var current_url = '{{ URL::current() }}';
    </script>
    @if(!empty($setting))
        @if(!empty($setting->misc_javascript))
            {!! $setting->misc_javascript !!}
        @endif
    @endif
</head>

<body class="{{$class}}">

<div class="main-container dashdb">
    @include('frontend.includes.header')
</div>
    <div class="userdashboard">
        <main class="cd-main-content">

            @include('frontend.user.includes.sidebar')
            <div class="dashboard-content">
                <div class="page-container">
                    <div class="row dash-Wcontent">
                        @yield('content')
                    </div>
                </div>
            </div> <!-- content-wrapper -->

        </main> <!-- cd-main-content -->

        <!-- Starts footer container -->
        @include('frontend.includes.footer')
        <!-- End footer Conainer -->
        
    </div>

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

{{ Html::script('js/dashboard/jquery.menu-aim.js') }}
<script src="{{asset('js/frontend/sumoselect.min.js')}}"></script>
  {{ Html::script("js/backend/plugin/datatables/jquery.dataTables.min.js") }}
{{ Html::script("js/backend/plugin/datatables/dataTables.bootstrap.min.js") }}

{{ Html::script('js/dashboard/dash_user_nav.js') }}

@yield('after-scripts')
{{ Html::script('js/dashboard/custom.js') }}

</body>
</html>