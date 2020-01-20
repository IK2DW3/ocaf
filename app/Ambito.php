<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ambito extends Model
{
    // Parametros iniciales
    protected $table = 'ambitos';

    protected $fillable = ['ambitoEsp', 'ambitoEng', 'ambitoEus'];

    // Funciones
    public function carta() {
        return $this->hasMany('App\Carta');
    }

}
