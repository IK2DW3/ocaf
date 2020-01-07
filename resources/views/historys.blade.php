@extends('layouts.master')

@section('content')

    <div class="contenedor">
        <div class="cartas">
            <div class="row">
                @foreach( $arrayCartas as $key => $carta )
                <div class="col-xs-6 col-sm-4 col-md-3">
                    <div class="card text-center">
                        <div class="card-header">{{$carta->nombre}} {{$carta->apellido}}</div>
                        @if ($carta->imgRuta == '' || $carta->imgRuta == null)
                            <img src="../resources/img/imglogo.svg" class="card-img-top" alt="No encontrado" title="No encontrado" style="height:200px">
                        @else
                            <img src="../resources/img/cartas/{{$carta->imgRuta}}" class="card-img-top" alt="{{$carta->nombre}}" title="{{$carta->nombre}}" style="height:200px">
                        @endif
                        <div class="card-body">
                            <a href="{{ url('history/' . $carta->id ) }}" class="btn btn-primary">Leer más</a>
                        </div>
                        <div class="card-footer text-muted">
                            {{$carta->ambitoEsp}}
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

@stop