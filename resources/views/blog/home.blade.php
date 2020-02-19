@extends('layouts.master')

@section('content')


    <div class="contenedor">
        <div class="row align-items-center justify-content-center contenido mx-2 my-2">
            <div class="col-sm-8 blog-body">
                <div class="row">
                    <div class="col-sm-12"><h2>{{$arrayPost->titulo}}</h2></div>
                    <div class="col-sm-12"><p>{{$arrayPost->descripcion}}</p></div>
                </div>
                <div class="row">
                    <div class="col-sm-8 blog-section">
                        <div class="row">
                            <h3>Ultimas publicaciones</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-2 blog-aside">
                <h4>Navegador</h4>
            </div>
        </div>
    </div>


@stop