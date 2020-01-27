<template>

    <div class="row" id="master">
        <div class="col-sm-12 my-2">
            <h2>Tabla del NET</h2>
        </div>
        <div class="col-sm-12 my-2">
            <input class="form-control" type="search" v-model="busqueda" name="buscador" placeholder="Buscar en la tabla" autocomplete="off">
        </div>
        <div class="col-sm-12">
            <div class="table-responsive table-ambitos">
                <table class="table table-striped rounded">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Mujer</th>
                            <th scope="col">Pregunta</th>
                            <th scope="col">Respuesta Correcta</th>
                            <th scope="col">Respuesta Erronea1</th>
                            <th scope="col">Respuesta Erronea2</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="pregunta in buscarPregunta" :key="pregunta.id">
                            <td v-text="pregunta.carta_id"></td>
                            <td v-text="pregunta.pregunta"></td>
                            <td v-text="pregunta.respuesta_1"></td>
                            <td v-text="pregunta.respuesta_2"></td>
                            <td v-text="pregunta.respuesta_3"></td>
                            <th scope="col">Acciones</th>
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
            carta_id:"",
            pregunta:"",
            respuesta_1:"",
            respuesta_2:"",
            respuesta_3:"",
            update:0,
            busqueda:"",

            arrayPreguntas:[],
        }
    },
    methods:{
        getTasks(){
            let me =this;
            let url = 'pregunt' //Ruta que hemos creado para que nos devuelva todas las tareas
            axios.get(url).then(function (response) {
                //creamos un array y guardamos el contenido que nos devuelve el response
                me.arrayPreguntas = response.data;
            })
            .catch(function (error) {
                // handle error
                console.log(error);
            });
        },
        clearFields(){/*Limpia los campos e inicializa la variable update a 0*/
            this.ambitoEsp = "";
            this.ambitoEng = "";
            this.ambitoEus = "";
            this.update = 0;
            this.busqueda = "";
        }
    },
    computed: {
        buscarPregunta() {
            return this.arrayPreguntas.filter((pregunta) => pregunta.carta_id.toLowerCase().includes(this.busqueda.toLowerCase()) || ambito.ambitoEng.toLowerCase().includes(this.busqueda.toLowerCase()) || ambito.ambitoEus.toLowerCase().includes(this.busqueda.toLowerCase())
            );
        }
    },
    mounted() {
        this.getTasks();
    }
}
</script>
