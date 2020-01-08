@extends('layouts.master')

@section('content')

    <div class="contenedor-panel">
        <div class="panel rounded">
            <h1 class="text-center">Panel del conocimiento</h1>
            <div class="row">
                <div class="col-sm-2">
                    <h2>Gestionar</h2>
                    <div class="btn-group-vertical panel-aside-navegador">
                        <button type="button" class="btn btn-secondary">&#x1F4D6; Historias</button>
                        <button type="button" class="btn btn-secondary">&#x1F465; Usuarios</button>
                    </div>
                </div>
                <div class="col-sm-10">
                    <div class="col-sm-12">
                        <h2>Tabla de conocimiento</h2>
                        <div class="table-responsive table-mujeres">
                            <table class="table table-striped rounded">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Apellido</th>
                                        <th>F.Nacimiento</th>
                                        <th>F.Muerte</th>
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
                                        <td>{{$persona->fechaMuerte}}</td>
                                        <td>{{Str::limit($persona->loreEsp, 10)}}</td>
                                        <td>{{$persona->ambitoEsp}}</td>
                                        <td style="width: 10%;">
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <button type="button" class="btn btn-secondary" title="Ver">&#x1F5F3;</button>
                                                <button type="button" class="btn btn-secondary" title="Editar">&#x270E;</button>
                                                <button type="button" class="btn btn-secondary" title="Eliminar">&#x2716;</button>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="col-sm-12">
                            <div>
                                <h3>Datos</h3>
                                <form>
                                    {{ csrf_field() }}
                                    <div class="form-row">
                                        <div class="form-group col-md-3">
                                            <label for="inputEmail4">Email</label>
                                            <input type="email" class="form-control" id="inputEmail4">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="inputPassword4">Password</label>
                                            <input type="password" class="form-control" id="inputPassword4">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="inputEmail4">Email</label>
                                            <input type="email" class="form-control" id="inputEmail4">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="inputPassword4">Password</label>
                                            <input type="password" class="form-control" id="inputPassword4">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-8">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="customFileLang" lang="es">
                                                <label class="custom-file-label" for="customFileLang">Seleccionar Archivo</label>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-4">

                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Sign in</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop
