<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    // Parametros iniciales
    protected $table = 'categorias';
    public $timestamps = false;

    protected $fillable = ['nombre', 'descripcion', 'numero_posts'];

    // Funciones
    public function post() {
        return $this->hasMany('App\Post');
    }
}
