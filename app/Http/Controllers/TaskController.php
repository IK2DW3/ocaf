<?php

namespace App\Http\Controllers;

use App\Task;
use App\Ambito;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index(Request $request)
    {
        $task = Ambito::all();
        return $task;
        //Esta función nos devolvera todas las tareas que tenemos en nuestra BD
    }

    public function store(Request $request)
    {
        $task = new Ambito();
        $task->ambitoEsp = $request->ambitoEsp;
        $task->ambitoEng = $request->ambitoEng;
        $task->ambitoEus = $request->ambitoEus;

        $task->save();
        //Esta función guardará las tareas que enviaremos mediante vuejs
    }
    public function show(Request $request)
    {
        $task = Ambito::findOrFail($request->id);
        return $task;
        //Esta función devolverá los datos de una tarea que hayamos seleccionado para cargar el formulario con sus datos
    }

    public function update(Request $request)
    {
        $task = Ambito::findOrFail($request->id);

        $task->ambitoEsp = $request->ambitoEsp;
        $task->ambitoEng = $request->ambitoEng;
        $task->ambitoEus = $request->ambitoEus;

        $task->save();

        return $task;
        //Esta función actualizará la tarea que hayamos seleccionado

    }

    public function destroy(Request $request)
    {
        $task = Ambito::destroy($request->id);
        return $task;
        //Esta función obtendra el id de la tarea que hayamos seleccionado y la borrará de nuestra BD
    }
}
