<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pregunta extends Model
{
    //
    protected $table = 'preguntas';
    public $timestamps = false;

    protected $fillable = ['pregunta', 'respuesta_1', 'respuesta_2', 'respuesta_3', 'carta_id'];


    public function carta() {
        return $this->belongsTo('App\Carta');
    }

}
