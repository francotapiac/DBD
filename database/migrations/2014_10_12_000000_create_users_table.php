<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('primer_nombre',45);
            $table->string('segundo_nombre',45);
            $table->string('primer_apellido',36);
            $table->string('segundo_apellido',36);
            $table->string('email')->unique();
            $table->date('fecha_nacimiento');
            $table->integer('edad');
            $table->string('ciudad_residencia',100);
            $table->string('calle_residencia',100);
            $table->string('pais_residencia',60);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('numero_celular',30);
            $table->integer('tipo_documento');
            $table->integer('tipo_pago');
            $table->integer('estado');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
