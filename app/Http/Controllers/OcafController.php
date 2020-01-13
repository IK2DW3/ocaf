<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Carta;
Use Alert;

class OcafController extends Controller
{
    //
    public function getHome() {
        return  redirect()->action('LoginController@login');
    }

    public function getIndex() {
        return view('index');
    }

    public function getMode() {
        return view('mode');
    }

    public function getPanel() {
        $persona = DB::table('cartas')
                    ->join('ambitos', 'cartas.codAmbito', '=', 'ambitos.id')
                    ->join('continentes', 'cartas.codContinente', '=', 'continentes.id')
                    ->select('cartas.*', 'ambitos.*', 'continentes.*')
                    ->get();
        return view('paneladmin', array('arrayPersonas'=> $persona));
    }

    public function getGamemode(Request $request) {
        $mode = $request->input('mode');
        return view('gamemode', array('gamemode' => $mode));
    }
 
    public function getHistorys() {
        $Ambitos = DB::table('ambitos')
        ->select('*')
        ->get();
        /*$Continentes = DB::table('continentes')
                    ->select('*')
                    ->get();*/
        $AC = DB::table('ambitos')
                    ->join('continentes', 'ambitos.id', '=', 'continentes.id')
                    ->select('continentes.continenteEsp', 'ambitos.ambitoEsp')
                    ->get();
        $Cartas = DB::table('cartas')
                    ->join('ambitos', 'cartas.codAmbito', '=', 'ambitos.id')
                    ->join('continentes', 'cartas.codContinente', '=', 'continentes.id')
                    ->select('cartas.*', 'ambitos.ambitoEsp', 'continentes.continenteEsp')
                    ->distinct()
                    ->get();
        return view('historys',array('arrayCartas'=> $Cartas),/*array('arrayContinentes' => $Continentes),*/ array('arrayAC' => $AC));
        return view('historys',array('arrayCartas'=> $Cartas),/*array('arrayContinentes' => $Continentes),*/ array('arrayAC' => $AC));
    }

    public function getHistory($id) {
        $Carta = DB::table('cartas')
                    ->join('ambitos', 'cartas.codAmbito', '=', 'ambitos.id')
                    ->join('continentes', 'cartas.codContinente', '=', 'continentes.id')
                    ->select('cartas.*', 'ambitos.ambitoEsp', 'continentes.continenteEng')
                    ->where('cartas.id', '=', $id)
                    ->get();
        return view('history', array('arrayCarta' => $Carta));
    }

    public function getHistoryFiltro() {
        $Ambitos = DB::table('ambitos')
        ->select('*')
        ->get();
        $Continentes = DB::table('continentes')
                    ->select('*')
                    ->get();
       
        return view('historyFiltro',array('arrayContinentes'=> $Continentes), array('arrayAmbitos'=> $Ambitos));
    }

}
