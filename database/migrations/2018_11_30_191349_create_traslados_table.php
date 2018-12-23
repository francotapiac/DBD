<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrasladosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('traslados', function (Blueprint $table) {
            $table->increments('id_traslado');
			$table->decimal('precio');
			$table->integer('capacidad');
			$table->string('compania',70);
			$table->date('fecha_traslado');
			$table->string('direccion_destino',200);
			$table->integer('tipo_traslado');
            $table->timestamps();
			
			$table->integer('id_reserva')->unsigned()->nullable();
            $table->foreign('id_reserva')->references('id_reserva')->on('reservas')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('traslados');
    }
}
