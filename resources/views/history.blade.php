@extends('layouts.master')

@section('content')


    <div class="contenedor">
        <div class="row align-items-center justify-content-center contenido mx-2 my-2">
            <div class="col-sm-12 col-md-6 col-lg-5 box-historia">
                <div class="row">
                    <div class="col-sm-6 text-center">
                        @if ($arrayCarta->imgRuta != '' || $arrayCarta->imgRuta != null)
                            <img src="../../resources/img/cartas/{{$arrayCarta->imgRuta}}" class="card-img-top" alt="{{$arrayCarta->nombre}}" title="{{$arrayCarta->nombre}}">
                        @elseif ($arrayCarta->imgDefault != '' || $arrayCarta->imgDefault != null)
                            <img src="{{$arrayCarta->imgDefault}}" class="card-img-top" alt="{{$arrayCarta->nombre}}" title="{{$arrayCarta->nombre}}">
                        @else
                            <img src="../../resources/img/imglogo.svg" class="card-img-top" alt="No encontrado" title="No encontrado">
                        @endif
                    </div>
                    <div class="col-sm-6">
                        <h1>{{$arrayCarta->nombre}} {{$arrayCarta->apellido}}</h1>
                        <p><strong>Fecha Nacimiento: </strong>{{$arrayCarta->fechaNacimiento}}</p>
                        <p><strong>Fecha de muerte: </strong>
                            @if ($arrayCarta->fechaMuerte != '')
                                {{$arrayCarta->fechaMuerte}}
                            @else
                                N/A
                            @endif
                        </p>
                        <p><strong>Ambito: </strong>{{$arrayCarta->ambito->ambitoEsp}}</p>
                    </div>
                    <div class="col-sm-12 text-justify mx-2 my-5">
                        <p><strong>Resumen: </strong>{{$arrayCarta->loreEsp}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>


@stop
