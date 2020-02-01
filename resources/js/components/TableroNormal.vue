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
                        <input type="text" id ="NJ1" placeholder="jugador1">
                        <input type="text" id ="NJ2" placeholder="jugador2">
                        <input type="text" id ="NJ3" placeholder="jugador3">
                        <input type="text" id ="NJ4" placeholder="jugador4">
                        <button class="btndebug" id=btnNombres>nombrar</button>
                    </div>
                </div>
            </div>

            <div class="row w-100">
                <div class="col-sm-12">
                    <!-- el tablero esta formado de 63 casillas que dependeiendo de su tipo tendran o no : un boton de pregunta, un numero y un area donde se guardan las fichas de juego si se cae en dicha casilla-->
                    <div id ="tablero">

                        <div class="casilla p-2" id= "casillaInicio">
                            <div class="row">
                                <div class="col-sm-8"><p class="numCasilla" v-text="'1'"></p></div>
                                <div class="col-sm-4"><button class="pregunta" v-text="'?'"></button></div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12"><div class="area" id="area1"></div></div>
                            </div>
                        </div>

                        <div class="casilla px-2 py-2 text-center" :id="'casilla'+(n=n+1)" v-for="n in 61" :key="n">
                            <div class="row">
                                <div class="col-sm-8"><p class="numCasilla" v-text="n"></p></div>
                                <div class="col-sm-4"><button class="pregunta" v-text="'?'"></button></div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 w-100"><div class="area" :id="'area'+n"></div></div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <p class="m-0" v-if="n!==5 && n!==6 && n!==9 && n!==12 && n!==14 && n!==18 && n!==19 && n!==23 && n!==27 && n!==31 && n!==32 
                                        && n!==35 && n!==41 && n!==42 && n!==45 && n!==50 && n!==52 && n!==54 && n!==59 && n!==59" v-text="'Pepa Perez'"></p>
                                </div>
                            </div>
                        </div>

                        <div class="casilla p-2" id= "casillaFinal">
                            <div class="row">
                                <div class="col-sm-8"><p class="numCasilla" v-text="'63'"></p></div>
                                <div class="col-sm-4"><button class="pregunta" v-text="'?'"></button></div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12"><div class="area" id="area63"></div></div>
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
                    <div class="col-sm-12"><p :id="'nombre'+n" v-text="'Jugador'+n"></p> </div>
                    <div class="col-sm-12 py-1"><img class ="jugador" :src="'../../resources/img/tablero/tablero/user.png'" :alt="'Jugador'+n"></div>
                    <div class="col-sm-12"><p id="score">0</p></div>
                </div>
            </div>
            
            <!-- El dado -->
            <div class="row align-items-center justify-content-center" id="panelDado">
                <div class="col-sm-12"><img id="dado1" :src="'../../resources/img/tablero/tablero/dado/1.png'" alt="Dado"></div>
                <div class="col-sm-12"><button id="botontirar" v-text="'Tirar'"></button></div>
            </div>
            
            <div class="row">
                <div class="col" id="texto">
                    <!--Las normas-->
                    <p id="normas"></p>
                    <p>+>Oca = Logo de Desayunos Feministas. 
                        Si se cae en una de estas casillas, se puede
                        avanzar hasta la siguiente casilla en la que hay un logo y volver atirar
                        ¡De desayuno a +>desayuno, y si la conozco, gano uno</p>
                    
                    <p>+>Puente = Manifestación. Casillas 6 y 12: se salta de la 6 a la 12 y se vuelve a tirar. ¡De manifestación en manifestación hasta la liberación!</p>
                        
                    <p>+>Posada. Casilla 19: se pierde un turno.</p>
                        
                    <p>+>Cárcel de sufragistas. Casilla 56: Si se cae en esta casilla, hay que permanecer dos turnos sin jugar.
                        Dados. </p> 
                        
                    <p>+>Casillas 26 y 53: Si se cae en estas casillas, se suma la marcación de la casilla de los dados (26 o 53)
                        y se avanza tanto como resulte.</p> 
                        

                    <p>+>Pozo. Casilla 31: no se puede volver a jugar hasta que no pase otro jugador por esa casilla.</p>
                        
                    <p>+>Laberinto. Casilla 42: Si se cae en esta casilla, se está obligado a retroceder a la casilla 30.</p>
                        
                    <p>+>Calavera. Casilla 58: Si se cae en esta casilla, hay que volver a la Casilla 1.</p>
                        
                    <p>+>¡Llegaste! Casilla 63. Es necesario sacar los puntos justos para quedarte en esta casilla y terminar!</p>
                </div>
            </div>

            <div class="row">
                <div class="col" id="mensajes"></div>
            </div>

            <div class="row">
                <div class="col" id="carta">
                    <button id ="quitarcarta">X</button><br>
                    <img src="recursos/persona.jpg" alt="Foto" id="foto">
                    <p id="name"></p>
                    <p id="apellidos"></p>
                    <p id="pregunta"></p>
                    <div id="respuesta1"> </div>
                    <div id="respuesta2"> </div>
                    <div id="respuesta3"> </div>
                    <button id="aceptar">Aceptar</button>
                </div>
            </div>

        </div>            
    </div>
    
</template>

<script>
export default {
    
}
</script>