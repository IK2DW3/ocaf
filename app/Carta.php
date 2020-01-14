<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carta extends Model
{
    // Parametros iniciales
    protected $link1 = 'ambitos';
    protected $table = 'cartas';
    protected $link2 = 'continentes';

    protected $fillable = ['nombre', 'apellido', 'fechaNacimiento', 'fechaMuerte', 'ambito_id', 'loreEsp', 'loreEng', 'loreEus', 'zonaGeografica', 'continente_id', 'imgRuta', 'imgDefault', 'enlaceReferencia', 'habilitado'];

    // Funciones
    public function ambito() {
        return $this->belongsTo('App\Ambito');
    }

    public function continente() {
        return $this->belongsTo('App\Continente');
    }

}
