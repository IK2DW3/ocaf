@extends('layouts.master')

@section('content')

    <div class="contenedor-perfil">
        <div class="perfil rounded text-center">
            <h1>Panel</h1>
            <p>Elige la opción correspondiente con la que deseas operar.</p>
            <div class="row perfil-opciones">
                <div class="col-sm perfil-boton">
                    <p>Perfil</p>
                    <a href="{{ url('perfil') }}">
                        <img src="../resources/img/perfilicon.svg" alt="" title="Ver perfil">
                    </a>
                </div>
                <div class="col-sm perfil-boton">
                    <p>Gestión usuarios</p>
                    <a href="{{ url('panelusuarios') }}">
                        <img src="../resources/img/perfiliconsettings.svg" alt="" title="Gestionar usuarios">
                    </a>
                </div>
                <div class="col-sm perfil-boton">
                    <p>Gestión historia</p>
                    <a href="{{ url('panelcartas') }}">
                        <img src="../resources/img/perfilbooksettings.svg" alt="" title="Panel del conocimiento">
                    </a>
                </div>
            </div>
        </div>
    </div>

@stop