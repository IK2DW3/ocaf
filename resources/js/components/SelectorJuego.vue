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
                <form class="gamemode" id="formGamemode" @submit="checkForm">
                    <h2 v-if="gamemode === 'Individual'" v-text="gamemode"></h2>
                    <h2 v-else v-text="'Co-Operativo'"></h2>

                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-3 mb-3" v-for="n in 4" :key="n">
                                <label v-if="gamemode === 'Individual'" :for="'lbljugador'+ n" v-text="'Jugador '+n"></label>
                                <label v-else :for="'lbljugador'+ n" v-text="'Equipo '+ n"></label>
                                <input v-model="lbljugador[n]" type="text" class="form-control" :name="'lbljugador'+n" :id="'lbljugador'+n" autocomplete="off">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <select class="custom-select" id="modoJuego" v-model="modoJuego">
                            <option disabled selected value="">Abrir para seleccionar modo de juego</option>
                            <option value="normal">Normal</option>
                            <option value="ambitos">Categoría específica</option>
                        </select>
                    </div>

                    <div v-if="modoJuego == 'ambitos'" class="form-group">
                        <select class="custom-select" v-model="categoria">
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
                                        <input v-model="tablero" type="radio" id="tableroDefault" name="tab" class="radio-gamemode" value="normal">
                                    </div>
                                </div>
                            </div>
                            <div class="input-group col-md-3 mb-3 d-flex justify-content-center flex-wrap">
                                <label for="tableroNuevo" class="radio-label-gamemode flex-fill w-100">
                                    Nuevo
                                </label>
                                <div class="input-group-prepend">
                                    <div class="input-group-text input-tableroNuevo justify-content-center">
                                        <input v-model="tablero" type="radio" id="tableroNuevo" name="tab" class="radio-gamemode" value="nuevo">
                                    </div>
                                </div>
                            </div>
                        </div>
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
            categoria:"",
            tablero:"",
            valido:true,

            lbljugador: [],
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
            axios.get('profile').then(function (response) {
                me.usuarioLogin = response.data;
            })
            .catch(function (error) {
                console.log(error);
            });
        },
        removeLocalStorage(){
            localStorage.removeItem('modoSeleccionado');
        },
        checkForm(e) {
            let me = this;
            if (me.lbljugador.length <= 0) {
                this.$swal({
                    icon: 'error',
                    title: 'Campos vacios',
                    text: 'Deben existir al menos 2 jugadores',
                });
                this.valido = false;
            } else if (me.lbljugador[1].length > 0 && me.lbljugador.length <= 2) {
                this.$swal({
                    icon: 'error',
                    title: 'Campos vacios',
                    text: 'Deben existir al menos 2 jugadores',
                });
                this.valido = false;
            } else if (me.lbljugador[1].length > 0 && me.lbljugador[2] === "") {
                this.$swal({
                    icon: 'error',
                    title: 'Campos vacios',
                    text: 'Deben haber al menos 2 jugadores',
                });
                this.valido = false;
            } else if (me.lbljugador[1] === "" && me.lbljugador[2] === "") {
                this.$swal({
                    icon: 'error',
                    title: 'Campos vacios',
                    text: 'Deben haber al menos 2 jugadores',
                });
                this.valido = false;
            } else if (me.modoJuego === "" || me.modoJuego === null) {
                this.$swal({
                    icon: 'error',
                    title: 'Modo de juego',
                    text: 'Selecciona un modo de juego',
                });
                this.valido = false;
            } else if (me.tablero === "" || me.tablero === null) {
                this.$swal({
                    icon: 'error',
                    title: 'Tablero',
                    text: 'Selecciona un tablero',
                });
                this.valido = false;
            } else {
                me.datosSelectorModo();
                if (me.tablero === "normal") {
                    window.location.href = 'tablero/normal';
                } else if(me.tablero === "nuevo") {
                    window.location.href = 'tablero/serpiente';
                }
                
            }
            
            e.preventDefault();
            
        },
        datosSelectorModo() {
            let jugador1 = this.lbljugador[1];
            let jugador2 = this.lbljugador[2];
            let jugador3 = this.lbljugador[3];
            let jugador4 = this.lbljugador[4];
            let modo = this.modoJuego;
            let categoria = this.categoria;
            let tablero = this.tablero;
            var jugadores = {
                    'modo':modo,
                    'categoria':categoria,
                    'tablero':tablero,
                    'jugador1':jugador1,
                    'jugador2':jugador2,
                    'jugador3':jugador3,
                    'jugador4':jugador4
                    };

            if (jugador1 !== "" && jugador2 !== ""){
                localStorage.setItem("partida", JSON.stringify(jugadores));

            } else if (jugador1 !== "" && jugador2 !== "" && jugador3 !== ""){
                localStorage.setItem("partida", JSON.stringify(jugadores));

            } else if (jugador1 !== "" && jugador2 !== "" && jugador3 !== "" && jugador4 !== ""){
                localStorage.setItem("partida", JSON.stringify(jugadores));
            }
        }
    },
    mounted() {
        this.getTasks();
    }
}
</script>
