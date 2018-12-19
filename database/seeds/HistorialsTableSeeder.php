<?php

use Illuminate\Database\Seeder;
class HistorialsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Historial::class,10)->create();
    }
}
