<?php

use Illuminate\Database\Seeder;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('authors')->insert ([
            'name' => 'Louis Leithold'
        ]);
        DB::table('authors')->insert ([
            'name' => 'M. M. El Wakil'
        ]);

        DB::table('authors')->insert ([
            'name' => 'Louis Sachar'
        ]);

        DB::table('authors')->insert ([
            'name' => 'Ralph Petrucci'
        ]);

        DB::table('authors')->insert ([
            'name' => 'Harper Lee'
        ]);

        DB::table('authors')->insert ([
            'name' => 'Chinua Achebe'
        ]);

        DB::table('authors')->insert ([
            'name' => 'Annelies Marie Frank'
        ]);

        DB::table('authors')->insert ([
            'name' => 'J. Keith Nisbeth'
        ]);

        DB::table('authors')->insert ([
            'name' => 'Steven Pressfield'
        ]);
    }
}
