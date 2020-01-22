@extends('layouts.master')

@section('content')

    
    <div class="contenedor-panel">
        <div class="row align-items-center justify-content-center contenido mx-2 my-2">
            <div class="col-sm-8 col-md-8 col-lg-4 box-panel">
                <div class="row box-panel-contenido">
                    <div class="col-sm-12 text-center my-2">
                        <h1>Panel</h1>
                        <p>Elige la opción correspondiente con la que deseas operar.</p>
                    </div>
                    <div class="col-sm-12">
                        <div class="row py-4">
                            <div class="col-sm text-center panel-boton">
                                <p>Perfil</p>
                                <a href="{{ url('perfil') }}">
                                    <img src="../resources/img/perfilicon.svg" alt="" title="Ver perfil">
                                </a>
                            </div>
                            <div class="col-sm text-center panel-boton">
                                <p>Gestión usuarios</p>
                                <a href="{{ url('panelusuarios') }}">
                                    <img src="../resources/img/perfiliconsettings.svg" alt="" title="Gestionar usuarios">
                                </a>
                            </div>
                            <div class="col-sm text-center panel-boton">
                                <p>Gestión historia</p>
                                <a href="{{ url('panelcartas') }}">
                                    <img src="../resources/img/perfilbooksettings.svg" alt="" title="Panel del conocimiento">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@stop