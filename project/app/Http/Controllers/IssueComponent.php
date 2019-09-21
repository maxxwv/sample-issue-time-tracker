<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Issue;
use App\IssueComponent as ICModel;

class IssueComponent extends Controller
{
    /**
     * We call out to the JSON endpoint to get the data to insert into the local database.
     * Note that if this is run multiple times, we'll throw an integrity error due to the
     * inclusion of ID in the seed data, so I'm truncating both the Issue and IssueComponent
     * tables.
     *
     * It might be a bit of an overstep, but I'm also seeding both tables from this single
     * controller as it seems a bit silly not to, honestly.
     *
     * @param Request $request
     * @return void
     */
    public function hydrate(Request $request)
    {
        $client = new Client();
        $issues = $client->request('GET', 'https://my-json-server.typicode.com/bomoko/algm_assessment/issues');
        if($issues->getStatusCode() == 200){
            Issue::truncate();
            ICModel::truncate();
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
