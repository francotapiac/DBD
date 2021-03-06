<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TrActualizarRolUsuario extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('
        CREATE OR REPLACE FUNCTION asignarRol()
        RETURNS trigger AS
        $$
        BEGIN
            INSERT INTO usuario_rols (id_usuario,id_rol) VALUES (NEW.id,2);
            RETURN NULL;
        END
        $$ LANGUAGE plpgsql;
        ');

        DB::unprepared('
        CREATE TRIGGER usuario_rol AFTER INSERT ON users FOR EACH ROW
        EXECUTE PROCEDURE asignarRol();
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
