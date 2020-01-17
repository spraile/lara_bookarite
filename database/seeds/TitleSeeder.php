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
            'isbn' => '9780673469137',
            'category_id' => 2,
            'author_id' => 1,
            'title_status_id' => 2,
            'image' => 'public/M5bOtPiO6Fq6PTgDwHLrqR1kdnQQ0FY2rnVVjoCP.png',
            'stock' => 0
           ]);

        DB::table('titles')->insert ([
            'name' => 'Powerplant Technology',
            'edition' => 2,
            'isbn' => '9780451181254',
            'category_id' => 1,
            'author_id' => 2,
            'title_status_id' => 2,
            'image' => 'public/xC0TzrwfdHQspUos3CFx2ckgaoyrXx55OF2pGbkK.png',
            'stock' => 0
           ]);
    }
}
