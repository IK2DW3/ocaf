<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pregunta extends Model
{
    //
    protected $table = 'preguntas';
    public $timestamps = false;

    public function carta() {
        return $this->belongsTo('App\Carta');
    }

}
