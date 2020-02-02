/**
 * Creacion de un object que guarda los datos de las casillas que tiene preguntas 
 * */
var casillaPregunta = function (pregunta, respuestaCorrecta, respuesta2, respuesta3, estado) {
    this.pregunta = pregunta
    this.respuestaCorrecta = respuestaCorrecta
    this.respuesta2 = respuesta2
    this.respuesta3 = respuesta3
    this.estado = estado
}
alert("Bienvenid@!\nPorfavor tomate un momento para leer las normas y mas informacion sobre el juego dandole click al boton mas informacion.\nGracias!");

casillas=document.getElementsByClassName("casilla");

var trivia = 0;

/*creamos una pregunta para la casilla 10 */
var casilla10 = new casillaPregunta("q tal", "muy bien", "muy mal", "fatal", 0);
document.getElementById("respuesta1").onclick=responder;
document.getElementById("respuesta2").onclick=responder;
document.getElementById("respuesta3").onclick=responder;
document.getElementById("quitarcarta").onclick=quitarcarta;
document.getElementById("aceptar").onclick=aceptarcarta;

var respuestaE = "";
/*configuramos el zoom de la pagina para que se vea bien */
document.body.style.zoom = "100%";
/*creamos un array con las casillas que tiene preguntas */
preguntas = document.getElementsByClassName("pregunta");
/*creamos un array con las casillas que tiene numeros */
numeros = document.getElementsByClassName("numCasilla");
/*hacemos que las casillas especiales no muestren el simbolo de pregunta */
preguntas[62].style.display="none";
preguntas[0].style.display="none";
preguntas[4].style.display="none";
preguntas[5].style.display="none";
preguntas[8].style.display="none";
preguntas[11].style.display="none";
preguntas[13].style.display="none";
preguntas[17].style.display="none";
preguntas[18].style.display="none";
preguntas[22].style.display="none";
preguntas[26].style.display="none";
preguntas[31].style.display="none";
preguntas[30].style.display="none";
preguntas[35].style.display="none";
preguntas[40].style.display="none";
preguntas[41].style.display="none";
preguntas[44].style.display="none";
preguntas[49].style.display="none";
preguntas[53].style.display="none";
preguntas[58].style.display="none";
preguntas[51].style.display="none";

/*otros ajustes de diseño */
numeros[27].style.marginLeft="20px";
numeros[59].style.marginLeft="20px";
preguntas[52].style.marginRight="20px";
/*cuando hacemos click en cualquier pregunta */
for (i = 0; i < preguntas.length; i++) {
    preguntas[i].onclick=sacarcarta;}
/*muestra un alert con la pregunta si el modo trivia esta activado */
function preguntar() {

    preguntas[i];
    var identificador = this.parentNode.id ;
    console.log(identificador);

    if (trivia==1) {alert("pregunta"+i);if (identificador=="casilla10"){confirm(casilla10.pregunta+"?\n"+casilla10.respuestaCorrecta+"\n" )}
    }

    else if (trivia==0){alert("activa el modo pregunta")}

}

/*si paso el raton por enciam de las fichas de jugador se reslataran */
document.getElementById("jugador1").onmouseover=ganafoco;
document.getElementById("jugador2").onmouseover=ganafoco;
document.getElementById("jugador3").onmouseover=ganafoco;
document.getElementById("jugador4").onmouseover=ganafoco;

document.getElementById("btntrivia").onclick=cambiarmodo;

/*si el born trivia es pulsado cambia el modo de jeugo  */
function cambiarmodo() { 
    if (trivia==1){trivia=0}
    else if (trivia==0){trivia=1}
}
/*esta funcion cambia la opacidad de los usuarios dependiendo de si el raton esta encima */
function ganafoco() {

    if (this.id==="jugador1"||this.parentNode.id==="jugador1"){ 
        document.getElementById("jugador1").style.opacity = "1";
        myVar = setTimeout(fade, 4000);
    }
    else if (this.id==="jugador2"||this.parentNode.id==="jugador2"){ myVar = setTimeout(fade, 3000);document.getElementById("jugador2").style.opacity = "1";}
    else if (this.id==="jugador3"||this.parentNode.id==="jugador3"){ myVar = setTimeout(fade, 3000);document.getElementById("jugador3").style.opacity = "1";}
    else if (this.id==="jugador4"||this.parentNode.id==="jugador4"){ myVar = setTimeout(fade, 3000);document.getElementById("jugador4").style.opacity = "1";}
}
    
function fade() {
    /*esto hace que los jugadores se vuelvan a su opacidad inicial */
    document.getElementById("jugador1").style.opacity = "0.5";
    document.getElementById("jugador2").style.opacity = "0.5";
    document.getElementById("jugador3").style.opacity = "0.5";
    document.getElementById("jugador4").style.opacity = "0.5";
}


function responder() {
    respuestaE= this.id;
    document.getElementById("respuesta1").style.backgroundColor="thistle";
    document.getElementById("respuesta2").style.backgroundColor="thistle";
    document.getElementById("respuesta3").style.backgroundColor="thistle";
    document.getElementById(respuestaE).style.backgroundColor="lightblue";
    console.log(respuestaE);
}

function sacarcarta() {
    var deg=360;
    $("#carta").css({'display':'flex','align-items':'center','justify-content':'center'});
    $(".card-tablero").animate({left: '-=1px'}, 1000);
    
    $('.card-tablero').animate(
        { deg: deg },
        {
            duration: 1200,
            step: function(now) {
                $(this).css({ transform: 'rotate(' + now + 'deg)' });
            }
        }
    );
       
    document.getElementById("name").innerText="Algo";
    document.getElementById("apellidos").innerText="Lopez Lopez";
    document.getElementById("foto").src ="../../resources/img/tablero/tablero/casillas/persona.jpg";
    document.getElementById("pregunta").innerText="¿Que tal?";
    document.getElementById("respuesta1").innerText="Hola";
    document.getElementById("respuesta2").innerText="adios";
    document.getElementById("respuesta3").innerText="nastardes";
    document.getElementById("respuesta1").onmouseover=document.getElementById("respuesta1").style.cursor= "pointer";
    document.getElementById("respuesta2").onmouseover=document.getElementById("respuesta2").style.cursor= "pointer";
    document.getElementById("respuesta3").onmouseover=document.getElementById("respuesta3").style.cursor= "pointer";
    
}

function quitarcarta() {
    document.getElementById("carta").style.display="none";
    document.getElementById("carta").style.left="0";
}

function aceptarcarta() {
    document.getElementById("carta").style.display="none";
    document.getElementById("carta").style.left="0";
}

    