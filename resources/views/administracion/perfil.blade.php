@extends('layouts.master')

@section('content')


    <div class="contenedor-panel">
        <div class="row align-items-center justify-content-center contenido mx-2 my-2">
            <div class="col-sm-8 col-md-8 col-lg-4 box-perfil">
                <div class="row box-perfil-contenido">
                    <div class="col-sm-12 text-center my-2">
                        <h1>{{Auth::user()->name}}</h1>
                        <p>Hola, éste es tu perfil. Aquí puedes visualizar tus datos libremente.</p>
                    </div>
                    <div class="col-sm-12">
                        <perfil-usuario></perfil-usuario>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop