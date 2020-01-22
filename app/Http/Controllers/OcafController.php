<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Carta;
use App\User;
use App\Ambito;
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
        $this->validate($request, ['email'=>'required|min:255',
        'password'=>'required|min:8',
        'newusername'=>'required|min:1'
        ]);

        User::create([
            'newusername'=>$request->get('newusername'),
            'email'=>$request->get('email'),
            'confirmnewpassword'=>$request->get('confirmnewpassword'),
        ]);
   
        return back()->with('mensaje','Usuario creado');
    }

    public function getGamemode(Request $request) {
        $mode = $request->input('mode');
        return view('gamemode', array('gamemode' => $mode));
    }

    public function getHistorys() {
        return view('historys');
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

    public function getPanelusuarios() {
        if (Auth::user()->tipo == 'superadmin' || Auth::user()->tipo == 'admin') {
            return view('administracion.panelusuarios');
        } else {
            Alert::warning('Error', 'Permisos insuficientes!');
            return redirect()->action('OcafController@getIndex');
        }
    }

    public function getPanelambitos() {
        if (Auth::user()->tipo == 'superadmin' || Auth::user()->tipo == 'admin') {
            return view('administracion.panelambitos');
        } else {
            Alert::warning('Error', 'Permisos insuficientes!');
            return redirect()->action('OcafController@getIndex');
        }
    }

    public function getPanelcontinentes() {
        if (Auth::user()->tipo == 'superadmin' || Auth::user()->tipo == 'admin') {
            return view('administracion.panelcontinentes');
        } else {
            Alert::warning('Error', 'Permisos insuficientes!');
            return redirect()->action('OcafController@getIndex');
        }
    }

    public function getPanelcartas() {
        if (Auth::user()->tipo == 'superadmin' || Auth::user()->tipo == 'admin') {
            return view('administracion.panelcartas');
        } else {
            Alert::warning('Error', 'Permisos insuficientes!');
            return redirect()->action('OcafController@getIndex');
        }
    }

}
