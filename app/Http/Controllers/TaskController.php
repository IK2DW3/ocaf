<?php

namespace App\Http\Controllers;

use App\Task;
use App\Rango;
use App\User;
use App\Ambito;
use App\Continente;
use App\Carta;
use App\Pregunta;
use App\Categoria;
use App\Post;
use App\Comentario;
use Illuminate\Support\Facades\Validator;
use Redirect;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\FileIlluminate\Http\UploadedFile;
use Illuminate\Filesystem\Filesystem;
use RealRashid\SweetAlert\Facades\Alert;


class TaskController extends Controller {

    /**
     * Metodo para la tabla de rangos
     */
    public function tableRank(Request $request) {
        // Devovler la tabla con un orden
        $results = Rango::all();
        return $results;

    }

    public function storeRank(Request $request) {

        $task = new Rango();
        $task->rango = $request->rango;
        $task->descripcion = $request->descripcion;
        $task->save();


    }

    public function showRank(Request $request) {

        $task = Rango::findOrFail($request->id);
        return $task;

    }

    public function updateRank(Request $request) {

        $task = Rango::findOrFail($request->id);
        $task->name = $request->name;
        $task->email = $request->email;
        $task->tipo = $request->tipo;
        $task->password = bcrypt($request->password);
        $task->save();
        return $task;

    }

    public function destroyRank(Request $request) {

        if ($request->id == 1 || $request->id == 2 || $request->id == 3 || $request->id == 4){
            return false;
        } else {
            $task = Rango::destroy($request->id);
            return $task;
        }

    }

    /**
     * Metodo para la tabla de usuarios
     */
    public function tableUser(Request $request) {
        // Devovler la tabla con un orden
        return User::with('rango')->get();

    }

    public function storeUser(Request $request) {

        if (Auth::user()->rango_id === 3 && $request->tipo === 3 || Auth::user()->rango_id === 3 && $request->tipo === 4) {
            return false;
        } else {
            $task = new User();
            $task->name = $request->name;
            $task->email = $request->email;
            $task->rango_id = $request->tipo;
            $task->password = bcrypt($request->password);
            $task->save();
        }
        
    }

    public function showUser(Request $request) {

        $task = User::findOrFail($request->id);
        return $task;

    }

    public function updateUser(Request $request) {

        $task = User::findOrFail($request->id);
        $task->name = $request->name;
        $task->email = $request->email;
        $task->rango_id = $request->rango_id;
        if ($request->password == '') {
            $task->password = bcrypt('1234567890');
        } else {
            $task->password = bcrypt($request->password);
        }
        $task->save();
        return $task;

    }

    public function destroyUser(Request $request) {

        if (Auth::user()->rango_id === 3 && $request->tipo === 3 || Auth::user()->rango_id === 3 && $request->tipo === 4) {
            return false;
        } else {
            $task = User::destroy($request->id);
            return $task;
        }
        
    }

    /**
     * Metodo para la tabla de ambitos
     */
    public function tableAmbit(Request $request) {
        // Devovler la tabla con un orden
        return Ambito::orderBy('ambitoEsp')->get();

    }

    public function storeAmbit(Request $request){

        $task = new Ambito();
        $task->ambitoEsp = $request->ambitoEsp;
        $task->ambitoEng = $request->ambitoEng;
        $task->ambitoEus = $request->ambitoEus;
        $task->save();


    }

    public function showAmbit(Request $request) {

        $task = Ambito::findOrFail($request->id);
        return $task;

    }

    public function updateAmbit(Request $request) {

        $task = Ambito::findOrFail($request->id);
        $task->ambitoEsp = $request->ambitoEsp;
        $task->ambitoEng = $request->ambitoEng;
        $task->ambitoEus = $request->ambitoEus;
        $task->save();
        Alert::success('Success', 'Datos actualizados correctamente');
        return $task;
    }

    public function destroyAmbit(Request $request) {

        $task = Ambito::destroy($request->id);
        return $task;

    }

    /**
     * Metodo para la tabla de continentes
     */
    public function tableContinent(Request $request) {
        // Devovler la tabla
        return Continente::all();
    }

    public function storeContinent(Request $request){

        $task = new Continente();
        $task->continenteEsp = $request->continenteEsp;
        $task->continenteEng = $request->continenteEng;
        $task->continenteEus = $request->continenteEus;
        $task->save();
    }

    public function showContinent(Request $request) {

        $task = Continente::findOrFail($request->id);

        return $task;
    }

    public function updateContinent(Request $request) {

        $task = Continente::findOrFail($request->id);
        $task->continenteEsp = $request->continenteEsp;
        $task->continenteEng = $request->continenteEng;
        $task->continenteEus = $request->continenteEus;
        $task->save();

        return $task;
    }

    public function destroyContinent(Request $request) {

        $task = Continente::destroy($request->id);
        return $task;

    }
    
    /**
     * Metodo para la tabla de cartas
     */
    public function tableCard(Request $request){

        return Carta::with('ambito', 'continente')->get();

    }

    public function uploadImage(Request $request) {
        
        /* Metodo para subir archivos */
        $fileName = $request->file->getClientOriginalName();
        $request->file->move(public_path('../resources/img/cartas'), $fileName);
        /* Devolver la informacion */
        return alert('Imagen subida correctamente');

    }

    public function storeCard(Request $request){

        $task = new Carta();
        $task->nombre = $request->nombre;
        $task->apellido = $request->apellido;
        $task->fechaNacimiento = $request->fechaNacimiento;
        $task->fechaMuerte = $request->fechaMuerte;
        $task->ambito_id = $request->ambito_id;
        $task->loreEsp = $request->loreEsp;
        $task->loreEng = $request->loreEng;
        $task->loreEus = $request->loreEus;
        $task->zonaGeografica = $request->zonaGeografica;
        $task->continente_id = $request->continente_id;
        
        if (!($request->imgRuta == "") || !($request->imgRuta == null)) {
            $task->imgRuta = $request->imgRuta;
        } else {
            $task->imgRuta = '';
        }
        
        $task->imgDefault = $request->imgDefault;
        $task->enlaceReferencia = $request->enlaceReferencia;
        if ($request->habilitado == true || $request->habilitado == 1) {
            $request->habilitado == 1;
            $task->habilitado = $request->habilitado;
        } else {
            $request->habilitado == 0;
            $task->habilitado = $request->habilitado;
        }
        $task->save();

    }

    public function showCard(Request $request) {

        $task = Carta::findOrFail($request->id);

        return $task;
    }

    public function updateCard(Request $request) {

        $task = Carta::findOrFail($request->id);
        $task->nombre = $request->nombre;
        $task->apellido = $request->apellido;
        $task->fechaNacimiento = $request->fechaNacimiento;
        $task->fechaMuerte = $request->fechaMuerte;
        $task->ambito_id = $request->ambito_id;
        $task->loreEsp = $request->loreEsp;
        $task->loreEng = $request->loreEng;
        $task->loreEus = $request->loreEus;
        $task->zonaGeografica = $request->zonaGeografica;
        $task->continente_id = $request->continente_id;
        $task->imgRuta = $request->imgRuta;
        $task->imgDefault = $request->imgDefault;
        $task->enlaceReferencia = $request->enlaceReferencia;
        if ($request->habilitado == true || $request->habilitado == 1) {
            $request->habilitado == 1;
            $task->habilitado = $request->habilitado;
        } else {
            $request->habilitado == 0;
            $task->habilitado = $request->habilitado;
        }
        $task->save();
        return $task;
    }

    public function destroyCard(Request $request) {

        $task = Carta::destroy($request->id);
        return $task;

    }

    public function filterCard(Request $request) {

        $task = Carta::with('ambito')->where('ambito_id',$request->ambito_id)->orderBy('nombre', 'asc')->get();
        return $task;

    }

    /**
     * Metodo para la tabla de preguntas
     */
    public function tableQuest(Request $request) {

        return Pregunta::with('carta')->get();

    }

    public function storeQuest(Request $request){

        $task = Pregunta::findOrFail($request->id);
        $task->carta_id = $request->carta_id;
        $task->pregunta = $request->pregunta;
        $task->respuesta_1 = $request->respuesta_1;
        $task->respuesta_2 = $request->respuesta_2;
        $task->respuesta_3 = $request->respuesta_3;
        $task->save();
    }

    public function showQuest(Request $request) {

        $task = Pregunta::findOrFail($request->id);

        return $task;
    }

    public function updateQuest(Request $request) {

        $task = Pregunta::findOrFail($request->id);
        $task->carta_id = $request->carta_id;
        $task->pregunta = $request->pregunta;
        $task->respuesta_1 = $request->respuesta_1;
        $task->respuesta_2 = $request->respuesta_2;
        $task->respuesta_3 = $request->respuesta_3;

        $task->save();

        return $task;
    }

    public function destroyQuest(Request $request) {

        $task = Pregunta::destroy($request->id);
        return $task;

    }

    /**
     * Metodo para el perfil del usuario
     */
    public function getProfile(Request $request) {

        if (Auth::check()) {
            $data['user'] = Auth::user();
            $data['categorys'] = Categoria::all();
            $data['post'] = Post::with('categoria')->where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->get();
            return ['data' => $data];
        }

    }

    public function updateProfile(Request $request) {

        if (Auth::check()) {
            $userUp = User::findOrFail($request->id);
            $userUp->password = bcrypt($request->password);
            $userUp->save();
            return $userUp;
        } else {
            return view('index');
        }

    }

    public function showProfilePost(Request $request) {

        $task = Post::findOrFail($request->id);
        return $task;

    }

    public function storeProfilePost(Request $request){

        $task = Post::findOrFail($request->id);
        $task->titulo = $request->titulo;
        $task->descripcion = $request->descripcion;
        $task->categoria_id = $request->categoria_id;
        $task->save();

    }

    public function updateProfilePost(Request $request) {

        $task = Post::findOrFail($request->id);
        $task->titulo = $request->titulo;
        $task->descripcion = $request->descripcion;
        $task->imagen = $request->imagen;
        $task->categoria_id = $request->categoria_id;
        $task->user_id = $request->user_id;
        $task->save();
        return $task;

    }

    public function destroyProfilePost(Request $request) {

        $task = Post::destroy($request->id);
        return $task;

    }

    /**
     * Metodo para el blog
     */
    public function getBloghome() {
        $post = Post::orderBy('created_at', 'DESC')->take(5)->get();
        return $post;
    }

}
