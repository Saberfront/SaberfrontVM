<?php

use Illuminate\Http\Request;
use App\User;
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
// get list of tasks
Route::get('/inventory/all','SecondaryInventoryController@index')->middleware('scope:manage_secondary_inventories');

// get specific task
Route::get('inventory/{id}','SecondaryInventoryController@show');
Route::delete('inventory/{id}','SecondaryInventoryController@destroy');
// update existing task

Route::post('inventory','SecondaryInventoryController@store');

Route::get('/users/{id}/loadouts/{loadoutid}','LoadoutController@apiShow')->middleware('scope:manage_loadouts');
Route::get('/users/{userid}/loadouts/{loadoutid}','LoadoutController@apiShowWithRID')->middleware('scope:manage_loadouts');
Route::get('/user/getByRID/{RID}',function($RID){
    return json_encode(array("id" => User::where("robloxUserId",$RID)->get()[0]->id));

});