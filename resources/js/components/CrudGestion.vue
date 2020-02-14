<template>

    <div class="row panel-ambitos mx-5 px-2 py-3 rounded w-100">
        <div class="col-md-2 panel-aside border-right px-2 py-2">
            <h2>Gestionar</h2>
            <div class="btn-group-vertical panel-aside-navegador w-100">
                <a type="button" id="btnUsuarios" class="btn btn-secondary" v-text="'Usuarios'" @click="getOption('#btnUsuarios')">&#x1F465;</a>
                <a type="button" id="btnAmbitos" class="btn btn-secondary" v-text="'Ambitos'" @click="getOption('#btnAmbitos')">&#x1F393;</a>
                <a type="button" id="btnContinentes" class="btn btn-secondary" v-text="'Continentes'" @click="getOption('#btnContinentes')">&#x1F310;</a>
                <a type="button" id="btnCartas" class="btn btn-secondary" v-text="'Cartas'" @click="getOption('#btnCartas')">&#x1F4D6;</a>
                <a type="button" id="btnPreguntas" class="btn btn-secondary" v-text="'Preguntas'" @click="getOption('#btnPreguntas')">&#x2047;</a>
            </div>
        </div>
        <div class="col-md-10 panel-contenido px-2 py-2">
            <div class="row" id="master">
                <div class="col-sm-12 my-2">
                    <h2>Tabla del NET</h2>
                </div>
                <div class="col-sm-12 my-2">
                    <input class="form-control" type="search" v-model="busqueda" name="buscador" placeholder="Buscar en la tabla" autocomplete="off">
                </div>
                <div class="col-sm-12" v-if="opcion == 'Usuarios'">
                    <div class="table-responsive table-usuarios">
                        <table class="table table-striped rounded">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Tipo</th>
                                    <th scope="col">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="user in buscarUsuarios" :key="user.id">
                                    <td v-text="user.name"></td>
                                    <td v-text="user.email"></td>
                                    <td v-text="user.tipo"></td>
                                    <td>
                                        <div v-if="user.tipo != 'superadmin'" class="btn-group" role="group" aria-label="Basic example">
                                            <a href="" role="button" class="btn btn-secondary" title="Ver">&#x1F440;</a>
                                            <button type="button" class="btn btn-secondary" title="Editar" @click="loadFieldsUpdate(user)">&#x270E;</button>
                                            <button type="button" class="btn btn-secondary" title="Eliminar" @click="deleteTask(user)">&#x2716;</button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="row my-4">
                        <div class="col-sm-12">
                            <h3>Datos</h3>
                        </div>
                        <div class="col-sm-12">
                            <form>
                                <div class="form-row">
                                    <div class="form-group col-md-3">
                                        <label for="cartaNombres">Nombre</label>
                                        <input v-model="name" type="text" class="form-control" id="userNombre" autocomplete="off">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="cartaApellidos">Email</label>
                                        <input v-model="email" type="text" class="form-control" id="userEmail" autocomplete="off">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="cartaApellidos">Seleccionar tipo</label>
                                        <select v-model="tipo" class="custom-select" id="userTipo">
                                            <option disabled value="">Seleccionar rango</option>
                                            <option v-for="tipo in tipos" v-bind:key="tipo.id" :value="tipo.value">
                                                {{ tipo.text }}
                                            </option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="cartaFmuerte">Contraseña</label>
                                        <input v-model="password" type="password" class="form-control" id="userPassword" autocomplete="off">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-12 text-center">
                                        <!-- Botón que añade los datos del formulario, solo se muestra si la variable update es igual a 0-->
                                        <button v-if="update == 0" @click="saveTasks" class="btn btn-success">Añadir</button>
                                        <!-- Botón que modifica la tarea que anteriormente hemos seleccionado, solo se muestra si la variable update es diferente a 0-->
                                        <button v-if="update != 0" @click="updateTasks()" class="btn btn-warning">Actualizar</button>
                                        <!-- Botón que limpia el formulario y inicializa la variable a 0, solo se muestra si la variable update es diferente a 0-->
                                        <button v-if="update != 0" @click="clearFields()" class="btn btn-info">Atrás</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12" v-if="opcion == 'Ambitos'">
                    <div class="table-responsive table-ambitos">
                        <table class="table table-striped rounded">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">Ámbito en Español</th>
                                    <th scope="col">Ambit in English</th>
                                    <th scope="col">Eremu Euskeraz</th>
                                    <th scope="col">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="ambito in buscarAmbito" :key="ambito.id">
                                    <td v-text="ambito.ambitoEsp"></td>
                                    <td v-text="ambito.ambitoEng"></td>
                                    <td v-text="ambito.ambitoEus"></td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <a href="" role="button" class="btn btn-secondary" title="Ver">&#x1F440;</a>
                                            <button type="button" class="btn btn-secondary" title="Editar" @click="loadFieldsUpdate(ambito)">&#x270E;</button>
                                            <button type="button" class="btn btn-secondary" title="Eliminar" @click="deleteTask(ambito)">&#x2716;</button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="row my-4">
                        <div class="col-sm-12">
                            <h3>Datos</h3>
                        </div>
                        <div class="col-sm-12">
                            <form>
                                <div class="form-row">
                                    <div class="form-group col-md-3">
                                        <label for="ambitoEsp">Ambito en Español</label>
                                        <input v-model="ambitoEsp" type="text" class="form-control" id="ambitoEsp" autocomplete="off">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="ambitoEng">Ambit in English</label>
                                        <input v-model="ambitoEng" type="text" class="form-control" id="ambitoEng" autocomplete="off">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="ambitoEus">Eremu Euskeraz</label>
                                        <input v-model="ambitoEus" type="text" class="form-control" id="ambitoEus" autocomplete="off">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-12 text-center">
                                        <!-- Botón que añade los datos del formulario, solo se muestra si la variable update es igual a 0-->
                                        <button v-if="update == 0" @click="saveTasks" class="btn btn-success">Añadir</button>
                                        <!-- Botón que modifica la tarea que anteriormente hemos seleccionado, solo se muestra si la variable update es diferente a 0-->
                                        <button v-if="update != 0" @click="updateTasks()" class="btn btn-warning">Actualizar</button>
                                        <!-- Botón que limpia el formulario y inicializa la variable a 0, solo se muestra si la variable update es diferente a 0-->
                                        <button v-if="update != 0" @click="clearFields()" class="btn btn-info">Atrás</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</template>

<script>
export default {
    data(){
        return{
            opcion:'',
            busqueda:'',
            update:0,

            name:"",
            email:"",
            tipo:"",
            password:"",

            ambitoEsp:"",
            ambitoEng:"",
            ambitoEus:"",
            
            arrayUsuarios:[],
            tipos: [
                { text: 'Usuario', value: 'user' },
                { text: 'Administrador', value: 'administrator' },
                { text: 'Super Administrador', value: 'superadmin' }
            ],
            arrayAmbitos:[],
        }
    },
    methods: {
        getOption(element){
            this.opcion = $(element).text();
            return this.opcion
        },
        saveTasks(event){
            let me =this;
            let url = 'user/guardar';
            var testEmail = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
            // Condiciones
            if (me.name === "") {
                this.$swal({
                    icon: 'error',
                    title: 'Nombre',
                    text: 'Campo nombre vacio',
                });
                me.campoInvalido('#userNombre');
                me.valido = false;
            } else if (me.name < 6 || me.name > 12) {
                this.$swal({
                    icon: 'error',
                    title: 'Nombre',
                    text: 'El nombre debe estar entre un mínimo de 6 a 12 carácteres',
                });
                me.campoInvalido('#userNombre');
                me.valido = false;
            } else if (me.email === "" || /^\s+$/.test(me.email)) {
                this.$swal({
                    icon: 'error',
                    title: 'Email',
                    text: 'Campo email vacio',
                });
                me.campoInvalido('#userEmail');
                me.valido = false;
            } else if (!testEmail.test(me.email)) {
                this.$swal({
                    icon: 'error',
                    title: 'Email',
                    text: 'No has introducido un email válido',
                });
                me.campoInvalido('#userEmail');
                me.valido = false;
            } else if (me.tipo === "") {
                this.$swal({
                    icon: 'error',
                    title: 'Tipo',
                    text: 'Debes seleccionar un tipo de usuario',
                });
                me.campoInvalido('#userTipo');
                me.valido = false;
            } else if (me.password === "") {
                this.$swal({
                    icon: 'error',
                    title: 'Contraseña',
                    text: 'El campo contraseña está vacio',
                });
                me.campoInvalido('#userPassword');
                me.valido = false;
            } else if (me.password.length < 6 || me.password.length > 16) {
                this.$swal({
                    icon: 'error',
                    title: 'Contraseña',
                    text: 'La contraseña debe estar entre un mínimo de 6 a 16 carácteres',
                });
                me.campoInvalido('#userPassword');
                me.valido = false;
            } else {
                me.valido = true;
            }

            if (me.valido) {

                axios.post(url,{
                    'name':this.name,
                    'email':this.email,
                    'tipo':this.tipo,
                    'password':this.password,
                }).then(function (response) {
                    me.getTasks();
                    me.clearFields();
                })
                .catch(function (error) {
                    console.log(error);
                });

            }
            // Previene el funcionamiento por defecto
            event.preventDefault();

        },
    },
    computed: {
        buscarUsuarios() {
            return this.arrayUsuarios.filter((user) => user.name.toLowerCase().includes(this.busqueda.toLowerCase()) || user.email.toLowerCase().includes(this.busqueda.toLowerCase()) || user.tipo.toLowerCase().includes(this.busqueda.toLowerCase())
            );
        },
        buscarAmbito() {
            return this.arrayAmbitos.filter((ambito) => ambito.ambitoEsp.toLowerCase().includes(this.busqueda.toLowerCase()) || ambito.ambitoEng.toLowerCase().includes(this.busqueda.toLowerCase()) || ambito.ambitoEus.toLowerCase().includes(this.busqueda.toLowerCase())
            );
        },
    },
    
    
}
</script>
