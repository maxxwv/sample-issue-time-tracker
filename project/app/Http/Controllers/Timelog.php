<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Timelog as TimelogModel;

class Timelog extends Controller
{
    /**
     * Hydrate the timelogs table - again, Guzzle for the JSON call, then insert into
     * the table as necessary.
     *
     * @param Request $request
     * @return void
     */
    public function hydrate(Request $request)
    {
        $client = new Client();
        $logs = $client->request('GET', 'https://my-json-server.typicode.com/bomoko/algm_assessment/timelogs');
        if($logs->getStatusCode() == 200){
            TimelogModel::truncate();
            foreach(json_decode($logs->getBody()->getContents()) as $log){
                $l = new TimelogModel;
                $l->id = $log->id;
                $l->user_id = $log->user_id;
                $l->issue_id = $log->issue_id;
                $l->seconds_logged = $log->seconds_logged;
                $l->save();
            }
        }
    }
}
