@extends('layouts.master')

@section('content')


    <div class="contenedor">
        <div class="row align-items-start justify-content-center contenido px-2">

            <div class="col-sm-12 col-logo">
                <picture>
                    <source srcset="../resources/img/imglogo.svg" type="image/svg+xml">
                    <img src="../resources/img/imglogo.png" alt="SVG con fallback de png" title="OCA-F">
                </picture>
                <h1>OCA-F</h1>
            </div>

            <div class="col-sm-8 col-md-8 col-lg-3 cont-login mx-2 my-2">
                <div class="row">
                    <div class="col-sm-12 login">
                        <form class="overflow-hidden" role="form" method="POST" action="{{ url('/login') }}">
                            <h2>Inicio sesión</h2>
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="emailLogin">Correo electrónico</label>
                                <input type="text" name="emailLogin" class="form-control" autocomplete="off">
                            </div>

                            <div class="form-group">
                                <label for="passwordLogin">Contraseña</label>
                                <input type="password" name="passwordLogin" class="form-control" autocomplete="off">
                            </div>

                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-primary" id="#btnLogin" style="padding:8px 100px;margin-top:25px;" >
                                    Entrar
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-sm-12 col-md-8 col-lg-3 col-register mx-2 my-2">
                <div class="row">
                    <div class="col-sm-12 registro">
                        <form class="overflow-hidden" action="{{ url('register') }}" method="POST">
                            <h2>¡Únete!</h2>
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="userRegister">Nombre usuario</label>
                                <input type="text" name="userRegister" class="form-control" autocomplete="off">
                            </div>

                            <div class="form-group">
                                <label for="emailRegister">Email</label>
                                <input type="email" name="emailRegister" class="form-control" autocomplete="off">
                            </div>

                            <div class="form-group">
                                <label for="passwordRegister">Contraseña</label>
                                <input type="password" name="passwordRegister" class="form-control" autocomplete="off">
                            </div>

                            <div class="form-group">
                                <label for="confirmnpasswordRegister">Confirmar contraseña</label>
                                <input type="password" name="confirmnpasswordRegister" class="form-control" autocomplete="off">
                            </div>

                            <div class="form-group text-center">
                                <input type="submit" class="btn btn-primary" style="padding:8px 100px;margin-top:25px;" value="Registrarse">
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-sm-12 col-volver">
                <a class="btn btn-light" href="{{ url('index') }}" role="button">Volver</a>
            </div>

        </div>
    </div>


@stop
