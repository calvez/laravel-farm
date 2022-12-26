<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FlagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('flags')->insertOrIgnore(['name' => 'Priority']);
        DB::table('flags')->insertOrIgnore(['name' => 'Needs review']);
        DB::table('flags')->insertOrIgnore(['name' => 'Monitor']);
        DB::table('flags')->insertOrIgnore(['name' => 'Organic']);
    }
}
