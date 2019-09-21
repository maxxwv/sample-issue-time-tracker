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
        $this->call(UsersTableSeeder::class);
        $this->call(ComponentsTableSeeder::class);
        $this->call(TimelogTableSeeder::class);
        $this->call(IssuesComponentsTableSeeder::class);
    }
}
