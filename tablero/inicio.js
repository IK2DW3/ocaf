
/*un aviso al que se muestra al cargar la pagina */
alert("Bienvenid@\n Porfavor toma un momento para leer las normas y mas informacion sobre el juego dandole click al boton mas informacion\n gracias")
var trivia = 0
/**un object que guarda los datos de las casillas que tiene preguntas */
var casillaPregunta = function (pregunta, respuestaCorrecta, respuesta2, respuesta3, estado)
      {
         this.pregunta=pregunta
         this.respuestaCorrecta=respuestaCorrecta
         this.respuesta2=respuesta2
         this.respuesta3=respuesta3
         this.estado=estado
        }
        /*creamos una pregunta para la casilla 3 */
var casilla10 = new casillaPregunta("q tal", "muy bien", "muy mal", "fatal", 0)

/*configuramos el zoom de la pagina para que se vea bien */
document.body.style.zoom = "22%"
/*creamos un array con las casillas que tiene preguntas */
preguntas= document.getElementsByClassName("pregunta")
/*creamos un array con las casillas que tiene numeros */
numeros=document.getElementsByClassName("Nº")
/*hacemos que las casillas especiales no muestren el simbolo de pregunta */
preguntas[62].style.display="none";
preguntas[0].style.display="none"
preguntas[4].style.display="none"
preguntas[5].style.display="none"
preguntas[8].style.display="none"
preguntas[11].style.display="none"
preguntas[13].style.display="none"
preguntas[17].style.display="none"
preguntas[18].style.display="none"
preguntas[22].style.display="none"
preguntas[26].style.display="none"
preguntas[31].style.display="none"
preguntas[30].style.display="none"
preguntas[35].style.display="none"
preguntas[40].style.display="none"
preguntas[41].style.display="none"
preguntas[44].style.display="none"
preguntas[49].style.display="none"
preguntas[53].style.display="none"
preguntas[58].style.display="none"
preguntas[51].style.display="none"


/*otros ajustes de diseño */
numeros[27].style.marginLeft="200px"
numeros[59].style.marginLeft="200px"
preguntas[52].style.marginRight="200px"
/*cuando hacemos click en cualquier pregunta */
for (i = 0; i < preguntas.length; i++) {
    const element = preguntas[i].onclick=preguntar;}
/*muestra un alert con la pregunta si el modo trivia esta activado */
function preguntar() {

    preguntas[i]
    var identificador = this.parentNode.id 
    console.log(identificador)

    if (trivia==1) {alert("pregunta"+i);if (identificador=="casilla10"){confirm(casilla10.pregunta+"?\n"+casilla10.respuestaCorrecta+"\n" )}
    }

    else if (trivia==0){alert("activa el modo pregunta")}

}

/*si paso el raton por enciam de las fichas de jugador se reslataran */
document.getElementById("jugador1").onmouseover=ganafoco
document.getElementById("jugador2").onmouseover=ganafoco
document.getElementById("jugador3").onmouseover=ganafoco
document.getElementById("jugador4").onmouseover=ganafoco

document.getElementById("btnImprimir").onclick=Imprimir
document.getElementById("btntrivia").onclick=cambiarmodo


/*si el born trivia es pulsado cambia el modo de jeugo  */
function cambiarmodo() { if (trivia==1){trivia=0}
                        else if (trivia==0){trivia=1}
    
}

/*si le damos al btn imprimr se ocultaran parte de los elementos del tableo y se mostraran las normas, despues nos llevara utomaticamente a la pntalla de impresion */
function Imprimir() {
/*pedimos que el usuario confirme que quiere imprimir ya que reinicia el progrso del jugo */
    if (confirm('si desea imprimir el progreso de la partida se reiniciara')) {
        alert('Recomendamos una escala de 90 y activar los graficos fondos a la hora de imprimir');
    document.getElementById("debug").style.display="none"
    document.getElementById("jugador1").style.display="none"
    document.getElementById("jugador2").style.display="none"
    document.getElementById("jugador3").style.display="none"
    document.getElementById("jugador4").style.display="none"
    document.getElementById("panelDado").style.display="none"
    document.getElementById("tablero").style.marginLeft="0px"
    document.getElementById("tablero").style.marginTop="0px"
    document.getElementById("normas").style.marginLeft="0px"
    document.getElementById("texto").style.marginLeft="0px"
    document.getElementById("ficha1").style.display="none"
    document.getElementById("ficha2").style.display="none"
    document.getElementById("ficha3").style.display="none"
    document.getElementById("ficha4").style.display="none"
    document.getElementById("texto").style.display="block"
    document.getElementById("normas").style.display="block"

    

    window.print()
    alert("volviendo al juego")
    setTimeout(reload, 1000)

    function reload() {
        location.reload();
    }
    } else {
        alert('Volviendo al juego');
    }
    
}

/*esta funcion cambia la opacidad de los usuarios dependiendo de si el raton esta encima */
function ganafoco() {

    if (this.id==="jugador1"||this.parentNode.id==="jugador1"){ 
        document.getElementById("jugador1").style.opacity = "1";
        myVar = setTimeout(fade, 4000);}
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


