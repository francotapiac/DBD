<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEscalasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('escalas', function (Blueprint $table) {
            $table->increments('id_escala');
            $table->boolean('cambio_avion');
            $table->boolean('cambio_aeropuerto');
            $table->integer('duracion_escala');
            $table->timestamps();

            $table->integer('id_lugar')->unsigned()->nullable();
            $table->foreign('id_lugar')->references('id_lugar')->on('lugars')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('escalas');
    }
}
