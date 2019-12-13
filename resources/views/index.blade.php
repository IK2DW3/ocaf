@extends('layouts.master')

@section('content')

    <div class="index">
        <div class="box">
            <picture>
                <source srcset="../resources/img/imglogo.svg" type="image/svg+xml">
                <img src="../resources/img/imglogo.png" alt="SVG con fallback de png" title="OCA-F">
            </picture>
            <h1>OCA-F</h1>
            <button type="button" class="btn btn-primary btn-lg">Login / Registrarse</button>
            <button type="button" class="btn btn-primary btn-lg">Jugar</button>
        </div>
    </div>

@stop