<template>
    <div class="row" id="master">
        <div class="col-sm-12 my-2">
            <h2>Tabla del NET</h2>
        </div>
        <div class="col-sm-12 my-2">
            <input class="form-control" type="search" v-model="busqueda" name="buscador" placeholder="Buscar en la tabla" autocomplete="off">
        </div>
        <div class="col-sm-12">
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
                                <input v-model="name" type="text" class="form-control" id="cartaNombres" autocomplete="off">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="cartaApellidos">Email</label>
                                <input v-model="email" type="text" class="form-control" id="cartaApellidos" autocomplete="off">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="cartaApellidos">Seleccionar tipo</label>
                                <select v-model="tipo" class="custom-select">
                                    <option disabled value="">Seleccionar rango</option>
                                    <option v-for="tipo in tipos" v-bind:key="tipo.id" :value="tipo.value">
                                        {{ tipo.text }}
                                    </option>
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="cartaFmuerte">Contraseña</label>
                                <input v-model="password" type="password" class="form-control" id="cartaFmuerte" autocomplete="off">
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
</template>


<script>
    export default {
        data(){
            return{
                name:"",
                email:"",
                tipo:"",
                password:"",
                update:0,
                busqueda:"",
                valido:true,

                arrayUsuarios:[],
                tipos: [
                    { text: 'Usuario', value: 'user' },
                    { text: 'Administrador', value: 'administrator' },
                    { text: 'Super Administrador', value: 'superadmin' }
                ]
            }
        },
        methods:{
            getTasks(){
                let me =this;
                let url = 'user'
                axios.get(url).then(function (response) {
                    me.arrayUsuarios = response.data;
                })
                .catch(function (error) {
                    // handle error
                    console.log(error);
                });
            },
            saveTasks(event){
                let me =this;
                let url = 'user/guardar';
                var testEmail = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
                // Condiciones
                if (me.name === "") {
                    this.$swal({
                        icon: 'error',
                        title: 'Nombre',
                        text: 'Campo nombre vacio',
                    });
                    me.valido = false;
                } else if (me.name < 6 || me.name > 12) {
                    this.$swal({
                        icon: 'error',
                        title: 'Nombre',
                        text: 'El nombre debe estar entre un mínimo de 6 a 12 carácteres',
                    });
                    me.valido = false;
                } else if (me.email === "" || /^\s+$/.test(me.email)) {
                    this.$swal({
                        icon: 'error',
                        title: 'Email',
                        text: 'Campo email vacio',
                    });
                    me.valido = false;
                } else if (!testEmail.test(me.email)) {
                    this.$swal({
                        icon: 'error',
                        title: 'Email',
                        text: 'No has introducido un email válido',
                    });
                    me.valido = false;
                } else if (me.tipo === "") {
                    this.$swal({
                        icon: 'error',
                        title: 'Tipo',
                        text: 'Debes seleccionar un tipo de usuario',
                    });
                    me.valido = false;
                } else if (me.password === "") {
                    this.$swal({
                        icon: 'error',
                        title: 'Contraseña',
                        text: 'El campo contraseña está vacio',
                    });
                    me.valido = false;
                } else if (me.password.length < 6 || me.password.length > 16) {
                    this.$swal({
                        icon: 'error',
                        title: 'Contraseña',
                        text: 'La contraseña debe estar entre un mínimo de 6 a 16 carácteres',
                    });
                    me.valido = false;
                }  else {
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
            updateTasks(){

                let me = this;
                axios.put('user/actualizar',{
                    'id':this.update,
                    'name':this.name,
                    'email':this.email,
                    'tipo':this.tipo,
                    'password':this.password,
                }).then(function (response) {
                    this.$swal('Guardado', 'Los datos se han guardado correctamente', 'success');
                    me.getTasks();
                    me.clearFields();
                })
                .catch(function (error) {
                    this.$swal('Error', 'Se ha producido un error', 'warning');
                    console.log(error);
                });

            },
            loadFieldsUpdate(data){
                this.update = data.id
                let me =this;
                let url = 'user/buscar?id='+this.update;
                axios.get(url).then(function (response) {
                    me.name = response.data.name;
                    me.email = response.data.email;
                    me.tipo = response.data.tipo;
                    me.vm.tipo = response.data.tipo;
                })
                .catch(function (error) {
                    // handle error
                    console.log(error);
                });
            },
            deleteTask(data){
                let me =this;
                let task_id = data.id
                this.$swal({
                    icon: 'warning',
                    title: '¿Seguro que deseas borrar éste usuario?',
                    text: 'No podras revertir ésta acción',
                    showCancelButton: true,
                    confirmButtonText: '¡Eliminar!',
                    cancelButtonText: '¡No, mantenerlo!',
                    showCloseButton: true,
                    showLoaderOnConfirm: true
                }).then((result) => {
                    if(result.value) {
                        this.$swal('Eliminado', 'El usuario ha sido eliminado correctamente', 'success')
                        axios.delete('user/borrar/'+task_id
                        ).then(function (response) {
                            me.getTasks();
                        })
                        .catch(function (error) {
                            console.log(error);
                        });
                    } else {
                        this.$swal('Cancelado', 'El usuario correspondiente sigue intacto', 'info')
                    }
                })
            },
            clearFields(){
                this.name = "";
                this.email = "";
                this.tipo = "";
                this.password = "";
                this.busqueda="";
                this.update = 0;
            }
        },
        computed: {
            buscarUsuarios() {
                return this.arrayUsuarios.filter((user) => user.name.toLowerCase().includes(this.busqueda.toLowerCase()) || user.email.toLowerCase().includes(this.busqueda.toLowerCase()) || user.tipo.toLowerCase().includes(this.busqueda.toLowerCase())
                );
            }
        },
        mounted() {
           this.getTasks();
        }
    }
</script>

