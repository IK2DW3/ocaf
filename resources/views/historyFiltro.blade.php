@extends('layouts.master')

@section('content')


    <div class="index">
        <div class="box">
            <picture>
              <source srcset="../resources/img/imglogo.svg" type="image/svg+xml">
              <img src="../resources/img/imglogo.png" alt="SVG con fallback de png" title="OCA-F">
            </picture>
            <h1>OCA-F</h1>
            <h2></h2>
                <div class="form-group text-center">
                    <button type="submit" class="btn btn-primary">Ver Todas</button>
                </div>
                <h2>Filtrar</h2>
                <div class="form-group">
                    <select class="custom-select">
                        <option selected>Seleccionar Continente</option>
                        @foreach( $arrayContinentes as $key => $continentes )
                            <option value="{{$continentes->continenteEsp}}">{{$continentes->continenteEsp}}</option>
                        @endforeach                 
                    </select>
                </div>
                <div class="form-group">
                    <select class="custom-select">
                        <option selected>Seleccionar Ambito</option>
                        @foreach( $arrayAmbitos as $key => $ambitos )
                            <option value="{{$ambitos->ambitoEsp}}">{{$ambitos->ambitoEsp}}</option>
                        @endforeach                 
                    </select>
                </div>
                <div class="form-group text-center">
                    <button type="submit" class="btn btn-primary">Filtrar</button>
                </div>
              
            <a class="btn btn-outline-info" href="{{url('mode')}}" role="button">&#x2190; Volver</a>
        </div>
    </div>


@stop
