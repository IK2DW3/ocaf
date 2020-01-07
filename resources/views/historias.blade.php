@extends('layouts.master')

@section('content')
<style>
    .headerA {
        background-color: #070B0D;
        text-align: center;
        padding: .2em;
        "

    }

    section {
        padding: 1.5em;
        background-color: #D9CCC5;
    }

    .fotografia {
        height: 175px;
        width: 75%;
        font-stretch: extra-condensed;
        /*height:300px;*/
        border-radius: 10px;
    }

    .fotoBtnVolver {

        height: 20px;
        font-stretch: extra-condensed;
    }

    .icono {
        width: 5%;
        font-stretch: extra-condensed;
    }

    .divA {
        background-color: white;
        border: white solid 4px;
        border-radius: 10px;
        padding: .5em;

    }

    section div div div:hover {
        /*background: #F2C744;*/
        border: #F2C744 solid 4px;
        border-radius: 20px;
        color: grey;
    }

    a:link {
        text-decoration: none;
    }

    .ambitoTxt {
        color: black;
        font-family: Verdana, Geneva, sans-serif;
    }

    .nombreTxt {
        color: black;
        margin-bottom: 0%;
        font-family: "Courier New", Courier, monospace;
    }

    .btn {
        color: white;
        font-size: 20px;
    }

    #btnVolver {
        float: left;
        margin-top: .5%;
    }

</style>
<!--<header style="background-color:#F23869;text-align: center; padding: .2em;">-->
<div class="container">
    <header class="headerA">
        <a id="btnVolver" class="btn btn-info" href="{{ url('/')}}">
            <img class="fotoBtnVolver" src="https://image.flaticon.com/icons/png/512/17/17699.png" />Volver </a>
        <img class="icono" alt="logo de la página" src="../RECURSOS/logo.png">
        <h2 style="color:white;" class="btn" href="{{ url('/historias/')}}">HISTORIA </h2>
    </header>

    <section>

        <div class="row justify-content-center">
            @foreach( $historias as $historia )
            <!--
        <div class="col align-self-start  text-center" style="margin-top:20px;margin:20px">-->
            <div class="col-xs-9 col-sm-4 col-md-3 text-center" style="margin-top:20px;">
                <div class="divA" title="{{$historia['lore']}}">

                    <a href="{{ url('/historia/'.$historia->id ) }}">
                        <h5 class="ambitoTxt"> {{$historia['ambito']}}</h5>
                        <img  class="fotografia" src="{{$historia['img_ruta']}}" />
                        <h4 class="nombreTxt"> {{$historia['nombre']}}</h4>
                    </a>
                </div>
            </div>
            @endforeach

        </div>

        <!--
<div class="row">

@foreach( $historias as $historia )
<div class="col-xs-6 col-sm-4 col-md-3 text-center">

    <a href="{{ url('/historia/'.$historia->id ) }}">
        <img src="{{$historia['img_ruta']}}" style="height:200px"/>
        <h4 style="min-height:45px;margin:5px 0 10px 0">
            {{$historia['nombre']}}
        </h4>
    </a>

</div>
@endforeach

</div>-->
        @stop
    </section>
</div>
