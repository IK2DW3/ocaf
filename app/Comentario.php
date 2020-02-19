<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    // Parametros iniciales
    protected $table = 'comentarios';
    public $timestamps = true;

    protected $fillable = ['descripcion', 'post_id', 'user_id'];

    // Funciones
    public function usuario() {
        return $this->belongsTo('App\User');
    }

    public function post() {
        return $this->belongsTo('App\Post');
    }

}
