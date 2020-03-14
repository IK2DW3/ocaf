<template>
    <div class="row align-items-center justify-content-center py-4">
        <div class="col-sm-12 d-flex align-items-center justify-content-center border-bottom pb-3">
            <form class="w-50">
                <div class="form-group">
                    <div class="input-group mb-2 mr-sm-2">
                        <div class="input-group-prepend">
                        <div class="input-group-text"><i class="icon ion-md-person"></i></div>
                        </div>
                        <input v-model="perfilNombre" type="text" class="form-control" disabled readonly>
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group mb-2 mr-sm-2">
                        <div class="input-group-prepend">
                        <div class="input-group-text">@</div>
                        </div>
                        <input v-model="pefilEmail" type="email" class="form-control" disabled readonly>
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group mb-2 mr-sm-2">
                        <div class="input-group-prepend">
                        <div class="input-group-text"><i class="icon ion-md-key"></i></div>
                        </div>
                        <input v-model="perfilNuevacontraseña" type="password" class="form-control" placeholder="Nueva contraseña" autocomplete="off">
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group mb-2 mr-sm-2">
                        <div class="input-group-prepend">
                        <div class="input-group-text"><i class="icon ion-md-lock"></i></div>
                        </div>
                        <input v-model="perfilConfirmarcontraseña" type="password" class="form-control" placeholder="Confirmar contraseña" autocomplete="off">
                    </div>
                </div>
                <div class="form-group text-center">
                    <input type="submit" @click="validarLogin" class="btn btn-primary" value="Actualizar">
                </div>
            </form>
        </div>
        <div class="col-sm-12 border-bottom my-2">
            <div class="row">
                <div class="col-sm-12 text-center mt-3 mb-2">
                    <h2>Mis publicaciones</h2>
                </div>
                <div class="col-sm-12 my-2">
                    <input class="form-control" type="search" v-model="busqueda" name="buscador" placeholder="Buscar en la tabla" autocomplete="off">
                </div>
                <div class="col-sm-12 pb-3">
                    <div class="table-responsive table-perfil-posts">
                        <table class="table table-striped rounded">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">Titulo</th>
                                    <th scope="col">Categoria</th>
                                    <th scope="col">Publicado el</th>
                                    <th scope="col">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="post in buscarPost" :key="post.id">
                                    <td v-text="post.titulo"></td>
                                    <td v-text="post.categoria.nombre"></td>
                                    <td v-text="post.created_at"></td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <a :href="'blog/post/'+ post.id" role="button" class="btn btn-info" title="Ver">&#x1F440;</a>
                                            <button type="button" id="loadUser" class="btn btn-warning"  title="Editar" @click="loadFieldsUpdate(post)">&#x270E;</button>
                                            <button type="button" id="deleteUser" class="btn btn-danger"  title="Eliminar" @click="deleteData(post)">&#x2716;</button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12 my-2">
            <div class="row">
                <div class="col-sm-12 text-center mt-3 mb-2">
                    <h3>Crea o edita tus posts</h3>
                </div>
                <div class="col-sm-12 py-2">
                    <form>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="">Titulo</label>
                                <input v-model="titulo" type="text" class="form-control" autocomplete="off">
                            </div>
                            <div class="form-group col-md-12">
                                <label for="">Descripción</label>
                                <textarea v-model="descripcion" class="form-control" autocomplete="off"></textarea>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="">Seleccionar categoria</label>
                                <select v-model="categoria_id" class="custom-select">
                                    <option disabled :value="0">Seleccionar categoria</option>
                                    <option v-for="categoria in arrayCategorias" :key="categoria.id" :value="categoria.id">{{ categoria.nombre }}</option>
                                </select>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="">¿Deseas subir una imagen?</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="filename" id="filename">
                                    <label class="custom-file-label" id="fileTxt" for="customFileLang" v-text="'Seleccionar Archivo'"></label>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12 text-center">
                                <!-- Botón que añade los datos del formulario, solo se muestra si la variable update es igual a 0-->
                                <button class="btn btn-success" v-if="update == 0" @click="saveData()">Añadir</button>
                                <!-- Botón que modifica la tarea que anteriormente hemos seleccionado, solo se muestra si la variable update es diferente a 0-->
                                <button class="btn btn-warning" v-if="update != 0" @click="updateData()">Actualizar</button>
                                <!-- Botón que limpia el formulario y inicializa la variable a 0, solo se muestra si la variable update es diferente a 0-->
                                <input type="reset" class="btn btn-info" v-if="update != 0" @click="updateStatus">
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

            perfilNombre:'',
            pefilEmail:'',
            perfilNuevacontraseña:'',
            perfilConfirmarcontraseña:'',

            titulo:'',
            descripcion:'',
            imagen:'',
            categoria:'',
            categoria_id:0,

            file: '',
            busqueda:'',
            valido:true,
            update:0,

            arrayUsuario:[],
            arrayCategorias:[],
            arrayPost:[],
        }
    },
    methods: {
        getData(){
            let me =this;
            let url = './profile/user';
            axios.get(url).then(function (response) {
                //creamos un array y guardamos el contenido que nos devuelve el response
                me.arrayUsuario = response.data.data.user;
                me.arrayCategorias = response.data.data.categorys;
                me.arrayPost = response.data.data.post;
                me.perfilNombre = me.arrayUsuario.name;
                me.pefilEmail = me.arrayUsuario.email;
            })
            .catch(function (error) {
                console.log(error);
            });
        },
        validarLogin(event) {
            // Inicializacion de variable
            let me = this;
            // Condiciones
            if (me.perfilNuevacontraseña === "" || me.perfilConfirmarcontraseña === "") {
                this.$swal({
                    icon: 'error',
                    title: 'Contraseña',
                    text: 'El campo contraseña esta vacio',
                });
                me.valido = false;
            } else if (me.perfilNuevacontraseña.length < 6 || me.perfilNuevacontraseña.length  > 16) {
                this.$swal({
                    icon: 'error',
                    title: 'Contraseña',
                    text: 'La contraseña nueva es demasiado corta o larga. Min 6 - Max 16',
                });
                me.valido = false;
            } else if (me.perfilNuevacontraseña != me.perfilConfirmarcontraseña) {
                this.$swal({
                    icon: 'error',
                    title: 'Contraseña',
                    text: 'Las contraseñas nuevas no coinciden',
                });
                me.valido = false;
            } else {
                me.valido = true;
            }

            if (me.valido) {
                this.$swal({
                    icon: 'warning',
                    title: '¿Seguro que deseas actualizar tu contraseña?',
                    text: 'No podras revertir ésta acción',
                    showCancelButton: true,
                    confirmButtonText: '¡Actualizar!',
                    cancelButtonText: '¡Cancelar!',
                    showCloseButton: true,
                    showLoaderOnConfirm: false
                }).then((result) => {
                    if(result.value) {
                        this.$swal('Actualizacion', 'Ha aceptado la actualización de tu contraseña', 'success');
                        axios.put('./profile/update',{
                            'id':this.update,
                            'password':this.perfilConfirmarcontraseña,
                        }).then(function (response) {
                            me.getData();
                            me.perfilNuevacontraseña="",
                            me.perfilConfirmarcontraseña=""
                        })
                        .catch(function (error) {
                            this.$swal({
                                icon: 'error',
                                title: 'Contraseña',
                                text: 'Se ha producido un error',
                            });
                        });
                        return me.valido;
                    } else {
                        this.$swal('Actualizacion', 'Has denegado la actualizado tu contraseña correctamente', 'info');
                        me.valido = false;
                        return me.valido;
                    }
                })

            }

            // Previene el funcionamiento por defecto
            event.preventDefault();
        },
        loadFieldsUpdate(data) {
            this.update = data.id
            let me = this;
            axios.get('./profile/post/search?id='+this.update).then(function (response) {
                me.titulo = response.data.titulo;
                me.descripcion = response.data.descripcion;
                me.imagen = response.data.imagen;
                if(me.imagen == null || me.imagen == 'null' || me.imagen == '') {
                    $('#fileTxt').text('No tiene imagen');
                } else if (me.imagen != null || me.imagen != 'null' || me.imagen != ''){
                    $('#fileTxt').text(response.data.imagen);
                } else {
                    $('#fileTxt').text('No tiene imagen');
                }
                me.categoria_id = response.data.categoria_id;
            })
            .catch(function (error) {
                console.log(error);
            });
        },
        saveData() {
            let me = this;
            axios.post('./profile/post/save',{
                'titulo':this.titulo,
                'descripcion':this.descripcion,
                'categoria_id':this.categoria_id
            }).then(function (response) {
                me.getData();
                this.$swal('Guardado', 'Los datos se han guardado correctamente', 'Aceptar');
            })
            .catch(function (error) {
                console.log(error);
            });
        },
        updateData() {
            let me = this;
            axios.put('./profile/post/update',{
                'id':this.update,
                'titulo':this.titulo,
                'descripcion':this.descripcion,
                'imagen': this.imagen,
                'categoria_id':this.categoria_id,
            }).then(function (response) {
                me.getData();
                this.$swal('Actualización', 'Los datos se han actualizado correctamente', 'Aceptar');
            })
            .catch(function (error) {
                console.log(error);
            });

        },
        deleteData(data) {
            let me = this;
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
                    axios.delete('./profile/post/delete/'+task_id
                    ).then(function (response) {
                        me.getData();
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
                } else {
                    this.$swal('Cancelado', 'El post correspondiente sigue intacta', 'info')
                }
            })
        },
        updateStatus() {
            this.titulo = '',
            this.descripcion = '',
            this.categoria = '',
            this.categoria_id = 0,
            this.update = 0;
        },
    },
    computed: {
        buscarPost() {
            return this.arrayPost.filter((post) => post.titulo.toLowerCase().includes(this.busqueda.toLowerCase()) || post.categoria.nombre.toLowerCase().includes(this.busqueda.toLowerCase()) || post.created_at.toLowerCase().includes(this.busqueda.toLowerCase())
            );
        },
    },
    // Metodo de inicialización del archivo vue
    mounted() {
        this.getData();
    }
}
</script>
