<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title>Mega App</title>
    <!-- CSS files -->
    <link href="{{ asset('dist/css/tabler.min.css?1738096685') }}" rel="stylesheet"/>
    <link href="{{ asset('dist/css/tabler-icons.min.css?1738096685') }}" rel="stylesheet"/>
    <link href="{{ asset('dist/css/custom.css?1738096685') }}" rel="stylesheet"/>
    <link href="{{ asset('dist/css/tabler-flags.min.css?1738096685') }}" rel="stylesheet"/>
    <link href="{{ asset('dist/css/tabler-socials.min.css?1738096685') }}" rel="stylesheet"/>
    <link href="{{ asset('dist/css/tabler-payments.min.css?1738096685') }}" rel="stylesheet"/>
    <link href="{{ asset('dist/css/tabler-vendors.min.css?1738096685') }}" rel="stylesheet"/>
    <link href="{{ asset('dist/css/tabler-marketing.min.css?1738096685') }}" rel="stylesheet"/>
    <link href="{{ asset('dist/css/demo.min.css?1738096685') }}" rel="stylesheet"/>
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('static/favicon.ico') }}">
    <link rel="apple-touch-icon" href="{{ asset('static/apple-touch-icon.png') }}">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{ asset('static/apple-touch-icon-114x114-precomposed.png') }}">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{ asset('static/apple-touch-icon-72x72-precomposed.png') }}">
    <link rel="apple-touch-icon-precomposed" href="{{ asset('static/apple-touch-icon-precomposed.png') }}">
    <style>
        @import url('https://rsms.me/inter/inter.css');
    </style>
</head>
<body>
<script src="{{ asset('dist/js/demo-theme.min.js?1738096685') }}"></script>
<div class="page">
    <!-- Navbar -->
    @include('layouts.navbar')
    <div class="page-wrapper">
        <!-- Page header -->
        @yield('page-header')
        <!-- Page body -->
        <div class="page-body">
            <div class="container-xl">
                @yield('content')
            </div>
        </div>
        @include('layouts.footer')
    </div>
</div>
<!-- Libs JS -->
@yield('libs')
<!-- Tabler Core -->
<script src="{{ asset('dist/js/tabler.min.js?1738096685') }}" defer></script>
<script src="{{ asset('dist/js/demo.min.js?1738096685') }}" defer></script>

@yield('bottom-script')
</body>
</html>
