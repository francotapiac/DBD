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
        Schema::create('paquete_traslados', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
			
			$table->integer('id_paquete')->unsigned()->nullable();
			$table->integer('id_traslado')->unsigned()->nullable();
			$table->foreign('id_paquete')->references('id_paquete')->on('paquetes')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_traslado')->references('id_traslado')->on('traslados')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('paquete_traslados');
    }
}
