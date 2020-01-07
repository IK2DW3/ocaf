@extends('layouts.master')

@section('content')

<style>
    .contenedor {
        position: relative;
        display: inline-block;
        text-align: center;
    }

    .texto-encima {
        position: absolute;
        top: 10px;
        left: 10px;
    }

    .nombre {
        position: absolute;
        top: 90%;
        left: 50%;
        transform: translate(-50%, -50%);
    }

    .ambito {
        position: absolute;
        top: 8%;
        left: 50%;
        transform: translate(-50%, -50%);
    }
    .header2{
        background-color:#070B0D;
        text-align: center; 
        padding: .2em;"
    }
    .fotoVolver{
        
        height: 20px;
        margin-bottom:5%;
        font-stretch: extra-condensed;
    }
    .fotografia {
        width: 90%;
        font-stretch: extra-condensed;
        /*height:300px;*/
        border-radius: 10px;       
        
    }
</style>
<div class="container-fluid">
<!--<header style="background-color:#F23869;text-align: center; padding: .2em;">-->
<header class="header2">
    <a class="btn btn-info" style="float:left; margin-top:.5%" href="{{ url('/historias/')}}">
    <img class="fotoVolver" src="https://image.flaticon.com/icons/png/512/17/17699.png" />Volver </a>
    <img alt="logo de la página" src="../RECURSOS/logo.png" style="width: 5%;font-stretch: extra-condensed;">
    <h2 style="color:white;" class="btn" href="{{ url('/historias/')}}">HISTORIA </h2>
</header>
<section style="padding: 3em;background-color:#D9CCC5">
    <div class="row">
        <div class="row" style="background-color:#111826;padding: .5em; border-radius: 10px;">
            <div class="col-xs-4 col-sm-12 col-md-12">
                <h1 style="margin-bottom:10spx; color:white">{{$historia['nombre']}} {{$historia['apellido']}}</h1>
            </div>
            <div class="col-xs-4 col-sm-4 col-md-3" style="margin:5px; color:white">
                <h1>
                    <img class="fotografia" src="{{ $historia['img_ruta']}}">
                </h1>
                <h5>{{$historia['zona_geografica']}}, {{$historia['fecha_nacimiento']}}</h5>
            </div>
            <div class="col-xs-4 col-sm-8 col-md-8" style="background-color:#D9CCC5;padding: 2em; border-radius: 10px;">
                    <h4><b>Biografía:</b></h4>
                    <p ><br> {{$historia['lore']}}</p>
                    <br>
                    <a class="btn btn-warning" href="{{ $historia['enlace_referencia']}}">Ver más en Wikipedia</a>
                </div>
        </div>
    </div>
</section>
@stop
</div>