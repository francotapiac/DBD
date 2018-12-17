<?php

use Illuminate\Database\Seeder;

class HabitacionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Habitacion::class,100)->create();
    }
}
