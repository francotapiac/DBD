<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVehiculosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehiculos', function (Blueprint $table) {
            $table->increments('id_vehiculo');
            $table->date('fecha_recogida');
            $table->date('fecha_devolucion');
            $table->string('compania',45);
            $table->decimal('precio_diario');
            $table->string('nombre',40);
            $table->integer('capacidad');
            $table->boolean('disponibilidad');
            $table->timestamps();

            $table->integer('id_reserva')->unsigned();
            $table->integer('id_lugar')->unsigned();
            //este id rol es de esta table       la referencia es de la otra tabla
            $table->foreign('id_reserva')->references('id_reserva')->on('reservas');
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
        Schema::dropIfExists('vehiculos');
    }
}
