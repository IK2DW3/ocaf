casillas=document.getElementsByClassName("casilla")
var img =["", "", "", "", ""]


var colores = ["","red", "blue", "green", "yellow"]
    for (let i = 1; i < casillas.length && i<62; i++) {
        const element = casillas[i].style.backgroundImage = "url("+img[i] +")"
        
    }

function preguntar() {
    console.log("holas")
}