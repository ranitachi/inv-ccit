<!DOCTYPE HTML>
<html lang="en">
    <head>
        <!--=============== basic  ===============-->
        <meta charset="UTF-8">
        <title>
            @yield('title') - {{ config('app.name') }}</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <meta name="robots" content="index, follow"/>
        <meta name="keywords" content=""/>
        <meta name="description" content=""/>
        {{-- <meta http-equiv="Content-Security-Policy" content="style-src self"> --}}
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <!--=============== css  ===============-->	
        <link type="text/css" rel="stylesheet" href="{{ asset('backend') }}/css/reset.css">
        <link type="text/css" rel="stylesheet" href="{{ asset('backend') }}/css/plugins.css">
        <link type="text/css" rel="stylesheet" href="{{ asset('backend') }}/css/style.css">
        <link type="text/css" rel="stylesheet" href="{{ asset('backend') }}/css/color.css">
        <link type="text/css" rel="stylesheet" href="{{ asset('css') }}/css.css">
        <link type="text/css" rel="stylesheet" href="{{ asset('css') }}/csp.css">
        <link rel="stylesheet" href="{{ asset('theme') }}/assets/css/bootstrap.css">
        <!--=============== favicons ===============-->
        <link rel="shortcut icon" href="{{ asset('images') }}/favicon.ico">
        

        @yield('csslink')

        <!-- Matomo -->
        {{-- <script type="text/javascript">
        var _paq = window._paq = window._paq || [];
        /* tracker methods like "setCustomDimension" should be called before "trackPageView" */
        _paq.push(['trackPageView']);
        _paq.push(['enableLinkTracking']);
        (function() {
            var u="//monapp.tangerangkab.go.id/";
            _paq.push(['setTrackerUrl', u+'matomo.php']);
            _paq.push(['setSiteId', '5']);
            var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
            g.type='text/javascript'; g.async=true; g.src=u+'matomo.js'; s.parentNode.insertBefore(g,s);
        })();
        </script> --}}
        <!-- End Matomo Code -->
    </head>
    <body>
        <!--loader-->
        <div class="loader-wrap">
            <div class="pin"></div>
            <div class="pulse"></div>
        </div>
        <!--loader end-->
        <!-- Main  -->
        <div id="main">
            <!-- header-->
            @include('frontend.includes.header')
            <!--  header end -->	
            <!-- Content-->   
            {{-- @include('frontend.includes.slider') --}}
            @yield('slider')
            <!-- Content end--> 				
            <!-- wrapper -->	
            <div id="wrapper" class="no-padding">
                <!-- Content-->   
                @yield('content')
                <!-- Content end -->      
            </div>
            <!-- wrapper end -->
            <!--footer -->
            @include('frontend.includes.footer')
            <!--footer end  -->
            <!--register form -->
           
            <!--register form end -->
            <a class="to-top"><i class="fa fa-angle-up"></i></a>
        </div>
        <!-- Main end -->
        <!--=============== scripts  ===============-->
        
        <script type="text/javascript"  src="{{ asset('backend') }}/js/jquery.min.js"></script>
        <script type="text/javascript"  src="{{ asset('backend') }}/js/plugins.js"></script>
        <script type="text/javascript"  src="{{ asset('backend') }}/js/scripts.js"></script>
        @yield('script')
        @yield('modal')
    </body>
</html>