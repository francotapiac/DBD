<?php

use Illuminate\Database\Seeder;

class EscalasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Escala::class,20)->create();
    }
}
