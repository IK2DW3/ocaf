<template>
    <div class="row">
        <div class="col-sm-12 my-2">
            <h2>Tabla del conocimiento</h2>
        </div>
        <div class="col-sm-12 my-2">
            <input class="form-control" type="search" v-model="busqueda" name="buscador" placeholder="Buscar en la tabla" autocomplete="off">
        </div>
        <div class="col-sm-12">
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
                        <tr v-for="carta in buscarCartas" :key="carta.id">
                            <td v-text="carta.nombre"></td>
                            <td v-text="carta.apellido"></td>
                            <td v-text="carta.fechaNacimiento"></td>
                            <td v-text="carta.fechaMuerte"></td>
                            <td v-text="carta.ambito.ambitoEsp"></td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <a :href="'history/'+ carta.id" role="button" class="btn btn-secondary" title="Ver">&#x1F440;</a>
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
                    <form id="formCartas" enctype="multipart/form-data">
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label for="cartaNombres">Nombre/s</label>
                                <input v-model="nombre" type="text" class="form-control" id="cartaNombre">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="cartaApellidos">Apellido/s</label>
                                <input v-model="apellido" type="text" class="form-control" id="cartaApellido">
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
                                    <img :src="imagenPrevia" class="rounded" id="imgPrevia" alt="Imagen previa" title="Imagen previa">
                                </div>
                            </div>
                            <div class="form-group col-md-8">
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="fileCartas" lang="es" @change="imagPrev">
                                            <label class="custom-file-label" id="fileTxt" for="customFileLang" v-text="'Seleccionar Archivo'"></label>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <input v-model="imgDefault" type="text" class="form-control" id="cartaImagenalternativa" placeholder="Enlace imagen alternativa...">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <input v-model="zonaGeografica" type="text" class="form-control" id="cartaZonageografica" placeholder="Zona geográfica">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <select v-model="ambito_id" class="custom-select" id="cartaAmbito">
                                            <option disabled value="">Seleccionar ambito</option>
                                            <option v-for="ambito in arrayAmbitos" v-bind:key="ambito.id" :value="ambito.id" v-text="ambito.ambitoEsp"></option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <select v-model="continente_id" class="custom-select" id="cartaContinente">
                                            <option disabled value="">Seleccionar continente</option>
                                            <option v-for="continente in arrayContinentes" v-bind:key="continente.id" :value="continente.id" v-text="continente.continenteEsp"></option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="cartaLoreesp">Historia en Español</label>
                                <textarea v-model="loreEsp" class="form-control" id="cartaLoreesp" placeholder="Añade aquí la historia..."></textarea>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="cartaLoreeng">History in English</label>
                                <textarea v-model="loreEng" class="form-control" id="cartaLoreeng" placeholder="Add history here..."></textarea>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="cartaLoreeus">Historia Euskeraz</label>
                                <textarea v-model="loreEus" class="form-control" id="cartaLoreeus" placeholder="Geitu hemen historia..."></textarea>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <input  v-model="habilitado" type="checkbox" id="habi_des" aria-label="Checkbox for following text input" @change="checked">
                                        </div>
                                    </div>
                                    <input type="text" class="form-control" id="habi_desText" aria-label="Text input with checkbox" value="Deshabilitado" disabled readonly>
                                </div>
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
                imagenPrevia:'../resources/img/imglogo.svg',
                enlaceReferencia:"",
                habilitado:false,
                update:0,

                valido:true,

                busqueda:"",
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
            saveTasks(event){
                let me =this;
                let url = 'card/guardar';
                if (me.nombre === "" && me.apellido === "" && me.fechaNacimiento === "" && me.ambito_id === "" && me.continente_id === "" ) {
                    this.$swal({
                        icon: 'error',
                        title: 'Validación',
                        text: 'Campos vacios',
                    });
                    me.campoInvalido('#cartaNombre');
                    me.campoInvalido('#cartaApellido');
                    me.campoInvalido('#cartaFnacimiento');
                    me.campoInvalido('#cartaAmbito');
                    me.campoInvalido('#cartaContinente');
                    me.valido = false;
                } else if (me.nombre == "") {
                    this.$swal({
                        icon: 'error',
                        title: 'Validación',
                        text: 'Campo nombre vacio',
                    });
                    me.campoInvalido('#cartaNombre');
                    me.valido = false;
                } else if (me.apellido == "") {
                    this.$swal({
                        icon: 'error',
                        title: 'Validación',
                        text: 'Campo apellido vacio',
                    });
                    me.campoInvalido('#cartaApellido');
                    me.valido = false;
                } else if (me.fechaNacimiento == "") {
                    this.$swal({
                        icon: 'error',
                        title: 'Validación',
                        text: 'Campos fecha nacimiento vacio',
                    });
                    me.campoInvalido('#cartaFnacimiento');
                    me.valido = false;
                } else if (me.ambito_id == "") {
                    this.$swal({
                        icon: 'error',
                        title: 'Validación',
                        text: 'Debes seleccionar un ambito',
                    });
                    me.campoInvalido('#cartaAmbito');
                    me.valido = false;
                } else if (me.continente_id == "") {
                    this.$swal({
                        icon: 'error',
                        title: 'Validación',
                        text: 'Debes seleccionar un continente',
                    });
                    me.campoInvalido('#cartaContinente');
                    me.valido = false;
                } else {
                    me.valido = true;
                }
                if(me.valido) {
                    
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
                        //'imgRuta':this.imgRuta,
                        'imgDefault':this.imgDefault,
                        'enlaceReferencia':this.enlaceReferencia,
                        'habilitado':this.habilitado,
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
                    //'imgRuta':this.imgRuta,
                    'imgDefault':this.imgDefault,
                    'enlaceReferencia':this.enlaceReferencia,
                    'habilitado':this.habilitado,
                }).then(function (response) {
                   me.getTasks();
                   me.clearFields();
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
                    me.loreEsp = response.data.loreEsp;
                    me.loreEng = response.data.loreEng;
                    me.loreEus = response.data.loreEus;
                    me.zonaGeografica = response.data.zonaGeografica;
                    me.continente_id = response.data.continente_id;
                    me.imgRuta = response.data.imgRuta;
                    me.imgDefault = response.data.imgDefault;
                    if(me.imgRuta == null || me.imgRuta == 'null' || me.imgRuta == '') {
                        $('#fileTxt').text('No tiene imagen');
                        $('#imgPrevia').attr('src',me.imagenPrevia).css({'width':'50%'});
                    } else if (me.imgRuta != null || me.imgRuta != 'null' || me.imgRuta != ''){
                        $('#fileTxt').text(response.data.imgRuta);
                        $('#imgPrevia').attr('src','../resources/img/cartas/' + response.data.imgRuta).css({'width':'50%'});
                    } else if (me.imgDefault != null || me.imgDefault != '') {
                        $('#imgPrevia').attr('src',response.data.imgDefault).css({'width':'50%'});
                    } else {
                        $('#fileTxt').text('No tiene imagen');
                        $('#imgPrevia').attr('src',me.imagenPrevia).css({'width':'50%'});
                    }
                    me.enlaceReferencia = response.data.enlaceReferencia;
                    me.usuario_id = response.data.usuario_id;
                    me.habilitado = response.data.habilitado;
                    if (me.habilitado == 1 || me.habilitado) {
                        $('#habi_desText').val('Habilitado');
                    } else {
                        $('#habi_desText').val('Deshabilitado');
                    }
                })
                .catch(function (error) {
                    console.log(error);
                });
                let urlAmbito = 'ambit/buscar?id=' + me.ambito_id;
                axios.get(urlAmbito).then(function (response) {
                   me.ambitoEsp = response.data.ambitoEsp;
                }).catch(function (error) {
                    console.log(error);
                });
                let urlContinente = 'continent/buscar?id=' + me.continente_id;
                axios.get(url).then(function (response) {
                    me.continenteEsp = response.data.continenteEsp;
                }).catch(function (error) {
                    console.log(error);
                });
            },
            // Metodo para eliminar los datos
            deleteTask(data) {
                let me =this;
                let task_id = data.id
                this.$swal({
                    icon: 'warning',
                    title: '¿Seguro que deseas borrar esta carta?',
                    text: 'No podras revertir ésta acción',
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
                $('#fileTxt').text('Seleccionar archivo');
                this.imgRuta="";
                this.imgDefault="";
                $('#imgPrevia').attr('src',this.imagenPrevia);
                $('#fileCartas').val(null);
                this.enlaceReferencia="";
                this.usuario_id="";
                this.habilitado=0;
                $('#habi_desText').val('Deshabilitado');
                this.update = 0;
                this.volverCss();
            },
            checked() {
                if(this.habilitado) {
                    $('#habi_desText').val('Habilitado');
                    this.update = 0;
                } else {
                    $('#habi_desText').val('Deshabilitado');
                    this.update = 0;
                }
            },
            campoInvalido(campo){
                $(campo).css('border','1px solid red');
                $(campo).attr('placeholder','Campo obligatorio');
            },
            volverCss(){
                $('input').css('border','1px solid #ced4da');
                $('input').attr('placeholder','');
                $('select').css('border','1px solid #ced4da');
            },
            imagPrev(){
                if (!$("#fileCartas").val() == "") {
                    this.update = 1;
                } else {
                    this.update = 0;
                }
            }
        },
        computed: {
            buscarCartas() {
                return this.arrayCartas.filter((carta) => carta.nombre.toLowerCase().includes(this.busqueda.toLowerCase()) || carta.apellido.toLowerCase().includes(this.busqueda.toLowerCase()) || carta.ambito.ambitoEsp.toLowerCase().includes(this.busqueda.toLowerCase())
                );
            }
        },
        // Metodo de inicialización del archivo vue
        mounted() {
           this.getTasks();
        }
    }
</script>
