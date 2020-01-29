<template>

    <div class="row" id="master">
        <div class="col-sm-12 my-2">
            <h2>Tabla del NET</h2>
        </div>
        <div class="col-sm-12 my-2">
            <input class="form-control" type="search" v-model="busqueda" name="buscador"
                placeholder="Buscar en la tabla" autocomplete="off">
        </div>
        <div class="col-sm-12">
            <div class="table-responsive table-ambitos">
                <table class="table table-striped rounded">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Mujer Feminista</th>
                            <th scope="col">Pregunta</th>
                            <th scope="col">Respuesta Correcta</th>
                            <th scope="col">Respuesta Erronea 1</th>
                            <th scope="col">Respuesta Erronea 2</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="pregunta in buscarPregunta" :key="pregunta.id">
                            <td v-text="pregunta.carta.nombre +' '+ pregunta.carta.apellido" ></td>
                            <td v-text="pregunta.pregunta"></td>
                            <td v-text="pregunta.respuesta_1"></td>
                            <td v-text="pregunta.respuesta_2"></td>
                            <td v-text="pregunta.respuesta_3"></td>

                            <td>
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <a href="" role="button" class="btn btn-secondary" title="Ver">&#x1F440;</a>
                                    <button type="button" class="btn btn-secondary" title="Editar"
                                        @click="loadFieldsUpdate(pregunta)">&#x270E;</button>
                                    <button type="button" class="btn btn-secondary" title="Eliminar"
                                        @click="deleteTask(pregunta)">&#x2716;</button>
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
                                <label for="mujer">Mujer</label>
                                    <select v-model="carta_id" class="custom-select">
                                            <option disabled value="">Seleccionar mujer</option>
                                            <option v-for="carta in arrayCartas" v-bind:key="carta.id" v-text="carta.apellido"></option>
                                     </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <label for="pregunta">Preguntas</label>
                            <textarea v-model="pregunta" class="form-control" autocomplete="off"
                                id="pregunta"></textarea>
                        </div>
                        <div class="form-row">
                            <label for="respuesta_1">Respuesta Correcta</label>
                            <textarea v-model="respuesta_1" class="form-control" autocomplete="off"
                                id="respuesta_1"></textarea>
                        </div>
                        <div class="form-row">
                            <label for="respuesta_2">Respuesta Erronea 1</label>
                            <textarea v-model="respuesta_2" class="form-control" autocomplete="off"
                                id="respuesta_2"></textarea>
                        </div>
                        <div class="form-row">
                            <label for="respuesta_3">Respuesta Erronea 2</label>
                            <textarea v-model="respuesta_3" class="form-control" autocomplete="off"
                                id="respuesta_3"></textarea>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12 text-center">
                                <!-- Botón que añade los datos del formulario, solo se muestra si la variable update es igual a 0-->
                                <button v-if="update == 0" @click="saveTasks()" class="btn btn-success">Añadir</button>
                                <!-- Botón que modifica la tarea que anteriormente hemos seleccionado, solo se muestra si la variable update es diferente a 0-->
                                <button v-if="update != 0" @click="updateTasks()"
                                    class="btn btn-warning">Actualizar</button>
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
        data() {
            return {
                nombre: "",
                carta_id: "",
                id:"",
                pregunta: "",
                respuesta_1: "",
                respuesta_2: "",
                respuesta_3: "",
                update: 0,
                busqueda: "",

                arrayPreguntas: [],
                arrayCartas:[],
            }
        },
        methods: {
            getTasks() {
                let me =this;
                let url = 'pregunt';
                axios.get(url).then(function (response) {
                    me.arrayPreguntas = response.data;
                }).catch(function (error) {
                    console.log(error);
                });
                axios.get('card').then(function (response) {
                    me.arrayCartas = response.data;
                }).catch(function (error) {
                    console.log(error);
                });
            },
            saveTasks(){
                let me =this;
                let url = 'pregunt/guardar';
                axios.post(url,{
                    
                    'pregunta':this.pregunta,
                    'respuesta_1':this.respuesta_1,
                    'respuesta_2':this.respuesta_2,
                    'respuesta_3':this.respuesta_3,
                    'carta_id':this.carta_id,
                }).then(function (response) {
                    me.getTasks();
                    me.clearFields();
                    this.$swal('Guardado', 'Los datos se han guardado correctamente', 'success');
                })
                .catch(function (error) {
                    console.log(error);
                });

            },
            // Metodo para actualizar los datos
            updateTasks(){           
                let me = this;              
                axios.put('pregunt/actualizar',{
                    'id':this.update,       
                    'pregunta':this.pregunta,
                    'respuesta_1':this.respuesta_1,
                    'respuesta_2':this.respuesta_2,
                    'respuesta_3':this.respuesta_3,
                    'carta_id':this.carta_id,
                }).then(function (response) {

                   me.getTasks();
                   me.clearFields();
                   this.$swal('Actualización', 'Los datos se han actualizado correctamente', 'success');
                })
                .catch(function (error) {
                    console.log(error);
                    alert("ERROR");
                });
            },
            // Metodo para insertar los datos en los campos de texto
            loadFieldsUpdate(data) {
                this.update = data.id
                let me =this;
                let url = 'pregunt/buscar?id='+this.update;
                axios.get(url).then(function (response) {
                    me.pregunta = response.data.pregunta;
                    me.respuesta_1 = response.data.respuesta_1;
                    me.respuesta_2 = response.data.respuesta_2;
                    me.respuesta_3 = response.data.respuesta_3;

                    me.carta_id = response.data.carta_id;
                    url = 'card/buscar?id=' + me.carta_id;
                    axios.get(url).then(function (response) {
                        me.carta_id = response.data.apellido;
                    }).catch(function (error) {
                        console.log(error);
                    });
                })
                .catch(function (error) {
                    console.log(error);
                });
            },
            // Metodo para eliminar los datos
            deleteTask(data) {
                let me =this;
                let task_id = data.id
                this.$swal({
                    icon: 'warning',
                    title: '¿Seguro que deseas borrar esta pregunta?',
                    text: 'No podras revertir ésta acción',
                    showCancelButton: true,
                    confirmButtonText: '¡Eliminar!',
                    cancelButtonText: '¡No, mantenerlo!',
                    showCloseButton: true,
                    showLoaderOnConfirm: true
                }).then((result) => {
                    if(result.value) {
                        this.$swal('Eliminado', 'La pregunta ha sido eliminada correctamente', 'success')
                        axios.delete('pregunt/borrar/'+task_id
                        ).then(function (response) {
                            me.getTasks();
                        })
                        .catch(function (error) {
                            console.log(error);
                        });
                    } else {
                        this.$swal('Cancelado', 'La pregunta correspondiente sigue intacta', 'info')
                    }
                })
            },
            // Metodo para limpiar los campos de texto
            clearFields(){
                this.carta_id ="";
                this.pregunta ="";
                this.respuesta_1 ="";
                this.respuesta_2 ="";
                this.respuesta_3 ="";
            }
        },
        computed: {
            buscarPregunta() {
                return this.arrayPreguntas.filter((pregunta) => pregunta.carta.nombre.toLowerCase().includes(this.busqueda
                    .toLowerCase()) || pregunta.carta.apellido.toLowerCase().includes(this.busqueda.toLowerCase())
            );

            }
        },
        mounted() {
            this.getTasks();
        }
    }

</script>
