<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', "Aryan's den") }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('images/favicons.ico/favicon-96x96.png') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
    @stack('styles')
</head>
<body class="bg-pure-white h-screen antialiased leading-none">
<div id="app" class="grad">
    @include('partials.flash-notification')

    @yield('body')
</div>

    @include('partials.footer')

    @stack('scripts')
</body>
</html>
