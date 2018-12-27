<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTrigger extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /*DB::statement('
            CREATE OR REPLACE FUNCTION llenarReserva() RETURNS TRIGGER AS 
            $$
            DECLARE
            id INTEGER := NEW.id;
            BEGIN
                INSERT INTO reservas VALUES(id,now(),now(), \'sin datos\',1,now(),now());
                RETURN NULL;
            END
            $$ LANGUAGE plpgsql;
        ');
        DB::unprepared('
        CREATE TRIGGER insertar_reserva AFTER INSERT ON users FOR EACH ROW
        EXECUTE PROCEDURE llenarReserva();
        ');
    */
        
      
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
