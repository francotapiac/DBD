<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservaHabitacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reserva_habitacions', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            $table->integer('id_reserva')->unsigned()->nullable();
            $table->integer('id_habitacion')->unsigned()->nullable();
            $table->foreign('id_reserva')->references('id_reserva')->on('reservas')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_habitacion')->references('id_habitacion')->on('habitacions')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reserva_habitacions');
    }
}
