@extends('layouts.master')

@section('content')


    <div class="index">
        <div class="box">
            <picture>
                <source srcset="../resources/img/imglogo.svg" type="image/svg+xml">
                <img src="../resources/img/imglogo.png" alt="SVG con fallback de png" title="OCA-F">
            </picture>
            <h1>OCA-F</h1>
            @if( Auth::check() )
                <a class="btn btn-primary btn-lg" href="{{url('mode')}}">Jugar</a>
            @else 
                <a class="btn btn-primary btn-lg" href="{{url('login')}}">Entrar / Registrarse</a>
                <a class="btn btn-primary btn-lg" href="{{url('mode')}}">Jugar</a>
            @endif
        </div>
    </div>


    
@stop