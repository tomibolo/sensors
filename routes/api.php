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

// List sensors
Route::get('sensors', 'SensorController@index');

// List single sensor
Route::get('sensor/{id}', 'SensorController@show');

// Create new sensor
Route::post('sensor', 'SensorController@store');

// Update sensor
Route::put('sensor', 'SensorController@store');

// Delete sensor
Route::delete('sensor/{id}', 'SensorController@destroy');

// Create Many Sensors
Route::post('sensors/createMany', 'SensorController@storeMany');
