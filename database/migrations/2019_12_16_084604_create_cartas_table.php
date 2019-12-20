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
        Schema::enableForeignKeyConstraints();
        Schema::create('cartas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre', 50);
            $table->string('apellido', 50);
            $table->string('fecha_nacimiento',10);
            $table->string('fecha_muerte',10)->nullable();
            $table->unsignedInteger('codAmbito');
            $table->string('lore', 10000);
            $table->string('zona_geografica');
            $table->unsignedInteger('codContinente');
            $table->string('img_ruta', 500)->nullable();
            $table->string('enlace_referencia', 500);
            $table->unsignedInteger('codUsuario')->nullable();
            $table->boolean('habilitado')->default(false);
            $table->timestamps();

            $table->foreign('codAmbito')->references('id')->on('ambitos');
            $table->foreign('codContinente')->references('id')->on('continentes');
            $table->foreign('codUsuario')->references('id')->on('users');
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
