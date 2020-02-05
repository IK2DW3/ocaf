<template>

    <div class="row" id="master">
        <div class="col-sm-12 my-2">
            <h2>Tabla del NET</h2>
        </div>
        <div class="col-sm-12 my-2">
            <input class="form-control" type="search" v-model="busqueda" name="buscador" placeholder="Buscar en la tabla" autocomplete="off">
        </div>
        <div class="col-sm-12">
            <div class="table-responsive table-continentes">
                <table class="table table-striped rounded">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Continente en Español</th>
                            <th scope="col">Continent in English</th>
                            <th scope="col">Kontinente Euskeraz</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="continente in buscarContinente" :key="continente.id">
                            <td v-text="continente.continenteEsp"></td>
                            <td v-text="continente.continenteEng"></td>
                            <td v-text="continente.continenteEus"></td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <a href="" role="button" class="btn btn-secondary" title="Ver">&#x1F440;</a>
                                    <button type="button" class="btn btn-secondary" title="Editar" @click="loadFieldsUpdate(continente)">&#x270E;</button>
                                    <button type="button" class="btn btn-secondary" title="Eliminar" @click="deleteTask(continente)">&#x2716;</button>
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
                                <label for="continenteEsp">Continente en Español</label>
                                <input v-model="continenteEsp" type="text" class="form-control" id="continenteEsp" autocomplete="off">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="ambitoEng">Continent in English</label>
                                <input v-model="continenteEng" type="text" class="form-control" id="continenteEng" autocomplete="off">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="continenteEus">Kontinente Euskeraz</label>
                                <input v-model="continenteEus" type="text" class="form-control" id="continenteEus" autocomplete="off">
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
            continenteEsp:"",
            continenteEng:"",
            continenteEus:"",
            update:0,
            busqueda:"",

            arrayContinentes:[],
        }
    },
    methods:{
        getTasks(){
            let me =this;
            let url = 'continent' //Ruta que hemos creado para que nos devuelva todas las tareas
            axios.get(url).then(function (response) {
                //creamos un array y guardamos el contenido que nos devuelve el response
                me.arrayContinentes = response.data;
            })
            .catch(function (error) {
                // handle error
                console.log(error);
            });
        },
        saveTasks(event){
            let me =this;
            me.validarCampos();
            if (true) {
                let url = 'continent/guardar' //Ruta que hemos creado para enviar una tarea y guardarla
                axios.post(url,{ //estas variables son las que enviaremos para que crear la tarea
                    'continenteEsp':this.continenteEsp,
                    'continenteEng':this.continenteEng,
                    'continenteEus':this.continenteEus,
                }).then(function (response) {
                    me.getTasks();
                    me.clearFields();
                    this.$swal('Guardado', 'Los datos se han guardado correctamente', 'Aceptar');
                })
                .catch(function (error) {
                    console.log(error);
                });
            }
            event.preventDefault();

        },
        updateTasks(){
            let me = this;
            axios.put('continent/actualizar',{
                'id':this.update,
                'continenteEsp':this.continenteEsp,
                'continenteEng':this.continenteEng,
                'continenteEus':this.continenteEus,
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
            let url = 'continent/buscar?id='+this.update;
            axios.get(url).then(function (response) {
                me.continenteEsp = response.data.continenteEsp;
                me.continenteEng = response.data.continenteEng;
                me.continenteEus = response.data.continenteEus;
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
                showLoaderOnConfirm: false
            }).then((result) => {
                if(result.value) {
                    this.$swal('Eliminado', 'El usuario ha sido eliminado correctamente', 'success')
                    axios.delete('continent/borrar/'+task_id
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
        campoInvalido(campo){
            $(campo).css('border','1px solid red');
        },
        validarCampos() {

            let me = this;
            if (me.continenteEsp === "" || me.continenteEng === "" || me.continenteEus) {
                this.$swal({
                    icon: 'error',
                    title: 'Validación',
                    text: 'Campos vacios',
                });
                me.campoInvalido('#continenteEsp');
                me.campoInvalido('#continenteEng');
                me.campoInvalido('#continenteEus');
                return false;
            } else {
                return true;
            }

        },
        clearFields(){
            this.continenteEsp = "";
            this.continenteEng = "";
            this.continenteEus = "";
            this.update = 0;
            this.busqueda = "";
        }
    },
    computed: {
        buscarContinente() {
            return this.arrayContinentes.filter((continente) => continente.continenteEsp.toLowerCase().includes(this.busqueda.toLowerCase()) || continente.continenteEng.toLowerCase().includes(this.busqueda.toLowerCase()) || continente.continenteEus.toLowerCase().includes(this.busqueda.toLowerCase())
            );
        }
    },
    mounted() {
        this.getTasks();
    }
}
</script>
