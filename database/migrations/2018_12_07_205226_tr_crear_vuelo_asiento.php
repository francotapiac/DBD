<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TrCrearVueloAsiento extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('
            CREATE OR REPLACE FUNCTION llenarAsientos() RETURNS TRIGGER AS 
            $$
            DECLARE
            cantidadAsiento INTEGER := 32;
            contador INTEGER := 0;
            id INTEGER := NEW.id_vuelo;
            BEGIN
                LOOP
                    EXIT WHEN contador = cantidadAsiento;
                    contador := contador + 1;
                    INSERT INTO vuelo_asientos( id_vuelo, id_asiento) VALUES 
                        (id, contador);

                END LOOP;
                RETURN NEW;
            END
            $$ LANGUAGE plpgsql;
        ');
        DB::unprepared('
        CREATE TRIGGER tr_vuelo_asiento AFTER INSERT ON vuelos FOR EACH ROW
        EXECUTE PROCEDURE llenarAsientos();
        ');
    
        
      
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::dropIfExists('trigger');
    }
}
