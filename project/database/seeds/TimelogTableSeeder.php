<?php

use Illuminate\Database\Seeder;
use App\Http\Controllers\Timelog;
use Illuminate\Http\Request;

class TimelogTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new Timelog;
        $user->hydrate(new Request);
    }
}
