<template>

    <div class="col-sm-8 col-md-8 col-lg-6 box-gamemode">
        <div class="row box-gamemode-contenido">
            <div class="col-sm-12 text-center">
                <picture>
                    <source :srcset="'../resources/img/imglogo.svg'" type="image/svg+xml">
                    <img :src="'../resources/img/imglogo.png'" alt="SVG con fallback de png" title="OCA-F">
                </picture>
            </div>
            <div class="col-sm-12 text-center">
                <h1 v-text="'OCA-F'"></h1>
            </div>
            <div class="col-sm-12 text-center">
                <form class="gamemode" method="POST">
                    <h2 v-if="gamemode === 'Individual'" v-text="gamemode"></h2>
                    <h2 v-else v-text="'Co-Operativo'"></h2>

                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-3 mb-3">
                                <label v-if="gamemode === 'Individual'" for="lbljugador1" v-text="'Jugador 1'"></label>
                                <label v-else for="lbljugador1" v-text="'Equipo 1'"></label>
                                <input type="text" class="form-control" id="lbljugador1" :value="''" autocomplete="off" disabled readonly>
                            </div>
                            <div class="col-md-3 mb-3" v-for="n in 3" :key="n">
                                <label v-if="gamemode === 'Individual'" :for="'lbljugador'+ (n=n+1)" v-text="'Jugador '+n"></label>
                                <label v-else :for="'lbljugador'+ (n=n+1)" v-text="'Equipo '+ n"></label>
                                <input type="text" class="form-control" :id="'lbljugador'+n" :value="''" autocomplete="off" required>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <select class="custom-select" id="modoJuego" v-model="modoJuego">
                            <option disabled selected value="">Abrir para seleccionar modo de juego</option>
                            <option value="1">Normal</option>
                            <option value="2">Categoría específica</option>
                        </select>
                    </div>

                    <div v-if="modoJuego == 2" class="form-group">
                        <select class="custom-select">
                            <option disabled selected value="">Seleccionar categoría</option>
                            <option v-for="ambito in arrayAmbitos" :key="ambito.id" v-text="ambito.ambitoEsp"></option>
                        </select>
                    </div>

                    <div class="form-group">
                        <div class="form-row d-flex justify-content-center gamemode-typetablero">
                            <div class="input-group col-md-3 mb-3 d-flex justify-content-center flex-wrap">
                                <label for="tableroDefault" class="radio-label-gamemode flex-fill w-100">
                                    Normal
                                </label>
                                <div class="input-group-prepend select-tablero">
                                    <div class="input-group-text input-tableroDefault justify-content-center">
                                        <input type="radio" id="tableroDefault" name="tablero" class="radio-gamemode">
                                    </div>
                                </div>
                            </div>
                            <div class="input-group col-md-3 mb-3 d-flex justify-content-center flex-wrap">
                                <label for="tableroNuevo" class="radio-label-gamemode flex-fill w-100">
                                    Nuevo
                                </label>
                                <div class="input-group-prepend">
                                    <div class="input-group-text input-tableroNuevo justify-content-center">
                                        <input type="radio" id="tableroNuevo" name="tablero" class="radio-gamemode">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <textarea class="form-control" id="" placeholder="" readonly></textarea>
                    </div>

                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-primary">Iniciar</button>
                    </div>
                </form>
            </div>
            <div class="col-sm-12 text-center">
                <a class="btn btn-outline-info" :href="'mode'" role="button" @click="removeLocalStorage">&#x2190; Volver</a>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data(){
        return{
            gamemode:"",
            modoJuego:"",
            update:0,

            arrayAmbitos: []
        }
    },
    methods: {
        getTasks(){
            let me = this;
            me.gamemode = localStorage.getItem('modoSeleccionado');
            axios.get('ambit').then(function (response) {
                me.arrayAmbitos = response.data;
            }).catch(function (error) {
                console.log(error);
            });
        },
        removeLocalStorage(){
            localStorage.removeItem('modoSeleccionado');
        }
    },
    mounted() {
        this.getTasks();
    }
}
</script>
