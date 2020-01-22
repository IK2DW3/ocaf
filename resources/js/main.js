$(document).ready(function() {

    if ($("#modoIndividual") != null) {

        $("#modoIndividual").click(function(i) {
            var modoSeleccionado = $(this).text();
            localStorage.setItem('modoSeleccionado', modoSeleccionado);
        });

    }

    if ($("#modoGrupal") != null) {

        $("#modoGrupal").click(function(i) {
            var modoSeleccionado = $(this).text();
            localStorage.setItem('modoSeleccionado', modoSeleccionado);
        });

    }


});