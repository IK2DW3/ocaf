<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // Parametros iniciales
    protected $table = 'posts';
    public $timestamps = true;

    protected $fillable = ['titulo', 'descripcion', 'imagen', 'numero_comentarios', 'categoria_id', 'user_id'];

    // Funciones
    public function categoria() {
        return $this->belongsTo('App\Categoria');
    }
    public function user() {
        return $this->belongsTo('App\User');
    }
    public function comentario() {
        return $this->hasMany('App\Comentario');
    }
}
