<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRolPermisosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rol_permisos', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            $table->integer('id_rol')->unsigned()->nullable();
            $table->integer('id_permiso')->unsigned()->nullable();
            //este id rol es de esta table       la referencia es de la otra tabla
            $table->foreign('id_rol')->references('id_rol')->on('rols')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_permiso')->references('id_permiso')->on('permisos')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rol_permisos');
    }
}
