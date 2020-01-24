@extends('layouts.master')

@section('content')


    <div class="contenedor">
        <div class="row align-items-center justify-content-center contenido px-2">

            <div class="col-sm-12 col-logo my-3">
                <picture>
                    <source srcset="../resources/img/imglogo.svg" type="image/svg+xml">
                    <img src="../resources/img/imglogo.png" alt="SVG con fallback de png" title="OCA-F">
                </picture>
                <h1>OCA-F</h1>
            </div>

            <div class="col-sm-8 col-md-8 col-lg-3 cont-login mx-2 my-2 h-100">
                <div class="row">
                    <div class="col-sm-12 login">
                        <form class="overflow-hidden" id="formLogin" role="form" method="POST" action="{{ url('/login') }}">
                            <h2>Inicio sesión</h2>
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="email">Correo electrónico</label>
                                <input type="text" name="email" class="form-control" autocomplete="off">
                            </div>

                            <div class="form-group">
                                <label for="password">Contraseña</label>
                                <input type="password" name="password" class="form-control" autocomplete="off">
                            </div>

                            <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input" id="localStorageLogin">
                                <label class="form-check-label" for="exampleCheck1">Recordar inicio sesion</label>
                              </div>

                            <div class="form-group text-center">
                                <input type="submit" class="btn btn-primary" style="padding:8px 100px;margin-top:25px;" value="Entrar" >
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-sm-12 col-md-8 col-lg-3 col-register mx-2 my-2">
                <div class="row">
                    <div class="col-sm-12 registro">
                        <form class="overflow-hidden" id="formRegister" role="form" action="{{ url('register') }}" method="POST">
                            <h2>¡Únete!</h2>
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="userRegister">Nombre usuario</label>
                                <input type="text" name="userRegister" class="form-control" autocomplete="off">
                            </div>

                            <div class="form-group">
                                <label for="emailRegister">Email</label>
                                <input type="email" name="userEmailRegister" class="form-control" autocomplete="off">
                            </div>

                            <div class="form-group">
                                <label for="passwordRegister">Contraseña</label>
                                <input type="password" name="userPasswordRegister" class="form-control" autocomplete="off">
                            </div>

                            <div class="form-group">
                                <label for="confirmnpasswordRegister">Confirmar contraseña</label>
                                <input type="password" name="userConfirmnPasswordRegister" class="form-control" autocomplete="off">
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
