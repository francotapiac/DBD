<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsuarioRolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuario_rols', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            $table->integer('id_usuario')->unsigned();
            $table->integer('id_rol')->unsigned();
            //este id rol es de esta table       la referencia es de la otra tabla
            $table->foreign('id_usuario')->references('id')->on('users');
            $table->foreign('id_rol')->references('id_rol')->on('rols');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuario_rols');
    }
}
