<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TitleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('titles')->insert ([
            'name' => 'Leithold Calculus',
            'category_id' => 1
           ]);
    }
}
