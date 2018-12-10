<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActividadLugarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actividad_lugars', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            $table->integer('id_lugar')->unsigned()->nullable();
            $table->integer('id_actividad')->unsigned()->nullable();
            $table->foreign('id_lugar')->references('id_lugar')->on('lugars')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_actividad')->references('id_actividad')->on('actividads')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('actividad_lugars');
    }
}
