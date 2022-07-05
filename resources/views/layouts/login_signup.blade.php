<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8">
        <title>@yield('title')</title>
        <link rel="stylesheet" href="{{ asset('css/login_style.css') }}">
        <link href="https://fonts.googleapis.com/css2?family=Belleza&family=Bodoni+Moda&family=Cinzel:wght@500&display=swap" 
    rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script>const BASE_URL = "{{url('/')}}";</script>
        @yield('script')
    </head>
    <body>
        <main>
            <div id="overlay"></div>
            @yield('content')
        </main>
    </body>
</html>