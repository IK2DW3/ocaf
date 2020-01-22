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
                                <input type="text" name="email" id="email" class="form-control" autocomplete="off">
                            </div>

                            <div class="form-group">
                                <label for="password">Contraseña</label>
                                <input type="password" name="password" id="password" class="form-control">
                            </div>

                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-primary" style="padding:8px 100px;margin-top:25px;">
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
                                <label for="newusername">Nombre usuario</label>
                                <p id="obligatorio"></p>
                                <input type="text" name="newusername" id="newusername" class="form-control" onblur="ComprobarNombre()" autocomplete="off">
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <p id="email1"></p>
                                <input type="email" name="email" id="emailx" class="form-control" onblur="ComprobarEmail()" autocomplete="off">
                            </div>

                            <div class="form-group">
                                <label for="newpassword">Contraseña</label>
                                <p id="obligatorio1"></p>
                                <input type="password" name="newpassword" id="newpassword" class="form-control" onblur="ComprobarPassword1()">
                            </div>

                            <div class="form-group">
                                <label for="confirmnewpassword">Confirmar contraseña</label>
                                <input type="password" name="confirmnewpassword" id="confirmnewpassword" class="form-control" onblur="ComprobarPassword2()">
                            </div>

                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-primary" style="padding:8px 100px;margin-top:25px;">
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
		//Validaciones del Formulario
		function ComprobarEmail() {
			var valor = document.getElementById("emailx").value;

			console.log(valor);


			re = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

			if (valor == null || valor.length == 0 || /^\s+$/.test(valor)) {

				//alert("Campo Obligatorio");
				document.getElementById("emailx").style.border = ".1em " + "red" + " solid";
				document.getElementById("email1").innerHTML = "<p>Campo Obligatorio *</p>";
				document.getElementById("email1").style.color = "red";
			} else {
				if (!re.test(valor)) {

					//alert('email no valido');
					document.getElementById("emailx").style.border = ".1em " + "red" + " solid";
					document.getElementById("email1").innerHTML = "<p>Email no valido *</p>";

					document.getElementById("email1").style.color = "red";
					document.getElementById("email1").clear;
				} else {

					document.getElementById("emailx").style.border = ".1em " + "green" + " solid";
					document.getElementById("email1").innerHTML = "<p></p>";

				}


			}
		}

		function ComprobarNombre() {



			var valor = document.getElementById("newusername").value;
			console.log(valor);
			if (valor == null || valor.length == 0 || /^\s+$/.test(valor)) {
				//alert("Campo Obligatorio");
				document.getElementById("newusername").style.border = ".1em " + "red" + " solid";
				document.getElementById("obligatorio").innerHTML = "<p>Campo Obligatorio *</p>";
				document.getElementById("obligatorio").style.color = "red";
			} else {
				document.getElementById("newusername").style.border = ".1em " + "green" + " solid";
				document.getElementById("obligatorio").innerHTML = "<p></p>";

			}
		}

		function ComprobarPassword1() {
            var valor1 = document.getElementById("newpassword").value;
            var valor2 = document.getElementById("confirmnewpassword").value;
			console.log(valor1);
			/*if (valor1 == null || valor1.length == 0 || /^\s+$/.test(valor1)) {
				//alert("Campo Obligatorio");
				document.getElementById("contraseña").style.border = ".1em " + "red" + " solid";
				document.getElementById("obligatorio1").innerHTML = "<p>Campo Obligatorio *</p>";
				document.getElementById("obligatorio1").style.color = "red";
			}
			else{
				document.getElementById("contraseña").style.border = ".1em " + "green" + " solid";
				document.getElementById("obligatorio").innerHTML = "<p></p>";
			}*/


			if (valor1 == null || valor1.length == 0 || /^\s+$/.test(valor1)) {


				document.getElementById("obligatorio1").innerHTML = "<p>Campo Obligatorio *</p>";
				document.getElementById("obligatorio1").style.color = "red";
				document.getElementById("newpassword").style.border = ".1em " + "red" + " solid";
			} else {
				if (valor1.length < 8) {
					document.getElementById("obligatorio1").innerHTML = "<p>La contraseña tiene que más de 8 carácteres *</p>";
					document.getElementById("obligatorio1").style.color = "red";
					document.getElementById("newpassword").style.border = ".1em " + "red" + " solid";
				} else {
					document.getElementById("obligatorio1").innerHTML = "<p></p>";

					document.getElementById("newpassword").style.border = ".1em " + "green" + " solid";
				}
			}

        }
        function ComprobarPassword2() {
            var valor1 = document.getElementById("newpassword").value;
            var valor2 = document.getElementById("confirmnewpassword").value;
			console.log(valor1);

			if (valor1 == null || valor1.length == 0 || /^\s+$/.test(valor1)) {


				document.getElementById("obligatorio1").innerHTML = "<p>Campo Obligatorio *</p>";
				document.getElementById("obligatorio1").style.color = "red";
				document.getElementById("confirmnewpassword").style.border = ".1em " + "red" + " solid";
			} else {
				if (valor1.length < 8) {
					document.getElementById("obligatorio1").innerHTML = "<p>La contraseña tiene que más de 8 carácteres *</p>";
					document.getElementById("obligatorio1").style.color = "red";
					document.getElementById("confirmnewpassword").style.border = ".1em " + "red" + " solid";
				} else {
                    if (valor1 != valor2) {
                        document.getElementById("obligatorio1").innerHTML = "<p>La contraseña no coinciden *</p>";
					    document.getElementById("obligatorio1").style.color = "red";
					    document.getElementById("confirmnewpassword").style.border = ".1em " + "red" + " solid";
                    }
                    else{
					document.getElementById("obligatorio1").innerHTML = "<p></p>";

                    document.getElementById("confirmnewpassword").style.border = ".1em " + "green" + " solid";
                }
				}
			}

		}
	</script>

@stop
