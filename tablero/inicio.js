

alert("Bienvenid@\n Porfavor toma un momento para leer las normas y mas informacion sobre el juego dandole click al boton mas informacion\n gracias")
var trivia = 0
var casillaPregunta = function (pregunta, respuestaCorrecta, respuesta2, respuesta3, estado)
      {
         this.pregunta=pregunta
         this.respuestaCorrecta=respuestaCorrecta
         this.respuesta2=respuesta2
         this.respuesta3=respuesta3
         this.estado=estado
        }
var casilla10 = new casillaPregunta("q tal", "muy bien", "muy mal", "fatal", 0)


document.body.style.zoom = "22%"
preguntas= document.getElementsByClassName("pregunta")
numeros=document.getElementsByClassName("Nº")
for (i = 0; i < preguntas.length; i++) {
    const element = preguntas[i].onclick=preguntar;}

function preguntar() {

    
    var identificador = this.parentNode.id 
    console.log(identificador)

    if (trivia==1) {alert("pregunta"+identificador);if (identificador=="casilla10"){confirm(casilla10.pregunta+"?\n"+casilla10.respuestaCorrecta+"\n" )}
    }

    else if (trivia==0){alert("activa el modo pregunta")}

}

document.getElementById("jugador1").onmouseover=ganafoco
document.getElementById("jugador2").onmouseover=ganafoco
document.getElementById("jugador3").onmouseover=ganafoco
document.getElementById("jugador4").onmouseover=ganafoco

document.getElementById("btnImprimir").onclick=Imprimir
document.getElementById("btntrivia").onclick=cambiarmodo

preguntas[18].style.marginRight="200px"
preguntas[52].style.marginRight="200px"
numeros[27].style.marginLeft="200px"
numeros[59].style.marginLeft="200px"

function cambiarmodo() { if (trivia==1){trivia=0}
                        else if (trivia==0){trivia=1}
    
}
function Imprimir() {

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


function ganafoco() {

    if (this.id==="jugador1"||this.parentNode.id==="jugador1"){ 
        document.getElementById("jugador1").style.opacity = "1";
        myVar = setTimeout(fade, 4000);}
    else if (this.id==="jugador2"||this.parentNode.id==="jugador2"){ myVar = setTimeout(fade, 3000);document.getElementById("jugador2").style.opacity = "1";}
    else if (this.id==="jugador3"||this.parentNode.id==="jugador3"){ myVar = setTimeout(fade, 3000);document.getElementById("jugador3").style.opacity = "1";}
    else if (this.id==="jugador4"||this.parentNode.id==="jugador4"){ myVar = setTimeout(fade, 3000);document.getElementById("jugador4").style.opacity = "1";}
}
    
function fade() {
    document.getElementById("jugador1").style.opacity = "0.5";
    document.getElementById("jugador2").style.opacity = "0.5";
    document.getElementById("jugador3").style.opacity = "0.5";
    document.getElementById("jugador4").style.opacity = "0.5";
   
}


