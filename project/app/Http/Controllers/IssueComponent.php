<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Issue;
use App\IssueComponent as ICModel;

class IssueComponent extends Controller
{
    public function hydrate(Request $request)
    {
        $client = new Client();
        $issues = $client->request('GET', 'https://my-json-server.typicode.com/bomoko/algm_assessment/issues');
        if($issues->getStatusCode() == 200){
            foreach(json_decode($issues->getBody()->getContents()) as $issue){
                $i = new Issue;
                $i->id = $issue->id;
                $i->code = $issue->code;
                $i->save();
                foreach($issue->components as $component){
                    $c = new ICModel;
                    $c->issue = $issue->id;
                    $c->component = $component;
                    $c->save();
                }
            }
        }
    }
}
