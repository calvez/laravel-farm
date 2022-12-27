<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AssetTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('asset_types')->insertOrIgnore(['name' => 'Land']);
        DB::table('asset_types')->insertOrIgnore(['name' => 'Plant']);
        DB::table('asset_types')->insertOrIgnore(['name' => 'Animal']);
        DB::table('asset_types')->insertOrIgnore(['name' => 'Equipment']);
        DB::table('asset_types')->insertOrIgnore(['name' => 'Compost']);
        DB::table('asset_types')->insertOrIgnore(['name' => 'Structure']);
        DB::table('asset_types')->insertOrIgnore(['name' => 'Sensor']);
        DB::table('asset_types')->insertOrIgnore(['name' => 'Water']);
        DB::table('asset_types')->insertOrIgnore(['name' => 'Material']);
        DB::table('asset_types')->insertOrIgnore(['name' => 'Group']);
    }
}
