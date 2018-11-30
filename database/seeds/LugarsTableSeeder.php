<?php

use Illuminate\Database\Seeder;
use App\Lugar;
class LugarsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(App\Lugar::class,20)->create();
    }
}
