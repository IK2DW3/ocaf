<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <!-- Required meta tags -->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!--
            + Styles
                - Vue.js
                - Bootstrap CSS
        -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">

        <!-- Dependiando de la ruta damos recogida, ponemos una direccion de recursos CSS3 diferente... -->
        @if (\Request::is('history/*'))
            <link rel="stylesheet" href="../../resources/css/style.css">
            <link rel="shortcut icon" href="../../resources/img/fav/favicon.ico" type="image/x-icon">
        @else
            <link rel="stylesheet" href="../resources/css/style.css">
            <link rel="shortcut icon" href="../resources/img/fav/favicon.ico" type="image/x-icon">
        @endif
        <!-- Titulo de la web recogido del archivo .env -->
        <title>{{ config('app.name', 'Laravel') }}</title>
  </head>
  <body>
        @include('sweetalert::alert')

        @if (\Request::is('historys') || \Request::is('perfil') || \Request::is('panel') || \Request::is('panelusuarios') || \Request::is('panelcartas') || \Request::is('history/*'))
            @include('layouts.nav')
        @endif

        <div id="app" class="main">
            @yield('content')

            @if ( \Request::is('/') || \Request::is('index') || \Request::is('historys') || \Request::is('history/*') || \Request::is('mode') || \Request::is('gamemode') || \Request::is('perfil') || \Request::is('panel') || \Request::is('panelusuarios') || \Request::is('panelcartas'))
                @include('layouts.fab')
            @endif
        </div>

        <!-- Footer -->
        @include('layouts.footer')
        <!--
            + Scripts
                - Optional JavaScript
                - jQuery
                - Popper.js
                - Bootstrap JS
                - Vue.js
        -->
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <script src="{{asset('js/app.js')}}"></script>
  </body>
</html>
