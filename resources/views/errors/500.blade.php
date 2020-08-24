<!DOCTYPE HTML>
<html lang="en">
    <head>
        <!--=============== basic  ===============-->
        <meta charset="UTF-8">
        <title>
            404 Not Found - {{ config('app.name') }}</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <meta name="robots" content="index, follow"/>
        <meta name="keywords" content=""/>
        <meta name="description" content=""/>
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <!--=============== css  ===============-->	
        <link type="text/css" rel="stylesheet" href="{{ asset('backend') }}/css/reset.css">
        <link type="text/css" rel="stylesheet" href="{{ asset('backend') }}/css/plugins.css">
        <link type="text/css" rel="stylesheet" href="{{ asset('backend') }}/css/style.css">
        <link type="text/css" rel="stylesheet" href="{{ asset('backend') }}/css/color.css">
        <link type="text/css" rel="stylesheet" href="{{ asset('css') }}/css.css">
        <!--=============== favicons ===============-->
        <link rel="shortcut icon" href="{{ asset('images') }}/favicon.ico">
        <link href="https://fonts.googleapis.com/css?family=Cabin:400,700" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Montserrat:900" rel="stylesheet">
        <link href="https://colorlib.com/etc/404/colorlib-error-404-3/css/style.css" rel="stylesheet">

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

            <div id="">
                <!-- Content-->   
                <div class="">
                    <section>
                        <div class="">
                            <div id="notfound" style="margin-top:-100px;">
                            <div class="notfound">
                            <div class="notfound-404">
                            <h3>Oops! Terjadi Kesalahan Teknis,</h3>
                            <h1><span>5</span><span>0</span><span>0</span></h1>
                            </div>
                            <h2>silahkan coba beberapa saat lagi</h2>
                            <a href="{{ url('/') }}" class="btn color-bg flat-btn pull-right">Kembali Ke Beranda</a>
                            </div>
                            </div>
                        </div>
                    </section>
                </div>
                   
                <!-- Content end -->      
            </div>
            <!-- wrapper end -->
            <!--footer -->
             <footer class="main-footer dark-footer" style="padding-top:0px !important;bottom:0px !important;">
                    <div class="sub-footer fl-wrap" style="margin-top:0px !important">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-8 text-left">
                                    <div class="copyright text-left"> &#169; {{ config('app.name') }} 2020 .  Powered By Dinas Komunikasi dan Informatika (Diskominfo) Kabupaten Tangerang.</div>
                                </div>
                                <div class="col-md-4">
                                    <div class="footer-social">
                                        <ul>
                                            <li><a href="#" target="_blank" ><i class="fa fa-facebook-official"></i></a></li>
                                            <li><a href="#" target="_blank"><i class="fa fa-twitter"></i></a></li>
                                            <li><a href="#" target="_blank" ><i class="fa fa-whatsapp"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>
            <!--footer end  -->
            <!--register form -->
           
            <!--register form end -->
            <a class="to-top"><i class="fa fa-angle-up"></i></a>
        </div>
        <!-- Main end -->
        <!--=============== scripts  ===============-->
        <script type="text/javascript" src="{{ asset('backend') }}/js/jquery.min.js"></script>
        <script type="text/javascript" src="{{ asset('backend') }}/js/plugins.js"></script>
        <script type="text/javascript" src="{{ asset('backend') }}/js/scripts.js"></script>
        @yield('script')
        @yield('modal')
    </body>
</html>