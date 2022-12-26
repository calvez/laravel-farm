<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LogCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('log_categories')->insertOrIgnore(['name' => 'Activities']);
        DB::table('log_categories')->insertOrIgnore(['name' => 'Observations']);
        DB::table('log_categories')->insertOrIgnore(['name' => 'Inputs']);
        DB::table('log_categories')->insertOrIgnore(['name' => 'Harvests']);
        DB::table('log_categories')->insertOrIgnore(['name' => 'Seedings']);
        DB::table('log_categories')->insertOrIgnore(['name' => 'Transplantings']);
        DB::table('log_categories')->insertOrIgnore(['name' => 'Lab tests']);
        DB::table('log_categories')->insertOrIgnore(['name' => 'Maintenance']);
        DB::table('log_categories')->insertOrIgnore(['name' => 'Medical']);
        DB::table('log_categories')->insertOrIgnore(['name' => 'Births']);
    }
}
