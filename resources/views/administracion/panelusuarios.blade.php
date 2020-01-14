@extends('layouts.master')

@section('content')


    <div class="contenedor-panel">
        <div class="row align-items-start justify-content-center contenido mx-2 my-4 px-2 py-2">
            <div class="col-sm-12 text-center text-light">
                <h1 class="">Panel del conocimiento</h1>
            </div>
            <div class="row panel-cartas mx-5 px-2 py-3 rounded">
                <div class="col-md-2 panel-aside border-right px-2 py-2">
                    <h2>Gestionar</h2>
                    <div class="btn-group-vertical panel-aside-navegador w-100">
                        <a href="{{url('panelcartas')}}" type="button" class="btn btn-secondary">&#x1F4D6; Historias</a>
                        <a href="{{url('panelusuarios')}}" type="button" class="btn btn-secondary">&#x1F465; Usuarios</a>
                    </div>
                </div>
                <div class="col-md-10 panel-contenido px-2 py-2">
                    <div class="row">
                        <div class="col-sm-12">
                            <h2>Tabla del NET</h2>
                            <div class="table-responsive table-mujeres">
                                <table class="table table-striped rounded">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Email</th>
                                            <th>Tipo</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach( $arrayUsuarios as $id => $usuario )
                                        <tr>
                                            <td>{{$usuario->name}}</td>
                                            <td>{{$usuario->email}}</td>
                                            <td>{{$usuario->tipo}}</td>
                                            <td>
                                                <div class="btn-group" role="group" aria-label="Basic example">
                                                    <button type="button" class="btn btn-secondary" title="Ver">&#x1F440;</button>
                                                    <button type="button" class="btn btn-secondary" title="Editar">&#x270E;</button>
                                                    <button type="button" class="btn btn-secondary" title="Eliminar">&#x2716;</button>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="row my-4">
                                <div class="col-sm-12">
                                    <h3>Datos</h3>
                                </div>
                                <div class="col-sm-12">
                                    <form>
                                        {{ csrf_field() }}
                                        <div class="form-row">
                                            <div class="form-group col-md-3">
                                                <label for="cartaNombres">Nombre</label>
                                                <input type="text" class="form-control" id="cartaNombres">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="cartaApellidos">Email</label>
                                                <input type="text" class="form-control" id="cartaApellidos">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="cartaApellidos">Seleccionar tipo</label>
                                                <select class="custom-select">
                                                    <option selected>Rango usuario</option>
                                                    <option value="1">Normal</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="cartaFmuerte">Contraseña</label>
                                                <input type="text" class="form-control" id="cartaFmuerte">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-12 text-center">
                                                <button type="submit" class="btn btn-primary">Añadir</button>
                                                <button class="btn btn-success">Actualizar</button>
                                                <button class="btn btn-danger">Eliminar</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@stop
