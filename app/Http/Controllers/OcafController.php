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
use App\Comentario;

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

        $data['categorys'] = Categoria::all();
        $data['post'] = Post::with('user', 'categoria')->orderBy('created_at', 'DESC')->first();
        $data['posts'] = Post::with('user', 'categoria')->orderBy('created_at', 'DESC')->take(8)->get();
        return view('blog.home', ['data' => $data]);

    }

    public function getPosts() {

        $data['categorys'] = Categoria::all();
        $data['posts'] = Post::with('user', 'categoria')->orderBy('created_at', 'DESC')->get();
        return view('blog.posts', ['data' => $data]);

    }

    public function getPost($id) {

        $data['categorys'] = Categoria::all();
        $data['post'] = Post::findOrFail($id);
        $data['comentarys'] = Comentario::with('user')->where('post_id', $id)->orderBy('created_at', 'desc')->get();
        return view('blog.post', ['data' => $data]);

    }

    public function getPostsByCategory($id) {

        $data['categorys'] = Categoria::all();
        $data['category'] = Categoria::findOrFail($id);
        $data['posts'] = Post::with('user', 'categoria')->where('categoria_id', $id)->orderBy('created_at', 'desc')->get();
        return view('blog.postsbycategory', ['data' => $data]);

    }

    public function getPostsByFilter(Request $request) {

        $data['filter'] = $request->input('post-filter');
        $data['categorys'] = Categoria::all();
        $data['posts'] = Post::with('user', 'categoria')->where('titulo', 'like', '%' . $request->input('post-filter') . '%')->orderBy('created_at', 'DESC')->get();
        return view('blog.postsbyfilter', ['data' => $data]);

    }

    public function postComment(Request $request) {

        $idPost = $request->input('post-postid-comment');

        $Comentario = new Comentario;
        $Comentario->descripcion = $request->input('post-comment');
        $Comentario->post_id = $request->input('post-postid-comment');
        $Comentario->user_id = $request->input('post-userid-comment');
        $Comentario->save();

        $Post = Post::findOrFail($idPost);
        $Post->numero_comentarios = $Post->numero_comentarios + 1;
        $Post->save();
        
        $data['categorys'] = Categoria::all();
        $data['post'] = Post::findOrFail($idPost);
        $data['comentarys'] = Comentario::with('user')->where('post_id', $idPost)->orderBy('created_at', 'desc')->get();
        return redirect()->route('blog.post', [$idPost]);

    }

    public function deletePost($id) {

        Comentario::where('post_id', '=', $id)->delete();
        $Post = Post::findOrFail($id);
        $Post->delete();
        return redirect()->action('OcafController@getBlog');

    }

    public function deleteComment(Request $request) {

        $idPost = $request->input('post-postid-comment');
        $idComentario = $request->input('post-comment-id');

        $Comentario = Comentario::findOrFail($idComentario);
        $Comentario->delete();

        $Post = Post::findOrFail($idPost);
        $Post->numero_comentarios = $Post->numero_comentarios - 1;
        $Post->save();
        
        $data['categorys'] = Categoria::all();
        $data['post'] = Post::findOrFail($idPost);
        $data['comentarys'] = Comentario::with('user')->where('post_id', $idPost)->orderBy('created_at', 'desc')->get();
        return redirect()->route('blog.post', [$idPost]);

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
