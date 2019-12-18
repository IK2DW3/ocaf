<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use Alert;

class OcafController extends Controller
{
    //
    public function getIndex() {
        return view('index');
    }

    public function getMode() {
        return view('mode');
    }

    public function getGamemode($id) {
        $mode = $request->input('mode');
        return view('gamemode', array('gamemodes' => $mode));
    }
}
