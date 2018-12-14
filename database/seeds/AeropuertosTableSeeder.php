<?php

use Illuminate\Database\Seeder;

class AeropuertosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Aeropuerto::class,20)->create();
    }
}
