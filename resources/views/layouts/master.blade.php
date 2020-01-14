<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">

    <!-- Material Design for Bootstrap fonts and icons -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons">

    <!-- Dependiando de la ruta damos recogida, ponemos una direccion de recursos diferente... -->
    @if (\Request::is('history/*'))
        <link rel="stylesheet" href="../../resources/css/style.css">
        <link rel="shortcut icon" href="../../resources/img/fav/favicon.ico" type="image/x-icon">
    @else
        <link rel="stylesheet" href="../resources/css/style.css">
        <link rel="shortcut icon" href="../resources/img/fav/favicon.ico" type="image/x-icon">
    @endif


    <title>OCA-F</title>
  </head>
  <body>
    @include('sweetalert::alert')

    @if (\Request::is('historys') || \Request::is('perfil') || \Request::is('panel') || \Request::is('panelusuarios') || \Request::is('panelcartas') || \Request::is('history/*'))
        @include('layouts.nav')
    @endif

    <div class="main">
      @yield('content')

      @if ( \Request::is('/') || \Request::is('index') || \Request::is('historys') || \Request::is('history/*') || \Request::is('mode') || \Request::is('gamemode') || \Request::is('perfil') || \Request::is('panel') || \Request::is('panelusuarios') || \Request::is('panelcartas'))
        @include('layouts.fab')
      @endif
    </div>
    <!-- Footer -->
    @include('layouts.footer')

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.0"></script>

  </body>
</html>
