<!DOCTYPE html>
<html lang="en">
<!-- [Head] start -->
<head>
    <title>Login | CroPins</title>
    <!-- [Meta] -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="CroPins - Croatian Clubs, Bars, Food and Fun.">

    <meta name="author" content="AG media">

    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('media/image/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('media/image/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('media/image/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('media/image/site.webmanifest') }}">
    <link rel="mask-icon" href="{{ asset('media/image/safari-pinned-tab.svg') }}" color="#2f3b59">
    <meta name="msapplication-TileColor" content="#2f3b59">
    <meta name="theme-color" content="#2f3b59">


    <link rel="stylesheet" href="{{ asset('assets/back/fonts/inter/inter.css') }}" id="main-font-link" />
    <!-- [Tabler Icons] https://tablericons.com -->
    <link rel="stylesheet" href="{{ asset('assets/back/fonts/tabler-icons.min.css') }}" >
    <!-- [Feather Icons] https://feathericons.com -->
    <link rel="stylesheet" href="{{ asset('assets/back/fonts/feather.css') }}" >
    <!-- [Font Awesome Icons] https://fontawesome.com/icons -->
    <link rel="stylesheet" href="{{ asset('assets/back/fonts/fontawesome.css') }}" >
    <!-- [Material Icons] https://fonts.google.com/icons -->
    <link rel="stylesheet" href="{{ asset('assets/back/fonts/material.css') }}" >
    <!-- [Template CSS Files] -->
    <link rel="stylesheet" href="{{ asset('assets/back/css/style.css') }}" id="main-style-link" >
    <link rel="stylesheet" href="{{ asset('assets/back/css/style-preset.css') }}" >

    <script>window.Laravel = {!! json_encode(['csrfToken' => csrf_token(),]) !!};</script>
</head>
<!-- [Head] end -->

<!-- [Body] Start -->
<body data-pc-preset="preset-1" data-pc-sidebar-caption="true" data-pc-direction="ltr" data-pc-theme_contrast="" data-pc-theme="light">
<!-- [ Pre-loader ] start -->
<div class="loader-bg">
    <div class="loader-track">
        <div class="loader-fill"></div>
    </div>
</div>
<!-- [ Pre-loader ] End -->

<div class="auth-main">
    <div class="auth-wrapper v2">

        <div class="auth-sidecontent">
            <img src="{{ asset('assets/back/images/login-bck.png') }}" alt="images"
                 class="img-fluid img-auth-side">
        </div>

        <div class="auth-form">
            @if (session('status'))
                <div class="mb-4 font-medium text-sm text-green-600">
                    {{ session('status') }}
                </div>
            @endif
            <div class="card my-5">
                <div class="card-body">
                    <div class="text-center">
                        <a href="{{ route('index') }}"><img src="{{ asset('assets/back/images/socializer-dark.svg') }}" style="max-width:160px" alt="img"></a>
                    </div>

                    @yield('content')
                </div>
            </div>
        </div>
    </div>
</div>
<!-- [ Main Content ] end -->
<!-- Required Js -->
<script src="{{ asset('assets/back/js/plugins/popper.min.js') }}"></script>
<script src="{{ asset('assets/back/js/plugins/simplebar.min.js') }}"></script>
<script src="{{ asset('assets/back/js/plugins/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/back/js/fonts/custom-font.js') }}"></script>
<script src="{{ asset('assets/back/js/pcoded.js') }}"></script>
<script src="{{ asset('assets/back/js/plugins/feather.min.js') }}"></script>

</body>
<!-- [Body] end -->
</html>
