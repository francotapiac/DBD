<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVueloAsientosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vuelo_asientos', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            $table->integer('id_vuelo')->unsigned();
            $table->integer('id_asiento')->unsigned();
            $table->foreign('id_vuelo')->references('id_vuelo')->on('vuelos');
            $table->foreign('id_asiento')->references('id_asiento')->on('asientos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vuelo_asientos');
    }
}
