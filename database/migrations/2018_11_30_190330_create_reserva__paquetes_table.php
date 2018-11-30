<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservaPaquetesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reserva__paquetes', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
			
			$table->integer('id_reserva')->unsigned();
			$table->integer('id_paquete')->unsigned();
			$table->foreign('id_reserva')->references('id_reserva')->on('reservas');
            $table->foreign('id_paquete')->references('id_paquete')->on('paquetes');
			
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reserva__paquetes');
    }
}
