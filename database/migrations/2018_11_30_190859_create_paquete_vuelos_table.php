<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaqueteVuelosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paquete_vuelos', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
			
			$table->integer('id_paquete')->unsigned()->nullable();
			$table->integer('id_vuelo')->unsigned()->nullable();
			$table->foreign('id_paquete')->references('id_paquete')->on('paquetes')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('paquete_vuelos');
    }
}
