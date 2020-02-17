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
                                            <button type="button" class="btn btn-secondary" id="loadUser" title="Editar" @click="loadFieldsUpdate(user, '#loadUser')">&#x270E;</button>
                                            <button type="button" class="btn btn-secondary" id="deleteUser" title="Eliminar" @click="deleteData(user,'#deleteUser')">&#x2716;</button>
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
                                        <button v-if="update == 0" @click="saveData('#saveUser')" class="btn btn-success" id="saveUser">Añadir</button>
                                        <!-- Botón que modifica la tarea que anteriormente hemos seleccionado, solo se muestra si la variable update es diferente a 0-->
                                        <button v-if="update != 0" @click="updateData('#updateUser')" class="btn btn-warning" id="updateUser">Actualizar</button>
                                        <!-- Botón que limpia el formulario y inicializa la variable a 0, solo se muestra si la variable update es diferente a 0-->
                                        <button v-if="update != 0" @click="clearFields" class="btn btn-info" id="clearUser">Limpiar</button>
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
                                            <button type="button" class="btn btn-secondary" id="loadAmbit" title="Editar" @click="loadFieldsUpdate(ambito, '#loadAmbit')">&#x270E;</button>
                                            <button type="button" class="btn btn-secondary" id="deleteAmbit" title="Eliminar" @click="deleteData(ambito,'#deleteAmbit')">&#x2716;</button>
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
                                        <button v-if="update == 0" @click="saveData('#saveAmbit')" class="btn btn-success" id="saveAmbit">Añadir</button>
                                        <!-- Botón que modifica la tarea que anteriormente hemos seleccionado, solo se muestra si la variable update es diferente a 0-->
                                        <button v-if="update != 0" @click="updateData('#updateAmbit')" class="btn btn-warning" id="updateAmbit">Actualizar</button>
                                        <!-- Botón que limpia el formulario y inicializa la variable a 0, solo se muestra si la variable update es diferente a 0-->
                                        <button v-if="update != 0" @click="clearFields()" class="btn btn-info">Atrás</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12" v-if="opcion == 'Continentes'">
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
                                            <button type="button" class="btn btn-secondary" id="loadContinent" title="Editar" @click="loadFieldsUpdate(continente, '#loadContinent')">&#x270E;</button>
                                            <button type="button" class="btn btn-secondary" id="deleteContinent" title="Eliminar" @click="deleteData(continente, '#deleteContinent')">&#x2716;</button>
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
                                        <button v-if="update == 0" @click="saveData('#saveContinent')" class="btn btn-success" id="saveContinent">Añadir</button>
                                        <!-- Botón que modifica la tarea que anteriormente hemos seleccionado, solo se muestra si la variable update es diferente a 0-->
                                        <button v-if="update != 0" @click="updateData('#updateContinent')" class="btn btn-warning" id="updateContinent">Actualizar</button>
                                        <!-- Botón que limpia el formulario y inicializa la variable a 0, solo se muestra si la variable update es diferente a 0-->
                                        <button v-if="update != 0" @click="clearFields()" class="btn btn-info">Atrás</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12" v-if="opcion == 'Cartas'">
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
                                            <button type="button" class="btn btn-secondary" id="loadCard" title="Editar" @click="loadFieldsUpdate(carta, '#loadCard')">&#x270E;</button>
                                            <button type="button" class="btn btn-secondary" id="deleteCard" title="Eliminar" @click="deleteData(carta, '#deleteCard')">&#x2716;</button>
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
                                                    <input type="file" class="custom-file-input" name="filename" id="filename" @change="imagPrev">
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
                                        <button v-if="update == 0" @click="saveData('#saveCard')" class="btn btn-success" id="saveCard">Añadir</button>
                                        <!-- Botón que modifica la tarea que anteriormente hemos seleccionado, solo se muestra si la variable update es diferente a 0-->
                                        <button v-if="update != 0" @click="updateData('#updateCard')" class="btn btn-warning" id="updateCard">Actualizar</button>
                                        <!-- Botón que limpia el formulario y inicializa la variable a 0, solo se muestra si la variable update es diferente a 0-->
                                        <button v-if="update != 0" @click="clearFields()" class="btn btn-info">Atrás</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12" v-if="opcion == 'Preguntas'">
                    <div class="table-responsive table-ambitos">
                        <table class="table table-striped rounded">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">CartaID</th>
                                    <th scope="col">Carta</th>
                                    <th scope="col">Pregunta</th>
                                    <th scope="col">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="pregunta in buscarPregunta" :key="pregunta.id">
                                    <td v-text="pregunta.carta_id"></td>
                                    <td v-text="pregunta.carta.nombre"></td>
                                    <td v-text="pregunta.pregunta"></td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <button type="button" class="btn btn-secondary" id="loadQuest" title="Editar" @click="loadFieldsUpdate(pregunta, '#loadQuest')">&#x270E;</button>
                                            <button type="button" class="btn btn-secondary" id="deleteQuest" title="Eliminar" @click="deleteData(pregunta, '#deleteQuest')">&#x2716;</button>
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
                                            <option v-for="carta in arrayCartas" v-bind:key="carta.id" v-text="carta.nombre"></option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <label for="pregunta">Preguntas</label>
                                    <textarea v-model="pregunta" class="form-control" autocomplete="off" id="pregunta"></textarea>
                                </div>
                                <div class="form-row">
                                    <label for="respuesta_1">Respuesta Correcta</label>
                                    <textarea v-model="respuesta_1" class="form-control" autocomplete="off" id="respuesta_1"></textarea>
                                </div>
                                <div class="form-row">
                                    <label for="respuesta_2">Respuesta Erronea 1</label>
                                    <textarea v-model="respuesta_2" class="form-control" autocomplete="off" id="respuesta_2"></textarea>
                                </div>
                                <div class="form-row">
                                    <label for="respuesta_3">Respuesta Erronea 2</label>
                                    <textarea v-model="respuesta_3" class="form-control" autocomplete="off" id="respuesta_3"></textarea>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-12 text-center">
                                        <!-- Botón que añade los datos del formulario, solo se muestra si la variable update es igual a 0-->
                                        <button v-if="update == 0" @click="saveData('#saveQuest')" class="btn btn-success" id="saveQuest">Añadir</button>
                                        <!-- Botón que modifica la tarea que anteriormente hemos seleccionado, solo se muestra si la variable update es diferente a 0-->
                                        <button v-if="update != 0" @click="updateData('#updateQuest')" class="btn btn-warning" id="updateQuest">Actualizar</button>
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

            name:'',
            email:'',
            tipo:'',
            password:'',

            ambito_id:0,
            ambitoEsp:'',
            ambitoEng:'',
            ambitoEus:'',

            continente_id:0,
            continenteEsp:'',
            continenteEng:'',
            continenteEus:'',

            nombre:'',
            apellido:'',
            fechaNacimiento:'',
            fechaMuerte:'',
            loreEsp:'',
            loreEng:'',
            loreEus:'',
            zonaGeografica:'',
            imgRuta:'',
            imgDefault:'',
            imagenPrevia:'../../resources/img/imglogo.svg',
            fileCarta: $('input[name=fileCarta]'),
            file: '',
            enlaceReferencia:'',
            habilitado:false,
            valido:true,

            pregunta: "",
            respuesta_1: "",
            respuesta_2: "",
            respuesta_3: "",
            carta_id: "",
            
            arrayUsuarios:[],
            tipos: [
                { text: 'Usuario', value: 'user' },
                { text: 'Administrador', value: 'administrator' }
            ],
            arrayAmbitos:[],
            arrayContinentes:[],
            arrayCartas:[],
            arrayPreguntas:[],
        }
    },
    methods: {
        getOption(element){
            this.opcion = $(element).text();
            return this.opcion
        },
        getData(){
            let me =this;
            axios.get('./users/data').then(function (response) {
                // seleccionamos array especifico y guardamos el contenido que nos devuelve el response
                me.arrayUsuarios = response.data;
            })
            .catch(function (error) {
                console.log(error);
            });
            axios.get('./ambits/data').then(function (response) {
                // seleccionamos array especifico y guardamos el contenido que nos devuelve el response
                me.arrayAmbitos = response.data;
            })
            .catch(function (error) {
                console.log(error);
            });
            axios.get('./continents/data').then(function (response) {
                // seleccionamos array especifico y guardamos el contenido que nos devuelve el response
                me.arrayContinentes = response.data;
            })
            .catch(function (error) {
                console.log(error);
            });
            axios.get('./cards/data').then(function (response) {
                // seleccionamos array especifico y guardamos el contenido que nos devuelve el response
                me.arrayCartas = response.data;
            })
            .catch(function (error) {
                console.log(error);
            });
            axios.get('./quests/data').then(function (response) {
                // seleccionamos array especifico y guardamos el contenido que nos devuelve el response
                me.arrayPreguntas = response.data;
            }).catch(function (error) {
                console.log(error);
            });
        },
        saveData(element){
            let me = this;
            element = $(element);
            if (element.attr('id') == 'saveUser') {
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
                    axios.post('./users/save',{
                        'name':this.name,
                        'email':this.email,
                        'tipo':this.tipo,
                        'password':this.password,
                    }).then(function (response) {
                        me.getData();
                        me.clearFields();
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
                }
            } else if (element.attr('id') == 'saveAmbit'){
                if (me.ambitoEsp === "") {
                    this.$swal({
                        icon: 'error',
                        title: 'Validación',
                        text: 'Campo requerido vacío',
                    });
                    me.campoInvalido('#ambitoEsp');
                    me.valido = false;
                } else {
                    me.valido = true;
                }

                if (me.valido) {
                    axios.post('./ambits/save',{
                        'ambitoEsp':this.ambitoEsp,
                        'ambitoEng':this.ambitoEng,
                        'ambitoEus':this.ambitoEus,
                    }).then(function (response) {
                        me.getTasks();
                        me.clearFields();
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
                }
                
            } else if (element.attr('id') == 'saveContinent'){
                if (me.continenteEsp === "") {
                    this.$swal({
                        icon: 'error',
                        title: 'Validación',
                        text: 'Campo requerido vacío',
                    });
                    me.campoInvalido('#continenteEsp');
                    me.valido = false;
                } else {
                    me.valido = true;
                }

                if (me.valido) {
                    axios.post('./continents/save',{ //estas variables son las que enviaremos para que crear la tarea
                        'continenteEsp':this.continenteEsp,
                        'continenteEng':this.continenteEng,
                        'continenteEus':this.continenteEus,
                    }).then(function (response) {
                        me.getTasks();
                        me.clearFields();
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
                }
            } else if (element.attr('id') == 'saveCard'){
                const config = {
                    headers: { 'content-type': 'multipart/form-data' }
                }
                
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

                    axios.post('./cards/save',{
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
                        'habilitado':this.habilitado,
                    }).then(function (response) {
                        me.getTasks();
                        me.clearFields();
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
                    
                    if (!(me.imgRuta == null) || !(me.imgRuta == '')) {
                        this.imgUpload();
                    }

                }
            } else if (element.attr('id') == 'saveQuest'){
                if (me.pregunta === "" && me.respuesta_1 === "" && me.respuesta_2 === "" && me.respuesta_3 == "" && me.carta_id === null) {
                    this.$swal({
                        icon: 'error',
                        title: 'Validación',
                        text: 'Campos requeridos vacíos',
                    });
                    me.valido = false;
                } else {
                    me.valido = true;
                }
                if (me.valido) {
                    axios.post('./quests/save',{
                        'pregunta':this.pregunta,
                        'respuesta_1':this.respuesta_1,
                        'respuesta_2':this.respuesta_2,
                        'respuesta_3':this.respuesta_3,
                        'carta_id':this.carta_id,
                    }).then(function (response) {
                        me.getTasks();
                        me.clearFields();
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
                }
            } else {
                this.$swal('Guardado', 'Los datos no se han guardado correctamente', 'info');
            }
            // Previene el funcionamiento por defecto
            event.preventDefault();

        },
        updateData(element){
            let me = this;
            element = $(element);
            if (element.attr('id') == 'updateUser') {
                axios.put('./users/update',{
                    'id':this.update,
                    'name':this.name,
                    'email':this.email,
                    'tipo':this.tipo,
                    'password':this.password,
                }).then(function (response) {
                    me.getData();
                    me.clearFields();
                })
                .catch(function (error) {
                    console.log(error);
                });
            } else if (element.attr('id') == 'updateAmbit') {
                axios.put('./ambits/update',{
                    'id':this.update,
                    'ambitoEsp':this.ambitoEsp,
                    'ambitoEng':this.ambitoEng,
                    'ambitoEus':this.ambitoEus,
                }).then(function (response) {
                    me.getData();
                    me.clearFields();
                })
                .catch(function (error) {
                    console.log(error);
                });
            } else if (element.attr('id') == 'updateContinent') {
                axios.put('./continents/update',{
                    'id':this.update,
                    'continenteEsp':this.continenteEsp,
                    'continenteEng':this.continenteEng,
                    'continenteEus':this.continenteEus,
                }).then(function (response) {
                    me.getData();
                    me.clearFields();
                })
                .catch(function (error) {
                    this.$swal('Error', 'Se ha producido un error', 'warning');
                    console.log(error);
                });
            } else if (element.attr('id') == 'updateCard') {
                axios.put('./cards/update',{
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
                    'habilitado':this.habilitado,
                }).then(function (response) {
                   me.getData();
                   me.clearFields();
                })
                .catch(function (error) {
                    console.log(error);
                });
            } else if (element.attr('id') == 'updateQuest') {
                axios.put('./quests/update',{
                    'id':this.update,
                    'pregunta':this.pregunta,
                    'respuesta_1':this.respuesta_1,
                    'respuesta_2':this.respuesta_2,
                    'respuesta_3':this.respuesta_3,
                    'carta_id':this.carta_id,
                }).then(function (response) {
                   me.getData();
                   me.clearFields();
                })
                .catch(function (error) {
                    console.log(error);
                });
            } else {
                this.$swal('Actualización', 'Los datos no se han actualizado correctamente', 'info');
            }
        },
        deleteData(data,element){
            let me = this;
            let task_id = data.id;
            element = $(element);            
            if (element.attr('id') == 'deleteUser') {
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
                        axios.delete('./users/delete/'+task_id
                        ).then(function (response) {
                            me.getData();
                        })
                        .catch(function (error) {
                            console.log(error);
                        });
                    } else {
                        this.$swal('Cancelado', 'El usuario correspondiente sigue intacto', 'info')
                    }
                })
            } else if (element.attr('id') == 'deleteAmbit') {
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
                            me.getData();
                        })
                        .catch(function (error) {
                            console.log(error);
                        });
                    } else {
                        this.$swal('Cancelado', 'El ambito correspondiente sigue intacto', 'info')
                    }
                })
            } else if (element.attr('id') == 'deleteContinent') {
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
                            me.getData();
                        })
                        .catch(function (error) {
                            console.log(error);
                        });
                    } else {
                        this.$swal('Cancelado', 'El usuario correspondiente sigue intacto', 'info')
                    }
                })
            } else if (element.attr('id') == 'deleteCard') {
                this.$swal({
                    icon: 'warning',
                    title: '¿Seguro que deseas borrar esta carta?',
                    text: 'No podras revertir ésta acción',
                    showCancelButton: true,
                    confirmButtonText: '¡Eliminar!',
                    cancelButtonText: '¡No, mantenerlo!',
                    showCloseButton: true,
                    showLoaderOnConfirm: false
                }).then((result) => {
                    if(result.value) {
                        this.$swal('Eliminado', 'La carta ha sido eliminada correctamente', 'success')
                        axios.delete('card/borrar/'+task_id
                        ).then(function (response) {
                            me.getData();
                        })
                        .catch(function (error) {
                            console.log(error);
                        });
                    } else {
                        this.$swal('Cancelado', 'La carta correspondiente sigue intacta', 'info')
                    }
                })
            } else if (element.attr('id') == 'deleteQuest') {
                this.$swal({
                    icon: 'warning',
                    title: '¿Seguro que deseas borrar esta carta?',
                    text: 'No podras revertir ésta acción',
                    showCancelButton: true,
                    confirmButtonText: '¡Eliminar!',
                    cancelButtonText: '¡No, mantenerlo!',
                    showCloseButton: true,
                    showLoaderOnConfirm: false
                }).then((result) => {
                    if(result.value) {
                        this.$swal('Eliminado', 'La carta ha sido eliminada correctamente', 'success')
                        axios.delete('quest/borrar/'+task_id
                        ).then(function (response) {
                            me.getData();
                        })
                        .catch(function (error) {
                            console.log(error);
                        });
                    } else {
                        this.$swal('Cancelado', 'La carta correspondiente sigue intacta', 'info')
                    }
                })
            } else {
                this.$swal('Cancelado', 'La informacion que deseaste borrar sigue intacta', 'info')
            }
        },
        loadFieldsUpdate(data,element){
            let me = this;
            this.update = data.id;
            element = $(element);
            if (element.attr('id') == 'loadUser') {
                axios.get('./users/search?id='+this.update).then(function (response) {
                    me.name = response.data.name;
                    me.email = response.data.email;
                    me.tipo = response.data.tipo;
                    me.vm.tipo = response.data.tipo;
                })
                .catch(function (error) {
                    console.log(error);
                });
            } else if (element.attr('id') == 'loadAmbit') {
                axios.get('./ambits/search?id='+this.update).then(function (response) {
                    me.ambitoEsp = response.data.ambitoEsp;
                    me.ambitoEng = response.data.ambitoEng;
                    me.ambitoEus = response.data.ambitoEus;
                })
                .catch(function (error) {
                    console.log(error);
                });
            } else if (element.attr('id') == 'loadContinent') {
                axios.get('./continents/search?id='+this.update).then(function (response) {
                    me.continenteEsp = response.data.continenteEsp;
                    me.continenteEng = response.data.continenteEng;
                    me.continenteEus = response.data.continenteEus;
                })
                .catch(function (error) {
                    console.log(error);
                });
            } else if (element.attr('id') == 'loadCard') {
                axios.get('./cards/search?id='+this.update).then(function (response) {
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
                    $('#fileCartas').val('');
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
            } else if (element.attr('id') == 'loadQuest') {
                axios.get('./quests/search?id='+this.update).then(function (response) {
                    me.pregunta = response.data.pregunta;
                    me.respuesta_1 = response.data.respuesta_1;
                    me.respuesta_2 = response.data.respuesta_2;
                    me.respuesta_3 = response.data.respuesta_3;
                    me.carta_id = response.data.carta_id;
                })
                .catch(function (error) {
                    console.log(error);
                });
            } else {
                this.$swal('Datos', 'Fallo al cargar los datos', 'info')
            }
        },
        campoInvalido(campo){
            $(campo).css('border','1px solid red');
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
        volverCss(){
            $('input').css('border','1px solid #ced4da');
            $('input').attr('placeholder','');
            $('select').css('border','1px solid #ced4da');
        },
        imagPrev(e){
            if (!$("#filename").val() == "") {
                this.imgRuta = $("#filename").val().replace(/C:\\fakepath\\/i, '');
                this.file = e.target.files[0];
            } else {
                this.update = 0;
            }
        },
        imgUpload() {

            const config = {
                headers: { 'content-type': 'multipart/form-data' }
            }

            let formData = new FormData();
            formData.append('file', this.file);

            axios.post('card/imagen', formData, config)
            .then(function (response) {
                console.log(response);
                this.$swal({
                    icon: 'success',
                    title: 'Imagen',
                    text: 'Imagen subida correctamente',
                });
            })
            .catch(function (error) {
                console.log(error);
            });
        },
        clearFields(){
            this.ambito_id = 0;
            this.ambitoEsp = '';
            this.ambitoEng = '';
            this.ambitoEus = '';

            this.continente_id = 0;
            this.continenteEsp = '';
            this.continenteEng = '';
            this.continenteEus = '';

            this.nombre = '';
            this.apellido = '';
            this.fechaNacimiento = '';
            this.fechaMuerte = '';
            this.loreEsp = '';
            this.loreEng = '';
            this.loreEus = '';
            this.zonaGeografica = '';
            $('#fileTxt').text('Seleccionar archivo');
            this.imgRuta = '';
            this.imgDefault = '';
            $('#imgPrevia').attr('src',this.imagenPrevia);
            $('#fileCartas').val('');
            this.enlaceReferencia = '';
            this.habilitado = 0;
            $('#habi_desText').val('Deshabilitado');
            this.volverCss();

            this.pregunta = '';
            this.respuesta_1 = '';
            this.respuesta_2 = '';
            this.respuesta_3 = '';
            this.carta_id  = 0;

            this.update = 0;
            this.busqueda = '';
        }
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
        buscarContinente() {
            return this.arrayContinentes.filter((continente) => continente.continenteEsp.toLowerCase().includes(this.busqueda.toLowerCase()) || continente.continenteEng.toLowerCase().includes(this.busqueda.toLowerCase()) || continente.continenteEus.toLowerCase().includes(this.busqueda.toLowerCase())
            );
        },
        buscarCartas() {
            return this.arrayCartas.filter((carta) => carta.nombre.toLowerCase().includes(this.busqueda.toLowerCase()) || carta.apellido.toLowerCase().includes(this.busqueda.toLowerCase()) || carta.ambito.ambitoEsp.toLowerCase().includes(this.busqueda.toLowerCase())
            );
        },
        buscarPregunta() {
            return this.arrayPreguntas.filter((pregunta) => pregunta.pregunta.toLowerCase().includes(this.busqueda.toLowerCase()));
        },
    },
    mounted() {
        this.getData();
    }
    
}
</script>
