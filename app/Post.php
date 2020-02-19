<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // Parametros iniciales
    protected $table = 'posts';
    public $timestamps = true;

    protected $fillable = ['titulo', 'descripcion', 'imagen', 'numero_comentarios', 'user_id'];

    // Funciones
    public function categoria() {
        return $this->belongsTo('App\Categoria');
    }
    public function comentario() {
        return $this->hasMany('App\Comentario');
    }
}
