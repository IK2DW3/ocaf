<?php

namespace App\Http\Controllers;

use App\Task;
use App\User;
use App\Ambito;
use App\Continente;
use App\Carta;
use App\Pregunta;
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
     * Metodo para la tabla de usuarios
     */
    public function tableUser(Request $request) {
        // Devovler la tabla con un orden
        $results = User::orderBy('name')->get();
        return $results;

    }

    public function storeUser(Request $request) {

        $task = new User();
        $task->name = $request->name;
        $task->email = $request->email;
        $task->tipo = $request->tipo;
        $task->password = bcrypt($request->password);
        $task->save();


    }

    public function showUser(Request $request) {

        $task = User::findOrFail($request->id);
        return $task;

    }

    public function updateUser(Request $request) {

        $task = User::findOrFail($request->id);
        $task->name = $request->name;
        $task->email = $request->email;
        $task->tipo = $request->tipo;
        $task->password = bcrypt($request->password);
        $task->save();
        return $task;

    }

    public function destroyUser(Request $request) {

        $task = User::destroy($request->id);
        return $task;

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
    public function getPerfiluser(Request $request) {

        if (Auth::check()) {
            $user = Auth::user();
            return $user;
        }

    }

    public function updatePerfiluser(Request $request) {

        if (Auth::check()) {
            $userUp = User::findOrFail($request->id);
            $userUp->password = bcrypt($request->password);
            $userUp->save();
            return $userUp;
        } else {
            return view('index');
        }

    }

}
