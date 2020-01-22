require('./bootstrap');

window.Vue = require('vue');

/**
 * https://sweetalert2.github.io/
 */
import VueSweetalert2 from 'vue-sweetalert2';
import 'sweetalert2/dist/sweetalert2.min.css';
Vue.use(VueSweetalert2);

/**
 * Creacion de los componentes vue a usar
 */
Vue.component('example-component', require('./components/ExampleComponent.vue').default);
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

$(document).ready(function() {

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

    if ($("#btnLogin") != null) {

        $("#btnLogin").click(function() {

            // Previene el funcionamiento por defecto
            //e.preventDefault();

            var email = $("input[name=emailLogin]").val();
            var password = $("input[name=passwordLogin]").val();

            if (email == null || email == "") {
                alert('Email incorrecto');
            } else if (password == null || password == "") {
                alert('Password incorrecto');
            }

        });
    }

});
