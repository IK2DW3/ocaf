<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Carta;
use App\User;
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

    public function postRegister(Request $request) {
        $registroPersona = new User;
        $registroPersona->name = $request->input('newusername');
        $registroPersona->email = $request->input('email');
        $registroPersona->password = bcrypt($request->input('confirmnewpassword'));
        $registroPersona->save();
        return view('index', array('arrayRegistro'=> $registroPersona));
    }

    public function getGamemode(Request $request) {
        $mode = $request->input('mode');
        return view('gamemode', array('gamemode' => $mode));
    }

    public function getHistorys() {
        $Cartas = DB::table('cartas')
                    ->join('ambitos', 'cartas.codAmbito', '=', 'ambitos.id')
                    ->select('cartas.*', 'ambitos.ambitoEsp')
                    ->get();
        return view('historys', array('arrayCartas'=> $Cartas));
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

    public function getPanel() {
        return view('administracion.panel');
    }

    public function getPerfil() {
        return view('administracion.perfil');
    }

    public function getPanelcartas() {
        $cartas = DB::table('cartas')
                    ->join('ambitos', 'cartas.codAmbito', '=', 'ambitos.id')
                    ->join('continentes', 'cartas.codContinente', '=', 'continentes.id')
                    ->select('cartas.*', 'ambitos.*', 'continentes.*')
                    ->get();
        return view('administracion.panelcartas', array('arrayCartas'=> $cartas));
    }

    public function getPanelusuarios() {
        $usuarios = DB::table('users')->get();
        return view('administracion.panelusuarios', array('arrayUsuarios'=> $usuarios));
    }

}
