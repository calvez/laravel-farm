<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AnimalTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('animal_types')->insertOrIgnore(['name' => 'Cigája']);
        DB::table('animal_types')->insertOrIgnore(['name' => 'Merinói']);
        DB::table('animal_types')->insertOrIgnore(['name' => 'Svájci']);
    }
}
