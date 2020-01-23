<template>
    <div class="row align-items-center justify-content-center py-4">
        <form>
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
                    <div class="input-group-text"><i class="icon ion-md-unlock"></i></div>
                    </div>
                    <input v-model="perfilContraseña" type="password" class="form-control" placeholder="Contraseña actual">
                </div>
            </div>
            <div class="form-group">
                <div class="input-group mb-2 mr-sm-2">
                    <div class="input-group-prepend">
                    <div class="input-group-text"><i class="icon ion-md-key"></i></div>
                    </div>
                    <input v-model="perfilNuevacontraseña" type="password" class="form-control" placeholder="Nueva contraseña">
                </div>
            </div>
            <div class="form-group">
                <div class="input-group mb-2 mr-sm-2">
                    <div class="input-group-prepend">
                    <div class="input-group-text"><i class="icon ion-md-lock"></i></div>
                    </div>
                    <input v-model="perfilConfirmarcontraseña" type="password" class="form-control" placeholder="Confirmar contraseña">
                </div>
            </div>
            <div class="form-group text-center">
                <input type="submit" @click="validarLogin()" class="btn btn-primary" value="Actualizar">
            </div>
        </form>
    </div>
</template>

<script>
export default {
    data() {
        return{
            perfilNombre:null,
            pefilEmail:null, 
            perfilContraseña:null, 
            perfilNuevacontraseña:null,
            perfilConfirmarcontraseña:null,
            valido:true,
            update:0,

            arrayUsuario:[],
        }
    },
    methods: {
        getTasks(){
            let me =this;
            let url = 'profile';
            axios.get(url).then(function (response) {
                //creamos un array y guardamos el contenido que nos devuelve el response
                me.arrayUsuario = response.data;
                me.update = me.arrayUsuario.id;
                me.perfilNombre = me.arrayUsuario.name;
                me.pefilEmail = me.arrayUsuario.email;
            })
            .catch(function (error) {
                // handle error
                console.log(error);
            });
        },
        validarLogin(event) {
        
            // Inicializacion de variable
            let me = this;
            // Condiciones
             if (me.perfilContraseña == null || me.perfilContraseña == "") {
                this.$swal({
                    icon: 'error',
                    title: 'Contraseña',
                    text: 'El campo contraseña esta vacio',
                });
                //password.css('border','1px solid red');
                //password.attr("placeholder", "Campo vacio");
                me.valido = false;
            } else if (me.perfilContraseña != me.arrayUsuario.password) {
                this.$swal({
                    icon: 'error',
                    title: 'Contraseña',
                    text: 'El campo contraseña esta vacio',
                });
                //password.css('border','1px solid red');
                //password.attr("placeholder", "Contraseña incorrecta");
                me.valido = false;
            } else if (me.perfilNuevacontraseña.length < 6 || me.perfilNuevacontraseña.length > 16) {
                this.$swal({
                    icon: 'error',
                    title: 'Contraseña',
                    text: 'La contraseña nueva es demasiado corta o larga. Min 6 - Max 16',
                });
                //passwordNueva.css('border','1px solid red');
                //passwordNueva.attr("placeholder", "Contraseña incorrecta");
                me.valido = false;
            } else if (me.perfilNuevacontraseña != me.perfilConfirmarcontraseña) {
                this.$swal({
                    icon: 'error',
                    title: 'Contraseña',
                    text: 'Las contraseñas no coinciden',
                });
                //passwordNueva.css('border','1px solid red');
                //passwordNueva.attr("placeholder", "Contraseña incorrecta");
                //passwordNuevaConfirmar.css('border','1px solid red');
                //passwordNuevaConfirmar.attr("placeholder", "Contraseña incorrecta");
                me.valido = false;
            }

            if (me.valido) {
                this.$swal({
                    title: '¿Seguro que deseas actualizar tu contraseña?',
                    text: 'No podras revertir ésta acción',
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonText: '¡Actualizar!',
                    cancelButtonText: '¡Cancelar!',
                    showCloseButton: true,
                    showLoaderOnConfirm: true
                }).then((result) => {
                    if(result.value) {
                        this.$swal('Actualizacion', 'Has actualizado tu contraseña correctamente', 'success');
                        axios.put('profile/actualizar',{
                            'id':this.update,
                            'name':this.perfilNombre,
                            'email':this.pefilEmail,
                            'password':this.perfilConfirmarcontraseña,
                        }).then(function (response) {
                            me.getTasks();
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
                        this.$swal('Actualizacion', 'Has denegado actualizado tu contraseña correctamente', 'info');
                        me.valido = false;
                        return me.valido;
                    }
                })
                
            }

            // Previene el funcionamiento por defecto
            event.preventDefault();
        }
    },
    // Metodo de inicialización del archivo vue
    mounted() {
        this.getTasks();
    }
}
</script>