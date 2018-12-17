<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAsientosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asientos', function (Blueprint $table) {
            $table->increments('id_asiento');
            $table->integer('numero_asiento');
            $table->string('letra_asiento',5);
            $table->integer('tipo_asiento');
            $table->boolean('disponibilidad');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('asientos');
    }
}
