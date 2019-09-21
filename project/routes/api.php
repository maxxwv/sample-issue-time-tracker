<?php

use Illuminate\Http\Request;
use App\Http\Controllers\IssueComponent;
use App\Http\Controllers\Component;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/hydrate/issuecomponents', function(Request $request) {
    $ic = new IssueComponent;
    return $ic->hydrate($request);
});
Route::get('/hydrate/components', function(Request $request) {
    $c = new Component;
    return $c->hydrate($request);
});
