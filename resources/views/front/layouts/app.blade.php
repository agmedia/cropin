<!DOCTYPE html>
<html dir="ltr" lang="{{ config('app.locale') }}">

<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="x-ua-compatible" content="IE=edge">
    <meta name="author" content="AG media">
    <title>@yield('title')</title>
    <meta name="description" content="@yield('description')">
    <base href="{{ config('app.url') }}">
    <!-- Font Imports -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&family=Source+Sans+Pro:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('media/image/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('media/image/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('media/image/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('media/image/site.webmanifest') }}">
    <link rel="mask-icon" href="{{ asset('media/image/safari-pinned-tab.svg') }}" color="#2f3b59">
    <meta name="msapplication-TileColor" content="#2f3b59">
    <meta name="theme-color" content="#2f3b59">
    @stack('meta_tags')
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset('css/plugins.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset('css/style.css?v=2') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset('css/color.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset('css/mmenu.css') }}">
    @stack('css_after')
    <style>
        [v-cloak] { display:none !important; }
    </style>
    <style>  #menu:not( .mm-menu ) {display: none;}</style>
</head>

@if (config('app.env') == 'production')
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-XWLJRC4F1R"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-XWLJRC4F1R');
    </script>
@endif
<!-- Body-->
<body>
<div class="loader-wrap">
    <div class="pin"></div>
    <div class="pulse"></div>
</div>
<div id="page">
    @include('front.layouts.partials.header')
    @yield('content')
    @include('front.layouts.partials.footer')
    <a class="to-top"><i class="fa fa-angle-up"></i></a>
</div>



<!-- Javascript Files -->
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/plugins.js') }}"></script>
<script src="{{ asset('js/scripts.js') }}"></script>
<script src="https://maps.googleapis.com/maps/api/js?key={{env('GOOGLE_API_KEY')}}&libraries=places&callback=initAutocomplete"></script>
<script type="text/javascript" src="{{ asset('js/map_infobox.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/markerclusterer.js') }}"></script>
<script src="{{ asset('js/mmenu.js') }}"></script>
<!-- Fire the plugin -->
<script>
    document.addEventListener(
        "DOMContentLoaded", () => {
            new Mmenu( "#menu", {
                "navbars": [
                    {
                        "position": "top",
                        "content": [
                            "searchfield",

                        ]
                    }
                ],
                "navbar": {
                    title: "Menu",
                },

                "searchfield": {
                "placeholder": "{{ __('back/apartment.searchname') }}"
            },
                "offCanvas": {
                    "position": "bottom"
                },
                "theme": "dark"

            }, {
                // configuration
                offCanvas: {
                    page: {
                        selector: "#page"
                    }
                },
                scrollBugFix: {
                    fix: true
                },

            } );
        }
    );
</script>
@stack('js_after')
</body>
</html>
