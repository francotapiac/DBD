<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservaActividadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reserva_actividads', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            $table->integer('id_reserva')->unsigned();
            $table->integer('id_actividad')->unsigned();
            $table->foreign('id_reserva')->references('id_reserva')->on('reservas');
            $table->foreign('id_actividad')->references('id_actividad')->on('actividads');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reserva_actividads');
    }
}
