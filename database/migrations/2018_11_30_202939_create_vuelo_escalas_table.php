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

            $table->integer('id_vuelo')->unsigned()->nullable();
            $table->integer('id_escala')->unsigned()->nullable();
            $table->foreign('id_vuelo')->references('id_vuelo')->on('vuelos')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_escala')->references('id_escala')->on('escalas')->onDelete('cascade')->onUpdate('cascade');
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
