@extends('layouts.master')

@section('content')
<style>
    .filtro {
        display: inline-block;
        /* width: 100%; */
        height: calc(1.5em + .75rem + 2px);
        padding: .375rem 1.75rem .375rem .75rem;
        font-size: 1rem;
        font-weight: 400;
        line-height: 1.5;
        color: #495057;
        vertical-align: middle;
        border: 1px solid #ced4da;
        border-radius: 0.25rem;
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
        text-shadow: 0 0 1px black;
        margin: 2%;

    }

    .filtroflex {
        display: flex;
        justify-content: center;
        aling-items: center;
    }

</style>
<div class="contenedor">
    <div class="cartas">
        <div id="app">
            <select v-model="selectedType">
                <option value="type1">Type 1</option>
                <option value="type2">Type 2</option>
            </select>

            <select v-model="selectedSize">
                <option value="size1">Size 1</option>
                <option value="size2">Size 2</option>
            </select>

            <ul>
                <li v-for="item in computed_items">
                    <span>{{ item.name }}</span>
                    <span>{{ item.type }}</span>
                    <span>{{ item.size }}</span>
                </li>
            </ul>
        </div>
        <h2>Filtrar</h2>
        <div class="filtroflex">
            <select class="filtro" v-model="selectedType">
                <option selected>Ver Toda/Seleccionar Continente</option>
                @foreach( $arrayAC as $key => $continentes )
                <option value="{{$continentes->continenteEsp}}">{{$continentes->continenteEsp}}</option>
                @endforeach
            </select>

            <select class="filtro">
                <option selected>Ver Toda/Seleccionar Ambito</option>
                @foreach( $arrayAC as $key => $ambitos )
                <option value="{{$ambitos->ambitoEsp}}">{{$ambitos->ambitoEsp}}</option>
                @endforeach
            </select>
        </div>
        <div class="row">


            @foreach( $arrayCartas as $key => $carta )
            <div class="col-xs-6 col-sm-4 col-md-3">
                <div class="card text-center">
                    <div class="card-header">
                        <h2>{{$carta->nombre}} {{$carta->apellido}}</h2>
                    </div>
                    @if ($carta->imgRuta == '' || $carta->imgRuta == null)
                    <img src="../resources/img/imglogo.svg" class="card-img-top" alt="No encontrado"
                        title="No encontrado" style="height:200px">
                    @else
                    <img src="../resources/img/cartas/{{$carta->imgRuta}}" class="card-img-top" alt="{{$carta->nombre}}"
                        title="{{$carta->nombre}}" style="height:200px">
                    @endif
                    <div class="card-body">
                        <a href="{{ url('history/' . $carta->id ) }}" class="btn btn-primary">Ver</a>
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
<script src="https://unpkg.com/vue@2.5.20/dist/vue.js"></script>
<script src="../resources/js/filtrar.js"></script>
@stop
