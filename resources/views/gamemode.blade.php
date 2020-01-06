@extends('layouts.master')

@section('content')


    <div class="index">
        <div class="box">
            <picture>
              <source srcset="../resources/img/imglogo.svg" type="image/svg+xml">
              <img src="../resources/img/imglogo.png" alt="SVG con fallback de png" title="OCA-F">
            </picture>
            <h1>OCA-F</h1>
            <h2>{{$gamemode}}</h2>
            <form class="gamemode" action="{{ url('') }}" method="POST">
                <h3>
                    @if ($gamemode == 'Individual')
                        Jugadores
                    @else
                        Equipos
                    @endif
                </h3>
                {{ csrf_field() }}

                <div class="form-group">
                    <div class="form-row">
                        <div class="col-md-3 mb-3">
                            <label for="validationDefault01">
                                @if ($gamemode == 'Individual')
                                    Jugador 1
                                @else
                                    Equipo 1
                                @endif
                            </label>
                            <input type="text" class="form-control" id="validationDefault01" value="" autocomplete="off" required>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="validationDefault01">
                                @if ($gamemode == 'Individual')
                                    Jugador 2
                                @else
                                    Equipo 2
                                @endif
                            </label>
                            <input type="text" class="form-control" id="validationDefault01" value="" autocomplete="off" required>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="validationDefault01">
                                @if ($gamemode == 'Individual')
                                    Jugador 3
                                @else
                                    Equipo 3
                                @endif
                            </label>
                            <input type="text" class="form-control" id="validationDefault01" value="">
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="validationDefault01">
                                @if ($gamemode == 'Individual')
                                    Jugador 4
                                @else
                                    Equipo 4
                                @endif
                            </label>
                            <input type="text" class="form-control" id="validationDefault01" value="">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <select class="custom-select">
                        <option selected>Abrir para seleccionar modo de juego</option>
                        <option value="1">Normal</option>
                        <option value="2">Categoría específica</option>
                    </select>
                </div>

                <div class="form-group">
                    <select class="custom-select">
                        <option selected>Seleccionar categoría</option>
                        <option value="1">Normal</option>
                        <option value="1">Normal</option>
                        <option value="1">Normal</option>
                        <option value="1">Normal</option>
                        <option value="1">Normal</option>
                        <option value="1">Normal</option>
                    </select>
                </div>

                <div class="form-group">
                    <div class="form-row d-flex justify-content-center gamemode-typetablero">
                        <div class="input-group col-md-3 mb-3 d-flex justify-content-center ">
                            <label for="tableroDefault" class="radio-label-gamemode">
                                Normal
                            </label>
                            <div class="input-group-prepend select-tablero">
                                <div class="input-group-text input-tableroDefault justify-content-center">
                                    <input type="radio" id="tableroDefault" name="tablero" class="radio-gamemode">
                                </div>
                            </div>
                        </div>
                        <div class="input-group col-md-3 mb-3 d-flex justify-content-center ">
                            <label for="tableroNuevo" class="radio-label-gamemode">
                                Nuevo
                            </label>
                            <div class="input-group-prepend">
                                <div class="input-group-text input-tableroNuevo justify-content-center">
                                    <input type="radio" id="tableroNuevo" name="tablero" class="radio-gamemode">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <textarea class="form-control" id="" placeholder="" readonly></textarea>
                </div>

                <div class="form-group text-center">
                    <button type="submit" class="btn btn-primary">Iniciar</button>
                </div>
            </form>
            <a class="btn btn-outline-info" href="{{url('mode')}}" role="button">&#x2190; Volver</a>
        </div>
    </div>


@stop
