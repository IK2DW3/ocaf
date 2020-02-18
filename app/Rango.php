<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rango extends Model
{
    //
    protected $table = 'rangos';
    public $timestamps = false;

    protected $fillable = ['rango','descripcion'];

    // Funciones
    public function usuario() {
        return $this->hasMany('App\User');
    }
}
