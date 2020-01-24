@extends('layouts.master')

@section('content')
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<style>
.errores{
    color:red;
}
.campoError{
    border: ".15em " + "red" + " solid";
}
.campoCorrecto{
    border: ".15em " + "green" + " solid";
}
</style>
<script type="text/javascript">
    var EmailFormato = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    $(document).ready(function () {

        $("#registrarse").click(function () {
                var nombre = $("#newusername").val();
                var email = $("#emailx").val();
                var password1 = $("#newpassword").val();
                var password2 = $("#confirmnewpassword").val();

                if (nombre == "" || email == "" || password1 == "" || password2 == "") {
                    $("#mensajeAviso").fadeIn();
                    $("#mensajeAviso").css("color", "red");
                    $("#mensajeAviso").text('Todos los campos son requeridos');
                    return false;
                } else {
                    $("#mensajeAviso").fadeOut();
                }
                if (password1 != password2) {
                    $("#mensajePassword2").fadeIn();
                    $("#mensajePassword2").css("color", "red");
                    $("#mensajePassword2").text('Las contraseñas no coinciden');
                    $("#newpassword").css("border", ".15em " + "red" + " solid");
                    $("#confirmnewpassword").css("border", ".15em " + "red" + " solid");

                    return false;
                } else {
                    $("#mensajePassword2").fadeOut();
                }
            }),
            $("#newusername").blur(function () {
                var nombre = $("#newusername").val();
                if (nombre == "") {
                    $("#mensajeNombre").fadeIn();
                    $("#mensajeNombre").text('El campo nombre es requerido');
                    $("#newusername").css("border", ".15em " + "red" + " solid");
                    $("#mensajeNombre").css("color", "red");
                    return false;
                } else {
                    $("#mensajeNombre").fadeOut();
                    $("#newusername").css("border", ".15em " + "green" + " solid");
                }
            }), $("#newusername").keydown(function () {
                var nombre = $("#newusername").val();
                if (!nombre == "") {
                    $("#mensajeNombre").fadeOut();
                    $("#newusername").css("border", ".15em " + "green" + " solid");
                }else if (nombre == "") {
                    $("#mensajeNombre").fadeOut();
                    $("#newusername").css("border", ".15em " + "red" + " solid");
                }
            }), $("#newpassword").blur(function () {
                var password1 = $("#newpassword").val();
                if (password1 == "") {
                    $("#mensajePassword1").fadeIn();


                    $("#newpassword").css("border", ".15em " + "red" + " solid");
                    $("#mensajePassword1").text('Por seguridad es requerido una contraseña');
                    $("#mensajePassword1").css("color", "red");

                    return false;
                } else if (password1.length < 8) {
                    $("#mensajePassword1").fadeIn();
                    $("#newpassword").css("border", ".15em " + "red" + " solid");
                    $("#mensajePassword1").text('La contraseña debe tener mínimo 8 caracteres');
                    $("#mensajePassword1").css("color", "red");
                    return false;
                } else {
                    $("#mensajePassword1").fadeOut();
                    $("#newpassword").css("border", ".15em " + "green" + " solid");
                }
            }), $("#newpassword").keydown(function () {
                var password1 = $("#newpassword").val();
                if (password1.length > 8) {
                    $("#mensajePassword1").fadeOut();
                    $("#newpassword").css("border", ".15em " + "green" + " solid");
                }
            }), $("#confirmnewpassword").blur(function () {
                var password2 = $("#confirmnewpassword").val();
                if (password2 == "") {
                    $("#mensajePassword2").fadeIn();
                    $("#confirmnewpassword").css("border", ".15em " + "red" + " solid");
                    $("#mensajePassword2").text('Por seguridad es requerido una contraseña');
                    $("#mensajePassword2").css("color", "red");


                    return false;
                } else {
                    $("#mensajePassword2").fadeOut();
                    $("#confirmnewpassword").css("border", ".15em " + "green" + " solid");
                }
            }), $("#emailx").blur(function () {
                var email = $("#emailx").val();
                if (email == ""||!EmailFormato.test(email)) {
                    $("#mensajeEmail").fadeIn();
                    $("#mensajeEmail").text('El campo email es requerido con su correspondiente formato');
                    $("#emailx").css("border", ".15em " + "red" + " solid");
                    $("#mensajeEmail").css("color", "red");
                    return false;
                    
                   
                } else {
                    if (!EmailFormato.test(email)) {
                        $("#mensajeEmail").fadeIn();
                        $("#mensajeEmail").css("color", "red");
                        $("#emailx").css("border", ".15em " + "red" + " solid");
                        $("#mensajeEmail").text('El formato del email no es correcta');
                        return false;
                    }else{
                        $("#mensajeEmail").fadeOut();
                    }
                }
            }), $("#emailx").keypress(function () {
                var email = $("#emailx").val();
                if (EmailFormato.test(email)) {
                    $("#emailx").css("border", ".15em " + "green" + " solid");

                }else {
                    $("#mensajeEmail").fadeOut();
                }
            });
    })

</script>
<style type="text/css">
    .errores {
        color: red;
    }

    .campoErroneo {
        border: ".5em "+ "red"+ " solid";
    }

    ·campoCorrecto {
        border: ".5em "+ "green"+ " solid";
    }

</style>
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
                    <form class="overflow-hidden" action="{{ url('/login') }}" method="POST">
                        <h2>Inicio sesión</h2>
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="username">Correo electrónico</label>
                            <p id="mensajeEmail2"></p>
                            <input type="text" name="email" id="email" class="form-control" autocomplete="off">
                        </div>

                        <div class="form-group">
                            <label for="password">Contraseña</label>
                            <p id="mensajePasswordLogin"></p>
                            <input type="password" name="password" id="password" class="form-control">
                        </div>

                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary" style="padding:8px 100px;margin-top:25px;"
                                name="iniciar" id="iniciar">
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
                    <form class="overflow-hidden" action="{{ url('register') }}" method="POST" id="FormRegistro">
                        <h2>¡Únete!</h2>
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="newusername">Nombre usuario</label>
                            <p id="mensajeNombre"></p>
                            <div id="mensajeNombre"></div>
                            <input type="text" name="newusername" id="newusername" class="form-control"
                                autocomplete="off">
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <p id="mensajeEmail"></p>
                            <input type="email" name="email" id="emailx" class="form-control" autocomplete="off">
                        </div>

                        <div class="form-group">
                            <label for="newpassword">Contraseña</label>
                            <p id="mensajePassword1"></p>
                            <input type="password" name="newpassword" id="newpassword" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="confirmnewpassword">Confirmar contraseña</label>
                            <p id="mensajePassword2"></p>
                            <input type="password" name="confirmnewpassword" id="confirmnewpassword"
                                class="form-control">
                        </div>

                        <div class="form-group text-center">
                            <p id="mensajeAviso"></p>
                            <button type="submit" class="btn btn-primary" style="padding:8px 100px;margin-top:25px;"
                                name="registrarse" id="registrarse">
                                Registrarse
                            </button>
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
