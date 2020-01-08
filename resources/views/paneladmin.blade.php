@extends('layouts.master')

@section('content')

    <div class="contenedor-panel">
        <div class="panel">
            <div class="row">
                <div class="col-sm-2">aside</div>
                <div class="col-sm-10">
                    <div class="col-sm-12">
                        <h2>Tabla de conocimiento</h2>
                        <table class="tbl-mujeres">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Apellido</th>
                                    <th>F.Nacimiento</th>
                                    <th>Lore</th>
                                    <th>Ambito</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach( $arrayPersonas as $id => $persona )
                                <tr>
                                    <td>{{Str::limit($persona->nombre,15)}}</td>
                                    <td>{{Str::limit($persona->apellido,15)}}</td>
                                    <td>{{$persona->fechaNacimiento}}</td>
                                    <td>{{Str::limit($persona->loreEsp, 10)}}</td>
                                    <td>{{$persona->ambitoEsp}}</td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <button type="button" class="btn btn-secondary">&#x1F5F3;</button>
                                            <button type="button" class="btn btn-secondary">&#x270E;</button>
                                            <button type="button" class="btn btn-secondary">&#x2716;</button>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop
