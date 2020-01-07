<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pregunta;
use App\Carta;
use Illuminate\Support\Facades\Auth;

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
    public function getHistorias() {        
        $history = Carta::all();
        return view('historias', array('historias'=>$history));
    }
   
    public function getHistoria($id) {
        $history = Carta::findOrFail($id);  
        return view('historia', ['historia'=>$history]);
    }
}
