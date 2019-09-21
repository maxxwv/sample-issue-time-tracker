<?php

use Illuminate\Database\Seeder;
use App\Http\Controllers\User;
use Illuminate\Http\Request;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User;
        $user->hydrate(new Request);
    }
}
