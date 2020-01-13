@extends('layouts.master')

@section('content')

    <div class="contenedor-panel">
        <div class="panel rounded">
            <h1 class="text-center">Panel del conocimiento</h1>
            <div class="row contenido">
                <div class="col-sm-2">
                    <h2>Gestionar</h2>
                    <div class="btn-group-vertical panel-aside-navegador">
                        <a href="{{url('panelcartas')}}" type="button" class="btn btn-secondary">&#x1F4D6; Historias</a>
                        <a href="{{url('panelusuarios')}}" type="button" class="btn btn-secondary">&#x1F465; Usuarios</a>
                    </div>
                </div>
                <div class="col-sm-10">
                    <div class="col-sm-12">
                        <h2>Tabla del conocimiento</h2>
                        <div class="table-responsive table-mujeres">
                            <table class="table table-striped rounded">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Apellido</th>
                                        <th>F.Nacimiento</th>
                                        <th>F.Muerte</th>
                                        <th>Ambito</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach( $arrayCartas as $id => $carta )
                                    <tr>
                                        <td>{{Str::limit($carta->nombre,15)}}</td>
                                        <td>{{Str::limit($carta->apellido,15)}}</td>
                                        <td>{{$carta->fechaNacimiento}}</td>
                                        <td>{{$carta->fechaMuerte}}</td>
                                        <td>{{$carta->ambitoEsp}}</td>
                                        <td>
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <a href="{{url('history/' . $carta->id)}}" type="button" class="btn btn-secondary" title="Ver">&#x1F440;</a>
                                                <button type="button" class="btn btn-secondary" title="Editar">&#x270E;</button>
                                                <button href="" type="button" class="btn btn-secondary" title="Eliminar">&#x2716;</button>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="col-sm-12">
                            <div class="datosFormulario">
                                <h3>Datos</h3>
                                <form>
                                    {{ csrf_field() }}
                                    <div class="form-row">
                                        <div class="form-group col-md-3">
                                            <label for="cartaNombres">Nombre/s</label>
                                            <input type="text" class="form-control" id="cartaNombres">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="cartaApellidos">Apellido/s</label>
                                            <input type="text" class="form-control" id="cartaApellidos">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="cartaFnacimiento">Fecha Nacimiento</label>
                                            <input type="text" class="form-control" id="cartaFnacimiento">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="cartaFmuerte">Fecha Muerte</label>
                                            <input type="text" class="form-control" id="cartaFmuerte">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <input type="text" class="form-control" id="cartaEnlacereferencia" placeholder="Enlace referencia...">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <div class="img-muestra">
                                                <img src="../resources/img/imglogo.svg" class="rounded" alt="Cinque Terre" title="Imagen previa">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-8">
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="customFileLang" lang="es">
                                                        <label class="custom-file-label" for="customFileLang">Seleccionar Archivo</label>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <input type="text" class="form-control" id="cartaImagenalternativa" placeholder="Enlace imagen alternativa...">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <input type="text" class="form-control" id="cartaZonageografica" placeholder="Zona geográfica">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <select class="custom-select">
                                                        <option selected>Seleccionar ambito</option>
                                                        <option value="1">Normal</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <select class="custom-select">
                                                        <option selected>Seleccionar continente</option>
                                                        <option value="1">Normal</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <textarea class="form-control" id="cartaLore" placeholder="Añade aquí la historia..."></textarea>
                                        </div>
                                    </div>
                                    <h4>Pregunta</h4>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <input type="text" class="form-control" id="cartaPregunta" placeholder="Crea una pregunta...">
                                        </div>
                                        <div class="form-group col-md-12">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                        <input type="radio" name="respuesta" id="cartaRespuestauno" aria-label="Radio button for following text input">
                                                    </div>
                                                </div>
                                                <input type="text" class="form-control" placeholder="Respuesta uno" aria-label="Text input with radio button">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                        <input type="radio" name="respuesta" id="cartaRespuestados" aria-label="Radio button for following text input">
                                                    </div>
                                                </div>
                                                <input type="text" class="form-control" placeholder="Respuesta dos" aria-label="Text input with radio button">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                        <input type="radio" name="respuesta" id="cartaRespuestatres" aria-label="Radio button for following text input">
                                                    </div>
                                                </div>
                                                <input type="text" class="form-control" placeholder="Respuesta tres" aria-label="Text input with radio button">
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Añadir</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop
