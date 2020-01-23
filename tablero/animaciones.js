$(function moverFicha(){
    
    var el = $(FJ1);
    var el2 = $(FJ1.parentNode)

    // Make it static
$(function(e){
    setTimeout(animacion, 300);

    function animacion() {
    console.log (el2)
    console.log ("pepe")
    
    el.animate({ // Animate to the static position
        duration: 1000,
        left: 3000
    }, function() { // Make it static
        $(this).css('position', 'static');
        
    });
   
        
    }
});
});