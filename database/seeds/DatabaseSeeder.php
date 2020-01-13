<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(AuthorSeeder::class);
        $this->call(TitleStatusSeeder::class);
        $this->call(AssetStatusSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(TitleSeeder::class);
    }
}
