@extends('layouts.master')

@section('content')

    <div class="contenedor-perfil">
        <div class="perfil rounded text-center">
            <h1>{{Auth::user()->name}}</h1>
            <p>Hola, éste es tu perfil. Aquí puedes visualizar tus datos libremente.</p>
            <div class="row perfil-opciones">
                <form method="post">
                    <div class="form-group">
                        <div class="input-group mb-2 mr-sm-2">
                            <div class="input-group-prepend">
                            <div class="input-group-text"><i class="icon ion-md-person"></i></div>
                            </div>
                            <input type="text" class="form-control" id="perfilNombre" value="{{Auth::user()->name}}" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group mb-2 mr-sm-2">
                            <div class="input-group-prepend">
                            <div class="input-group-text">@</div>
                            </div>
                            <input type="email" class="form-control" id="pefilEmail" value="{{Auth::user()->email}}" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group mb-2 mr-sm-2">
                            <div class="input-group-prepend">
                            <div class="input-group-text"><i class="icon ion-md-unlock"></i></div>
                            </div>
                            <input type="password" class="form-control" id="perfilContraseña" placeholder="Contraseña actual">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group mb-2 mr-sm-2">
                            <div class="input-group-prepend">
                            <div class="input-group-text"><i class="icon ion-md-key"></i></div>
                            </div>
                            <input type="password" class="form-control" id="perfilNuevacontraseña" placeholder="Nueva contraseña">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group mb-2 mr-sm-2">
                            <div class="input-group-prepend">
                            <div class="input-group-text"><i class="icon ion-md-lock"></i></div>
                            </div>
                            <input type="password" class="form-control" id="perfilConfirmarcontraseña" placeholder="Confirmar contraseña">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                </form>
            </div>
        </div>
    </div>

@stop