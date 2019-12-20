<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Carta;
Use Alert;

class OcafController extends Controller
{
    //
    public function getIndex() {
        return view('index');
    }

    public function getMode() {
        return view('mode');
    }

    public function getGamemode($id) {
        $mode = $request->input('mode');
        return view('gamemode', array('gamemodes' => $mode));
    }

    public function getHistorys() {
        $mostrarCartas = Carta::all();
        return view('historys', array('arrayCartas'=> $mostrarCartas));
    }

    public function getHistory($id) {
        $mostrarCarta = Carta::findOrFail($id);
        return view('history', array('arrayCartas'=> $mostrarCarta));
    }
    
}
