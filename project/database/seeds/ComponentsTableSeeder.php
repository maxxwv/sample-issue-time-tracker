<?php

use Illuminate\Database\Seeder;
use App\Http\Controllers\Component;
use Illuminate\Http\Request;

class ComponentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new Component;
        $user->hydrate(new Request);
    }
}
