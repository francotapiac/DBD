<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(PermisosTableSeeder::class);
    	$this->call(RolTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(LugarsTableSeeder::class);
        $this->call(AeropuertosTableSeeder::class);
        $this->call(SegurosTableSeeder::class);
        $this->call(ActividadsTableSeeder::class);
       
        $this->call(AsientosTableSeeder::class);
        $this->call(HotelsTableSeeder::class);
        
        
        $this->call(HabitacionsTableSeeder::class);
        $this->call(VehiculosTableSeeder::class);
        $this->call(ReservasTableSeeder::class);
        $this->call(TrasladosTableSeeder::class);

        $this->call(PaquetesTableSeeder::class);
        
    }
}
