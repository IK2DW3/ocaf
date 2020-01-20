<template>
    <div class="row">
        <div class="col-sm-12">
            <h2>Tabla del conocimiento</h2>
            <div class="table-responsive table-mujeres">
                <table class="table table-striped rounded">
                    <thead class="thead-dark position-sticky">
                        <tr>
                            <th scope="col">Nombre</th>
                            <th scope="col">Apellido</th>
                            <th scope="col">F. Nacimiento</th>
                            <th scope="col">F. Muerte</th>
                            <th scope="col">Ambito</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="carta in arrayCartas" :key="carta.id">
                            <td v-text="carta.nombre"></td>
                            <td v-text="carta.apellido"></td>
                            <td v-text="carta.fechaNacimiento"></td>
                            <td v-text="carta.fechaMuerte"></td>
                            <td v-text="carta.ambito.ambitoEsp"></td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <button role="button" class="btn btn-secondary" title="Ver" @click="showAlert()">&#x1F440;</button>
                                    <button type="button" class="btn btn-secondary" title="Editar" @click="loadFieldsUpdate(carta)">&#x270E;</button>
                                    <button type="button" class="btn btn-secondary" title="Eliminar" @click="deleteTask(carta)">&#x2716;</button>
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
                                <label for="cartaNombres">Nombre/s</label>
                                <input v-model="nombre" type="text" class="form-control" id="cartaNombres">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="cartaApellidos">Apellido/s</label>
                                <input v-model="apellido" type="text" class="form-control" id="cartaApellidos">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="cartaFnacimiento">Fecha Nacimiento</label>
                                <input v-model="fechaNacimiento" type="text" class="form-control" id="cartaFnacimiento">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="cartaFmuerte">Fecha Muerte</label>
                                <input v-model="fechaMuerte" type="text" class="form-control" id="cartaFmuerte">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <input v-model="enlaceReferencia" type="text" class="form-control" id="cartaEnlacereferencia" placeholder="Enlace referencia...">
                            </div>
                            <div class="form-group col-md-4">
                                <div class="img-muestra d-flex align-items-center justify-content-center">
                                    <img src="#" class="rounded" alt="Imagen previa" title="Imagen previa">
                                </div>
                            </div>
                            <div class="form-group col-md-8">
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <div class="custom-file">
                                            <input type="file" @change="processFile($event)" class="custom-file-input" id="customFileLang" lang="es">
                                            <label class="custom-file-label" for="customFileLang">Seleccionar Archivo</label>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <input v-model="imgDefault" type="text" class="form-control" id="cartaImagenalternativa" placeholder="Enlace imagen alternativa...">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <input v-model="zonaGeografica" type="text" class="form-control" id="cartaZonageografica" placeholder="Zona geográfica">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <select v-model="ambito_id" class="custom-select">
                                            <option disabled value="">Seleccionar ambito</option>
                                            <option v-for="ambito in arrayAmbitos" v-bind:key="ambito.id">
                                                {{ ambito.ambitoEsp }}
                                            </option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <select v-model="continente_id" class="custom-select">
                                            <option disabled value="">Seleccionar continente</option>
                                            <option v-for="continente in arrayContinentes" v-bind:key="continente.id">
                                                {{ continente.continenteEsp }}
                                            </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="cartaLoreesp">Historia en Español</label>
                                <textarea v-model="loreEsp" class="form-control" name="cartaLoreesp" id="cartaLoreesp" placeholder="Añade aquí la historia..."></textarea>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="cartaLoreeng">History in English</label>
                                <textarea v-model="loreEng" class="form-control" name="cartaLoreeng" id="cartaLoreeng" placeholder="Añade aquí la historia..."></textarea>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="cartaLoreeus">Historia Euskarazen</label>
                                <textarea v-model="loreEus" class="form-control" name="cartaLoreeus" id="cartaLoreeus" placeholder="Añade aquí la historia..."></textarea>
                            </div>
                        </div>
                        <h4>Pregunta</h4>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <input type="text" class="form-control" id="cartaPregunta" placeholder="Crea una pregunta...">
                            </div>
                            <div class="form-group col-md-12">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <input type="radio" name="respuesta" id="cartaRespuestauno" aria-label="Radio button for following text input">
                                        </div>
                                    </div>
                                    <input type="text" class="form-control" placeholder="Respuesta uno" aria-label="Text input with radio button">
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <input type="radio" name="respuesta" id="cartaRespuestados" aria-label="Radio button for following text input">
                                        </div>
                                    </div>
                                    <input type="text" class="form-control" placeholder="Respuesta dos" aria-label="Text input with radio button">
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <input type="radio" name="respuesta" id="cartaRespuestatres" aria-label="Radio button for following text input">
                                        </div>
                                    </div>
                                    <input type="text" class="form-control" placeholder="Respuesta tres" aria-label="Text input with radio button">
                                </div>
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
                // Parametros iniciales
                nombre:"",
                apellido:"",
                fechaNacimiento:"",
                fechaMuerte:"",
                ambito_id:"",
                ambitoEsp:"",
                loreEsp:"",
                loreEng:"",
                loreEus:"",
                zonaGeografica:"",
                continente_id:"",
                continenteEsp:"",
                imgRuta:"",
                imgDefault:"",
                enlaceReferencia:"",
                usuario_id:"",
                habilitado:"",
                update:0,

                files:[],
                arrayCartas:[],
                arrayAmbitos:[],
                arrayContinentes:[],
            }
        },
        methods:{
            // Metodo para recoger los datos
            getTasks(){
                let me =this;
                let url = 'card';
                axios.get(url).then(function (response) {
                    me.arrayCartas = response.data;
                }).catch(function (error) {
                    console.log(error);
                });
                axios.get('ambit').then(function (response) {
                    me.arrayAmbitos = response.data;
                }).catch(function (error) {
                    console.log(error);
                });
                axios.get('continent').then(function (response) {
                    me.arrayContinentes = response.data;
                }).catch(function (error) {
                    console.log(error);
                });
            },
            // Metodo para guardar los daots
            saveTasks(){
                let me =this;
                let url = 'card/guardar';
                axios.post(url,{
                    'nombre':this.nombre,
                    'apellido':this.apellido,
                    'fechaNacimiento':this.fechaNacimiento,
                    'fechaMuerte':this.fechaMuerte,
                    'ambito_id':this.ambito_id,
                    'loreEsp':this.loreEsp,
                    'loreEng':this.loreEng,
                    'loreEus':this.loreEus,
                    'zonaGeografica':this.zonaGeografica,
                    'continente_id':this.continente_id,
                    'imgRuta':this.imgRuta,
                    'imgDefault':this.imgDefault,
                    'enlaceReferencia':this.enlaceReferencia,
                    'usuario_id':this.usuario_id,
                    'habilitado':this.habilitado,
                }).then(function (response) {
                    me.getTasks();
                    me.clearFields();
                    this.$swal('Guardado', 'Los datos se han guardado correctamente', 'Aceptar');
                })
                .catch(function (error) {
                    console.log(error);
                });

            },
            // Metodo para actualizar los datos
            updateTasks(){
                let me = this;
                axios.put('card/actualizar',{
                    'id':this.update,
                    'nombre':this.nombre,
                    'apellido':this.apellido,
                    'fechaNacimiento':this.fechaNacimiento,
                    'fechaMuerte':this.fechaMuerte,
                    'ambito_id':this.ambito_id,
                    'loreEsp':this.loreEsp,
                    'loreEng':this.loreEng,
                    'loreEus':this.loreEus,
                    'zonaGeografica':this.zonaGeografica,
                    'continente_id':this.continente_id,
                    'imgRuta':this.imgRuta,
                    'imgDefault':this.imgDefault,
                    'enlaceReferencia':this.enlaceReferencia,
                    'usuario_id':this.usuario_id,
                    'habilitado':this.habilitado,
                }).then(function (response) {
                   me.getTasks();
                   me.clearFields();
                   this.$swal('Actualización', 'Los datos se han actualizado correctamente', 'Aceptar');
                })
                .catch(function (error) {
                    console.log(error);
                });
            },
            // Metodo para insertar los datos en los campos de texto
            loadFieldsUpdate(data) {
                this.update = data.id
                let me =this;
                let url = 'card/buscar?id='+this.update;
                axios.get(url).then(function (response) {
                    me.nombre = response.data.nombre;
                    me.apellido = response.data.apellido;
                    me.fechaNacimiento = response.data.fechaNacimiento;
                    me.fechaMuerte = response.data.fechaMuerte;
                    me.ambito_id = response.data.ambito_id;
                    url = 'ambit/buscar?id=' + me.ambito_id;
                    axios.get(url).then(function (response) {
                        me.ambito_id = response.data.ambitoEsp;
                    }).catch(function (error) {
                        console.log(error);
                    });
                    me.loreEsp = response.data.loreEsp;
                    me.loreEng = response.data.loreEng;
                    me.loreEus = response.data.loreEus;
                    me.zonaGeografica = response.data.zonaGeografica;
                    me.continente_id = response.data.continente_id;
                    url = 'continent/buscar?id=' + me.continente_id;
                    axios.get(url).then(function (response) {
                        me.continente_id = response.data.continenteEsp;
                    }).catch(function (error) {
                        console.log(error);
                    });
                    me.imgRuta = response.data.imgRuta;
                    me.imgDefault = response.data.imgDefault;
                    me.enlaceReferencia = response.data.enlaceReferencia;
                    me.usuario_id = response.data.usuario_id;
                    me.habilitado = response.data.habilitado;
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
                    title: '¿Seguro que deseas borrar esta carta?',
                    text: 'No podras revertir ésta acción',
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonText: '¡Eliminar!',
                    cancelButtonText: '¡No, mantenerlo!',
                    showCloseButton: true,
                    showLoaderOnConfirm: true
                }).then((result) => {
                    if(result.value) {
                        this.$swal('Eliminado', 'La carta ha sido eliminada correctamente', 'success')
                        axios.delete('card/borrar/'+task_id
                        ).then(function (response) {
                            me.getTasks();
                        })
                        .catch(function (error) {
                            console.log(error);
                        });
                    } else {
                        this.$swal('Cancelado', 'La carta correspondiente sigue intacta', 'info')
                    }
                })
            },
            previewFiles(event) {
                this.someData = event.target.files[0]
            },
            // Metodo para limpiar los campos de texto
            clearFields(){
                this.nombre ="";
                this.apellido ="";
                this.fechaNacimiento ="";
                this.fechaMuerte ="";
                this.ambito_id ="";
                this.loreEsp ="";
                this.loreEng ="";
                this.loreEus="";
                this.zonaGeografica="";
                this.continente_id="";
                this.imgRuta="";
                this.imgDefault="";
                this.enlaceReferencia="";
                this.usuario_id="";
                this.habilitado="";
                this.update = 0;
            }
        },
        // Metodo de inicialización del archivo vue
        mounted() {
           this.getTasks();
        }
    }
</script>
