var jugador = function (nombre, puntos,posicion, color, turno, ficha)
      {
          this.nombre = nombre
          this.puntos = puntos
          this.posicion = posicion
          this.color = color
          this.turno = turno
          this.ficha = ficha
        }


    

var jugador1 = new jugador ("pepe", 0, 1, "red",   1, "ficha1")
var jugador2 = new jugador ("juan", 0, 1, "green", 0, "ficha2")
var jugador3 = new jugador ("juana",0, 1, "yellow",0, "ficha3")
var jugador4 = new jugador ("pepa", 0, 1, "blue",  0, "ficha4")

if (document.getElementById("nombre1").innerHTML=="nombre1"){ document.getElementById("nombre1").innerHTML=String(jugador1.nombre)}

if (document.getElementById("nombre2").innerHTML=="nombre2"){ document.getElementById("nombre2").innerHTML=String(jugador2.nombre)}

if (document.getElementById("nombre3").innerHTML=="nombre3"){ document.getElementById("nombre3").innerHTML=String(jugador3.nombre)}

if (document.getElementById("nombre4").innerHTML=="nombre4"){ document.getElementById("nombre4").innerHTML=String(jugador4.nombre)}

var casillaSel = 1;
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


var ocas = ["area5", "area9", "area14", "area18", "area23", "area27", "area32", "area36", "area41", "area45", "area50", "area54", "area59"];
function tirar() {
    
    num1 =  Math.floor(Math.random() * 6) + 1
    dados = num1

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

if (jugador1.turno == 1){ 

    jugador1.turno=0; 
    jugador2.turno=1; 

    if (jugador1.posicion ==1){jugador1.posicion=5}
    else {jugador1.posicion=jugador1.posicion+jugador1.posicion}
    console.log(jugador1.posicion)
    document.getElementById("area"+jugador1.posicion).append(FJ1) ;}


else if (jugador2.turno==1){
    if (jugador2.posicion==1){jugador2.posicion=1+num1}
    else {jugador2.posicion=jugador2.posicion+jugador2.posicion}

    document.getElementById("area"+jugador2.posicion).append(FJ2) ;
    
    jugador2.turno=0; 
    jugador3.turno=1;
}

else if (jugador3.turno==1){
    if (jugador3.posicion==1){jugador3.posicion=1+num1}
    else {jugador3.posicion=jugador3.posicion+jugador3.posicion}

    document.getElementById("area"+jugador3.posicion).append(FJ3) ;
    
    jugador3.turno=0; 
    jugador4.turno=1;
}

else if (jugador4.turno==1){
    if (jugador4.posicion==1){jugador4.posicion=1+num1}
    else {jugador4.posicion=jugador4.posicion+jugador4.posicion}

    document.getElementById("area"+jugador4.posicion).append(FJ4) ;
    
    jugador4.turno=0; 
    jugador1.turno=1;
}


}


