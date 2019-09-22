<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Component as ComponentModel;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\DB;

class Component extends Controller
{
    /**
     * Hydrate the components table from the provided sample data JSON endpoint.
     *
     * @param Request $request
     * @return void
     */
    public function hydrate(Request $request)
    {
        $client = new Client();
        $components = $client->request('GET', 'https://my-json-server.typicode.com/bomoko/algm_assessment/components');
        if($components->getStatusCode() == 200){
            ComponentModel::truncate();
            foreach(json_decode($components->getBody()->getContents()) as $component){
                $c = new ComponentModel;
                $c->id = $component->id;
                $c->name = $component->name;
                $c->save();
            }
        }
    }

    /**
     * Create the query to grab all the pertinent records for the rollup query.
     * This is aimed at the it_should_return_composed_metadata() test.
     * Thought I was going to need the helper-ized calculateTime() function,
     * but the DB::raw() method came to the rescue for SQL goodness!
     *
     * @return void
     */
    public function getIssues(){
        $sql = DB::table('issue_components')
            ->select(DB::raw('components.name, issue_components.component_id, COUNT(DISTINCT issues.id) AS number_of_issues, SUM(timelogs.seconds_logged) AS seconds_logged'))
            ->leftJoin('components', 'issue_components.component_id', '=', 'components.id')
            ->leftJoin('issues', 'issue_components.issue_id', '=', 'issues.id')
            ->leftJoin('timelogs', 'issue_components.issue_id', '=', 'timelogs.issue_id')
            ->groupBy('component_id');
        $components = $sql->get();
        $ret = [];
        foreach($components as $component){
            array_push($ret, $component);
        };
        return json_encode($ret);
    }
}
