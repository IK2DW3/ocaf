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
Vue.component('crudadm-cartas', require('./components/CrudadmCartas.vue').default);

/**
 * Creacion de las nuevas instancias vue
 */
const app = new Vue({
    el: '#app',
});
const options = {
    confirmButtonColor: '#41b882',
    cancelButtonColor: '#ff7674',
};