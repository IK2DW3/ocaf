<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    
    public function up()
    {
        Schema::create('cartas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre', 20);
            $table->string('apellido', 30);
            $table->date('fecha_nacimiento');
            $table->date('fecha_muerte')->nullable();
            $table->string('ambito');
            $table->string('lore', 10000);
            $table->string('zona_geografica');
            $table->string('img_ruta', 500);
            $table->string('enlace_referencia', 500);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cartas');
    }
}
