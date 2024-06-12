<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://kit.fontawesome.com/43ebce74f3.js" crossorigin="anonymous"></script>
    <link rel="icon" type="image/png" href="{{Vite::asset('resources/img/swan.png')}}"/>

    <title> @yield('title')</title>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Usando Vite -->
    @vite(['resources/js/app.js'])
</head>

<body>
    <div id="app">


        @include('partials.header')

        <main>
            @yield('content')
        </main>

        @include('partials.footer')
    </div>
</body>

</html>