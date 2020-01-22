var jugador = function (nombre, puntos,posicion, color, turno, ficha, parar)
      {
          this.nombre = nombre
          this.puntos = puntos
          this.posicion = posicion
          this.color = color
          this.turno = turno
          this.ficha = ficha
          this.parar = parar
        }


var num1= 0

var jugadores = 4

var jugador1 = new jugador ("pepe", 0, 1, "red",   1, "ficha1", 0)
var jugador2 = new jugador ("juan", 0, 1, "green", 0, "ficha2", 0)
var jugador3 = new jugador ("juana",0, 1, "yellow",0, "ficha3", 0)
var jugador4 = new jugador ("pepa", 0, 1, "blue",  0, "ficha4", 0)

if (document.getElementById("nombre1").innerHTML=="nombre1"){ document.getElementById("nombre1").innerHTML=String(jugador1.nombre)}

if (document.getElementById("nombre2").innerHTML=="nombre2"){ document.getElementById("nombre2").innerHTML=String(jugador2.nombre)}

if (document.getElementById("nombre3").innerHTML=="nombre3"){ document.getElementById("nombre3").innerHTML=String(jugador3.nombre)}

if (document.getElementById("nombre4").innerHTML=="nombre4"){ document.getElementById("nombre4").innerHTML=String(jugador4.nombre)}


document.getElementById("ficha1").style.backgroundColor=String(jugador1.color)
document.getElementById("ficha2").style.backgroundColor=String(jugador2.color)
document.getElementById("ficha3").style.backgroundColor=String(jugador3.color)
document.getElementById("ficha4").style.backgroundColor=String(jugador4.color)


FJ1 = document.getElementById("ficha1")
FJ2 = document.getElementById("ficha2")
FJ3 = document.getElementById("ficha3")
FJ4 = document.getElementById("ficha4")
    
document.getElementById("area1").append(FJ1)
document.getElementById("area1").append(FJ2)
document.getElementById("area1").append(FJ3)
document.getElementById("area1").append(FJ4)


document.getElementById("botontirar").onclick=tirar
document.getElementById("btn2jugadores").onclick=modo2jugadores
document.getElementById("btn4Jugadores").onclick=modo4jugadores

function modo2jugadores() {
   
   document.getElementById("jugador3").style.display="none"
   document.getElementById("jugador4").style.display="none"
   document.getElementById("ficha3").style.display="none"
   document.getElementById("ficha4").style.display="none"

    

   jugadores=2
}

function modo4jugadores() {

   document.getElementById("jugador3").style.display="block"
   document.getElementById("jugador4").style.display="block"
   document.getElementById("ficha3").style.display="block"
   document.getElementById("ficha4").style.display="block"

   jugadores = 4
}




function tirar() {

    num1 =  Math.floor(Math.random() * 6) + 1
    
    var sonidito = new Audio('recursos/sonidito.mp3');
    sonidito.play();

    document.getElementById("dado1").src = "recursos/animacion.gif"
    setTimeout(dados, 900);


    
   }
      

function dados(){
      /*vemos que numero sale y le asignamos una cara del dado */
          switch (num1) {
            case 1:
            document.getElementById("dado1").src = "recursos/1.png"
            break;
        
            case 2:
            document.getElementById("dado1").src = "recursos/2.png"
            break;
            
            case 3:
            document.getElementById("dado1").src = "recursos/3.png"  
            break;
        
            case 4:
            document.getElementById("dado1").src = "recursos/4.png"
            break;
        
            case 5:
            document.getElementById("dado1").src = "recursos/5.png"
            break;
        
            case 6:
            document.getElementById("dado1").src = "recursos/6.png"
            break;
          }
          setTimeout(mover, 900);
         }
function mover() {

/*si el turno es del jugador 1*/
if (jugador1.turno == 1){ 
   
   
   
    FJ4.style.border="0px solid white"
    FJ1.style.border="4px solid white"
    if (jugador1.parar>0){
                        jugador1.turno=0
                        jugador2.turno=1
                        jugador1.parar=jugador1.parar-1}
                        

    else{
        
    /*asignamos los turnos */
      jugador1.turno=0; 
      jugador2.turno=1;

    

    /*si es la primera vez que se tira */
    if (jugador1.posicion ==1){jugador1.posicion=1+num1}

    else {jugador1.posicion=jugador1.posicion+num1}
    
    if (jugador1.parar>0){pararj1}
    /*comprobamos en que casilla ha caido */
    switch (jugador1.posicion) {
       /*si se llega hasta el final */
       case (jugador1.posicion>63):
       case 63:alert("jugador 1 ha llegado al final")
         break
       /*casos de laberinto */
       case 42:console.log("muerte");setTimeout(muertej1,2000)
           break
      /*casos de laberinto */
       case 42:console.log("laberinto");setTimeout(laberintoj1,2000)
           break
      /*casos de carcel*/
        case 52:console.log("carcel");setTimeout(pararj1(2),2000)
           break
        /*casos de posada*/
        case 19:console.log ("posada"); setTimeout(pararj1(1), 2000)
            break;
        /*casos de puente */
        case 6: console.log ("puente"); setTimeout(puentj1, 2000)    
            break;
        /*casos de oca a oca */
        case 5: console.log ("oca"); setTimeout(oc1j1, 2000)    
            break;
        case 9: console.log ("oca"); setTimeout(oc2j1, 2000)
           break;
        case 14: console.log ("oca"); setTimeout(oc1j1, 2000)
           break;
        case 18: console.log ("oca"); setTimeout(oc2j1, 2000)
           break;
        case 23: console.log ("oca"); setTimeout(oc1j1, 2000)
           break;
        case 27: console.log ("oca"); setTimeout(oc2j1, 2000)
           break;
        case 32: console.log ("oca"); setTimeout(oc1j1, 2000)
           break;
        case 36: console.log ("oca"); setTimeout(oc2j1, 2000)
           break;
        case 41: console.log ("oca"); setTimeout(oc1j1, 2000)
           break;
        case 45: console.log ("oca"); setTimeout(oc2j1, 2000)
           break;
        case 50: console.log ("oca"); setTimeout(oc1j1, 2000)
           break;
        case 54: console.log ("oca"); setTimeout(oc2j1, 2000)
           break;
        case 59: console.log ("oca"); setTimeout(oc1j1, 2000)
           break;
    }

    
    
    console.log(jugador1.posicion)
    document.getElementById("area"+jugador1.posicion).append(FJ1) ;
    
}
    
        

}
/*si el turno es del jugador 2*/
else if (jugador2.turno==1){
   FJ1.style.border="0px solid white"
   FJ2.style.border="4px solid white"
if (jugador2.parar>0){
   if (jugadores >2){
         jugador2.turno=0
         jugador3.turno=1}}

else{
   if (jugadores ==4){
    jugador2.turno=0; 
    jugador3.turno=1;}
   else if(jugadores=2||jugadores==1) {
       jugador2.turno=0
       jugador1.turno=1}

    if (jugador2.posicion==1){jugador2.posicion=1+num1}
    else {jugador2.posicion=jugador2.posicion+num1}

    switch (jugador2.posicion) {
       /*casos de muerte*/
       case 58:console.log("laberinto");setTimeout(muertej2,2000)
       break
      /*casos de laberinto */
       case 42:console.log("laberinto");setTimeout(laberintoj2,2000)
       break
        /*casos de carcel */
         case 52:console.log("carcel");setTimeout(pararj2(2),2000)
           break
        /*casos de posada*/
        case 19:console.log ("posada"); setTimeout(pararj2(1), 1000)
            break;
        /*casos de puente */
        case 6: console.log ("puente"); setTimeout(puentj2, 2000)    
            break;
        /*casos de oca a oca */
        case 5: console.log ("oca"); setTimeout(oc1j2, 2000)    
            break;
        case 9: console.log ("oca"); setTimeout(oc2j2, 2000)
           break;
        case 14: console.log ("oca"); setTimeout(oc1j2, 2000)
           break;
        case 18: console.log ("oca"); setTimeout(oc2j2, 2000)
           break;
        case 23: console.log ("oca"); setTimeout(oc1j2, 2000)
           break;
        case 27: console.log ("oca"); setTimeout(oc2j2, 2000)
           break;
        case 32: console.log ("oca"); setTimeout(oc1j2, 2000)
           break;
        case 36: console.log ("oca"); setTimeout(oc2j2, 2000)
           break;
        case 41: console.log ("oca"); setTimeout(oc1j2, 2000)
           break;
        case 45: console.log ("oca"); setTimeout(oc2j2, 2000)
           break;
        case 50: console.log ("oca"); setTimeout(oc1j2, 2000)
           break;
        case 54: console.log ("oca"); setTimeout(oc2j2, 2000)
           break;
        case 59: console.log ("oca"); setTimeout(oc1j2, 2000)
           break;
        case 63:console.log("has ganado")
    }
    
    
    document.getElementById("area"+jugador2.posicion).append(FJ2) ;
    
    
}
    
    
}
/*si el turno es del jugador 3*/
else if (jugador3.turno==1){
    
   FJ2.style.border="0px solid white"
   FJ3.style.border="4px solid white"

if (jugador2.parar>0){
        jugador2.turno=0
        jugador3.turno=1}
else{

    jugador3.turno=0; 
    jugador4.turno=1;
    if (jugador3.posicion==1){jugador3.posicion=1+num1}
    else {jugador3.posicion=jugador3.posicion+num1}

    switch (jugador3.posicion) {
       /*casos de muerte*/
       case 58:console.log("muerte");setTimeout(muertej3,2000)
       break
       /*casos de laberinto */
       case 42:console.log("laberinto");setTimeout(laberintoj3,2000)
           break
      /*casos de carcel */
      case 52:console.log("carcel");setTimeout(pararj3(2),2000)
      break
        
        /*casos de posada*/
        case 19:console.log ("posada"); setTimeout(posj3, 2000)
            break;
        /*casos de puente */
        case 6: console.log ("puente"); setTimeout(puentj3, 2000)    
            break;
        /*casos de oca a oca */
        case 5: console.log ("oca"); setTimeout(oc1j3, 2000)    
            break;
        case 9: console.log ("oca"); setTimeout(oc2j3, 2000)
           break;
        case 14: console.log ("oca"); setTimeout(oc1j3, 2000)
           break;
        case 18: console.log ("oca"); setTimeout(oc2j3, 2000)
           break;
        case 23: console.log ("oca"); setTimeout(oc1j3, 2000)
           break;
        case 27: console.log ("oca"); setTimeout(oc2j3, 2000)
           break;
        case 32: console.log ("oca"); setTimeout(oc1j3, 2000)
           break;
        case 36: console.log ("oca"); setTimeout(oc2j3, 2000)
           break;
        case 41: console.log ("oca"); setTimeout(oc1j3, 2000)
           break;
        case 45: console.log ("oca"); setTimeout(oc2j3, 2000)
           break;
        case 50: console.log ("oca"); setTimeout(oc1j3, 2000)
           break;
        case 54: console.log ("oca"); setTimeout(oc2j3, 2000)
           break;
        case 59: console.log ("oca"); setTimeout(oc1j3, 2000)
           break;
    }

    document.getElementById("area"+jugador3.posicion).append(FJ3) ;
    
    
}
}
/*si el turno es del jugador 4*/
else if (jugador4.turno==1){
   FJ3.style.border="0px solid white"
   FJ4.style.border="4px solid white"

    
    if (jugador2.parar>0){
        jugador2.turno=0
        jugador3.turno=1}
    else{
      jugador4.turno=0; 
      jugador1.turno=1;
    if (jugador4.posicion==1){jugador4.posicion=1+num1}
    else {jugador4.posicion=jugador4.posicion+num1}

    switch (jugador4.posicion) {
       /*casos de muerte*/
       case 58:console.log("muerte");setTimeout(muertej4,2000)
       break
       /*casos de laberinto */
       case 42:console.log("laberinto");setTimeout(laberintoj4,2000)
           break

      /*casos de carcel */
      case 52:console.log("carcel");setTimeout(pararj4(2),2000)
      break
        
        /*casos de posada*/
        case 19:console.log ("posada"); setTimeout(pararj4(1), 2000)
            break;
        /*casos de puente */
        case 6: console.log ("puente"); setTimeout(puentj4, 2000)    
            break;
        /*casos de oca a oca */
        case 5: console.log ("oca"); setTimeout(oc1j4, 2000)    
            break;
        case 9: console.log ("oca"); setTimeout(oc2j4, 2000)
           break;
        case 14: console.log ("oca"); setTimeout(oc1j4, 2000)
           break;
        case 18: console.log ("oca"); setTimeout(oc2j4, 2000)
           break;
        case 23: console.log ("oca"); setTimeout(oc1j4, 2000)
           break;
        case 27: console.log ("oca"); setTimeout(oc2j4, 2000)
           break;
        case 32: console.log ("oca"); setTimeout(oc1j4, 2000)
           break;
        case 36: console.log ("oca"); setTimeout(oc2j4, 2000)
           break;
        case 41: console.log ("oca"); setTimeout(oc1j4, 2000)
           break;
        case 45: console.log ("oca"); setTimeout(oc2j4, 2000)
           break;
        case 50: console.log ("oca"); setTimeout(oc1j4, 2000)
           break;
        case 54: console.log ("oca"); setTimeout(oc2j4, 2000)
           break;
        case 59: console.log ("oca"); setTimeout(oc1j4, 2000)
           break;
    }

    document.getElementById("area"+jugador4.posicion).append(FJ4) ;
    
    
    
}

}
}

/*funciones para el jugador 1*/
function oc1j1() {

    jugador1.turno=1; 
    jugador2.turno=0; 

    jugador1.posicion=jugador1.posicion+4
    console.log(jugador1.posicion)
 
    document.getElementById("area"+jugador1.posicion).append(FJ1)

}

function oc2j1() {

    jugador1.turno=1; 
    jugador2.turno=0; 

    jugador1.posicion=jugador1.posicion+5
    console.log(jugador1.posicion)
 
    document.getElementById("area"+jugador1.posicion).append(FJ1)

}


/*funciones jugador 2*/
function oc1j2() {

    jugador2.turno=1; 
    jugador3.turno=0; 

    jugador2.posicion=jugador2.posicion+4
    console.log(jugador2.posicion)
 
    document.getElementById("area"+jugador2.posicion).append(FJ2)

}

function oc2j2() {

    jugador2.turno=1; 
    jugador3.turno=0; 

    jugador2.posicion=jugador2.posicion+5
    console.log(jugador2.posicion)
 
    document.getElementById("area"+jugador2.posicion).append(FJ2)
    

}

/*funciones jugador 3*/
function oc1j3() {

    jugador3.turno=1; 
    jugador4.turno=0; 

    jugador3.posicion=jugador3.posicion+4
    console.log(jugador3.posicion)
 
    document.getElementById("area"+jugador3.posicion).append(FJ3)

}

function oc2j3() {

    jugador3.turno=1; 
    jugador4.turno=0; 

    jugador3.posicion=jugador3.posicion+5
    console.log(jugador3.posicion)
 
    document.getElementById("area"+jugador3.posicion).append(FJ3)
    

}

/*funciones jugador 3*/
function oc1j4() {

    jugador4.turno=1; 
    jugador1.turno=0; 

    jugador4.posicion=jugador4.posicion+4
    console.log(jugador4.posicion)
 
    document.getElementById("area"+jugador4.posicion).append(FJ4)

}

function oc2j4() {

    jugador4.turno=1; 
    jugador1.turno=0; 

    jugador4.posicion=jugador4.posicion+5
    console.log(jugador4.posicion)
 
    document.getElementById("area"+jugador4.posicion).append(FJ4)
    

}

/*funciones de puente*/

function puentj1() {

    
    jugador1.turno=1
    jugador2.turno=0

    jugador1.posicion=12
    console.log(jugador1.posicion)
    document.getElementById("area"+jugador1.posicion).append(FJ1)
}

function puentj2() {

    
    jugador2.turno=1
    jugador3.turno=0

    jugador2.posicion=12
    console.log(jugador2.posicion)
    document.getElementById("area"+jugador2.posicion).append(FJ2)
}

function puentj3() {

    
    jugador3.turno=1
    jugador4.turno=0

    jugador3.posicion=12
    console.log(jugador3.posicion)
    document.getElementById("area"+jugador3.posicion).append(FJ3)
}

function puentj4() {

    
    jugador4.turno=1
    jugador1.turno=0

    jugador4.posicion=12
    console.log(jugador4.posicion)
    document.getElementById("area"+jugador4.posicion).append(FJ4)
}
/*funciones de posada y carcel*/   


function pararj1(turnos){

    if (turnos>0){jugador1.turno=0; jugador1.parar=turnos} 
}


function pararj2(turnos){

    if (turnos>0){jugador2.turno=0; jugador2.parar=turnos} 
}

function pararj3(turnos){

    if (turnos>0){jugador3.turno=0,jugador3.parar=turnos} 
}

function pararj4(turnos){

    if (turnos>0){jugador4.turno=0;jugador4.parar=turnos} 
}


function laberintoj1(){
   jugador1.posicion=30
   console.log(jugador1.posicion)
   document.getElementById("area"+jugador1.posicion).append(FJ1)
}

function laberintoj2(){
   jugador2.posicion=30
   console.log(jugador2.posicion)
   document.getElementById("area"+jugador2.posicion).append(FJ2)
}

function laberintoj3(){
   jugador3.posicion=30
   console.log(jugador3.posicion)
   document.getElementById("area"+jugador3.posicion).append(FJ3)
}

function laberintoj4(){
   jugador4.posicion=30
   console.log(jugador4.posicion)
   document.getElementById("area"+jugador4.posicion).append(FJ4)
}

function getOffset(el) {
   var _x = 0;
   var _y = 0;
   while( el && !isNaN( el.offsetLeft ) && !isNaN( el.offsetTop ) ) {
       _x += el.offsetLeft - el.scrollLeft;
       _y += el.offsetTop - el.scrollTop;
       el = el.offsetParent;
   }
   return { top: _y, left: _x };
}



