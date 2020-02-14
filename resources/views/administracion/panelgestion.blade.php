@extends('layouts.master')

@section('content')


    <div class="contenedor-panel" id="app">
        <div class="row align-items-start justify-content-center contenido mx-2 my-4 px-2 py-2">
            <div class="col-sm-12 text-center text-light">
                <h1 class="">Panel del conocimiento</h1>
            </div>
            <crud-gestion></crud-gestion>
        </div>
    </div>


@stop