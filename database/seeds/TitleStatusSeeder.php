<?php

use Illuminate\Database\Seeder;

class TitleStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('title_statuses')->insert ([
            'name' => 'In stock'
        ]);
    
        DB::table('title_statuses')->insert ([
            'name' => 'Out of stock'
        ]);
    }
}
