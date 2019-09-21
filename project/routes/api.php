<?php

use Illuminate\Http\Request;
use App\Http\Controllers\IssueComponent;

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
