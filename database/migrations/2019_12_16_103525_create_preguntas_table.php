<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePreguntasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::enableForeignKeyConstraints();
        Schema::create('preguntas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('pregunta', 100);
            $table->string('respuesta_1', 100);
            $table->string('respuesta_2', 30);
            $table->string('respuesta_3', 30);
            $table->unsignedInteger('carta_id');
            $table->foreign('carta_id')->references('id')->on('cartas');
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
        Schema::dropIfExists('preguntas');
    }
}
