<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAeropuertosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aeropuertos', function (Blueprint $table) {
            $table->increments('id_aeropuerto');
            $table->string('nombre_aeropuerto',70);
            $table->boolean('tipo_aeropuerto');
            $table->string('numero_contacto',20);
            $table->timestamps();

            $table->integer('id_lugar')->unsigned();
            $table->foreign('id_lugar')->references('id_lugar')->on('lugars');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('aeropuertos');
    }
}
