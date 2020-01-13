<?php

use Illuminate\Database\Seeder;

class AssetStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('asset_statuses')->insert ([
            'name' => 'In stock'
        ]);
    
        DB::table('asset_statuses')->insert ([
            'name' => 'Out of stock'
        ]);
    }
}