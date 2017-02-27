<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
// get list of tasks
Route::get('inventories','SecondaryInventoryController@index')->middleware('scope:manage_secondary_inventories');
// get specific task
Route::get('inventory/{id}','SecondaryInventoryController@show')->middleware('scope:manage_secondary_inventories');
// delete a task
Route::delete('inventory/{id}','SecondaryInventoryController@destroy');
// update existing task

Route::post('inventory','SecondaryInventoryController@store')->middleware('scope:manage_secondary_inventories');