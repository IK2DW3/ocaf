@extends('layouts.master')

@section('content')


    <div class="index">
        <div class="box">
            <picture>
                <source srcset="../resources/img/imglogo.svg" type="image/svg+xml">
                <img src="../resources/img/imglogo.png" alt="SVG con fallback de png" title="OCA-F">
            </picture>
            <h1>OCA-F</h1>
            <a class="btn btn-primary btn-lg" href="{{url('historys')}}" role="button">Historia</a>
            <form action="{{url('gamemode')}}" method="POST">
                {{ csrf_field() }}
                <input type="hidden" name="mode" value="Individual">
                <button type="submit" class="btn btn-primary btn-lg">
                    Individual
                </button>
            </form>
            <form action="{{url('gamemode')}}" method="POST">
                {{ csrf_field() }}
                <input type="hidden" name="mode" value="Co-operativo">
                <button type="submit" class="btn btn-primary btn-lg">
                    Co-operativo
                </button>
            </form>
            @if (Auth::check() && Auth::user()->tipo == "superadmin")
            <a class="btn btn-primary btn-lg" href="{{url('paneladmin')}}" role="button">&#x269E; &#x1F5F3; &#x269F;</a>
            @endif
            <a class="btn btn-outline-info" href="{{url('index')}}" role="button">&#x2190; Volver</a>
        </div>
    </div>


@stop
