<div class="fab">
    <div class="row overflow-hidden py-1 w-100">
        <div class="col-9 d-flex align-items-center justify-content-end px-1">
            <span class="rounded-pill shadow-lg bg-white rounded mx-1 px-2 esconder">Menú</span>
        </div>
        <div class="col-3 d-flex align-items-center justify-content-center px-1">
            <button type="button" class="btn btn-fab btn-light rounded-circle shadow-lg rounded w-100">
                <i class="icon ion-md-menu"></i>
            </button>
        </div>
    </div>
    
    <div class="row overflow-hidden py-1 w-100">
        <div class="col-9 d-flex align-items-center justify-content-end px-1 btn-txt">
            <span class="rounded-pill shadow-lg bg-white rounded mx-1 px-2 esconder" >Subir</span>
        </div>
        <div class="col-3 d-flex align-items-center justify-content-center px-1">
            <button type="button" class="btn btn-item btn-info rounded-circle shadow-lg rounded w-75 menuslide" id="botonSubir">
                <i class="icon ion-md-locate"></i>
            </button>
        </div>
    </div>

    <div class="row overflow-hidden py-1 w-100">
        <div class="col-9 d-flex align-items-center justify-content-end px-1 btn-txt">
            <span class="rounded-pill shadow-lg bg-white rounded mx-1 px-2 esconder" >Bajar</span>
        </div>
        <div class="col-3 d-flex align-items-center justify-content-center px-1">
            <button type="button" class="btn btn-item btn-info rounded-circle shadow-lg rounded w-75 menuslide" id="botonBajar">
                <i class="icon ion-md-locate"></i>
            </button>
        </div>
    </div>

    @if (\Request::is('tablero/*'))
        <div class="row overflow-hidden py-1 w-100">
            <div class="col-9 d-flex align-items-center justify-content-end px-1">
                <span class="rounded-pill shadow-lg bg-white rounded mx-1 px-2 esconder">Imprimir</span>
            </div>
            <div class="col-3 d-flex align-items-center justify-content-center px-1">
                <button class="btn btn-item btn-info rounded-circle shadow-lg rounded w-75 menuslide" id="botonImprimir">
                    <i class="icon ion-md-print"></i>
                </button>
            </div>
        </div>
    @endif

    @auth
        <div class="row overflow-hidden py-1 w-100">
            <div class="col-9 d-flex align-items-center justify-content-end px-1">
                <span class="rounded-pill shadow-lg bg-white rounded mx-1 px-2 esconder">Ver perfil</span>
            </div>
            <div class="col-3 d-flex align-items-center justify-content-center px-1">
                <a href="{{url('perfil')}}" class="btn btn-item btn-success rounded-circle shadow-lg rounded w-75 menuslide" id="botonPerfil">
                    <i class="icon ion-md-contact"></i>
                </a>
            </div>
        </div>

        @if (Auth::check() && Auth::user()->tipo == "superadmin")
            <div class="row overflow-hidden py-1 w-100">
                <div class="col-9 d-flex align-items-center justify-content-end px-1">
                    <span class="rounded-pill shadow-lg bg-white rounded mx-1 px-2 esconder">Gestionar</span>
                </div>
                <div class="col-3 d-flex align-items-center justify-content-center px-1">
                    <a href="{{url('panel')}}" class="btn btn-item btn-warning rounded-circle shadow-lg rounded w-75 menuslide" id="botonPanel">
                        <i class="icon ion-md-settings"></i>
                    </a>
                </div>
            </div>
        @endif
    @endauth

    
</div>