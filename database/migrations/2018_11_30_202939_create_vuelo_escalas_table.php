<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVueloEscalasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vuelo_escalas', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            $table->integer('id_vuelo')->unsigned();
            $table->integer('id_escala')->unsigned();
            $table->foreign('id_vuelo')->references('id_vuelo')->on('vuelos');
            $table->foreign('id_escala')->references('id_escala')->on('escalas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vuelo_escalas');
    }
}
