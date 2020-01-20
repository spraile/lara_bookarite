<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert ([
        'name' => 'admin',
        'email' => 'admin@email.com',
        'password' => Hash::make('123123123'),
        'role_id' => 1
       ]);
      
       DB::table('users')->insert ([
        'name' => 'Alice Schuberg',
        'email' => 'alice@email.com',
        'password' => Hash::make('123123123'),
        'role_id' => 2
       ]);
       
       DB::table('users')->insert ([
        'name' => 'Eugeo',
        'email' => 'eugeo@email.com',
        'password' => Hash::make('123123123'),
        'role_id' => 2
       ]);

       DB::table('users')->insert ([
       	'name' => 'Kirito',
       	'email' => 'kirito@email.com',
       	'password' => Hash::make('123123123'),
        'role_id' => 2
       ]);

       DB::table('users')->insert ([
       	'name' => 'Tiese Shtolienen',
       	'email' => 'tiese@email.com',
       	'password' => Hash::make('123123123'),
        'role_id' => 2
       ]);

       DB::table('users')->insert ([
       	'name' => 'Ronye Arabel',
       	'email' => 'Ronye@email.com',
       	'password' => Hash::make('123123123'),
        'role_id' => 2
       ]);

       DB::table('users')->insert ([
       	'name' => 'Golgorosso Balto',
       	'email' => 'golgo@email.com',
       	'password' => Hash::make('123123123'),
        'role_id' => 2
       ]);
    }
}
