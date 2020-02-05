<template>
    <div class="row align-items-center justify-content-center contenido p-2" id="body">
        <div class="col-sm-10 d-flex align-items-center justify-content-center flex-column">
            <div class="row">
                <div class="col">
                    <div id="loader"></div>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <!-- un menu de debug para que los administradores puedan cambiar algunos aspectos del juego sin tener que volver-->
                    <div id=debug>
                        jugadores
                        <button class="btndebug" id="btn2jugadores">2 jugadores</button>
                        <button class="btndebug" id="btn4Jugadores">4 jugadores</button>
                        <br>
                        ModoDejuego
                        <button class="btndebug" id="btntrivia">Trivia</button>
                        <button class="btndebug">normal</button>
                        <br>
                        Equipos
                        <button class="btndebug">2 equipos</button>
                        <br>
                        otros
                        <button class="btndebug" id=btnImprimir>Imprimir</button>
                        <button class="btndebug" id=btnmensajer>mostrar</button> 
                        <br>
                        <input type="text" id="NJ1" placeholder="jugador1">
                        <input type="text" id="NJ2" placeholder="jugador2">
                        <input type="text" id="NJ3" placeholder="jugador3">
                        <input type="text" id="NJ4" placeholder="jugador4">
                        <button class="btndebug" id=btnNombres>nombrar</button>
                    </div>
                </div>
            </div>

            <div class="row w-100">
                <div class="col-sm-12">
                    <!-- el tablero esta formado de 63 casillas que dependeiendo de su tipo tendran o no : un boton de pregunta, un numero y un area donde se guardan las fichas de juego si se cae en dicha casilla-->
                    <div id="tablero">

                        <div class="casilla p-2" id="casillaInicio">
                            <div class="row">
                                <div class="col-sm-8 casillaHead"><p class="numCasilla" v-text="'1'"></p></div>
                                <div class="col-sm-4 casillaHead"><button class="pregunta" v-text="'?'"></button></div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 casillaBody"><div class="area d-flex align-items-center justify-content-around" id="area1"></div></div>
                            </div>
                        </div>

                        <div class="casilla px-2 py-2 text-center" :id="'casilla'+(n=n+1)" v-for="n in 61" :key="n">
                            <div class="row">
                                <div class="col-sm-8 casillaHead"><p class="numCasilla" v-text="n"></p></div>
                                <div class="col-sm-4 casillaHead"><button class="pregunta" v-text="'?'"></button></div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 casillaBody"><div class="area" :id="'area'+n"></div></div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 casillaFooter">
                                    <p class="m-0" v-if="n!==5 && n!==6 && n!==9 && n!==12 && n!==14 && n!==18 && n!==19 && n!==23 && n!==27 && n!==31 && n!==32 
                                        && n!==35 && n!==41 && n!==42 && n!==45 && n!==50 && n!==52 && n!==54 && n!==58 && n!==59" v-text="'Pepa Perez'"></p>
                                </div>
                            </div>
                        </div>

                        <div class="casillaNormas p-2" id="casillaNormas">
                            <div class="row align-items-center justify-content-center h-100">
                                <div class="col">
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-light" data-toggle="modal" data-target="#mostrarNormas">
                                       <strong>Ver normas</strong>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="casilla p-2" id="casillaFinal">
                            <div class="row">
                                <div class="col-sm-8 casillaHead"><p class="numCasilla" v-text="'63'"></p></div>
                                <div class="col-sm-4 casillaHead"><button class="pregunta" v-text="'?'"></button></div>
                            </div>
                            <div class="row align-items-center justify-center-around h-100">
                                <div class="col-sm-12 casillaBody"><div class="area" id="area63"></div></div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <!-- las fichas -->
                    <div class="ficha" :id="'ficha'+n" v-for="n in 4" :key="n"></div>
                </div>
            </div>
            
            <!-- los jugadores -->
            <div class="contjugador d-flex align-items-center justify-content-center flex-column text-center" :id="'jugador'+n" v-for="n in 4" :key="n">
                <div class="row">
                    <div class="col-sm-12 d-flex align-items-center justify-content-center"><p :id="'nombre'+n" class="m-0" v-text="'Jugador'+n" ></p> </div>
                    <div class="col-sm-12 d-flex align-items-center justify-content-center py-1"><img class ="jugador" :src="'../../resources/img/tablero/tablero/user.png'" :alt="'Jugador'+n"></div>
                    <div class="col-sm-12 d-flex align-items-center justify-content-center"><p :id="'posicionCasilla'+n" class="m-0">0</p></div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <!--Las normas-->
                    <div class="modal fade" id="mostrarNormas" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="normas">Normas</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p><strong>+>Oca: </strong> Logo de Desayunos Feministas. 
                                    Si se cae en una de estas casillas, se puede
                                    avanzar hasta la siguiente casilla en la que hay un logo y volver atirar
                                    ¡De desayuno a +>desayuno, y si la conozco, gano uno</p>
                                <p><strong>+>Puente - Manifestación. Casillas 6 y 12:</strong> se salta de la 6 a la 12 y se vuelve a tirar. ¡De manifestación en manifestación hasta la liberación!</p>
                                <p><strong>+>Posada - Casilla 19:</strong> se pierde un turno.</p>
                                <p><strong>+>Cárcel de sufragistas - Casilla 56:</strong> Si se cae en esta casilla, hay que permanecer dos turnos sin jugar. Dados.</p> 
                                <p><strong>+>Casillas 26 y 53:</strong> Si se cae en estas casillas, se suma la marcación de la casilla de los dados (26 o 53)
                                    y se avanza tanto como resulte.</p> 
                                <p><strong>+>Pozo - Casilla 31:</strong> No se puede volver a jugar hasta que no pase otro jugador por esa casilla.</p>
                                <p><strong>+>Laberinto - Casilla 42:</strong> Si se cae en esta casilla, se está obligado a retroceder a la casilla 30.</p>
                                <p><strong>+>Calavera - Casilla 58:</strong> Si se cae en esta casilla, hay que volver a la Casilla 1.</p>
                                <p><strong>+>¡Llegaste! Casilla 63.</strong> Es necesario sacar los puntos justos para quedarte en esta casilla y terminar!</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- El dado -->
            <div class="row align-items-center justify-content-center" id="panelDado">
                <div class="col-sm-12"><img id="dado1" :src="'../../resources/img/tablero/tablero/dado/1.png'" alt="Dado"></div>
                <div class="col-sm-12"><button id="botontirar" class="btn btn-light font-weight-bold" v-text="'Tirar'"></button></div>
            </div>

            <div class="row align-items-center justify-content-center rounded">
                <div class="col rounded" id="mensajes"></div>
            </div>

            <div class="row">
                <div class="col" id="carta">
                    <div class="card text-center card-tablero">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-sm-10"><p id="ambito"></p></div>
                                <div class="col-sm-2"><button id ="quitarcarta">X</button><br></div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12"><img :src="'../../resources/img/tablero/tablero/casillas/persona.jpg'" alt="Foto" id="foto"></div>
                                <div class="col-sm-6"><p id="name"></p></div>
                                <div class="col-sm-6"><p id="apellidos"></p></div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12"><p id="pregunta"></p></div>
                                <div class="col-sm-12"><p class="rounded" id="respuesta1"></p></div>
                                <div class="col-sm-12"><p class="rounded" id="respuesta2"></p></div>
                                <div class="col-sm-12"><p class="rounded" id="respuesta3"></p></div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button id="aceptar">Aceptar</button>
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
            // Parametros iniciales
            nombre:"",
            ambito:"",

            partida: [],
            arrayCasillas: []
        }
    },
    methods: {
        inicio() {
            let me = this;
            let url = '../card';
            axios.get(url).then(function (response) {
                me.arrayCasillas = response.data;
            }).catch(function (error) {
                console.log(error);
            });
            me.partida = localStorage.getItem("partida");
            me.partida = JSON.parse(me.partida);
            this.$swal({
                icon: 'info',
                title: 'Partida',
                text: 'Bienvenid@! Por favor, tomate un momento para leer las normas y más informacián sobre el juego dándole click al (Ver normas). Gracias!',
            });
        }
    },
    mounted() {
        this.inicio();
    }
    
}
</script>