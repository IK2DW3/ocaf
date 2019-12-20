@extends('layouts.master')

@section('content')

    <div class="contenedor">
        <div class="cartas">
            <div class="row">
                @foreach( $arrayCartas as $key => $carta )
                <div class="col-xs-6 col-sm-4 col-md-3">
                    <div class="card">
                        <div class="card-header">{{$carta->nombre}} {{$carta->apellido}}</div>
                        <div class="card-body">
                            <a href="{{ url('history/' . $carta->id ) }}" class="btn btn-primary">Leer más</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

@stop