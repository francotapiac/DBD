<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaqueteTrasladosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paquete__traslados', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
			
			$table->integer('id_paquete')->unsigned();
			$table->integer('id_traslado')->unsigned();
			$table->foreign('id_paquete')->references('id_paquete')->on('paquetes');
            $table->foreign('id_traslado')->references('id_traslado')->on('traslados');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('paquete__traslados');
    }
}
