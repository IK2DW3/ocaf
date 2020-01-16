<?php

namespace App\Http\Controllers;

use App\Task;
use App\Ambito;
use App\User;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function tableUser(Request $request)
    {
        $task = User::all();
        return $task;
        //Esta función nos devolvera todas las tareas que tenemos en nuestra BD
    }

    public function storeUser(Request $request)
    {
        $task = new User();
        $task->name = $request->name;
        $task->email = $request->email;
        $task->tipo = $request->tipo;
        $task->password = bcrypt($request->password);

        $task->save();
        //Esta función guardará las tareas que enviaremos mediante vuejs
    }
    public function showUser(Request $request)
    {
        $task = User::findOrFail($request->id);
        return $task;
        //Esta función devolverá los datos de una tarea que hayamos seleccionado para cargar el formulario con sus datos
    }

    public function updateUser(Request $request)
    {
        $task = User::findOrFail($request->id);

        $task->name = $request->name;
        $task->email = $request->email;
        $task->tipo = $request->tipo;
        $task->password = bcrypt($request->password);

        $task->save();

        return $task;
        //Esta función actualizará la tarea que hayamos seleccionado

    }

    public function destroyUser(Request $request)
    {
        $task = User::destroy($request->id);
        return $task;
        //Esta función obtendra el id de la tarea que hayamos seleccionado y la borrará de nuestra BD
    }
}
