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
<<<<<<< Updated upstream
      /*  DB::unprepared('
            CREATE TRIGGER tr_User_Default_Member_Role AFTER INSERT ON users FOR EACH ROW
            BEGIN
                INSERT INTO usuario_rols (`id_rol`, `id_usuario`, `created_at`,`update_at`) VALUES (2,NEW.id,now(),null); 
                END
                ');*/
=======
        //
        DB::unprepared('
            CREATE TRIGGER tr_User_Default_Member_Role AFTER INSERT `users` FOR EACH ROW
            BEGIN
                INSERT INTO `usuario_rols` (`id_rol`,`id_usuario`,`created_at`,`updated_at) VALUES (3, NEW.id, now(), null);
            END
             ');
>>>>>>> Stashed changes
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
<<<<<<< Updated upstream
        //DB::unprepared('DROP TRIGGER `tr_User_Default_Member_Role`');
=======
        //
        DB::unprepared('DROP TRIGGER `tr_User_Default_Member_Role');
>>>>>>> Stashed changes
    }
}
