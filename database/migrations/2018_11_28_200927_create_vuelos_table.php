<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVuelosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vuelos', function (Blueprint $table) {
            $table->increments('id_vuelo');
            $table->date('fecha_ida');
            $table->date('fecha_vuelta');
            $table->time('hora_salida');
            $table->time('hora_llegada');
            $table->time('duracion_vuelo');
            $table->decimal('precio');
            $table->integer('numero_paradas');
            $table->boolean('tipo_vuelo');
            $table->integer('equipaje');
            $table->boolean('disponibilidad');
            $table->string('aerolinea',70);

            $table->integer('id_aeropuerto_origen')->unsigned();
            $table->integer('id_aeropuerto_destino')->unsigned();
            $table->integer('id_lugar')->unsigned();
            $table->integer('id_seguro')->unsigned();
            //este id rol es de esta table       la referencia es de la otra tabla
            $table->foreign('id_aeropuerto_origen')->references('id_aeropuerto')->on('aeropuertos');
            $table->foreign('id_aeropuerto_destino')->references('id_aeropuerto')->on('aeropuertos');
            $table->foreign('id_lugar')->references('id_lugar')->on('lugars');
            $table->foreign('id_seguro')->references('id_seguro')->on('seguros');

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
        Schema::dropIfExists('vuelos');
    }
}
