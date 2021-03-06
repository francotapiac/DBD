<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHabitacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('habitacions', function (Blueprint $table) {
            $table->increments('id_habitacion');
            $table->text('descripcion');
            $table->integer('capacidad');
            $table->decimal('precio_noche');
            $table->boolean('disponibilidad');
            $table->date('fecha_llegada');
            $table->date('fecha_ida');
            $table->timestamps();

            $table->integer('id_hotel')->unsigned()->nullable();
        
            $table->foreign('id_hotel')->references('id_hotel')->on('hotels')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('habitacions');
    }
}
