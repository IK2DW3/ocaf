<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>

        <!-- Required meta tags -->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- + Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

        <!-- Dependiando de la ruta damos recogida, ponemos una direccion de recursos CSS3 diferente... -->
        @if (\Request::is('history/*') || \Request::is('tablero/*'))
            <link rel="stylesheet" href="../../resources/css/style.css">
            <link rel="shortcut icon" href="../../resources/img/fav/favicon.ico" type="image/x-icon">
        @else
            <link rel="stylesheet" href="../resources/css/style.css">
            <link rel="shortcut icon" href="../resources/img/fav/favicon.ico" type="image/x-icon">
        @endif

        @if (\Request::is('tablero/*'))
            <link rel="stylesheet" href="../../resources/css/tablero/tablero.css">
        @endif

        <!-- Titulo de la web recogido del archivo .env -->
        <title>{{ config('app.name', 'Laravel') }}</title>

  </head>
  <body>

        <!-- Incluir metodo de notificaciones -->
        @include('sweetalert::alert')

        @if (\Request::is('historys') || \Request::is('perfil') || \Request::is('panel') || \Request::is('panelusuarios') || \Request::is('panelambitos') || \Request::is('panelcontinentes') || \Request::is('panelcartas') || \Request::is('history/*'))
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

        <!-- + Scripts -->
        <script src="{{asset('js/app.js')}}"></script>
        @if ( \Request::is('/login') || \Request::is('tablero/*'))
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
        @endif
        @if (\Request::is('tablero/*'))
            <script src="../../resources/js/tablero/main.js"></script>
            <script src="../../resources/js/tablero/generartablero.js"></script>
        @endif

  </body>
</html>
