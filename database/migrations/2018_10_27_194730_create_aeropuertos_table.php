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
            $table->string('numero_contacto',30);
            $table->string('pais',80);
            $table->string('ciudad',80);
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
        Schema::dropIfExists('aeropuertos');
    }
}
