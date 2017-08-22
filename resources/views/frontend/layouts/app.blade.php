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

  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />

  <!-- Iconifier might be helpful for generating favicons and touch icons: http://iconifier.net -->
    <link rel="shortcut icon" href="@if(!empty($setting->favicon)){{asset('images/logo/favicon/'.$setting->favicon)}} @endif" />
    <!-- This is the traditional favicon.
         - size: 16x16 or 32x32
         - transparency is OK -->
         
    <link rel="apple-touch-icon" href="@if(!empty($setting->favicon)){{asset('images/logo/favicon/'.$setting->favicon)}} @endif" />
  
  <!-- Styles -->
  @yield('before-styles')

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="{{asset('css/frontend/bootstrap.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('font/flaticon.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('css/frontend/la-fonts.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('css/frontend/ap-drilldown-menu.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('css/frontend/xzoom.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('css/frontend/nprogress.css')}}">

  <!-- Styles -->
  @yield('after-styles')
  
  <link rel="stylesheet" type="text/css" href="{{asset('css/frontend/style.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('css/frontend/responsive.css')}}">
  <link href="https://fonts.googleapis.com/css?family=Arimo|Lato:300,400" rel="stylesheet">
<script>
        var base_url = '{{ URL::to("") }}';
        var full_current_url = '{{ URL::full() }}';
        var current_url = '{{ URL::current() }}';
    </script>
</head>

<body id="{{!empty($class)? $class : ''}}">

@include('frontend.includes.header')

@yield('content')

@include('frontend.includes.footer')

<!-- Scripts -->
@yield('before-scripts')
<script src="{{asset('js/frontend/jquery.min.js')}}"></script>
<script src="{{asset('js/frontend/bootstrap.js')}}"></script>
<script src="{{asset('js/frontend/owl.carousel.js')}}"></script>
<script src="{{asset('js/frontend/script.js')}}"></script>
<script src="{{asset('js/frontend/slider-menu.jquery.js')}}"></script>
<script src="{{asset('js/frontend/ap-drilldown-menu.min.js')}}"></script>
<script src="{{asset('js/frontend/zoom-setup.js')}}"></script>
<script src="{{asset('js/frontend/xzoom.min.js')}}"></script>
{{-- {{ Html::script('js/frontend/jquery.validate.js') }} --}}
 {!! Html::script('jquery-validation-1.15.0/dist/jquery.validate.js') !!}
<script src="{{asset('js/frontend/nprogress.js')}}"></script>
<script src="{{asset('js/frontend/custom.js')}}"></script>

<script type="text/javascript">
  function openNav() {
    document.getElementById("mySidenav").style.width = "100%";
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
}
</script>
 
<script type="text/javascript">
  $(function() {
    $('#menu').apDrillDownMenu({
    });
  });
</script>

@yield('after-scripts')




</body>
</html>
