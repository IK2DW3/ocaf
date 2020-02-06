@extends('layouts.master')

@section('content')


    <div class="contenedor">
        <div class="row align-items-center justify-content-center contenido mx-2 my-2">
            <div class="col-sm-8 col-md-8 col-lg-4 box-mode">
                <div class="row box-mode-contenido">
                    <div class="col-sm-12 text-center">
                        <picture>
                            <source srcset="../resources/img/imglogo.svg" type="image/svg+xml">
                            <img src="../resources/img/imglogo.png" alt="SVG con fallback de png" title="OCA-F">
                        </picture>
                    </div>
                    <div class="col-sm-12 text-center">
                        <h1>OCA-F</h1>
                    </div>
                    <div class="col-sm-12 text-center">
                        <div class="row align-items-center justify-content-center my-2">
                            <a id="modoIndividual" class="btn btn-primary btn-lg" href="{{url('gamemode')}}" role="button">Individual</a>
                        </div>
                        <div class="row align-items-center justify-content-center my-2">
                            <a id="modoGrupal" class="btn btn-primary btn-lg" href="{{url('gamemode')}}" role="button">Co-Operativo</a>
                        </div>
                        @if (Auth::check() && Auth::user()->tipo == "superadmin")
                        <div class="row align-items-center justify-content-center my-2">
                            <a class="btn btn-primary btn-lg" href="{{url('panel')}}" role="button">&#x269E; &#x1F5F3; &#x269F;</a>
                        </div>
                        @endif
                        <div class="row align-items-center justify-content-center my-2">
                            <a class="btn btn-outline-info" href="{{url('index')}}" role="button">&#x2190; Volver</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@stop
