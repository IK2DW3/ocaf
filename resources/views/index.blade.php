@extends('layouts.master')

@section('content')


    <div class="contenedor">
        <div class="row align-items-center justify-content-center contenido mx-2 my-2">
            <div id ="divcookies" class="alert text-center cookiealert mx-2 my-2 bg-info fixed-top" role="alert">
                <b>¿Conoces nuesta politica de cookies?</b> &#x1F36A; usamos la cokies para poder mejorar el funcionamiento de nuestra pagina. Haz click <a href="https://www.cookiesandyou.com/about-cookies/" class="text-warning">aqui</a> para mas informacion <br>
            <br>
                <button type="button" class="btn btn-primary btn-lg" aria-label="Close" id="btncookies">
                    Acepto las cookies 
                </button>
            </div>
            <div class="col-sm-8 col-md-8 col-lg-4 box-index">
                <div class="row box-index-contenido">
                    <div class="col-sm-12 text-center">
                        <picture>
                            <source srcset="../resources/img/imglogo.svg" type="image/svg+xml">
                            <img src="../resources/img/imglogo.png" alt="SVG con fallback de png" title="OCA-F">
                        </picture>
                    </div>
                    <div class="col-sm-12 text-center my-2">
                        <h1>OCA-F</h1>
                    </div>
                    <div class="col-sm-12">
                        @if( !Auth::check() )
                        <div class="row">
                            <div class="col-sm-12 text-center my-1">
                                <a class="btn btn-primary btn-lg" href="{{url('login')}}">Entrar / Registrarse</a>
                            </div>
                        </div>
                        @endif
                        <div class="row">
                            <div class="col-sm-12 text-center my-1">
                                <a class="btn btn-primary btn-lg" href="{{url('mode')}}">Jugar</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@stop
