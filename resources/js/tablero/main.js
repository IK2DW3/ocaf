$(function () {
   /**
   * Inicializacion de variables
   */
   var num1 = 0;
   var jugadores = 4;
   var mensaje = $('#mensajes');
   var FJ1 = $('#ficha1');
   var FJ2 = $('#ficha2');
   var FJ3 = $('#ficha3');
   var FJ4 = $('#ficha4');

   /**
    * Creacion del objeto jugador
    * Metodo donde se recoge al jugador que esté jugando
    */
   var jugador = function (nombre, puntos, posicion, color, turno, ficha, parar) {
      this.nombre = nombre
      this.puntos = puntos
      this.posicion = posicion
      this.color = color
      this.turno = turno
      this.ficha = ficha
      this.parar = parar
   }

   /**
    * Declarando jugadores por defecto
    */
   var jugador1 = new jugador("Player 1", 0, 1, "red", 1, "ficha1", 0);
   var jugador2 = new jugador("Player 2", 0, 1, "green", 0, "ficha2", 0);
   var jugador3 = new jugador("Player 3", 0, 1, "yellow", 0, "ficha3", 0);
   var jugador4 = new jugador("Player 4", 0, 1, "blue", 0, "ficha4", 0);

   $('#area1').append($(FJ1));
   $('#area1').append($(FJ2));
   $('#area1').append($(FJ3));
   $('#area1').append($(FJ4));

   $('#botontirar').on('click', tirar);
   $('#btnmensajer').on('click', mostrarmensaje);
   $('#btn2jugadores').on('click', modo2jugadores);
   $('#btn4Jugadores').on('click', modo4jugadores);
   $('#btnImprimir').on('click', Imprimir);
   $('#btnNombres').on('click', nombrarjugadores);

   $('#nombre1').text(String(jugador1.nombre));
   $('#nombre2').text(String(jugador2.nombre));
   $('#nombre3').text(String(jugador3.nombre));
   $('#nombre4').text(String(jugador4.nombre));

   $('#ficha1').css({ 'backgroundColor': String(jugador1.color)});
   $('#ficha2').css({ 'backgroundColor': String(jugador2.color)});
   $('#ficha3').css({ 'backgroundColor': String(jugador3.color)});
   $('#ficha4').css({ 'backgroundColor': String(jugador4.color)});

   function tirar() {
      num1 = Math.floor(Math.random() * 6) + 1;;
      var sonidito = new Audio('../../resources/img/tablero/tablero/sonido/dado.mp3');
      sonidito.play();
      $('#dado1').attr('src','../../resources/img/tablero/tablero/dado/animacion.gif');
      setTimeout(dados, 900);
   }

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


   function dados() {
      /*vemos que numero sale y le asignamos una cara del dado */
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

   function mover() {

      /*si el turno es del jugador 1*/
      if (jugador1.turno == 1) {

         $(FJ4).css({ 'border': '0px solid white'});
         $(FJ1).css({ 'border': '4px solid white' });
         if (jugador1.parar > 0) {

            jugador1.turno = 0;
            jugador2.turno = 1;
            jugador1.parar = jugador1.parar - 1;

         } else {
            /*asignamos los turnos */
            jugador1.turno = 0;
            jugador2.turno = 1;

            /*si es la primera vez que se tira */
            if (jugador1.posicion == 1) { jugador1.posicion = 1 + num1 }
            else { jugador1.posicion = jugador1.posicion + num1 }

            if (jugador1.parar > 0) { pararj1 }
            /*comprobamos en que casilla ha caido */
            switch (jugador1.posicion) {
               /*si se llega hasta el final */
               case (jugador1.posicion > 63): $(mensaje).text(jugador1.nombre + " ha llegado al FINAL"); mostrarmensaje();
               case 63: $(mensaje).text(jugador1.nombre + " ha llegado al FINAL"); mostrarmensaje();
                  break
               /*casos de laberinto */
               case 42: $(mensaje).text(jugador1.nombre + " ha muerto"); mostrarmensaje(); setTimeout(muertej1, 2000);
                  break;
               /*casos de laberinto */
               case 42: $(mensaje).text(jugador1.nombre + " ha caido en el laberinto"); mostrarmensaje(); setTimeout(laberintoj1, 2000);
                  break;
               /*casos de carcel*/
               case 52: $(mensaje).text(jugador1.nombre + " ha sido detenid@"); mostrarmensaje(); setTimeout(pararj1(2), 2000);
                  break;
               /*casos de posada*/
               case 19: $(mensaje).text(jugador1.nombre + " se ha tomado un descanso"); mostrarmensaje(); setTimeout(pararj1(1), 2000);
                  break;
               /*casos de puente */
               case 6: $(mensaje).text(jugador1.nombre + ": De manifestación en manifestación hasta la liberación! "); mostrarmensaje(); setTimeout(puentj1, 2000);
                  break;
               /*casos de oca a oca */
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

            console.log(jugador1.posicion);
            if (jugador1.posicion < 63) { $('#area' + jugador1.posicion).append($(FJ1)), 10000 }
            else { $('#area63').append($(FJ1)); }

         }



      }
      /*si el turno es del jugador 2*/
      else if (jugador2.turno == 1) {
         $(FJ1).css({ 'border': '0px solid white' });
         $(FJ2).css({ 'border': '4px solid white' });
         if (jugador2.parar > 0) {
            if (jugadores > 2) {
               jugador2.turno = 0;
               jugador3.turno = 1;
            }
         }

         else {
            if (jugadores == 4) {
               jugador2.turno = 0;
               jugador3.turno = 1;
            } else if (jugadores = 2 || jugadores == 1) {
               jugador2.turno = 0;
               jugador1.turno = 1;
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

      }
      /*si el turno es del jugador 3*/
      else if (jugador3.turno == 1) {

         $(FJ2).css({ 'border': '0px solid white' });
         $(FJ3).css({ 'border': '4px solid white' });

         if (jugador2.parar > 0) {
            jugador2.turno = 0;
            jugador3.turno = 1;
         } else {

            jugador3.turno = 0;
            jugador4.turno = 1;
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

      }
      /*si el turno es del jugador 4*/
      else if (jugador4.turno == 1) {
         $(FJ3).css({ 'border': '0px solid white' });
         $(FJ4).css({ 'border': '4px solid white' });


         if (jugador2.parar > 0) {
            jugador2.turno = 0;
            jugador3.turno = 1;
         } else {
            jugador4.turno = 0;
            jugador1.turno = 1;
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

      }

   }

   /*funciones para el jugador 1*/
   function oc1j1() {
      jugador1.turno = 1;
      jugador2.turno = 0;
      jugador1.posicion = jugador1.posicion + 4;
      console.log(jugador1.posicion);
      $('#area' + jugador1.posicion).append($(FJ1));
   }

   function oc2j1() {
      jugador1.turno = 1;
      jugador2.turno = 0;
      jugador1.posicion = jugador1.posicion + 5;
      console.log(jugador1.posicion);
      $('#area' + jugador1.posicion).append($(FJ1));
   }


   /*funciones jugador 2*/
   function oc1j2() {
      jugador2.turno = 1;
      jugador3.turno = 0;
      jugador2.posicion = jugador2.posicion + 4;
      console.log(jugador2.posicion);
      $('#area' + jugador2.posicion).append($(FJ2));
   }

   function oc2j2() {
      jugador2.turno = 1;
      jugador3.turno = 0;
      jugador2.posicion = jugador2.posicion + 5;
      console.log(jugador2.posicion);
      $('#area' + jugador2.posicion).append($(FJ2));
   }

   /*funciones jugador 3*/
   function oc1j3() {
      jugador3.turno = 1;
      jugador4.turno = 0;
      jugador3.posicion = jugador3.posicion + 4;
      console.log(jugador3.posicion);
      $('#area' + jugador3.posicion).append($(FJ3));
   }

   function oc2j3() {
      jugador3.turno = 1;
      jugador4.turno = 0;
      jugador3.posicion = jugador3.posicion + 5;
      console.log(jugador3.posicion);
      $('#area' + jugador3.posicion).append($(FJ3));
   }

   /*funciones jugador 3*/
   function oc1j4() {
      jugador4.turno = 1;
      jugador1.turno = 0;
      jugador4.posicion = jugador4.posicion + 4;
      console.log(jugador4.posicion);
      $('#area' + jugador4.posicion).append($(FJ4));
   }

   function oc2j4() {
      jugador4.turno = 1;
      jugador1.turno = 0;
      jugador4.posicion = jugador4.posicion + 5;
      console.log(jugador4.posicion);
      $('#area' + jugador4.posicion).append($(FJ4));
   }

   /*funciones de puente*/
   function puentj1() {
      jugador1.turno = 1;
      jugador2.turno = 0;
      jugador1.posicion = 12;
      console.log(jugador1.posicion);
      $('#area' + jugador1.posicion).append($(FJ1));
   }

   function puentj2() {
      jugador2.turno = 1;
      jugador3.turno = 0;
      jugador2.posicion = 12;
      console.log(jugador2.posicion);
      $('#area' + jugador2.posicion).append($(FJ2));
   }

   function puentj3() {
      jugador3.turno = 1;
      jugador4.turno = 0;
      jugador3.posicion = 12;
      console.log(jugador3.posicion);
      $('#area' + jugador3.posicion).append($(FJ3));
   }

   function puentj4() {
      jugador4.turno = 1;
      jugador1.turno = 0;
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
      document.getElementById("area" + jugador1.posicion).append($(FJ1));
   }

   function laberintoj2() {
      jugador2.posicion = 30;
      console.log(jugador2.posicion);
      document.getElementById("area" + jugador2.posicion).append($(FJ2));
   }

   function laberintoj3() {
      jugador3.posicion = 30;
      console.log(jugador3.posicion);
      document.getElementById("area" + jugador3.posicion).append($(FJ3));
   }

   function laberintoj4() {
      jugador4.posicion = 30;
      console.log(jugador4.posicion);
      document.getElementById("area" + jugador4.posicion).append($(FJ4));
   }

   function muertej1() {
      jugador1.posicion = 1;
      console.log(jugador1.posicion);
      document.getElementById("area" + jugador1.posicion).append($(FJ1));

   }

   function muertej2() {
      jugador2.posicion = 1;
      console.log(jugador2.posicion);
      document.getElementById("area" + jugador2.posicion).append($(FJ2));

   }

   function muertej3() {
      jugador3.posicion = 1;
      console.log(jugador3.posicion);
      document.getElementById("area" + jugador3.posicion).append($(FJ3));

   }

   function muertej4() {
      jugador4.posicion = 1;
      console.log(jugador4.posicion);
      document.getElementById("area" + jugador4.posicion).append($(FJ4));

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
         document.getElementById("debug").style.display = "none";
         document.getElementById("jugador1").style.display = "none";
         document.getElementById("jugador2").style.display = "none";
         document.getElementById("jugador3").style.display = "none";
         document.getElementById("jugador4").style.display = "none";
         document.getElementById("panelDado").style.display = "none";
         document.getElementById("tablero").style.marginLeft = "0px";
         document.getElementById("tablero").style.marginTop = "0px";
         document.getElementById("normas").style.marginLeft = "0px";
         document.getElementById("texto").style.marginLeft = "0px";
         document.getElementById("ficha1").style.display = "none";
         document.getElementById("ficha2").style.display = "none";
         document.getElementById("ficha3").style.display = "none";
         document.getElementById("ficha4").style.display = "none";
         document.getElementById("texto").style.display = "block";
         document.getElementById("normas").style.display = "block";

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

   function mostrarmensaje() {
      if (jugador1.turno == 1) { $(mensaje).css({ 'background-color': 'blue' }); }
      else if (jugador2.turno == 1) { $(mensaje).css({ 'background-color': 'red' }); }
      else if (jugador3.turno == 1) { $(mensaje).css({ 'background-color': 'green' }); }
      else if (jugador4.turno == 1) { $(mensaje).css({ 'background-color': 'yellow' }); }
      $(mensaje).css({ 'display': 'block' }).fadeIn("slow");
      animacion();
   }

   function animacion() {
      $(mensaje).fadeIn("slow");
      setTimeout(volver, 2000);
   }

   function volver() {
      $("#mensajes").fadeOut();
   }


});