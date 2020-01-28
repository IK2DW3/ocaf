<?php

namespace App\Http\Controllers;

Use Alert;
use App\Task;
use App\Ambito;
use App\Carta;
use App\Continente;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class TaskController extends Controller
{
    public function tableUser(Request $request) {

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

    // ****************************************************************************************** //

    public function tableCard(Request $request){

        return Carta::with('ambito', 'continente')->get();

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
        $task->imgRuta = $request->imgRuta;
        $task->imgDefault = $request->imgDefault;
        $task->enlaceReferencia = $request->enlaceReferencia;
        $task->habilitado = $request->habilitado;
        $task->save();

    }

    public function showCard(Request $request) {

        $task = Carta::findOrFail($request->id);

        return $task;
    }

    public function updateCard(Request $request) {

        $task = Carta::findOrFail($request->id);
        $task->name = $request->name;
        $task->email = $request->email;
        $task->tipo = $request->tipo;
        $task->password = bcrypt($request->password);
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

    /* - -------------------------------------------------------------------------------------------- */
    public function tableAmbit(Request $request) {

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

    /* ----------------------------------------------------------------------------------------------- */
    public function tableContinent(Request $request) {

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

    /* ----------------------------------------------------------------------------------------------- */
    public function tableQuest(Request $request) {

        return Pregunta::orderBy('carta_id')->get();


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

    /* ----------------------------------------------------------------------------------------------- */

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
