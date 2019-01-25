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
            $table->decimal('duracion_vuelo');
            $table->decimal('precio');
            $table->integer('numero_paradas');
            $table->boolean('tipo_vuelo');
            $table->integer('equipaje');
            $table->boolean('disponibilidad');
            $table->string('aerolinea',70);
            $table->string('ciudad_origen',70);
            $table->string('pais_origen',70);
            $table->string('ciudad_destino',70);
            $table->string('pais_destino',70);


            $table->integer('id_aeropuerto_origen')->unsigned()->nullable();
            $table->integer('id_aeropuerto_destino')->unsigned()->nullable();
        
            $table->foreign('id_aeropuerto_origen')->references('id_aeropuerto')->on('aeropuertos')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_aeropuerto_destino')->references('id_aeropuerto')->on('aeropuertos')->onDelete('cascade')->onUpdate('cascade');

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
