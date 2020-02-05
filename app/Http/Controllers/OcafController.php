<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Cookie;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Controllers\Controller;
use App\Carta;
use App\User;
use App\Ambito;

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
        $registroPersona->name = $request->input('userRegister');
        $registroPersona->email = $request->input('userEmailRegister');
        $registroPersona->password = bcrypt($request->input('userConfirmnPasswordRegister'));
        $registroPersona->save();
        return view('index', array('arrayRegistro'=> $registroPersona));
    }

    public function getGamemode() {
        return view('gamemode');
    }

    public function getTabnormal() {
        return view('tableros.tabnormal');
    }
    
    public function getTabserpiente() {
        return view('tableros.tabserpiente');
    }

    public function getHistorys() {
        return view('historys');
    }

    public function getHistory($id) {
        $Carta = Carta::findOrFail($id);
        return view('history', array('arrayCarta' => $Carta));
    }

    public function getPerfil() {
        return view('administracion.perfil');
    }

    public function getPanel() {
        if (Auth::user()->tipo == 'superadmin' || Auth::user()->tipo == 'admin') {
            return view('administracion.panel');
        } else {
            Alert::warning('Error', 'Permisos insuficientes!');
            return redirect()->action('OcafController@getIndex');
        }
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

    public function getPanelpreguntas() {
        if (Auth::user()->tipo == 'superadmin' || Auth::user()->tipo == 'admin') {
            return view('administracion.panelpreguntas');
        } else {
            Alert::warning('Error', 'Permisos insuficientes!');
            return redirect()->action('OcafController@getIndex');
        }
    }

}
