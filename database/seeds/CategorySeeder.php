<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert ([
            'name' => 'Hardcover'
        ]);
        DB::table('categories')->insert ([
            'name' => 'Paperback'
        ]);
        DB::table('categories')->insert ([
            'name' => 'Loose leaf'
        ]);
    }
}
