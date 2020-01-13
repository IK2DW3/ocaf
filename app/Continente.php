<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Continente extends Model
{
    // Parametros iniciales
    protected $table = 'continentes';

    // Funciones
    public function carta() {
        return $this->hasMany('App\Carta');
    }

}
