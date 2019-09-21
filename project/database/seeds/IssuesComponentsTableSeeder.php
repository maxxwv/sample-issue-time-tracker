<?php

use Illuminate\Database\Seeder;
use App\Http\Controllers\IssueComponent;
use Illuminate\Http\Request;

class IssuesComponentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new IssueComponent;
        $user->hydrate(new Request);
    }
}
