$(function () {
   /**
   * Inicializacion de variables
   */
   var num1 = 0;
   var elegirTurno = Math.floor(Math.random() * 4) + 1;
   var jugadores = 4;
   var mensaje = $('#mensajes');
   var FJ1 = $('#ficha1');
   var FJ2 = $('#ficha2');
   var FJ3 = $('#ficha3');
   var FJ4 = $('#ficha4');
   var trivia = 0;
   var respuestaE = "";
   var numeros = $('.numCasilla'); // Array de los numero en las casillas
   var preguntas = $('.pregunta'); // Array de las preguntas en las casillas

   /**
    * Asigno al arrayPreguntas las casillas que no tendran el icono de interrogacion
    */
   var arrayPreguntas = [preguntas[0], preguntas[4], preguntas[5], preguntas[8], preguntas[11], preguntas[13], preguntas[17], preguntas[18], preguntas[22],
   preguntas[26], preguntas[30], preguntas[31], preguntas[35], preguntas[40], preguntas[41], preguntas[44], preguntas[49], preguntas[51], preguntas[53],
   preguntas[57], preguntas[58], preguntas[62]];

   /**
    * Creacion del objeto jugador
    * Metodo donde se recoge al jugador que esté jugando
    */
   var jugador = function (nombre, puntos, posicion, color, turno, ficha, parar) {
      this.nombre = nombre;
      this.puntos = puntos;
      this.posicion = posicion;
      this.color = color;
      this.turno = turno;
      this.ficha = ficha;
      this.parar = parar;
   }

   /** 
    * Creacion de un object que guarda los datos de las casillas que tiene preguntas
    */
   var casillaPregunta = function (pregunta, respuestaCorrecta, respuesta2, respuesta3, estado) {
      this.pregunta = pregunta
      this.respuestaCorrecta = respuestaCorrecta
      this.respuesta2 = respuesta2
      this.respuesta3 = respuesta3
      this.estado = estado
   }

   /**
    * Declarando jugadores por defecto
    */
   var jugador1 = new jugador("Player 1", 0, 1, "red", 0, "ficha1", 0);
   var jugador2 = new jugador("Player 2", 0, 1, "green", 0, "ficha2", 0);
   var jugador3 = new jugador("Player 3", 0, 1, "yellow", 0, "ficha3", 0);
   var jugador4 = new jugador("Player 4", 0, 1, "blue", 0, "ficha4", 0);

   /** 
    * Creamos una pregunta para la casilla 10
    */
   var casilla10 = new casillaPregunta("¿Ésto es una pregunta?", "Sí", "Tal vez", "No", 0);

   /**
    * Declarando funciones y asignar elementos por defecto
    */
   $('#area1').append($(FJ1));
   $('#area1').append($(FJ2));
   $('#area1').append($(FJ3));
   $('#area1').append($(FJ4));

   $('#botontirar').on('click', tirar);
   $('#btnmensajer').on('click', mostrarmensaje);
   $('#btn2jugadores').on('click', modo2jugadores);
   $('#btn4Jugadores').on('click', modo4jugadores);
   $('#botonImprimir').on('click', Imprimir);
   $('#btnNombres').on('click', nombrarjugadores);
   $('#btntrivia').on('click', cambiarmodo);

   $('#respuesta1').on('click', responder);
   $('#respuesta2').on('click', responder);
   $('#respuesta3').on('click', responder);
   $('#quitarcarta').on('click', quitarcarta);
   $('#aceptar').on('click', aceptarcarta);

   $('#ficha1').css({ 'backgroundColor': String(jugador1.color)});
   $('#ficha2').css({ 'backgroundColor': String(jugador2.color)});
   $('#ficha3').css({ 'backgroundColor': String(jugador3.color)});
   $('#ficha4').css({ 'backgroundColor': String(jugador4.color)});

   function nombrarjugadores() {
      jugador1.nombre = $('#NJ1').val();
      jugador2.nombre = $('#NJ2').val();
      jugador3.nombre = $('#NJ3').val();
      jugador4.nombre = $('#NJ4').val();
      $('#nombre1').text(String(jugador1.nombre));
      $('#nombre2').text(String(jugador2.nombre));
      $('#nombre3').text(String(jugador3.nombre));
      $('#nombre4').text(String(jugador4.nombre));
   }

   function modo2jugadores() {
      $('#jugador3').css({ 'display': 'none' });
      $('#ficha3').css({ 'display': 'none' });
      $('#jugador4').css({ 'display': 'none' });
      $('#ficha4').css({ 'display': 'none' });
      jugadores = 2
   }

   function modo4jugadores() {
      $('#jugador3').css({ 'display': 'block' });
      $('#ficha3').css({ 'display': 'block' });
      $('#jugador4').css({ 'display': 'block' });
      $('#ficha4').css({ 'display': 'block' });
      jugadores = 4
   }

   /** 
    * Funcion para fijar el turno del jugador
    */
   function fijarTurno() {
      if (elegirTurno == 1) { 
         jugador1.turno = 1;
         comprobarTurno();
      }
      else if (elegirTurno == 2) { 
         jugador2.turno = 1;
         comprobarTurno();
      }
      else if (elegirTurno == 3) { 
         jugador3.turno = 1;
         comprobarTurno();
      }
      else { 
         jugador4.turno = 1;
         comprobarTurno();
      }
   }
   // Inicializo la funcion para fijar el turno de inicio
   fijarTurno();

   /**
    * Funcion para comprobar el turno del jugador
    */
   function comprobarTurno() {
      if (jugador1.turno == 1) {
         $(FJ1).css({ 'border': '4px solid white' });
         $(FJ2).css({ 'border': '0px solid white' });
         $(FJ3).css({ 'border': '0px solid white' });
         $(FJ4).css({ 'border': '0px solid white' });
         focoTurno();
      }
      else if (jugador2.turno == 1) {
         $(FJ2).css({ 'border': '4px solid white' });
         $(FJ1).css({ 'border': '0px solid white' });
         $(FJ3).css({ 'border': '0px solid white' });
         $(FJ4).css({ 'border': '0px solid white' });
         focoTurno();
      }
      else if (jugador3.turno == 1) {
         $(FJ3).css({ 'border': '4px solid white' });
         $(FJ1).css({ 'border': '0px solid white' });
         $(FJ2).css({ 'border': '0px solid white' });
         $(FJ4).css({ 'border': '0px solid white' });
         focoTurno();
      }
      else {
         $(FJ4).css({ 'border': '4px solid white' });
         $(FJ1).css({ 'border': '0px solid white' });
         $(FJ2).css({ 'border': '0px solid white' });
         $(FJ3).css({ 'border': '0px solid white' });
         focoTurno();
      }
   }

   /**
    * Funcion para dar foco a la ficha de turno
    */
   function focoTurno() {
      if (jugador1.turno == 1) {
         $('#jugador1').css({ 'opacity': '1' });
         $('#jugador2').css({ 'opacity': '0.5' });
         $('#jugador3').css({ 'opacity': '0.5' });
         $('#jugador4').css({ 'opacity': '0.5' });
      }
      else if (jugador2.turno == 1) {
         $('#jugador2').css({ 'opacity': '1' });
         $('#jugador1').css({ 'opacity': '0.5' });
         $('#jugador3').css({ 'opacity': '0.5' });
         $('#jugador4').css({ 'opacity': '0.5' });
      }
      else if (jugador3.turno == 1) {
         $('#jugador3').css({ 'opacity': '1' });
         $('#jugador1').css({ 'opacity': '0.5' });
         $('#jugador2').css({ 'opacity': '0.5' });
         $('#jugador4').css({ 'opacity': '0.5' });
      }
      else {
         $('#jugador4').css({ 'opacity': '1' });
         $('#jugador1').css({ 'opacity': '0.5' });
         $('#jugador2').css({ 'opacity': '0.5' });
         $('#jugador3').css({ 'opacity': '0.5' });
      }
   }

   /**
    * Funcion para hacer la accion de tirar
    */
   function tirar() {
      num1 = Math.floor(Math.random() * 6) + 1;
      var sonidito = new Audio('../../resources/img/tablero/tablero/sonido/dado.mp3');
      sonidito.play();
      $('#dado1').attr('src','../../resources/img/tablero/tablero/dado/animacion.gif');
      $(mensaje).text("Has sacado un " + num1);
      mostrarmensaje();
      setTimeout(dados, 900);
   }

   /**
    * Funcion para la animacion de los dados
    */
   function dados() {
      // vemos que numero sale y le asignamos una cara del dado
      switch (num1) {
         case 1:
            $('#dado1').attr('src', '../../resources/img/tablero/tablero/dado/1.png');
            break;
         case 2:
            $('#dado1').attr('src', '../../resources/img/tablero/tablero/dado/2.png');
            break;
         case 3:
            $('#dado1').attr('src', '../../resources/img/tablero/tablero/dado/3.png');
            break;
         case 4:
            $('#dado1').attr('src', '../../resources/img/tablero/tablero/dado/4.png');
            break;
         case 5:
            $('#dado1').attr('src', '../../resources/img/tablero/tablero/dado/5.png');
            break;
         case 6:
            $('#dado1').attr('src', '../../resources/img/tablero/tablero/dado/6.png');
            break;
      }
      setTimeout(mover, 900);
   }

   /**
    * Funcion para seleccionar el turno una vez jugado
    * Muestra el mensaje correspondiente segun el caso.
    */
   function posicionMensajeTurno(jugador) {

      jugador = jugador
      // si es la primera vez que se tira
      if (jugador.posicion == 1) { jugador.posicion = 1 + num1 }
      else { jugador.posicion = jugador.posicion + num1 }

      if (jugador.parar > 0) { pararj1 }
      // comprobamos en que casilla ha caido
      switch (jugador.posicion) {
         // si se llega hasta el final
         case (jugador.posicion > 63): $(mensaje).text(jugador.nombre + " ha llegado al FINAL"); mostrarmensaje();
         case 63: $(mensaje).text(jugador.nombre + " ha llegado al FINAL"); mostrarmensaje();
            break
         // caso de laberinto
         case 42: $(mensaje).text(jugador.nombre + " ha muerto"); mostrarmensaje(); setTimeout(muertej1, 2000);
            break;
         // caso de laberinto
         case 42: $(mensaje).text(jugador.nombre + " ha caido en el laberinto"); mostrarmensaje(); setTimeout(laberintoj1, 2000);
            break;
         // caso de carcel
         case 52: $(mensaje).text(jugador.nombre + " ha sido detenid@"); mostrarmensaje(); setTimeout(pararj1(2), 2000);
            break;
         // caso de posada
         case 19: $(mensaje).text(jugador.nombre + " se ha tomado un descanso"); mostrarmensaje(); setTimeout(pararj1(1), 2000);
            break;
         // caso de puente
         case 6: $(mensaje).text(jugador.nombre + ": De manifestación en manifestación hasta la liberación! "); mostrarmensaje(); setTimeout(puentj1, 2000);
            break;
         // casos de oca a oca
         case 5: $(mensaje).text(jugador.nombre + ": ¡De desayuno a desayuno, y si la conozco, gano uno! "); mostrarmensaje(); setTimeout(oc1j1, 2000);
            break;
         case 9: $(mensaje).text(jugador.nombre + ": ¡De desayuno a desayuno, y si la conozco, gano uno! "); mostrarmensaje(); setTimeout(oc2j1, 2000);
            break;
         case 14: $(mensaje).text(jugador.nombre + ": ¡De desayuno a desayuno, y si la conozco, gano uno! "); mostrarmensaje(); setTimeout(oc1j1, 2000);
            break;
         case 18: $(mensaje).text(jugador.nombre + ": ¡De desayuno a desayuno, y si la conozco, gano uno! "); mostrarmensaje(); setTimeout(oc2j1, 2000);
            break;
         case 23: $(mensaje).text(jugador.nombre + ": ¡De desayuno a desayuno, y si la conozco, gano uno! "); mostrarmensaje(); setTimeout(oc1j1, 2000);
            break;
         case 27: $(mensaje).text(jugador.nombre + ": ¡De desayuno a desayuno, y si la conozco, gano uno! "); mostrarmensaje(); setTimeout(oc2j1, 2000);
            break;
         case 32: $(mensaje).text(jugador.nombre + ": ¡De desayuno a desayuno, y si la conozco, gano uno! "); mostrarmensaje(); setTimeout(oc1j1, 2000);
            break;
         case 36: $(mensaje).text(jugador.nombre + ": ¡De desayuno a desayuno, y si la conozco, gano uno! "); mostrarmensaje(); setTimeout(oc2j1, 2000);
            break;
         case 41: $(mensaje).text(jugador.nombre + ": ¡De desayuno a desayuno, y si la conozco, gano uno! "); mostrarmensaje(); setTimeout(oc1j1, 2000);
            break;
         case 45: $(mensaje).text(jugador.nombre + ": ¡De desayuno a desayuno, y si la conozco, gano uno! "); mostrarmensaje(); setTimeout(oc2j1, 2000);
            break;
         case 50: $(mensaje).text(jugador.nombre + ": ¡De desayuno a desayuno, y si la conozco, gano uno! "); mostrarmensaje(); setTimeout(oc1j1, 2000);
            break;
         case 54: $(mensaje).text(jugador.nombre + ": ¡De desayuno a desayuno, y si la conozco, gano uno! "); mostrarmensaje(); setTimeout(oc2j1, 2000);
            break;
         case 59: $(mensaje).text(jugador.nombre + ": ¡De desayuno a desayuno, y si la conozco, gano uno! "); mostrarmensaje(); setTimeout(oc1j1, 2000);
            break;
      }

      if (jugador.posicion < 63) { $('#area' + jugador.posicion).append($(FJ1)), 10000 }
      else { $('#area63').append($(FJ1)); }
   }

   /**
    * Funcion para mover la ficha segun el jugador
    */
   function mover() {

      //  si el turno es del jugador 1
      if (jugador1.turno == 1) {
         comprobarTurno();
         if (jugador1.parar > 0) {
            jugador1.turno = 0;
            jugador2.turno = 1;
            jugador1.parar = jugador1.parar - 1;
            comprobarTurno();

         } else {
            // asignamos los turnos
            jugador1.turno = 0;
            jugador2.turno = 1;
            comprobarTurno();

            // si es la primera vez que se tira
            if (jugador1.posicion == 1) { jugador1.posicion = 1 + num1 }
            else { jugador1.posicion = jugador1.posicion + num1 }

            if (jugador1.parar > 0) { pararj1 }
            // comprobamos en que casilla ha caido
            switch (jugador1.posicion) {
               // si se llega hasta el final
               case (jugador1.posicion > 63): $(mensaje).text(jugador1.nombre + " ha llegado al FINAL"); mostrarmensaje();
               case 63: $(mensaje).text(jugador1.nombre + " ha llegado al FINAL"); mostrarmensaje();
                  break
               // caso de laberinto
               case 42: $(mensaje).text(jugador1.nombre + " ha muerto"); mostrarmensaje(); setTimeout(muertej1, 2000);
                  break;
               // caso de laberinto
               case 42: $(mensaje).text(jugador1.nombre + " ha caido en el laberinto"); mostrarmensaje(); setTimeout(laberintoj1, 2000);
                  break;
               // caso de carcel
               case 52: $(mensaje).text(jugador1.nombre + " ha sido detenid@"); mostrarmensaje(); setTimeout(pararj1(2), 2000);
                  break;
               // caso de posada
               case 19: $(mensaje).text(jugador1.nombre + " se ha tomado un descanso"); mostrarmensaje(); setTimeout(pararj1(1), 2000);
                  break;
               // caso de puente
               case 6: $(mensaje).text(jugador1.nombre + ": De manifestación en manifestación hasta la liberación! "); mostrarmensaje(); setTimeout(puentj1, 2000);
                  break;
               // casos de oca a oca
               case 5: $(mensaje).text(jugador1.nombre + ": ¡De desayuno a desayuno, y si la conozco, gano uno! "); mostrarmensaje(); setTimeout(oc1j1, 2000);
                  break;
               case 9: $(mensaje).text(jugador1.nombre + ": ¡De desayuno a desayuno, y si la conozco, gano uno! "); mostrarmensaje(); setTimeout(oc2j1, 2000);
                  break;
               case 14: $(mensaje).text(jugador1.nombre + ": ¡De desayuno a desayuno, y si la conozco, gano uno! "); mostrarmensaje(); setTimeout(oc1j1, 2000);
                  break;
               case 18: $(mensaje).text(jugador1.nombre + ": ¡De desayuno a desayuno, y si la conozco, gano uno! "); mostrarmensaje(); setTimeout(oc2j1, 2000);
                  break;
               case 23: $(mensaje).text(jugador1.nombre + ": ¡De desayuno a desayuno, y si la conozco, gano uno! "); mostrarmensaje(); setTimeout(oc1j1, 2000);
                  break;
               case 27: $(mensaje).text(jugador1.nombre + ": ¡De desayuno a desayuno, y si la conozco, gano uno! "); mostrarmensaje(); setTimeout(oc2j1, 2000);
                  break;
               case 32: $(mensaje).text(jugador1.nombre + ": ¡De desayuno a desayuno, y si la conozco, gano uno! "); mostrarmensaje(); setTimeout(oc1j1, 2000);
                  break;
               case 36: $(mensaje).text(jugador1.nombre + ": ¡De desayuno a desayuno, y si la conozco, gano uno! "); mostrarmensaje(); setTimeout(oc2j1, 2000);
                  break;
               case 41: $(mensaje).text(jugador1.nombre + ": ¡De desayuno a desayuno, y si la conozco, gano uno! "); mostrarmensaje(); setTimeout(oc1j1, 2000);
                  break;
               case 45: $(mensaje).text(jugador1.nombre + ": ¡De desayuno a desayuno, y si la conozco, gano uno! "); mostrarmensaje(); setTimeout(oc2j1, 2000);
                  break;
               case 50: $(mensaje).text(jugador1.nombre + ": ¡De desayuno a desayuno, y si la conozco, gano uno! "); mostrarmensaje(); setTimeout(oc1j1, 2000);
                  break;
               case 54: $(mensaje).text(jugador1.nombre + ": ¡De desayuno a desayuno, y si la conozco, gano uno! "); mostrarmensaje(); setTimeout(oc2j1, 2000);
                  break;
               case 59: $(mensaje).text(jugador1.nombre + ": ¡De desayuno a desayuno, y si la conozco, gano uno! "); mostrarmensaje(); setTimeout(oc1j1, 2000);
                  break;
            }

            if (jugador1.posicion < 63) { $('#area' + jugador1.posicion).append($(FJ1)), 10000 }
            else { $('#area63').append($(FJ1)); }

         }
         $('#posicionCasilla1').text('Casilla: ' + jugador1.posicion);
      }
      /*si el turno es del jugador 2*/
      else if (jugador2.turno == 1) {
         comprobarTurno();
         if (jugador2.parar > 0) {
            if (jugadores > 2) {
               jugador2.turno = 0;
               jugador3.turno = 1;
               comprobarTurno();
            }
         } else {
            if (jugadores == 4) {
               jugador2.turno = 0;
               jugador3.turno = 1;
               comprobarTurno();
            } else if (jugadores = 2 || jugadores == 1) {
               jugador2.turno = 0;
               jugador1.turno = 1;
               comprobarTurno();
            }

            if (jugador2.posicion == 1) { jugador2.posicion = 1 + num1 }
            else { jugador2.posicion = jugador2.posicion + num1 }

            switch (jugador2.posicion) {
               /*si se llega hasta el final */
               case (jugador2.posicion > 63): $(mensaje).text(jugador2.nombre + " ha llegado al FINAL"); mostrarmensaje();
               case 63: $(mensaje).text(jugador2.nombre + " ha llegado al FINAL"); mostrarmensaje();
               /*casos de muerte*/
               case 58: $(mensaje).text(jugador2.nombre + " ha muerto"); mostrarmensaje(); setTimeout(muertej2, 2000);
                  break;
               /*casos de laberinto */
               case 42: $(mensaje).text(jugador2.nombre + " ha caido en el laberinto"); mostrarmensaje(); setTimeout(laberintoj2, 2000);
                  break;
               /*casos de carcel */
               case 52: $(mensaje).text(jugador2.nombre + " ha sido detenido"); mostrarmensaje(); console.log("carcel"); setTimeout(pararj2(2), 2000);
                  break;
               /*casos de posada*/
               case 19: $(mensaje).text(jugador2.nombre + " se ha tomado un descanso"); mostrarmensaje(); setTimeout(pararj2(1), 1000);
                  break;
               /*casos de puente */
               case 6: $(mensaje).text(jugador2.nombre + ": De manifestación en manifestación hasta la liberación!"); mostrarmensaje(); setTimeout(puentj2, 2000);
                  break;
               /*casos de oca a oca */
               case 5: $(mensaje).text(jugador2.nombre + ": ¡De desayuno a desayuno, y si la conozco, gano uno! "); mostrarmensaje(); setTimeout(oc1j2, 2000);
                  break;
               case 9: $(mensaje).text(jugador2.nombre + ": ¡De desayuno a desayuno, y si la conozco, gano uno! "); mostrarmensaje(); setTimeout(oc2j2, 2000);
                  break;
               case 14: $(mensaje).text(jugador2.nombre + ": ¡De desayuno a desayuno, y si la conozco, gano uno! "); mostrarmensaje(); setTimeout(oc1j2, 2000);
                  break;
               case 18: $(mensaje).text(jugador2.nombre + ": ¡De desayuno a desayuno, y si la conozco, gano uno! "); mostrarmensaje(); setTimeout(oc2j2, 2000);
                  break;
               case 23: $(mensaje).text(jugador2.nombre + ": ¡De desayuno a desayuno, y si la conozco, gano uno! "); mostrarmensaje(); setTimeout(oc1j2, 2000);
                  break;
               case 27: $(mensaje).text(jugador2.nombre + ": ¡De desayuno a desayuno, y si la conozco, gano uno! "); mostrarmensaje(); setTimeout(oc2j2, 2000);
                  break;
               case 32: $(mensaje).text(jugador2.nombre + ": ¡De desayuno a desayuno, y si la conozco, gano uno! "); mostrarmensaje(); setTimeout(oc1j2, 2000);
                  break;
               case 36: $(mensaje).text(jugador2.nombre + ": ¡De desayuno a desayuno, y si la conozco, gano uno! "); mostrarmensaje(); setTimeout(oc2j2, 2000);
                  break;
               case 41: $(mensaje).text(jugador2.nombre + ": ¡De desayuno a desayuno, y si la conozco, gano uno! "); mostrarmensaje(); setTimeout(oc1j2, 2000);
                  break;
               case 45: $(mensaje).text(jugador2.nombre + ": ¡De desayuno a desayuno, y si la conozco, gano uno! "); mostrarmensaje(); setTimeout(oc2j2, 2000);
                  break;
               case 50: $(mensaje).text(jugador2.nombre + ": ¡De desayuno a desayuno, y si la conozco, gano uno! "); mostrarmensaje(); setTimeout(oc1j2, 2000);
                  break;
               case 54: $(mensaje).text(jugador2.nombre + ": ¡De desayuno a desayuno, y si la conozco, gano uno! "); mostrarmensaje(); setTimeout(oc2j2, 2000);
                  break;
               case 59: $(mensaje).text(jugador2.nombre + ": ¡De desayuno a desayuno, y si la conozco, gano uno! "); mostrarmensaje(); setTimeout(oc1j2, 2000);
                  break;
            }

            $('#area' + jugador2.posicion).append($(FJ2));

         }
         $('#posicionCasilla2').text('Casilla: ' + jugador2.posicion);

      }
      /*si el turno es del jugador 3*/
      else if (jugador3.turno == 1) {
         comprobarTurno();
         if (jugador2.parar > 0) {
            jugador2.turno = 0;
            jugador3.turno = 1;
            comprobarTurno();
         } else {

            jugador3.turno = 0;
            jugador4.turno = 1;
            comprobarTurno();
            if (jugador3.posicion == 1) { jugador3.posicion = 1 + num1 }
            else { jugador3.posicion = jugador3.posicion + num1 }

            switch (jugador3.posicion) {
               /*si se llega hasta el final */
               case (jugador3.posicion > 63): $(mensaje).text(jugador3.nombre + " ha llegado al final"); mostrarmensaje();
               case 63: $(mensaje).text(jugador3.nombre + " ha llegado al final"); mostrarmensaje();
               /*casos de muerte*/
               case 58: $(mensaje).text(jugador3.nombre + " ha muerto"); mostrarmensaje(); setTimeout(muertej3, 2000);
                  break;
               /*casos de laberinto */
               case 42: $(mensaje).text(jugador3.nombre + " ha caido en el laberinto"); mostrarmensaje(); setTimeout(laberintoj3, 2000);
                  break;
               /*casos de carcel */
               case 52: $(mensaje).text(jugador3.nombre + " ha sido detenid@"); mostrarmensaje(); setTimeout(pararj3(2), 2000);
                  break;

               /*casos de posada*/
               case 19: $(mensaje).text(jugador3.nombre + " se ha tomado un descanso"); mostrarmensaje(); setTimeout(pararj3(1), 2000);
                  break;
               /*casos de puente */
               case 6: $(mensaje).text(jugador3.nombre + ": De manifestación en manifestación hasta la liberación!"); mostrarmensaje(); setTimeout(puentj3, 2000);
                  break;
               /*casos de oca a oca */
               case 5: $(mensaje).text(jugador3.nombre + ": ¡De desayuno a desayuno, y si la conozco, gano uno! "); mostrarmensaje(); setTimeout(oc1j3, 2000);
                  break;
               case 9: $(mensaje).text(jugador3.nombre + ": ¡De desayuno a desayuno, y si la conozco, gano uno! "); mostrarmensaje(); setTimeout(oc2j3, 2000);
                  break;
               case 14: $(mensaje).text(jugador3.nombre + ": ¡De desayuno a desayuno, y si la conozco, gano uno! "); mostrarmensaje(); setTimeout(oc1j3, 2000);
                  break;
               case 18: $(mensaje).text(jugador3.nombre + ": ¡De desayuno a desayuno, y si la conozco, gano uno! "); mostrarmensaje(); setTimeout(oc2j3, 2000);
                  break;
               case 23: $(mensaje).text(jugador3.nombre + ": ¡De desayuno a desayuno, y si la conozco, gano uno! "); mostrarmensaje(); setTimeout(oc1j3, 2000);
                  break;
               case 27: $(mensaje).text(jugador3.nombre + ": ¡De desayuno a desayuno, y si la conozco, gano uno! "); mostrarmensaje(); setTimeout(oc2j3, 2000);
                  break;
               case 32: $(mensaje).text(jugador3.nombre + ": ¡De desayuno a desayuno, y si la conozco, gano uno! "); mostrarmensaje(); setTimeout(oc1j3, 2000);
                  break;
               case 36: $(mensaje).text(jugador3.nombre + ": ¡De desayuno a desayuno, y si la conozco, gano uno! "); mostrarmensaje(); setTimeout(oc2j3, 2000);
                  break;
               case 41: $(mensaje).text(jugador3.nombre + ": ¡De desayuno a desayuno, y si la conozco, gano uno! "); mostrarmensaje(); setTimeout(oc1j3, 2000);
                  break;
               case 45: $(mensaje).text(jugador3.nombre + ": ¡De desayuno a desayuno, y si la conozco, gano uno! "); mostrarmensaje(); setTimeout(oc2j3, 2000);
                  break;
               case 50: $(mensaje).text(jugador3.nombre + ": ¡De desayuno a desayuno, y si la conozco, gano uno! "); mostrarmensaje(); setTimeout(oc1j3, 2000);
                  break;
               case 54: $(mensaje).text(jugador3.nombre + ": ¡De desayuno a desayuno, y si la conozco, gano uno! "); mostrarmensaje(); setTimeout(oc2j3, 2000);
                  break;
               case 59: $(mensaje).text(jugador3.nombre + ": ¡De desayuno a desayuno, y si la conozco, gano uno! "); mostrarmensaje(); setTimeout(oc1j3, 2000);
                  break;
            }

            $('#area' + jugador3.posicion).append($(FJ3));

         }
         $('#posicionCasilla3').text('Casilla: ' + jugador3.posicion);

      }
      /*si el turno es del jugador 4*/
      else if (jugador4.turno == 1) {
         comprobarTurno();
         if (jugador2.parar > 0) {
            jugador2.turno = 0;
            jugador3.turno = 1;
            comprobarTurno();
         } else {
            jugador4.turno = 0;
            jugador1.turno = 1;
            comprobarTurno();
            if (jugador4.posicion == 1) { jugador4.posicion = 1 + num1 }
            else { jugador4.posicion = jugador4.posicion + num1 }

            switch (jugador4.posicion) {
               /*si se llega hasta el final */
               case (jugador4.posicion > 63): $(mensaje).text(jugador4.nombre + " ha llegado al final"); mostrarmensaje();
               case 63: $(mensaje).text(jugador4.nombre + " ha llegado al final"); mostrarmensaje();
               /*casos de muerte*/
               case 58: $(mensaje).text(jugador4.nombre + " ha muerto"); mostrarmensaje(); setTimeout(muertej4, 2000);
                  break;
               /*casos de laberinto */
               case 42: $(mensaje).text(jugador4.nombre + " ha caido en el laberinto"); mostrarmensaje(); setTimeout(laberintoj4, 2000);
                  break;
               /*casos de carcel */
               case 52: $(mensaje).text(jugador4.nombre + " ha sido detenid@"); mostrarmensaje(); setTimeout(pararj4(2), 2000);
                  break;
               /*casos de posada*/
               case 19: $(mensaje).text(jugador4.nombre + " se ha tomado un descanso"); mostrarmensaje(); setTimeout(pararj4(1), 2000);
                  break;
               /*casos de puente */
               case 6: $(mensaje).text(jugador4.nombre + ": De manifestación en manifestación hasta la liberación!"); mostrarmensaje(); setTimeout(puentj4, 2000);
                  break;
               /*casos de oca a oca */
               case 5: $(mensaje).text(jugador4.nombre + ": ¡De desayuno a desayuno, y si la conozco, gano uno! "); mostrarmensaje(); setTimeout(oc1j4, 2000);
                  break;
               case 9: $(mensaje).text(jugador4.nombre + ": ¡De desayuno a desayuno, y si la conozco, gano uno! "); mostrarmensaje(); setTimeout(oc2j4, 2000);
                  break;
               case 14: $(mensaje).text(jugador4.nombre + ": ¡De desayuno a desayuno, y si la conozco, gano uno! "); mostrarmensaje(); setTimeout(oc1j4, 2000);
                  break;
               case 18: $(mensaje).text(jugador4.nombre + ": ¡De desayuno a desayuno, y si la conozco, gano uno! "); mostrarmensaje(); setTimeout(oc2j4, 2000);
                  break;
               case 23: $(mensaje).text(jugador4.nombre + ": ¡De desayuno a desayuno, y si la conozco, gano uno! "); mostrarmensaje(); setTimeout(oc1j4, 2000);
                  break;
               case 27: $(mensaje).text(jugador4.nombre + ": ¡De desayuno a desayuno, y si la conozco, gano uno! "); mostrarmensaje(); setTimeout(oc2j4, 2000);
                  break;
               case 32: $(mensaje).text(jugador4.nombre + ": ¡De desayuno a desayuno, y si la conozco, gano uno! "); mostrarmensaje(); setTimeout(oc1j4, 2000);
                  break;
               case 36: $(mensaje).text(jugador4.nombre + ": ¡De desayuno a desayuno, y si la conozco, gano uno! "); mostrarmensaje(); setTimeout(oc2j4, 2000);
                  break;
               case 41: $(mensaje).text(jugador4.nombre + ": ¡De desayuno a desayuno, y si la conozco, gano uno! "); mostrarmensaje(); setTimeout(oc1j4, 2000);
                  break;
               case 45: $(mensaje).text(jugador4.nombre + ": ¡De desayuno a desayuno, y si la conozco, gano uno! "); mostrarmensaje(); setTimeout(oc2j4, 2000);
                  break;
               case 50: $(mensaje).text(jugador4.nombre + ": ¡De desayuno a desayuno, y si la conozco, gano uno! "); mostrarmensaje(); setTimeout(oc1j4, 2000);
                  break;
               case 54: $(mensaje).text(jugador4.nombre + ": ¡De desayuno a desayuno, y si la conozco, gano uno! "); mostrarmensaje(); setTimeout(oc2j4, 2000);
                  break;
               case 59: $(mensaje).text(jugador4.nombre + ": ¡De desayuno a desayuno, y si la conozco, gano uno! "); mostrarmensaje(); setTimeout(oc1j4, 2000);
                  break;
            }

            $('#area' + jugador4.posicion).append($(FJ4));

         }
         $('#posicionCasilla4').text('Casilla: ' + jugador4.posicion);

      }

   }

   /*funciones para el jugador 1*/
   function oc1j1() {
      jugador1.turno = 1;
      jugador2.turno = 0;
      comprobarTurno();
      jugador1.posicion = jugador1.posicion + 4;
      console.log(jugador1.posicion);
      $('#area' + jugador1.posicion).append($(FJ1));
   }

   function oc2j1() {
      jugador1.turno = 1;
      jugador2.turno = 0;
      comprobarTurno();
      jugador1.posicion = jugador1.posicion + 5;
      console.log(jugador1.posicion);
      $('#area' + jugador1.posicion).append($(FJ1));
   }


   /*funciones jugador 2*/
   function oc1j2() {
      jugador2.turno = 1;
      jugador3.turno = 0;
      comprobarTurno();
      jugador2.posicion = jugador2.posicion + 4;
      console.log(jugador2.posicion);
      $('#area' + jugador2.posicion).append($(FJ2));
   }

   function oc2j2() {
      jugador2.turno = 1;
      jugador3.turno = 0;
      comprobarTurno();
      jugador2.posicion = jugador2.posicion + 5;
      console.log(jugador2.posicion);
      $('#area' + jugador2.posicion).append($(FJ2));
   }

   /*funciones jugador 3*/
   function oc1j3() {
      jugador3.turno = 1;
      jugador4.turno = 0;
      comprobarTurno();
      jugador3.posicion = jugador3.posicion + 4;
      console.log(jugador3.posicion);
      $('#area' + jugador3.posicion).append($(FJ3));
   }

   function oc2j3() {
      jugador3.turno = 1;
      jugador4.turno = 0;
      comprobarTurno();
      jugador3.posicion = jugador3.posicion + 5;
      console.log(jugador3.posicion);
      $('#area' + jugador3.posicion).append($(FJ3));
   }

   /*funciones jugador 3*/
   function oc1j4() {
      jugador4.turno = 1;
      jugador1.turno = 0;
      comprobarTurno();
      jugador4.posicion = jugador4.posicion + 4;
      console.log(jugador4.posicion);
      $('#area' + jugador4.posicion).append($(FJ4));
   }

   function oc2j4() {
      jugador4.turno = 1;
      jugador1.turno = 0;
      comprobarTurno();
      jugador4.posicion = jugador4.posicion + 5;
      console.log(jugador4.posicion);
      $('#area' + jugador4.posicion).append($(FJ4));
   }

   /*funciones de puente*/
   function puentj1() {
      jugador1.turno = 1;
      jugador2.turno = 0;
      comprobarTurno();
      jugador1.posicion = 12;
      console.log(jugador1.posicion);
      $('#area' + jugador1.posicion).append($(FJ1));
   }

   function puentj2() {
      jugador2.turno = 1;
      jugador3.turno = 0;
      comprobarTurno();
      jugador2.posicion = 12;
      console.log(jugador2.posicion);
      $('#area' + jugador2.posicion).append($(FJ2));
   }

   function puentj3() {
      jugador3.turno = 1;
      jugador4.turno = 0;
      comprobarTurno();
      jugador3.posicion = 12;
      console.log(jugador3.posicion);
      $('#area' + jugador3.posicion).append($(FJ3));
   }

   function puentj4() {
      jugador4.turno = 1;
      jugador1.turno = 0;
      comprobarTurno();
      jugador4.posicion = 12;
      console.log(jugador4.posicion);
      $('#area' + jugador4.posicion).append($(FJ4));
   }

   /*funciones de posada y carcel*/
   function pararj1(turnos) { if (turnos > 0) { jugador1.turno = 0; jugador1.parar = turnos } }
   function pararj2(turnos) { if (turnos > 0) { jugador2.turno = 0; jugador2.parar = turnos } }
   function pararj3(turnos) { if (turnos > 0) { jugador3.turno = 0, jugador3.parar = turnos } }
   function pararj4(turnos) { if (turnos > 0) { jugador4.turno = 0; jugador4.parar = turnos } }


   function laberintoj1() {
      jugador1.posicion = 30;
      console.log(jugador1.posicion);
      $('#score').text('Casilla: ' + jugador1.posicion);
      $('#area' + jugador1.posicion).append($(FJ1));
   }

   function laberintoj2() {
      jugador2.posicion = 30;
      console.log(jugador2.posicion);
      $('#area' + jugador1.posicion).append($(FJ2));
   }

   function laberintoj3() {
      jugador3.posicion = 30;
      console.log(jugador3.posicion);
      $('#area' + jugador3.posicion).append($(FJ3));
   }

   function laberintoj4() {
      jugador4.posicion = 30;
      console.log(jugador4.posicion);
      $('#area' + jugador4.posicion).append($(FJ4));
   }

   function muertej1() {
      jugador1.posicion = 1;
      console.log(jugador1.posicion);
      $('#area' + jugador1.posicion).append($(FJ1));

   }

   function muertej2() {
      jugador2.posicion = 1;
      console.log(jugador2.posicion);
      $('#area' + jugador2.posicion).append($(FJ2));

   }

   function muertej3() {
      jugador3.posicion = 1;
      console.log(jugador3.posicion);
      $('#area' + jugador3.posicion).append($(FJ3));

   }

   function muertej4() {
      jugador4.posicion = 1;
      console.log(jugador4.posicion);
      $('#area' + jugador4.posicion).append($(FJ4));

   }

   function getOffset(el) {
      var _x = 0;
      var _y = 0;
      while (el && !isNaN(el.offsetLeft) && !isNaN(el.offsetTop)) {
         _x += el.offsetLeft - el.scrollLeft;
         _y += el.offsetTop - el.scrollTop;
         el = el.offsetParent;
      }
      return { top: _y, left: _x };
   }

   function Imprimir() {
      /*pedimos que el usuario confirme que quiere imprimir ya que reinicia el progrso del jugo */
      if (confirm('si desea imprimir el progreso de la partida se reiniciara')) {
         alert('Recomendamos una escala de 90 y activar los graficos fondos a la hora de imprimir');
         
         

         if (document.getElementById("tablero2")==null)
         {
         document.getElementById("tablero").style.position="absolute";
         document.getElementById("tablero").style.margin="0px";
         document.getElementById("tablero").style.top="-750px";
         document.getElementById("tablero").style.left="-100px";
         document.getElementById("tablero").style.height="30vh";
         document.getElementById("tablero").style.width="100vw";
         }

         else
         {
         document.getElementById("tablero2").style.position="absolute";
         document.getElementById("tablero2").style.margin="0px";
         document.getElementById("tablero2").style.top="-750px";
         document.getElementById("tablero2").style.left="-100px";
         document.getElementById("tablero2").style.height="30vh";
         document.getElementById("tablero2").style.width="100vw";
         }
         

         document.getElementById("jugador1").style.visibility = "hidden";
         document.getElementById("jugador2").style.visibility = "hidden";
         document.getElementById("jugador3").style.visibility = "hidden";
         document.getElementById("jugador4").style.visibility = "hidden";
         document.getElementById("btnImprimir").style.visibility="hidden"

         document.getElementById("panelDado").style.display = "none";
         
   
         document.getElementById("ficha1").style.display = "none";
         document.getElementById("ficha2").style.display = "none";
         document.getElementById("ficha3").style.display = "none";
         document.getElementById("ficha4").style.display = "none";

         var footer = document.getElementsByClassName("footer jumbotron text-center");
         var fab = document.getElementsByClassName("fab");

         footer[0].style.display="none";
         fab[0].style.display="none";

         window.print();
         alert("Volviendo al juego");
         setTimeout(reload, 1000);

         function reload() {
            location.reload();
         }
      } else {
         alert('Volviendo al juego');
      }

   }

   function mostrarmensaje() {
      if (jugador1.turno == 1) { $(mensaje).css({ 'background-color': 'blue', 'color': '#000' }); }
      else if (jugador2.turno == 1) { $(mensaje).css({ 'background-color': 'red', 'color': '#000' }); }
      else if (jugador3.turno == 1) { $(mensaje).css({ 'background-color': 'green', 'color': '#000' }); }
      else if (jugador4.turno == 1) { $(mensaje).css({ 'background-color': 'yellow', 'color': '#000' }); }
      $(mensaje).fadeIn("slow");
      setTimeout(volver, 2000);
   }

   function volver() {
      $(mensaje).fadeOut();
   }

   /*configuramos el zoom de la pagina para que se vea bien */
   //document.body.style.zoom = "80%";
   /*hacemos que las casillas especiales no muestren el simbolo de pregunta */
   for (let i = 0; i < arrayPreguntas.length; i++) {
      arrayPreguntas[i].style.display = 'none';
   }

   /*otros ajustes de diseño */
   numeros[16].style.marginRight = "20px";
   numeros[24].style.marginLeft = "20px";
   numeros[52].style.marginLeft = "20px";
   preguntas[16].style.marginRight = "20px";
   preguntas[46].style.marginRight = "20px";
   
   /*cuando hacemos click en cualquier pregunta */
   for (i = 0; i < preguntas.length; i++) {
      preguntas[i].onclick = sacarcarta;
   }
   /*muestra un alert con la pregunta si el modo trivia esta activado */
   function preguntar() {

      preguntas[i];
      var identificador = this.parentNode.id;
      console.log(identificador);

      if (trivia == 1) {
         alert("pregunta" + i); if (identificador == "casilla10") { confirm(casilla10.pregunta + "?\n" + casilla10.respuestaCorrecta + "\n") }
      }

      else if (trivia == 0) { alert("Activa el modo pregunta") }

   }

   /*si el boton trivia es pulsado cambia el modo de jeugo  */
   function cambiarmodo() {
      if (trivia == 1) { trivia = 0 }
      else if (trivia == 0) { trivia = 1 }
   }

   function responder() {
      respuestaE = this.id;
      document.getElementById("respuesta1").style.backgroundColor = "thistle";
      document.getElementById("respuesta2").style.backgroundColor = "thistle";
      document.getElementById("respuesta3").style.backgroundColor = "thistle";
      document.getElementById(respuestaE).style.backgroundColor = "lightblue";
      console.log(respuestaE);
   }

   function sacarcarta() {
      var deg = 360;
      $("#carta").css({ 'display': 'flex', 'align-items': 'center', 'justify-content': 'center' });
      $(".card-tablero").animate({ left: '-=1px' }, 1000);

      $('.card-tablero').animate(
         { deg: deg },
         {
            duration: 1200,
            step: function (now) {
               $(this).css({ transform: 'rotate(' + now + 'deg)' });
            }
         }
      );

      document.getElementById("name").innerText = "Nombre";
      document.getElementById("apellidos").innerText = "Apellido(s)";
      document.getElementById("foto").src = "../../resources/img/tablero/tablero/casillas/persona.jpg";
      document.getElementById("pregunta").innerText = "¿Ésto es una pregunta?";
      document.getElementById("respuesta1").innerText = "Sí";
      document.getElementById("respuesta2").innerText = "Tal vez";
      document.getElementById("respuesta3").innerText = "No";
      document.getElementById("respuesta1").onmouseover = document.getElementById("respuesta1").style.cursor = "pointer";
      document.getElementById("respuesta2").onmouseover = document.getElementById("respuesta2").style.cursor = "pointer";
      document.getElementById("respuesta3").onmouseover = document.getElementById("respuesta3").style.cursor = "pointer";

   }

   function quitarcarta() {
      document.getElementById("carta").style.display = "none";
      document.getElementById("carta").style.left = "0";
   }

   function aceptarcarta() {
      document.getElementById("carta").style.display = "none";
      document.getElementById("carta").style.left = "0";
   }

});