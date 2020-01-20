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
            'image' => 'public/UMkK6d5d4yfVrIuvJ6jCr9QShmaGEFNfH4YCsISC.jpeg',
            'stock' => 0
           ]);

        DB::table('titles')->insert ([
            'name' => 'Powerplant Technology',
            'edition' => 1,
            'isbn' => '9780451181254',
            'category_id' => 1,
            'author_id' => 2,
            'title_status_id' => 2,
            'image' => 'public/eQgPlhdGDb0dxM4mQOzIBVdfRTa9SAUCeiqkxuoo.jpeg',
            'stock' => 0
           ]);

        DB::table('titles')->insert ([
            'name' => 'The Diary of a Young Girl',
            'edition' => 1,
            'isbn' => '9780553296983',
            'category_id' => 2,
            'author_id' => 7,
            'title_status_id' => 2,
            'image' => 'public/8uLUka0M8JdKtqj5eCOue7BV8oYyOYnoXzEmQ9zn.jpeg',
            'stock' => 0
           ]);

        DB::table('titles')->insert ([
            'name' => 'Holes',
            'edition' => 1,
            'isbn' => '9780788742699',
            'category_id' => 2,
            'author_id' => 3,
            'title_status_id' => 2,
            'image' => 'public/Fw14cjGNK7SHuendWswDtzkPBUZofoYjFghn5tLr.jpeg',
            'stock' => 0
           ]);

        DB::table('titles')->insert ([
            'name' => 'Small Steps',
            'edition' => 1,
            'isbn' => '9780385733144',
            'category_id' => 2,
            'author_id' => 3,
            'title_status_id' => 2,
            'image' => 'public/NLiNTnhk1FX4io9cASICbp7E5pgwoTm5PPFpu0ou.jpeg',
            'stock' => 0
           ]);

        DB::table('titles')->insert ([
            'name' => 'The War of Art',
            'edition' => 1,
            'isbn' => '9781501260629',
            'category_id' => 3,
            'author_id' => 9,
            'title_status_id' => 2,
            'image' => 'public/W3q5diD2dBpDX7c0GMPo3HQ63B3BXFUAzp7HJEIw.jpeg',
            'stock' => 0
           ]);

        DB::table('titles')->insert ([
            'name' => 'General Chemistry',
            'edition' => 4,
            'isbn' => '9780133897319',
            'category_id' => 1,
            'author_id' => 4,
            'title_status_id' => 2,
            'image' => 'public/vGvrIBy4Nj9QzMuje4GFbAu7htdxVgIhDzsZhGDF.jpeg',
            'stock' => 0
           ]);

        DB::table('titles')->insert ([
            'name' => "Shigley's Mechanical Engineering Design",
            'edition' => 11,
            'isbn' => '9780073398204',
            'category_id' => 1,
            'author_id' => 8,
            'title_status_id' => 2,
            'image' => 'public/I5Ov3CjFdDgCjKbEwyz9e68mjYjwlAZ2cIxYUorK.jpeg',
            'stock' => 0
           ]);

        DB::table('titles')->insert ([
            'name' => "Things Fall Apart",
            'edition' => 1,
            'isbn' => '9780385474542',
            'category_id' => 2,
            'author_id' => 6,
            'title_status_id' => 2,
            'image' => 'public/DAduXjeUEPevGmY1uIoMIDPuzjGvmJe1J9iRS88N.jpeg',
            'stock' => 0
           ]);

        DB::table('titles')->insert ([
            'name' => "To Kill a Mockingbird",
            'edition' => 1,
            'isbn' => '9780446310789',
            'category_id' => 3,
            'author_id' => 5,
            'title_status_id' => 2,
            'image' => 'public/9pMByE1Eduiv7QrRdN5k1GG43m9zjRhzin0fTcsa.jpeg',
            'stock' => 0
           ]);
    }
}
