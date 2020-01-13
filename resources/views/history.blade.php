@extends('layouts.master')

@section('content')


    <div class="contenedor">
        <div class="tarjeta">
            <div class="row">
                <div class="col-sm-6 colcard colcard-img">
                    @if ($arrayCarta->imgRuta == '' || $arrayCarta->imgRuta == null)
                        <img src="../../resources/img/imglogo.svg" class="card-img-top" alt="No encontrado" title="No encontrado" style="height:200px">
                    @else
                        <img src="../../resources/img/cartas/{{$arrayCarta->imgRuta}}" class="card-img-top" alt="{{$arrayCarta->nombre}}" title="{{$arrayCarta->nombre}}" style="height:250px; width:220px;">
                    @endif
                </div>
                <div class="col-sm-6 colcard colcard-info">
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
                <div class="col-sm-12 colcard colcard-resumen">
                    <p><strong>Resumen: </strong>{{$arrayCarta->loreEsp}}</p>
                </div>
            </div>
        </div>
    </div>


@stop
