<?php

namespace App\Http\Controllers;

use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\Storage;
use Validator,Redirect;

class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pruebas');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        
        // file validation
        $validator = Validator::make($request->all(),
           ['filename' => 'required|mimes:jpeg,png,jpg,bmp|max:2048']);
 
        // if validation fails
        if($validator->fails()) {
            return Alert::info('Imagen', 'Fallo en validacion de imagen');
        }
    
        // if validation success
        if($file = $request->file('filename')) {

            $name = $file->getClientOriginalName();
            
            $target_path = public_path('../resources/img/cartas/');
            
                if($file->move($target_path, $name)) {                
                   return Alert::info('Imagen', 'Imagen subida correctamente');
                }
        }
        /*
            $name = $request->file('filename')->getClientOriginalName();
            //$extension = $request->file('filename')->extension();

            //Storage::putFileAs('filename', new File('./../resources/img/cartas'), $name);

            //Storage::disk('local')->put($name, 'Contents');

            //$path = Storage::putFile('./resources/img/cartas', $request->file('filename'));
            //$path = Storage::putFileAs('./resources/img/cartas', $request->file('filename'), $name);
            //$path = $request->file('filename')->store('./resources/img/cartas');
            $target_path = public_path('../resources/img/cartas/');

            $request->file('filename')->move($target_path, $name);

            echo('imagen subida corectamente');
        */

        /**
         * $fileName = $request->file->getClientOriginalName();
         * $request->file->move(public_path('../resources/img/cartas'), $fileName);
        */

        /**
         * $data = request()->validate([
         *      'name' => 'required',
         *       'email' => 'required|email',
         *       'message' => 'required',
         *   ]);
         */
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
