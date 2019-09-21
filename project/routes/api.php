<?php

use Illuminate\Http\Request;
use App\Http\Controllers\IssueComponent;
use App\Http\Controllers\Component;
use App\Http\Controllers\User;
use App\Http\Controllers\Timelog;

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
Route::get('/hydrate/issuecomponents', function(Request $request) {
    $ic = new IssueComponent;
    return $ic->hydrate($request);
});
Route::get('/hydrate/components', function(Request $request) {
    $c = new Component;
    return $c->hydrate($request);
});
Route::get('/hydrate/users', function(Request $request) {
    $u = new User;
    return $u->hydrate($request);
});
Route::get('/hydrate/timelogs', function(Request $request) {
    $t = new Timelog;
    return $t->hydrate($request);
});
/**
 * I tried using a Resource Collection here - there's obviously something about those
 * that I'm missing, because it actively refused to do anything worthwhile. I'd pass in
 * UserModel::with('timelogs')->get() like I use in \App\Http\Controllers\User::getTotalSeconds(),
 * and it didn't care. Just printed out absolute garbage, no matter what I fed to it.
 */
Route::get('/user-timelogs', function(Request $request) {
    $u = new User;
    return $u->getTotalSeconds();
});

Route::get('component-metadata', function(Request $request){
    $c = new Component;
    return $c->getIssues();
});
