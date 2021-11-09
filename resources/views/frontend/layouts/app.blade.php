<!DOCTYPE html>
@langrtl
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl">
@else
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@endlangrtl
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>@yield('title', app_name())</title>
        <meta name="description" content="@yield('meta_description', 'Laravel Boilerplate')">
        <meta name="author" content="@yield('meta_author', 'Anthony Rappa')">
        @yield('meta')

        {{-- See https://laravel.com/docs/5.5/blade#stacks for usage --}}
        @stack('before-styles')


        <link rel="manifest" href="{{url('manifest.json')}}">
        <!-- Add to homescreen for Chrome on Android -->
        <meta name="mobile-web-app-capable" content="yes">
        <meta name="application-name" content="AMC Holidays">
        <link rel="icon" sizes="192x192" href="{{url('img/frontend/chrome-touch-icon-192x192.png')}}">
        <!-- Add to homescreen for Safari on iOS -->
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <meta name="apple-mobile-web-app-title" content="AMC Holidays">
        <link rel="apple-touch-icon" href="{{url('img/frontend/apple-touch-icon.png')}}">
        <!-- Tile icon for Win8 (144x144 + tile color) -->
        <!-- <meta name="msapplication-TileImage" content="images/touch/ms-touch-icon-144x144-precomposed.png"> -->
        <meta name="msapplication-TileColor" content="#2F3BA2">
        <!-- Color the status bar on mobile devices -->
        <meta name="theme-color" content="#2F3BA2">
        <link rel="stylesheet" href="{{url('css/site/font-awesome.min.css')}}">
        <link rel="stylesheet" href="{{url('css/site/owl.carousel.css')}}">
        <link rel="stylesheet" href="{{url('css/site/base.css')}}">
        <link rel="stylesheet" href="{{url('css/site/main.css')}}">
        <link rel="stylesheet" href="{{url('css/site/responsiveslides.css')}}">
        <link rel="stylesheet" href="{{url('css/site/venobox.css')}}">
        <link rel="stylesheet" href="{{url('css/site/inner.css')}}">


        <!-- Check if the language is set to RTL, so apply the RTL layouts -->
        <!-- Otherwise apply the normal LTR layouts -->
        {{ style(mix('css/frontend.css')) }}

        @stack('after-styles')
    </head>
    <body>
        @include('includes.partials.read-only')

        <div id="app">

            @include('includes.partials.logged-in-as')
            @include('frontend.includes.nav')

            <div class="container" style="padding:200px 0 100px 0">
                @include('includes.partials.messages')
                @yield('content')
            </div>

            @include('frontend.includes.footer')

        </div><!-- #app -->

        <!-- Scripts -->
        @stack('before-scripts')
        {!! script(mix('js/manifest.js')) !!}
        {!! script(mix('js/vendor.js')) !!}
        {!! script(mix('js/frontend.js')) !!}

        <!-- scripts-->
        <script src="{{url('js/site/jquery-3.1.0.min.js')}}"></script>
        <script src="{{url('js/site/jquery-migrate-1.4.1.min.js')}}"></script>
        <script src="{{url('js/site/angular.min.js')}}"></script>
        <script src="{{url('js/site/angular-route.min.js')}}"></script>
        <script src="{{url('js/site/owl.carousel.min.js')}}"></script>
        <script src="{{url('js/site/responsiveslides.js')}}"></script>
        <script src="{{url('js/site/angular-sanitize.min.js')}}"></script>
        <script src="http://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
        <script src="{{url('js/site/ng-map.min.js')}}"></script>
        <script src='https://www.google.com/recaptcha/api.js'></script>
        <script src="{{url('js/site/venobox.min.js')}}"></script>
        <script src="{{url('js/site/site.js')}}"></script>
        <script src="{{url('js/site/app.js')}}"></script>
        <script type="text/javascript">
            function googleTranslateElementInit() {
                new google.translate.TranslateElement({pageLanguage: 'en', includedLanguages: 'de,en,es,fr,zh-CN', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
            }
        </script>
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-120280238-1"></script>
        <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-120280238-1');
        </script>


        @stack('after-scripts')

        @include('includes.partials.ga')
    </body>
</html>
