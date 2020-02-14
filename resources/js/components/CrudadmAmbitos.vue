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

</template>

<script>
export default {
    data(){
        return{
            ambitoEsp:"",
            ambitoEng:"",
            ambitoEus:"",
            update:0,
            busqueda:"",

            arrayAmbitos:[],
        }
    },
    methods:{
        getTasks(){
            let me =this;
            let url = './ambit' //Ruta que hemos creado para que nos devuelva todas las tareas
            axios.get(url).then(function (response) {
                //creamos un array y guardamos el contenido que nos devuelve el response
                me.arrayAmbitos = response.data;
            })
            .catch(function (error) {
                // handle error
                console.log(error);
            });
        },
        saveTasks(event){

            let me = this;
            me.validarCampos();
            if(true) {
                let url = 'ambit/guardar';
                axios.post(url,{
                    'ambitoEsp':this.ambitoEsp,
                    'ambitoEng':this.ambitoEng,
                    'ambitoEus':this.ambitoEus,
                }).then(function (response) {
                    me.getTasks();
                    me.clearFields();
                    this.$swal('Guardado', 'Los datos se han guardado correctamente', 'success');
                })
                .catch(function (error) {
                    console.log(error);
                });
            }
            event.preventDefault();

        },
        updateTasks(){
            let me = this;
            axios.put('ambit/actualizar',{
                'id':this.update,
                'ambitoEsp':this.ambitoEsp,
                'ambitoEng':this.ambitoEng,
                'ambitoEus':this.ambitoEus,
            }).then(function (response) {
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
            let url = 'ambit/buscar?id='+this.update;
            axios.get(url).then(function (response) {
                me.ambitoEsp = response.data.ambitoEsp;
                me.ambitoEng = response.data.ambitoEng;
                me.ambitoEus = response.data.ambitoEus;
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
                icon: 'warning',
                title: '¿Seguro que deseas borrar éste ambito?',
                text: 'No podras revertir ésta acción',
                showCancelButton: true,
                confirmButtonText: '¡Eliminar!',
                cancelButtonText: '¡No, mantenerlo!',
                showCloseButton: true,
                showLoaderOnConfirm: false
            }).then((result) => {
                if(result.value) {
                    this.$swal('Eliminado', 'El ambito ha sido eliminado correctamente', 'success')
                    axios.delete('ambit/borrar/'+task_id
                    ).then(function (response) {
                        me.getTasks();
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
                } else {
                    this.$swal('Cancelado', 'El ambito correspondiente sigue intacto', 'info')
                }
            })
        },
        clearFields(){/*Limpia los campos e inicializa la variable update a 0*/
            this.ambitoEsp = "";
            this.ambitoEng = "";
            this.ambitoEus = "";
            this.update = 0;
            this.busqueda = "";
        },
        campoInvalido(campo){
            $(campo).css('border','1px solid red');
        },
        validarCampos() {

            let me = this;
            if (me.ambitoEsp === "" || me.ambitoEsp === "" || me.ambitoEus) {
                this.$swal({
                    icon: 'error',
                    title: 'Validación',
                    text: 'Campos vacios',
                });
                me.campoInvalido('#ambitoEsp');
                me.campoInvalido('#ambitoEng');
                me.campoInvalido('#ambitoEus');
                return false;
            } else {
                return true;
            }

        }
    },
    computed: {
        buscarAmbito() {
            return this.arrayAmbitos.filter((ambito) => ambito.ambitoEsp.toLowerCase().includes(this.busqueda.toLowerCase()) || ambito.ambitoEng.toLowerCase().includes(this.busqueda.toLowerCase()) || ambito.ambitoEus.toLowerCase().includes(this.busqueda.toLowerCase())
            );
        }
    },
    mounted() {
        this.getTasks();
    }
}
</script>
