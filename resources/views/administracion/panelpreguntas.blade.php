@extends('layouts.master')

@section('content')
<div class="contenedor-panel">
    <div class="row align-items-start justify-content-center contenido mx-2 my-4 px-2 py-2">
    <div class="col-sm-12 text-center text-light">
                <h1 class="">Panel de Preguntas</h1>
            </div>
            <div class="col-md-10 panel-contenido px-2 py-2">
                    <crudadm-preguntas></crudadm-preguntas>
                </div>
    </div>
</div>
@stop
