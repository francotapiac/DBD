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
      /*  DB::unprepared('
            CREATE TRIGGER tr_User_Default_Member_Role AFTER INSERT ON users FOR EACH ROW
            BEGIN
                INSERT INTO usuario_rols (`id_rol`, `id_usuario`, `created_at`,`update_at`) VALUES (2,NEW.id,now(),null); 
                END
                ');*/
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //DB::unprepared('DROP TRIGGER `tr_User_Default_Member_Role`');
    }
}
