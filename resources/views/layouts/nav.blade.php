<div class="row sticky-top align-items-center justify-content-center bg-dark m-0 w-100">
    <div class="col-sm-10">
        <nav class="navbar  navbar-expand-md navbar-dark bg-dark">
            <a class="navbar-brand" href="{{ url('/') }}">
                @if (\Request::is('history/*') || \Request::is('tablero/*') || \Request::is('panel/*'))
                    <img src="../../resources/img/imglogo.svg" width="30" height="30" class="d-inline-block align-top" alt="OCA-F">
                @elseif (\Request::is('blog/home') || \Request::is('blog/posts'))
                    <img src="../../resources/img/imglogo.svg" width="30" height="30" class="d-inline-block align-top" alt="OCA-F">
                @elseif (\Request::is('blog/post/*'))
                    <img src="../../../resources/img/imglogo.svg" width="30" height="30" class="d-inline-block align-top" alt="OCA-F">
                @elseif (\Request::is('blog/posts/category/*'))
                    <img src="../../../../resources/img/imglogo.svg" width="30" height="30" class="d-inline-block align-top" alt="OCA-F">
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
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('blog.home') }}">Blog</a>
                    </li>
                    @if (\Request::is('profile') || \Request::is('historys') || \Request::is('panel/*'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('mode') }}">Jugar</a>
                        </li>
                    @elseif (\Request::is('history/*'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('mode') }}">Jugar</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="{{ url('historys') }}">Historias</a>
                        </li>
                    @elseif (\Request::is('tablero/*'))
                        <li class="nav-item active">
                            <a class="nav-link" href="{{ url('mode') }}">Finalizar partida</a>
                        </li>
                    @elseif (\Request::is('blog/*'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('blog.posts') }}">Entradas</a>
                        </li>
                    @endif
                </ul>
                @if( Auth::check() )
                    <ul class="navbar-nav navbar-right">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="icon ion-md-add"></i>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <p class="dropdown-item disabled">{{Auth::user()->name}}</p>
                                <a class="dropdown-item" href="{{ url('profile') }}">Ver perfil</a>
                                @if (Auth::user()->rango_id == 1)
                                    <a class="dropdown-item" href="{{ route('panel.gestion') }}">Gestionar</a>
                                    <div class="dropdown-divider"></div>
                                @endif
                                <form action="{{ url('/logout') }}" method="POST" style="display:inline">
                                    {{ csrf_field() }}
                                    <button type="submit" class="dropdown-item" style="display:inline;cursor:pointer">
                                        Cerrar sesión
                                    </button>
                                </form>
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
    </div>
</div>

