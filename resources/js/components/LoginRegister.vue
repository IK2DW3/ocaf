<template>

    <div class="row align-items-start justify-content-center contenido px-2">

            <div class="col-sm-12 col-logo">
                <picture>
                    <source :srcset="'../resources/img/imglogo.svg'" type="image/svg+xml">
                    <img :src="'../resources/img/imglogo.png'" alt="SVG con fallback de png" title="OCA-F">
                </picture>
                <h1>OCA-F</h1>
            </div>

            <div class="col-sm-8 col-md-8 col-lg-3 cont-login mx-2 my-2">
                <div class="row">
                    <div class="col-sm-12 login">
                        <form class="overflow-hidden" @submit="validacionLogin" action="login" method="post">
                            <h2 v-text="'Inicio sesión'"></h2>
                            <div class="form-group">
                                <label for="username">Correo electrónico</label>
                                <input v-model="emailLogin" type="text" name="email" class="form-control" autocomplete="off">
                            </div>

                            <div class="form-group">
                                <label for="password">Contraseña</label>
                                <input v-model="emailPassword" type="password" name="password"  class="form-control">
                            </div>

                            <div class="form-group text-center">
                                <button type="submit" id="btnLogin" class="btn btn-primary" style="padding:8px 100px;margin-top:25px;">Entrar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-sm-12 col-md-8 col-lg-3 col-register mx-2 my-2">
                <div class="row">
                    <div class="col-sm-12 registro">
                        <form class="overflow-hidden" @submit="validacionRegistro" action="/register" method="post">
                            <h2 v-text="'¡Únete!'"></h2>
                            <div class="form-group">
                                <label for="newusername">Nombre usuario</label>
                                <input v-model="newusername" type="text" name="newusername" class="form-control" autocomplete="off">
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input v-model="newemail" type="email" name="newemail" class="form-control" autocomplete="off">
                            </div>

                            <div class="form-group">
                                <label for="newpassword">Contraseña</label>
                                <input v-model="newpassword" type="password" name="newpassword" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="confirmnewpassword">Confirmar contraseña</label>
                                <input v-model="confirmnewpassword" type="password" name="confirmnewpassword" class="form-control">
                            </div>

                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-primary" style="padding:8px 100px;margin-top:25px;">Registrarse</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-sm-12 col-volver">
                <a class="btn btn-light" :href="'index'" role="button">Volver</a>
            </div>

        </div>

</template>

<script>
export default {
    data(){
        return{
            // Parametros iniciales
            emailLogin:"",
            emailPassword:"",
            newemail:"",
            newusername:"",
            newpassword:"",
            confirmnewpassword:"",
            update:0,
        }
    },
    methods:{
        validacionLogin() {

            if (this.emailLogin == "") {
                this.$swal('Campo email vacio');
                return false;
            } else if (this.emailPassword == "") {
                this.$swal('Campo contraseña vacio');
                return false;
            } else {

                preventdefault();
                return true;
            }
            
        },
    }

}
</script>
