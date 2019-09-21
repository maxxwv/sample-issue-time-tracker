<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User as UserModel;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Hash;

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
    }
}
