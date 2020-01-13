<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Carta;
use App\User;
Use Alert;

class OcafController extends Controller
{
    // Inicio de las funciones
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
        $Cartas = Carta::all();
        return view('historys', array('arrayCartas'=> $Cartas));
    }

    public function getHistory($id) {
        $Carta = Carta::findOrFail($id);
        return view('history', array('arrayCarta' => $Carta));
    }

    public function getPanel() {
        if (Auth::user()->tipo == 'superadmin' || Auth::user()->tipo == 'admin') {
            return view('administracion.panel');
        } else {
            Alert::warning('Error', 'Permisos insuficientes!');
            return redirect()->action('OcafController@getIndex');
        }
    }

    public function getPerfil() {
        return view('administracion.perfil');
    }

    public function getPanelcartas() {
        $Cartas = Carta::all();

        if (Auth::user()->tipo == 'superadmin' || Auth::user()->tipo == 'admin') {
            return view('administracion.panelcartas', array('arrayCartas'=> $Cartas));
        } else {
            Alert::warning('Error', 'Permisos insuficientes!');
            return redirect()->action('OcafController@getIndex');
        }
    }

    public function getPanelusuarios() {
        $Usuarios = User::all();

        if (Auth::user()->tipo == 'superadmin' || Auth::user()->tipo == 'admin') {
            return view('administracion.panelusuarios', array('arrayUsuarios'=> $Usuarios));
        } else {
            Alert::warning('Error', 'Permisos insuficientes!');
            return redirect()->action('OcafController@getIndex');
        }
    }

}
