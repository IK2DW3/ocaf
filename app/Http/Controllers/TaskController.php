<?php

namespace App\Http\Controllers;

use App\Task;
use App\Ambito;
use App\Carta;
use App\Continente;
use App\User;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function tableUser(Request $request) {

        $task = User::all();
        return $task;

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
        $task->name = $request->name;
        $task->email = $request->email;
        $task->tipo = $request->tipo;
        $task->password = bcrypt($request->password);
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

    /* - -------------------------------------------------------------------------------------------- */
    public function tableAmbit(Request $request) {

        return Ambito::all();

    }

    /* ----------------------------------------------------------------------------------------------- */
    public function tableContinent(Request $request) {

        return Continente::all();
        
    }
}
