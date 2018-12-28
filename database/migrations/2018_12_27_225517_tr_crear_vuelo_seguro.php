<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TrCrearVueloSeguro extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('
        CREATE OR REPLACE FUNCTION llenarSeguros()
         RETURNS trigger AS
        $$
        BEGIN
            INSERT INTO vuelo_seguros (id_vuelo,id_seguro) VALUES (NEW.id_vuelo,1);
            RETURN NULL;
        END
        $$ LANGUAGE plpgsql;
        ');

        DB::unprepared('
        CREATE TRIGGER vuelo_seguro AFTER INSERT ON vuelos FOR EACH ROW
        EXECUTE PROCEDURE llenarSeguros();
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
