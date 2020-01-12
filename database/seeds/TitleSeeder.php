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
            'edition' => 1,
            'category_id' => 1,
            'author_id' => 1,
            'image' => 'titles/5LvnvDCL1u7WAikR4qe03IIgHGeqjox4IzcMuBdr.jpeg',
            'stock' => 0
           ]);
    }
}
