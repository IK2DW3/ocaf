require('./bootstrap');

window.Vue = require('vue');

/**
 * https://sweetalert2.github.io/
 */
import VueSweetalert2 from 'vue-sweetalert2';
import 'sweetalert2/dist/sweetalert2.min.css';
Vue.use(VueSweetalert2);

window.$ = require('jquery');
window.JQuery = require('jquery');

/**
 * Creacion de los componentes vue a usar
 */
Vue.component('example-component', require('./components/ExampleComponent.vue').default);

Vue.component('perfil-usuario', require('./components/PerfilUsuario.vue').default);

Vue.component('crudadm-users', require('./components/CrudadmUsers.vue').default);
Vue.component('crudadm-ambits', require('./components/CrudadmAmbitos.vue').default);
Vue.component('crudadm-continents', require('./components/CrudadmContinentes.vue').default);
Vue.component('crudadm-cartas', require('./components/CrudadmCartas.vue').default);
Vue.component('vue-historys', require('./components/VueHistorys.vue').default);

Vue.component('selector-juego', require('./components/SelectorJuego.vue').default);
Vue.component('tablero-normal', require('./components/TableroNormal.vue').default);

/**
 * Creacion de las nuevas instancias vue
 */
const app = new Vue({
    el: '#app',
});
const Swal = require('sweetalert2');

$(function() {

    /**
     * Comprobacion del login
     */
    function validarLogin(event) {

        // Inicializacion de variables
        var email = $("input[name=email]").val();
        var password = $("input[name=password]").val();
        var testEmail = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
        var valido = true;
        // Condiciones
        if (email == "" && password == "") {
            Swal.fire({
                icon: 'error',
                title: 'Email y contraseña vacios',
                text: 'El campo email esta vacio',
            });
            $("input[name=email]").css('border', '1px solid red');
            $("input[name=password]").css('border', '1px solid red');
            $("input[name=email]").attr("placeholder", "Email incorrecto");
            $("input[name=password]").attr("placeholder", "Contraseña incorrecta");
            valido = false;
        } else if (email == null || email == "" || /^\s+$/.test(email)) {
            Swal.fire({
                icon: 'error',
                title: 'Email',
                text: 'El campo email esta vacio',
            });
            $("input[name=email]").css('border', '1px solid red');
            $("input[name=email]").attr("placeholder", "Email incorrecto");
            valido = false;
        } else if (!testEmail.test(email)) {
            Swal.fire({
                icon: 'error',
                title: 'Email',
                text: 'Tipo de email esta incorrecto',
            });
            $("input[name=email]").css('border', '1px solid red');
            $("input[name=email]").attr("placeholder", "Tipo email incorrecto");
            valido = false;
        } else if (password == null || password == "") {
            Swal.fire({
                icon: 'error',
                title: 'Contraseña',
                text: 'El campo contraseña esta vacio',
            });
            $("input[name=password]").css('border', '1px solid red');
            $("input[name=password]").attr("placeholder", "Contraseña incorrecta");
            valido = false;
        }

        if ($("#localStorageLogin")[0].checked) {
            localStorage.setItem('usuarioLogeado', email);
            localStorage.setItem('contraseñaLogeado', password);
        } else {
            localStorage.removeItem('usuarioLogeado');
            localStorage.removeItem('contraseñaLogeado');
        }

        if (valido) {
            return valido;
        }

        // Previene el funcionamiento por defecto
        event.preventDefault();
    }
    // Pasar el parametro onsubmit al formulario
    if ($("#formLogin") != null) {
        // Inicializacion de variables
        if (localStorage.getItem("usuarioLogeado") && localStorage.getItem("contraseñaLogeado")) {
            $("input[name=email]").val(localStorage.getItem("usuarioLogeado"));
            $("input[name=password]").val(localStorage.getItem("contraseñaLogeado"));
            $("#localStorageLogin").prop('checked', true);
        }
        $('#formLogin').on('submit', validarLogin);
        $('input[name=email]').on('change', volverCss);
        $('input[name=password]').on('change', volverCss);
    }

    function validarRegistro(event) {

        var nombre = $("input[name=userRegister]").val();
        var email = $("input[name=userEmailRegister]").val();
        var password = $("input[name=userPasswordRegister]").val();
        var confirmPassword = $("input[name=userConfirmnPasswordRegister]").val();
        var testEmail = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;

        if (nombre == "" && email == "" && password == "" && confirmPassword == "") {
            Swal.fire({
                icon: 'error',
                title: 'Campos Requeridos',
                text: 'Todos los campos son requeridos',
            });
            $("input[name*=user]").css({ 'border': '1px solid red' });
            $("input[name*=user]").attr("placeholder", "Campo requerido");
            return false;

        } else if (nombre == "" || nombre == null) {
            Swal.fire({
                icon: 'error',
                title: 'Nombre',
                text: 'Campo nombre vacio',
            });
            $("input[name*=userRegister]").css({ 'border': '1px solid red' });
            return false;

        } else if (nombre.length < 6 || nombre.length > 16) {
            Swal.fire({
                icon: 'error',
                title: 'Nombre',
                text: 'Longitud del campo incorrecto. Min (6) - Max (16)',
            });
            $("input[name*=userRegister]").css({ 'border': '1px solid red' });
            return false;

        } else if (email == "" || email == null || /^\s+$/.test(email)) {
            Swal.fire({
                icon: 'error',
                title: 'Email',
                text: 'Campo email vacio o inválido',
            });
            $("input[name=userEmailRegister]").css({ 'border': '1px solid red' });
            return false;

        } else if (!testEmail.test(email)) {
            Swal.fire({
                icon: 'error',
                title: 'Email',
                text: 'Formato de email incorrecto',
            });
            $("input[name=userEmailRegister]").css({ 'border': '1px solid red' });
            return false;

        } else if (password == "" || password == null) {
            Swal.fire({
                icon: 'error',
                title: 'Contraseña',
                text: 'Campo nombre vacio',
            });
            $("input[name=userPasswordRegister]").css({ 'border': '1px solid red' });
            return false;

        } else if (password.length < 6 || password.length > 16) {
            Swal.fire({
                icon: 'error',
                title: 'Contraseña',
                text: 'Longitud del campo incorrecto. Min (6) - Max (16)',
            });
            $("input[name=userPasswordRegister]").css({ 'border': '1px solid red' });
            return false;

        } else if (confirmPassword == "" || confirmPassword == null) {
            Swal.fire({
                icon: 'error',
                title: 'Contraseña',
                text: 'Campo de confirmacion vacio',
            });
            $("input[name=userConfirmnPasswordRegister]").css({ 'border': '1px solid red' });
            return false;

        } else if (password != confirmPassword) {
            Swal.fire({
                icon: 'error',
                title: 'Contraseña',
                text: 'Las contraseñas que has introducido no coinciden',
            });
            $("input[name*=Password]").css({ 'border': '1px solid red' });
            return false;

        } else {
            return true;
        }

        // Previene el funcionamiento por defecto
        event.preventDefault();

    }

    if ($("#formRegister") != null) {
        // Inicializacion de variables
        $("input[name=userRegister]").keypress(function () {
            var nombre = $(this).val();
            if (nombre.length < 6 || nombre.length > 16) {
                $("#mensajeNombre").fadeIn();
                $("#mensajeNombre").text("* Nombre no válido").css({ 'color': 'red' });
                $("input[name=userRegister]").css({ 'border': "1px solid red" });
            } else {
                $("#mensajeNombre").fadeOut();
                $(this).css({ 'border': "1.5px solid green" });
            }
        });
        $("input[name=userEmailRegister]").keypress(function() {
            var email = $(this).val();
            var testEmail = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
            if (!testEmail.test(email)) {
                $("#mensajeEmail").fadeIn();
                $("#mensajeEmail").text("* Formato de email no válido").css({'color':'red'});
                $("input[name=userEmailRegister]").css({'border': "1px solid red"});
            } else {
                $("#mensajeEmail").fadeOut();
                $(this).css({'border': "1px solid green" });
            }
        });
        $("input[name=userPasswordRegister]").keypress(function () {
            var password = $(this).val();
            if (password.length < 6 || password.length > 16) {
                $("#mensajePassword1").fadeIn();
                $("#mensajePassword1").text("* Min(6) - Max(16)").css({ 'color': 'red' });
                $("input[name=userPasswordRegister]").css({ 'border': "1px solid red" });
            } else {
                $("#mensajePassword1").fadeOut();
                $(this).css({ 'border': "1px solid green" });
            }
        });
        $("input[name=userConfirmnPasswordRegister]").keyup(function () {
            var password = $("input[name=userPasswordRegister]").val();
            var confirmPassword = $("input[name=userConfirmnPasswordRegister]").val();
            if (!(confirmPassword === password)) {
                $("#mensajePassword1").fadeIn();
                $("#mensajePassword2").fadeIn();
                $("#mensajePassword1").text("* Las contraseñas no coinciden").css({ 'color': 'red' });
                $("#mensajePassword2").text("* Las contraseñas no coinciden").css({ 'color': 'red' });
                $("input[name=userConfirmnPasswordRegister]").css({ 'border': "1px solid red" });
                $("input[name=userPasswordRegister]").css({ 'border': "1px solid red" });
            } else {
                $("#mensajePassword1").fadeOut();
                $("#mensajePassword2").fadeOut();
                $("input[name=userConfirmnPasswordRegister]").css({ 'border': "1px solid green" });
                $("input[name=userPasswordRegister]").css({ 'border': "1px solid green" });
            }
        });
        $('#formRegister').on('submit', validarRegistro);
    }

    /**
     * Creacion de localStorage para seleccion de juego
     */

    if ($("#modoIndividual") != null || $("#modoGrupal") != null) {

        $("#modoIndividual").click(function(i) {
            var modoSeleccionado = $(this).text();
            localStorage.setItem('modoSeleccionado', modoSeleccionado);
        });

        $("#modoGrupal").click(function(i) {
            var modoSeleccionado = $(this).text();
            localStorage.setItem('modoSeleccionado', modoSeleccionado);
        });

    }

    /**
     * Colorizacion de cartas en modo historia
     */
    function checkAmbit() {

        var element = $('.card-footer');

        element.each(function(index, element) {

            if ($(element).text() == "Antropología") {
                $(this).parent().children().first().addClass('antropologia');
                $(this).addClass('antropologia');

            } else if ($(element).text() == "Derecho") {
                $(this).parent().children().first().addClass('derecho');
                $(this).addClass('derecho');

            } else if ($(element).text() == "Economía") {
                $(this).parent().children().first().addClass('economia');
                $(this).addClass('economia');

            } else if ($(element).text() == "Filosofía") {
                $(this).parent().children().first().addClass('filosofia');
                $(this).addClass('filosofia');

            } else if ($(element).text() == "Geografía") {
                $(this).parent().children().first().addClass('geografia');
                $(this).addClass('geografia');

            } else if ($(element).text() == "Historia") {
                $(this).parent().children().first().addClass('historia');
                $(this).addClass('historia');

            } else if ($(element).text() == "Pedagogía") {
                $(this).parent().children().first().addClass('pedagogia');
                $(this).addClass('pedagogia');

            } else if ($(element).text() == "Psicología") {
                $(this).parent().children().first().addClass('psicologia');
                $(this).addClass('psicologia');

            } else if ($(element).text() == "Sociología") {
                $(this).parent().children().first().addClass('sociologia');
                $(this).addClass('sociologia');
            }
        });

    }
    if ($("#cartas") != null) {
        // Si el componente esta cargado
        setTimeout(checkAmbit, 500);
        // Si hay cambios en el div #cartas...
        $("#cartas").on("DOMSubtreeModified", function() {
            setTimeout(checkAmbit, 100);
        });

    }


    /**
     * Configuracion del Floatin Action Button
     */

    /* Desplegable del menu */
    $('.btn-fab').click(function(e) {
        $('.menuslide').slideToggle('fast');
    });

    /* Mostrar texto */
    $('.btn-fab').hover(function() {
        $(this).parent().siblings('div').children().first().slideToggle('fast');
    });
    /*Boton subir */
    $('#botonSubir').hover(function() {
        $(this).parent().siblings('div').children().first().slideToggle('fast');
    });
    $('#botonSubir').click(function() {
        $("html, body").animate({ scrollTop: 0 });
    });
    /*Boton bajar */
    $('#botonBajar').hover(function() {
        $(this).parent().siblings('div').children().first().slideToggle('fast');
    });
    $('#botonBajar').click(function() {
        $("html, body").animate({ scrollTop: $(document).height() - $(window).height() });
    });

    $('#botonPerfil').hover(function() {
        $(this).parent().siblings('div').children().first().slideToggle('fast');
    });

    $('#botonPanel').hover(function() {
        $(this).parent().siblings('div').children().first().slideToggle('fast');
    });

});
