<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dt  =new DateTime('now', new DateTimeZone('America/New_York'));
        DB::table('users')->insert([
            'name' => 'Demo User',
            'email' => 'admin@testing.com',
            'password' => Hash::make('password'),
            'api_token' => str_random(60),
            'created_at' => $dt->format('Y-m-d G:i:s.u'),
            'updated_at' => $dt->format('Y-m-d G:i:s.u'),
            'email_verified_at' => $dt->format('Y-m-d G:i:s.u'),
        ]);
    }
}
