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
        Schema::dropIfExists('vehiculos');
    }
}
