
@extends('layouts.master')

@section('content')

<div id="body">
    <div id=debug>jugadores
        <button class="btndebug" id="btn2jugadores">2 jugadores</button>
        <button class="btndebug" id="btn4Jugadores">4 jugadores</button>
        <br>
        ModoDejuego
        <button class="btndebug" id="btntrivia">Trivia</button>
        <button class="btndebug">normal</button>
        <br>
        Equipos
        <button class="btndebug">2 equipos</button>
        <br>
        otros
        <button class="btndebug" id=btnImprimir>Imprimir</button>
    </div>
    
    
    <div id ="tablero">
    
        <div class="casilla" id= "casillaInicio">
            <p class="Nº">1</p>
            <button class="pregunta">?</button>
            <div class="area" id="area1"></div>
        </div>
        
                
        <div class="casilla" id= "casilla2"><p class="Nº">2</p><button class="pregunta">?</button>Pepa Perez<div class="area" id="area2"></div></div>
        <div class="casilla" id= "casilla3"><p class="Nº">3</p><button class="pregunta">?</button>Pepa Perez<div class="area" id="area3"></div></div>
        <div class="casilla" id= "casilla4"><p class="Nº">4</p><button class="pregunta">?</button>Pepa Perez<div class="area" id="area4"></div></div>
        <div class="casilla" id= "casilla5"><p class="Nº">5</p><button class="pregunta">?</button><div class="area" id="area5"></div></div>
        <div class="casilla" id= "casilla6"><p class="Nº">6</p><button class="pregunta">?</button><div class="area" id="area6"></div></div>
        <div class="casilla" id= "casilla7"><p class="Nº">7</p><button class="pregunta">?</button>Pepa Perez<div class="area" id="area7"></div></div>
        <div class="casilla" id= "casilla8"><p class="Nº">8</p><button class="pregunta">?</button>Pepa Perez<div class="area" id="area8"></div></div>
        <div class="casilla" id= "casilla9"><p class="Nº">9</p><button class="pregunta">?</button><div class="area" id="area9"></div></div>
        <div class="casilla" id= "casilla10"><p class="Nº">10</p><button class="pregunta">?</button>Pepa Perez<div class="area" id="area10"></div></div>
        <div class="casilla" id= "casilla11"><p class="Nº">11</p><button class="pregunta">?</button>Pepa Perez<div class="area" id="area11"></div></div>
        <div class="casilla" id= "casilla12"><p class="Nº">12</p><button class="pregunta">?</button><div class="area" id="area12"></div></div>
        <div class="casilla" id= "casilla13"><p class="Nº">13</p><button class="pregunta">?</button>Pepa Perez<div class="area" id="area13"></div></div>
        <div class="casilla" id= "casilla14"><p class="Nº">14</p><button class="pregunta">?</button><div class="area" id="area14"></div></div>
        <div class="casilla" id= "casilla15"><p class="Nº">15</p><button class="pregunta">?</button>Pepa Perez<div class="area" id="area15"></div></div>
        <div class="casilla" id= "casilla16"><p class="Nº">16</p><button class="pregunta">?</button>Pepa Perez<div class="area" id="area16"></div></div>
        <div class="casilla" id= "casilla17"><p class="Nº">17</p><button class="pregunta">?</button>Pepa Perez<div class="area" id="area17"></div></div>
        <div class="casilla" id= "casilla18"><p class="Nº">18</p><button class="pregunta">?</button><div class="area" id="area18"></div></div>
        <div class="casilla" id= "casilla19"><p class="Nº">19</p><button class="pregunta">?</button><div class="area" id="area19"></div></div>
        <div class="casilla" id= "casilla20"><p class="Nº">20</p><button class="pregunta">?</button>Pepa Perez<div class="area" id="area20"></div></div>
        <div class="casilla" id= "casilla21"><p class="Nº">21</p><button class="pregunta">?</button>Pepa Perez<div class="area" id="area21"></div></div>
        <div class="casilla" id= "casilla22"><p class="Nº">22</p><button class="pregunta">?</button>Pepa Perez<div class="area" id="area22"></div></div>
        <div class="casilla" id= "casilla23"><p class="Nº">23</p><button class="pregunta">?</button><div class="area" id="area23"></div></div>
        <div class="casilla" id= "casilla24"><p class="Nº">24</p><button class="pregunta">?</button>Pepa Perez<div class="area" id="area24"></div></div>
        <div class="casilla" id= "casilla25"><p class="Nº">25</p><button class="pregunta">?</button>Pepa Perez<div class="area" id="area25"></div></div>
        <div class="casilla" id= "casilla26"><p class="Nº">26</p><button class="pregunta">?</button>Pepa Perez<div class="area" id="area26"></div></div>
        <div class="casilla" id= "casilla27"><p class="Nº">27</p><button class="pregunta">?</button><div class="area" id="area27"></div></div>
        <div class="casilla" id= "casilla28"><p class="Nº">28</p><button class="pregunta">?</button>Pepa Perez<div class="area" id="area28"></div></div>
        <div class="casilla" id= "casilla29"><p class="Nº">29</p><button class="pregunta">?</button>Pepa Perez<div class="area" id="area29"></div></div>
        <div class="casilla" id= "casilla30"><p class="Nº">30</p><button class="pregunta">?</button>Pepa Perez<div class="area" id="area30"></div></div>
        <div class="casilla" id= "casilla31"><p class="Nº">31</p><button class="pregunta">?</button><div class="area" id="area31"></div></div>
        <div class="casilla" id= "casilla32"><p class="Nº">32</p><button class="pregunta">?</button><div class="area" id="area32"></div></div>
        <div class="casilla" id= "casilla33"><p class="Nº">33</p><button class="pregunta">?</button>Pepa Perez<div class="area" id="area33"></div></div>
        <div class="casilla" id= "casilla34"><p class="Nº">34</p><button class="pregunta">?</button>Pepa Perez<div class="area" id="area34"></div></div>
        <div class="casilla" id= "casilla35"><p class="Nº">35</p><button class="pregunta">?</button>Pepa Perez<div class="area" id="area35"></div></div>
        <div class="casilla" id= "casilla36"><p class="Nº">36</p><button class="pregunta">?</button><div class="area" id="area36"></div></div>
        <div class="casilla" id= "casilla37"><p class="Nº">37</p><button class="pregunta">?</button>Pepa Perez<div class="area" id="area37"></div></div>
        <div class="casilla" id= "casilla38"><p class="Nº">38</p><button class="pregunta">?</button>Pepa Perez<div class="area" id="area38"></div></div>
        <div class="casilla" id= "casilla39"><p class="Nº">39</p><button class="pregunta">?</button>Pepa Perez<div class="area" id="area39"></div></div>
        <div class="casilla" id= "casilla40"><p class="Nº">40</p><button class="pregunta">?</button>Pepa Perez<div class="area" id="area40"></div></div>
        <div class="casilla" id= "casilla41"><p class="Nº">41</p><button class="pregunta">?</button><div class="area" id="area41"></div></div>
        <div class="casilla" id= "casilla42"><p class="Nº">42</p><button class="pregunta">?</button><div class="area" id="area42"></div></div>
        <div class="casilla" id= "casilla43"><p class="Nº">43</p><button class="pregunta">?</button>Pepa Perez<div class="area" id="area43"></div></div>
        <div class="casilla" id= "casilla44"><p class="Nº">44</p><button class="pregunta">?</button>Pepa Perez<div class="area" id="area44"></div></div>
        <div class="casilla" id= "casilla45"><p class="Nº">45</p><button class="pregunta">?</button><div class="area" id="area45"></div></div>
        <div class="casilla" id= "casilla46"><p class="Nº">46</p><button class="pregunta">?</button>Pepa Perez<div class="area" id="area46"></div></div>
        <div class="casilla" id= "casilla47"><p class="Nº">47</p><button class="pregunta">?</button>Pepa Perez<div class="area" id="area47"></div></div>
        <div class="casilla" id= "casilla48"><p class="Nº">48</p><button class="pregunta">?</button>Pepa Perez<div class="area" id="area48"></div></div>
        <div class="casilla" id= "casilla49"><p class="Nº">49</p><button class="pregunta">?</button>Pepa Perez<div class="area" id="area49"></div></div>
        <div class="casilla" id= "casilla50"><p class="Nº">50</p><button class="pregunta">?</button><div class="area" id="area50"></div></div>
        <div class="casilla" id= "casilla51"><p class="Nº">51</p><button class="pregunta">?</button>Pepa Perez<div class="area" id="area51"></div></div>
        <div class="casilla" id= "casilla52"><p class="Nº">52</p><button class="pregunta">?</button><div class="area" id="area52"></div></div>
        <div class="casilla" id= "casilla53"><p class="Nº">53</p><button class="pregunta">?</button>Pepa Perez<div class="area" id="area53"></div></div>
        <div class="casilla" id= "casilla54"><p class="Nº">54</p><button class="pregunta">?</button><div class="area" id="area54"></div></div>
        <div class="casilla" id= "casilla55"><p class="Nº">55</p><button class="pregunta">?</button>Pepa Perez<div class="area" id="area55"></div></div>
        <div class="casilla" id= "casilla56"><p class="Nº">56</p><button class="pregunta">?</button>Pepa Perez<div class="area" id="area56"></div></div>
        <div class="casilla" id= "casilla57"><p class="Nº">57</p><button class="pregunta">?</button>Pepa Perez<div class="area" id="area57"></div></div>
        <div class="casilla" id= "casilla58"><p class="Nº">58</p><button class="pregunta">?</button><div class="area" id="area58"></div></div>
        <div class="casilla" id= "casilla59"><p class="Nº">59</p><button class="pregunta">?</button><div class="area" id="area59"></div></div>
        <div class="casilla" id= "casilla60"><p class="Nº">60</p><button class="pregunta">?</button>Pepa Perez<div class="area" id="area60"></div></div>
        <div class="casilla" id= "casilla61"><p class="Nº">61</p><button class="pregunta">?</button>Pepa Perez<div class="area" id="area61"></div></div>
        <div class="casilla" id= "casilla62"><p class="Nº">62</p><button class="pregunta">?</button>Pepa Perez<div class="area" id="area62"></div></div>
    
    
        <div class="casilla" id= "casillaFinal">
            <p class="Nº">63</p>
            <button class="pregunta">?</button>
            <div class="area" id="area63"></div>
        </div>

    </div>
    
    <div class ="contjugador" id ="jugador1">
        <p id="nombre1">nombre1</p> 
        <img class ="jugador" src="user1.png" alt="usuario1">
        <p id="score">0</p>
    </div>
    
    <div class ="contjugador" id ="jugador2">
        <p id="nombre2">nombre2</p> 
        <img class ="jugador" src="user1.png" alt="usuario1">
        <p id="score">0</p>
    </div>
    
    <div class ="contjugador" id ="jugador3">
        <p id="nombre3">nombre3</p>
        <img class ="jugador" src="user1.png" alt="usuario1">
        <p id="score">0</p>
    </div>
    <div class ="contjugador" id ="jugador4">
        <p id="nombre4">nombre4</p> 
        <img class ="jugador" src="user1.png" alt="usuario1">
        <p id="score">0</p>
    </div>
    
    <div id="panelDado">
        <img id ="dado1" src="recursos/1.png" alt="usuario1">
        <button id ="botontirar">Tirar</button>
    </div>
    
    <div class="ficha" id =ficha1></div>
    <div class="ficha" id =ficha2></div>
    <div class="ficha" id =ficha3></div>
    <div class="ficha" id =ficha4></div>
    
    <div id ="normas">NORMAS</div>
    <div id ="texto"> 
        <p>+>Oca = Logo de Desayunos Feministas. 
            Si se cae en una de estas casillas, se puede
            avanzar hasta la siguiente casilla en la que hay un logo y volver atirar
            ¡De desayuno a +>desayuno, y si la conozco, gano uno</p>
        
        <p>+>Puente = Manifestación. Casillas 6 y 12: se salta de la 6 a la 12 y se vuelve a tirar. ¡De manifestación en manifestación hasta la liberación!</p>
            
        <p>+>Posada. Casilla 19: se pierde un turno.</p>
            
        <p>+>Cárcel de sufragistas. Casilla 56: Si se cae en esta casilla, hay que permanecer dos turnos sin jugar.
            Dados. </p> 
            
        <p>+>Casillas 26 y 53: Si se cae en estas casillas, se suma la marcación de la casilla de los dados (26 o 53)
            y se avanza tanto como resulte.</p> 
                
        <p>+>Pozo. Casilla 31: no se puede volver a jugar hasta que no pase otro jugador por esa casilla.</p>
            
        <p>+>Laberinto. Casilla 42: Si se cae en esta casilla, se está obligado a retroceder a la casilla 30.</p>
            
        <p>+>Calavera. Casilla 58: Si se cae en esta casilla, hay que volver a la Casilla 1.</p>
            
        <p>+>¡Llegaste! Casilla 63. Es necesario sacar los puntos justos para quedarte en esta casilla y terminar!</p>
    </div>
</div>

@stop