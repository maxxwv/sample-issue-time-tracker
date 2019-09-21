<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Component as ComponentModel;
use GuzzleHttp\Client;

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
}
