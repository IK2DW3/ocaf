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
            $table->string('fechaNacimiento',10);
            $table->string('fechaMuerte',10)->nullable();
            $table->unsignedInteger('codAmbito');
            $table->string('loreEsp', 5000)->nullable();
            $table->string('loreEng', 5000)->nullable();
            $table->string('loreEus', 5000)->nullable();
            $table->string('zonaGeografica')->nullable();
            $table->unsignedInteger('codContinente');
            $table->string('imgRuta', 64)->nullable();
            $table->string('imgDefault', 512)->nullable();
            $table->string('enlaceReferencia', 500)->nullable();
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
