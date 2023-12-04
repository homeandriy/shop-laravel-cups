<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>@yield('title', 'Купуйте кружки та футболки на сайті '. Config::get('app.name'))</title>
        <link rel="icon" href="/logo.png">
        <meta name ="description" content="@yield('description', 'Купити машки та футболки з унікальним дизайном для всієї родини на ' . Config::get('app.name'))">
        <meta name ="keywords" content="@yield('keywords', 'Кружки', 'футболки')">
        <meta property="og:locale" content="ua_UA">
        <meta property="og:type" content="website">
        <meta property="og:title" content="Унікальні чашки та футболки >> Купити чашки та футболки онлайн | в Києві, доставка по всій Україні">
        <meta property="og:url" content="{{ request()->url() }}">
        <meta property="og:image" content="@yield('og-image', env('APP_URL') .'/logo.png')">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body>
        <div class="content-wrapper">
        @include('components.front.header')
        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div>
    @include('components.front.footer')

    <script src="{{ asset('assets/js/plugins.js') }}"></script>
    <script src="{{ asset('assets/js/theme.js') }}"></script>
    </body>
</html>
