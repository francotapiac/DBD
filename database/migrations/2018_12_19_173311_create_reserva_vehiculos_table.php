<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservaVehiculosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reserva_vehiculos', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            $table->integer('id_reserva')->unsigned()->nullable();
            $table->integer('id_vehiculo')->unsigned()->nullable();
            $table->foreign('id_reserva')->references('id_reserva')->on('reservas')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_vehiculo')->references('id_vehiculo')->on('vehiculos')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reserva_vehiculos');
    }
}
