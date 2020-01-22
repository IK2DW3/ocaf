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
                            <input type="text" name="newusername" id="newusername" class="form-control" autocomplete="off">
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <p id="mensajeEmail"></p>
                            <input type="email" name="email" id="emailx" class="form-control" 
                                autocomplete="off">
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
<script type="text/javascript">

    window.addEventListener("load", validar);
    document.formulario.addEventListener("submit",ValidarTodo);

    function validar() {
    document.getElementById("emailx").addEventListener("blur", ComprobarEmail);
    document.getElementById("email").addEventListener("blur", ComprobarEmailLogin);
    document.getElementById("newusername").addEventListener("blur", ComprobarNombre);
    document.getElementById("newpassword").addEventListener("blur", ComprobarPassword1);
    document.getElementById("confirmnewpassword").addEventListener("blur", ComprobarPassword2);
    document.getElementById("password").addEventListener("blur", ComprobarPasswordLogin);
    document.getElementById("registrarse").addEventListener("click", ComprobarEmail);
    document.getElementById("registrarse").addEventListener("click", ComprobarPassword1);
    document.getElementById("registrarse").addEventListener("click", ComprobarNombre);
    document.getElementById("registrarse").addEventListener("click", ComprobarPassword2);
    document.getElementById("iniciar").addEventListener("click", ComprobarPasswordLogin);
    document.getElementById("iniciar").addEventListener("click", ComprobarEmailLogin);
    }



        //Validaciones del Formulario
        function ComprobarEmail() {
			var valor = document.getElementById("emailx").value;

			console.log(valor);


			re = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

			if (valor == null || valor.length == 0 || /^\s+$/.test(valor)) {

				//alert("Campo Obligatorio");
				document.getElementById("emailx").style.border = ".1em " + "red" + " solid";
				document.getElementById("mensajeEmail").innerHTML = "<p>Campo Obligatorio *</p>";
                document.getElementById("mensajeEmail").style.color = "red";
                event.preventDefault();
			} else {
				if (!re.test(valor)) {

					//alert('email no valido');
					document.getElementById("emailx").style.border = ".1em " + "red" + " solid";
					document.getElementById("mensajeEmail").innerHTML = "<p>Email no valido *</p>";

					document.getElementById("mensajeEmail").style.color = "red";
                    document.getElementById("mensajeEmail").clear;
                    event.preventDefault();
				} else {

					document.getElementById("emailx").style.border = ".1em " + "green" + " solid";
					document.getElementById("mensajeEmail").innerHTML = "<p></p>";

				}

			}
        }
        function ComprobarEmailLogin() {
			var valor = document.getElementById("email").value;

			console.log(valor);


			re = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

			if (valor == null || valor.length == 0 || /^\s+$/.test(valor)) {

				//alert("Campo Obligatorio");
				document.getElementById("email").style.border = ".1em " + "red" + " solid";
				document.getElementById("mensajeEmail2").innerHTML = "<p>Campo Obligatorio *</p>";
                document.getElementById("mensajeEmail2").style.color = "red";
                event.preventDefault();
			} else {
				if (!re.test(valor)) {

					//alert('email no valido');
					document.getElementById("email").style.border = ".1em " + "red" + " solid";
					document.getElementById("mensajeEmail2").innerHTML = "<p>Email no valido *</p>";

					document.getElementById("mensajeEmail2").style.color = "red";
                    document.getElementById("mensajeEmail2").clear;
                    event.preventDefault();
				} else {

					document.getElementById("email").style.border = ".1em " + "green" + " solid";
					document.getElementById("mensajeEmail2").innerHTML = "<p></p>";

				}

			}
		}

		function ComprobarNombre() {
			var valor = document.getElementById("newusername").value;
			console.log(valor);
			if (valor == null || valor.length == 0 || /^\s+$/.test(valor)) {
				//alert("Campo Obligatorio");
				document.getElementById("newusername").style.border = ".1em " + "red" + " solid";
				document.getElementById("mensajeNombre").innerHTML = "<p>Campo Obligatorio *</p>";
                document.getElementById("mensajeNombre").style.color = "red";
                event.preventDefault();
			} else {
				document.getElementById("newusername").style.border = ".1em " + "green" + " solid";
				document.getElementById("mensajeNombre").innerHTML = "<p></p>";

			}
		}
        function ComprobarPasswordLogin() {
            var valor1 = document.getElementById("password").value;
			console.log(valor1);

			if (valor1 == null || valor1.length == 0 || /^\s+$/.test(valor1)) {


				document.getElementById("mensajePasswordLogin").innerHTML = "<p>Campo Obligatorio *</p>";
				document.getElementById("mensajePasswordLogin").style.color = "red";
                document.getElementById("password").style.border = ".1em " + "red" + " solid";
                event.preventDefault();
			} else {
				if (valor1.length < 8) {
					document.getElementById("mensajePasswordLogin").innerHTML = "<p>La contraseña tiene que más de 8 carácteres *</p>";
					document.getElementById("mensajePasswordLogin").style.color = "red";
                    document.getElementById("password").style.border = ".1em " + "red" + " solid";
                    event.preventDefault();
				} else {
					document.getElementById("mensajePasswordLogin").innerHTML = "<p></p>";

					document.getElementById("password").style.border = ".1em " + "green" + " solid";
				}
			}

        }

		function ComprobarPassword1() {
            var valor1 = document.getElementById("newpassword").value;
            var valor2 = document.getElementById("confirmnewpassword").value;
			console.log(valor1);

			if (valor1 == null || valor1.length == 0 || /^\s+$/.test(valor1)) {


				document.getElementById("mensajePassword1").innerHTML = "<p>Campo Obligatorio *</p>";
				document.getElementById("mensajePassword1").style.color = "red";
                document.getElementById("newpassword").style.border = ".1em " + "red" + " solid";
                event.preventDefault();
			} else {
				if (valor1.length < 8) {
					document.getElementById("mensajePassword1").innerHTML = "<p>La contraseña tiene que más de 8 carácteres *</p>";
					document.getElementById("mensajePassword1").style.color = "red";
                    document.getElementById("newpassword").style.border = ".1em " + "red" + " solid";
                    event.preventDefault();
				} else {
					document.getElementById("mensajePassword1").innerHTML = "<p></p>";

					document.getElementById("newpassword").style.border = ".1em " + "green" + " solid";
				}
			}

        }
        function ComprobarPassword2() {
            var valor1 = document.getElementById("newpassword").value;
            var valor2 = document.getElementById("confirmnewpassword").value;
			console.log(valor1);

			if (valor1 == null || valor1.length == 0 || /^\s+$/.test(valor1)) {


				document.getElementById("mensajePassword2").innerHTML = "<p>Campo Obligatorio *</p>";
				document.getElementById("mensajePassword2").style.color = "red";
                document.getElementById("confirmnewpassword").style.border = ".1em " + "red" + " solid";
                event.preventDefault();
			} else {
				if (valor1.length < 8) {
					document.getElementById("mensajePassword2").innerHTML = "<p>La contraseña tiene que más de 8 carácteres *</p>";
					document.getElementById("mensajePassword2").style.color = "red";
                    document.getElementById("confirmnewpassword").style.border = ".1em " + "red" + " solid";
                    event.preventDefault();
				} else {
                    if (valor1 != valor2) {
                        document.getElementById("mensajePassword2").innerHTML = "<p>La contraseña no coinciden *</p>";
					    document.getElementById("mensajePassword2").style.color = "red";
                        document.getElementById("confirmnewpassword").style.border = ".1em " + "red" + " solid";
                        event.preventDefault();
                    }
                    else{
					document.getElementById("mensajePassword2").innerHTML = "<p></p>";

                    document.getElementById("confirmnewpassword").style.border = ".1em " + "green" + " solid";
                }
				}
			}

        }
        

</script>

@stop
