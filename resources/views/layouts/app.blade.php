<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('pageTitle') - Legoland Doetinchem</title>
    <link href="{{ asset('styles/app.css') }}" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="{{ asset('images/favicon.ico') }}">
</head>
<body>
<div id="header">
    @include('partials.header')
</div>
<div class="site-content" id="main">
    @yield('content')
</div>
<div id="footer">
    @include('partials.footer')
</div>
<script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/manifest.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/vendor.js') }}"></script>
<script src="https://kit.fontawesome.com/819c0dbdc7.js" crossorigin="anonymous"></script>
</body>
