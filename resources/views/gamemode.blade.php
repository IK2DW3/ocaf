@extends('layouts.master')

@section('content')


    <div class="index">
        <div class="box">
            <picture>
                <source srcset="../resources/img/imglogo.svg" type="image/svg+xml">
                <img src="../resources/img/imglogo.png" alt="SVG con fallback de png" title="OCA-F">
            </picture>
            <h1>OCA-F</h1>
            <h2>$mode[0]</h2>
            <a class="btn btn-outline-info" href="{{url('index')}}" role="button">&#x2190; Volver</a>
        </div>
    </div>

    
@stop