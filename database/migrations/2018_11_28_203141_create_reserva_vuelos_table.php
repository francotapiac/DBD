<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservaVuelosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reserva_vuelos', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            $table->integer('id_reserva')->unsigned()->nullable();
            $table->integer('id_vuelo')->unsigned()->nullable();
            $table->foreign('id_reserva')->references('id_reserva')->on('reservas')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_vuelo')->references('id_vuelo')->on('vuelos')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reserva_vuelos');
    }
}
