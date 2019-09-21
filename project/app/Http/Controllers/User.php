<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User as UserModel;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Hash;
use App\Http\Helpers\TimeCalculation;


class User extends Controller
{
    /**
     * More hydration. For the time being, I'm just setting the password to 'password'.
     *
     * @param Request $request
     * @return void
     */
    public function hydrate(Request $request)
    {
        $client = new Client();
        $users = $client->request('GET', 'https://my-json-server.typicode.com/bomoko/algm_assessment/users');
        if($users->getStatusCode() == 200){
            UserModel::truncate();
            foreach(json_decode($users->getBody()->getContents()) as $user){
                $u = new UserModel;
                $u->id = $user->id;
                $u->name = $user->name;
                $u->email = $user->email;
                $u->password = Hash::make('password');
                $u->save();
            }
        }
    }/**
     * Calculate the number of seconds each user spent total.
     * This is aimed at the it_should_provide_the_sum_of_all_users_time()
     * test.
     *
     * @return void
     */
    public function getTotalSeconds()
    {
        $users = UserModel::with('timelogs')->get();
        $timeCalc = new TimeCalculation;
        $ret = [];
        foreach($users as $user){
            array_push($ret, [
                'user_id' => $user->id,
                'seconds_logged' => $timeCalc->calculateTime($user->timelogs)
            ]);
        };
        return json_encode($ret);
    }
}
