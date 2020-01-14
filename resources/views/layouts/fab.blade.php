<div class="fab">
    <div class="row overflow-hidden py-1 w-100">
        <div class="col-9 d-flex align-items-center justify-content-end px-1">
            <span class="rounded-pill shadow-lg bg-white rounded mx-1 px-2">Menú</span>
        </div>
        <div class="col-3 d-flex align-items-center justify-content-center px-1">
            <button type="button" class="btn btn-fab btn-light rounded-circle shadow-lg rounded w-100">
                <i class="icon ion-md-menu"></i>
            </button>
        </div>
    </div>
    
    <div class="row overflow-hidden py-1 w-100">
        <div class="col-9 d-flex align-items-center justify-content-end px-1">
            <span class="rounded-pill shadow-lg bg-white rounded mx-1 px-2">Magía</span>
        </div>
        <div class="col-3 d-flex align-items-center justify-content-center px-1">
            <button type="button" class="btn btn-item btn-info rounded-circle shadow-lg rounded w-75">
                <i class="icon ion-md-locate"></i>
            </button>
        </div>
    </div>

    @auth
    <div class="row overflow-hidden py-1 w-100">
        <div class="col-9 d-flex align-items-center justify-content-end px-1">
            <span class="rounded-pill shadow-lg bg-white rounded mx-1 px-2">Ver perfil</span>
        </div>
        <div class="col-3 d-flex align-items-center justify-content-center px-1">
            <a href="{{url('perfil')}}" class="btn btn-item btn-info rounded-circle shadow-lg rounded w-75">
                <i class="icon ion-md-contact"></i>
            </a>
        </div>
    </div>

        @if (\Request::is('perfil'))
        <div class="row overflow-hidden py-1 w-100">
            <div class="col-9 d-flex align-items-center justify-content-end px-1">
                <span class="rounded-pill shadow-lg bg-white rounded mx-1 px-2">Hola</span>
            </div>
            <div class="col-3 d-flex align-items-center justify-content-center px-1">
                <a href="{{url('mode')}}" class="btn btn-item btn-info rounded-circle shadow-lg rounded w-75">
                    <i class="icon ion-md-contact"></i>
                </a>
            </div>
        </div>
        @endif
    @endauth

    
</div>