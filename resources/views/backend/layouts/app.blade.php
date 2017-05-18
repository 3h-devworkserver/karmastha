<!doctype html>
<html class="no-js" lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title', app_name())</title>

        <!-- Meta -->
        <meta name="description" content="@yield('meta_description', 'Karmastha')">
        <meta name="author" content="@yield('meta_author', 'Three Hammers')">
        @yield('meta')

        <!-- Styles -->
        @yield('before-styles')

        <!-- Check if the language is set to RTL, so apply the RTL layouts -->
        <!-- Otherwise apply the normal LTR layouts -->
        @langRTL
            {{ Html::style(getRtlCss(mix('css/backend.css'))) }}
        @else
            {{ Html::style(mix('css/backend.css')) }}
        @endif
        {{-- {{ Html::style('https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css')}} --}}
        {{ Html::style('css/backend/plugin/datatables/dataTables.bootstrap.min.css') }}

        @yield('after-styles')
        {{ Html::style('css/backend/skin-orange.css') }}
        <!-- iCheck -->
        {{-- {!! Html::style('css/orange.css') !!} --}}
        {{ Html::style('css/backend/style.css') }}

        <!-- Html5 Shim and Respond.js IE8 support of Html5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        {{ Html::script('https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js') }}
        {{ Html::script('https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js') }}
        <![endif]-->

        <!-- Scripts -->
        <script>
            window.Laravel = <?php echo json_encode([
                'csrfToken' => csrf_token(),
            ]); ?>
        </script>
        <script>
          var base_url = '{{ URL::to("") }}';
          var full_current_url = '{{ URL::full() }}';
          var current_url = '{{ URL::current() }}';
        </script>
    </head>
    <body class="skin-{{ config('backend.theme') }} {{ config('backend.layout') }}">
        @include('includes.partials.logged-in-as')

        <div class="wrapper">
            @include('backend.includes.header')
            @include('backend.includes.sidebar')

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    @yield('page-header')

                    {{-- Change to Breadcrumbs::render() if you want it to error to remind you to create the breadcrumbs for the given route --}}
                    {!! Breadcrumbs::renderIfExists() !!}
                </section>

                <!-- Main content -->
                <section class="content">
                    @include('includes.partials.messages')
                    @yield('content')
                </section><!-- /.content -->
            </div><!-- /.content-wrapper -->

            @include('backend.includes.footer')
        </div><!-- ./wrapper -->

        <!-- JavaScripts -->
        @yield('before-scripts')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"></script>
        {{-- {{ Html::script('js/app.js') }} --}}
        {{ Html::script(mix('js/backend.js')) }}
        <script src="http://malsup.github.com/jquery.form.js"></script>
 {{ Html::script("js/backend/plugin/datatables/jquery.dataTables.min.js") }}
    {{ Html::script("js/backend/plugin/datatables/dataTables.bootstrap.min.js") }}
        @yield('after-scripts')
        {{-- {{ Html::script('js/backend/icheck.min.js') }} --}}
        {{ Html::script('js/backend/custom.js') }}
        {{ Html::script('js/backend/slider.js') }}

    </body>
</html>