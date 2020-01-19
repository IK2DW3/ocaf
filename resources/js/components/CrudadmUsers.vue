<template>
    <div class="row" id="master">
        <div class="col-sm-12">
            <h2>Tabla del NET</h2>
            <div class="table-responsive table-mujeres">
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
                        <tr v-for="user in arrayTasks" :key="user.id">
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
                                <button v-if="update == 0" @click="saveTasks()" class="btn btn-success">Añadir</button>
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
                name:"", //Esta variable, mediante v-model esta relacionada con el input del formulario
                email:"", //Esta variable, mediante v-model esta relacionada con el input del formulario
                tipo:"", //Esta variable, mediante v-model esta relacionada con el input del formulario
                password:"", //Esta variable, mediante v-model esta relacionada con el input del formulario
                update:0, /*Esta variable contrarolará cuando es una nueva tarea o una modificación, si es 0 significará que no hemos seleccionado
                          ninguna tarea, pero si es diferente de 0 entonces tendrá el id de la tarea y no mostrará el boton guardar sino el modificar*/
                arrayTasks:[], //Este array contendrá las tareas de nuestra bd
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
                let url = 'user' //Ruta que hemos creado para que nos devuelva todas las tareas
                axios.get(url).then(function (response) {
                    //creamos un array y guardamos el contenido que nos devuelve el response
                    me.arrayTasks = response.data;
                })
                .catch(function (error) {
                    // handle error
                    console.log(error);
                });
            },
            saveTasks(){
                let me =this;
                let url = 'user/guardar' //Ruta que hemos creado para enviar una tarea y guardarla
                axios.post(url,{ //estas variables son las que enviaremos para que crear la tarea
                    'name':this.name,
                    'email':this.email,
                    'tipo':this.tipo,
                    'password':this.password,
                }).then(function (response) {
                    me.getTasks();
                    me.clearFields();
                    this.$swal('Guardado', 'Los datos se han guardado correctamente', 'Aceptar');
                })
                .catch(function (error) {
                    console.log(error);
                });

            },
            updateTasks(){/*Esta funcion, es igual que la anterior, solo que tambien envia la variable update que contiene el id de la
                tarea que queremos modificar*/
                let me = this;
                axios.put('user/actualizar',{
                    'id':this.update,
                    'name':this.name,
                    'email':this.email,
                    'tipo':this.tipo,
                    'password':this.password,
                }).then(function (response) {
                    this.$swal('Guardado', 'Los datos se han guardado correctamente', 'Aceptar');
                    me.getTasks();
                    me.clearFields();
                })
                .catch(function (error) {
                    this.$swal('Error', 'Se ha producido un error', 'warning');
                    console.log(error);
                });
            },
            loadFieldsUpdate(data){ //Esta función rellena los campos y la variable update, con la tarea que queremos modificar
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
            deleteTask(data){//Esta nos abrirá un alert de javascript y si aceptamos borrará la tarea que hemos elegido
                let me =this;
                let task_id = data.id
                this.$swal({
                    title: '¿Seguro que deseas borrar éste usuario?',
                    text: 'No podras revertir ésta acción',
                    type: 'warning',
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
            clearFields(){/*Limpia los campos e inicializa la variable update a 0*/
                this.name = "";
                this.email = "";
                this.tipo = "";
                this.password = "";
                this.update = 0;
            }
        },
        mounted() {
           this.getTasks();
        }
    }
</script>

