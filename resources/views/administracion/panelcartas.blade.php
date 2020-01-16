@extends('layouts.master')

@section('content')

    <div class="contenedor-panel">
        <div class="row align-items-start justify-content-center contenido mx-2 my-4 px-2 py-2">
            <div class="col-sm-12 text-center text-light">
                <h1 class="">Panel del conocimiento</h1>
            </div>
            <div class="row panel-cartas mx-5 px-2 py-3 rounded">
                <div class="col-md-2 panel-aside border-right px-2 py-2">
                    <h2>Gestionar</h2>
                    <div class="btn-group-vertical panel-aside-navegador w-100">
                        <a href="{{url('panelcartas')}}" type="button" class="btn btn-secondary">&#x1F4D6; Historias</a>
                        <a href="{{url('panelusuarios')}}" type="button" class="btn btn-secondary">&#x1F465; Usuarios</a>
                    </div>
                </div>
                <div class="col-md-10 panel-contenido px-2 py-2">
                    <crudadm-cartas></crudadm-cartas>
                </div>
            </div>
        </div>
    </div>

@stop
