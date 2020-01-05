<nav class="navbar sticky-top navbar-expand-md navbar-dark bg-dark ">
    <a class="navbar-brand" href="{{ url('/') }}">
        @if (\Request::is('history/*'))
            <img src="../../resources/img/imglogo.svg" width="30" height="30" class="d-inline-block align-top" alt="OCA-F">
        @else
            <img src="../resources/img/imglogo.svg" width="30" height="30" class="d-inline-block align-top" alt="OCA-F">
        @endif
        OCA-F
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="{{ url('/') }}">Inicio <span class="sr-only">(current)</span></a>
            </li>
            @if (\Request::is('historys'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('mode') }}">Volver</a>
                </li>
            @elseif (\Request::is('paneladmin'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('mode') }}">Jugar</a>
                </li>
            @elseif ('history/*')
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('mode') }}">Jugar</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('historys') }}">Volver</a>
                </li>
            @endif
        </ul>
        @if( Auth::check() )
            <ul class="navbar-nav navbar-right">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Opciones
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ url('paneladmin') }}">Gestión</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ url('/logout') }}">Cerrar sesión</a>
                    </div>
                </li>
            </ul>
        @else
            <ul class="navbar-nav navbar-right">
                <li class="nav-item">
                    <a href="{{ url('login') }}" class="btn btn-outline-light" role="button">Entrar</a>
                </li>
            </ul>
        @endif
    </div>
</nav>
