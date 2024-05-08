<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title')</title>
        <link rel="stylesheet" href="css/all.min.css">
        <link rel="stylesheet" href="css/normalize.css">

        <link rel="stylesheet" href="/css/@yield('style')">
        
        <link rel="preconnect" href="https://fonts.googlepis.com">
        <link rel="preconnect" href="https:fonts.gstatic.com" crossorigin="">
        <link rel="https://fonts.googleapis.com/css2?family=cairo:wght@400;700&display=swap" rel="stylesheet">

    </head>
    <body style="direction: rtl;">
        @yield('content')
    </body>
</html>
