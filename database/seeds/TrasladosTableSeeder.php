<?php

use Illuminate\Database\Seeder;

class TrasladosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Traslado::class,20)->create();
    }
}
