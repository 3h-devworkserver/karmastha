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
  <!-- <title>Karmastha || Best Ecommerce Site In Nepal</title> -->
  <title>@yield('title', $setting->title)</title>
    
  <meta name="title" content="@yield('meta_title', $setting->meta_title)" />
  <meta name="description" content="@yield('meta_description', $setting->meta_desc)" />
  <meta name="keyword" content="@yield('meta_keyword', $setting->meta_keyword)" />
  <meta name="author" content="@yield('meta_author', 'Karmastha')" />

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

  <!-- Styles -->
  @yield('before-styles')

  <!-- Check if the language is set to RTL, so apply the RTL layouts -->
  <!-- Otherwise apply the normal LTR layouts -->
  @langRTL
      {{ Html::style(getRtlCss(mix('css/frontend.css'))) }}
  @else
      {{ Html::style(mix('css/frontend.css')) }}
  @endif
  
  {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css"> --}}
  <link rel="stylesheet" type="text/css" href="{{asset('css/frontend/bootstrap.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('font/flaticon.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('css/frontend/la-fonts.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('css/frontend/style.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('css/frontend/responsive.css')}}">

  <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700italic,700,800,800italic' rel='stylesheet' type='text/css'>
</head>
<body>

@include('frontend.includes.header')

@yield('content')




@include('frontend.includes.footer')

<!-- Scripts -->
@yield('before-scripts')

<script src="{{asset('js/frontend/jquery.min.js')}}"></script>
<script src="{{asset('js/frontend/bootstrap.js')}}"></script>
<script src="{{asset('js/frontend/owl.carousel.js')}}"></script>
<script src="{{asset('js/frontend/script.js')}}"></script>

@yield('after-scripts')

</body>
</html>
