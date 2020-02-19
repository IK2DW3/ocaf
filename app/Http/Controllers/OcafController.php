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
use App\Categoria;
use App\Post;

class OcafController extends Controller
{
    // Inicio de las funciones
    public function getHome() {
        return  redirect()->action('LoginController@login');
    }

    /**
     * Registro de usuarios en la aplicacion
     */
    public function postRegister(Request $request) {
        $registroPersona = new User;
        $registroPersona->name = $request->input('userRegister');
        $registroPersona->email = $request->input('userEmailRegister');
        $registroPersona->password = bcrypt($request->input('userConfirmnPasswordRegister'));
        $registroPersona->save();
        return view('index', array('arrayRegistro'=> $registroPersona));
    }
    
    public function getPerfil() {
        return view('administracion.perfil');
    }

    /**
     * Inicio de la aplicaion
     */
    public function getIndex() {
        return view('index');
    }

    /**
     * Funciones para las historias
     */
    public function getHistorys() {
        return view('historys');
    }

    public function getHistory($id) {
        $Carta = Carta::findOrFail($id);
        return view('history', array('arrayCarta' => $Carta));
    }
    
    /**
     * Funciones para el juego
     */
    public function getMode() {
        return view('mode');
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

    /**
     * Funciones para el blog
     */
    public function getBlog() {
        $data['post'] = Post::with('user', 'categoria')->orderBy('created_at', 'DESC')->first();
        $data['posts'] = Post::with('user', 'categoria')->orderBy('created_at', 'DESC')->take(8)->get();
        $data['categorys'] = Categoria::all();
        return view('blog.home', ['data' => $data]);
    }
    public function getPosts() {
        return view('blog.posts');
    }
    public function getPost($id) {
        return view('blog.post');
    }

    /**
     * Gestion de la base de datos desde la aplicacion
     */
    public function getPanelgestion() {
        if (Auth::user()->rango_id === 1 || Auth::user()->rango_id === 2) {
            return view('administracion.panelgestion');
        } else {
            Alert::warning('Error', 'Permisos insuficientes!');
            return redirect()->action('OcafController@getIndex');
        }
    }

}
