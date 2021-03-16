<?php

use App\Http\Controllers\RegionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('reversegeocode', 'App\Http\Controllers\BouboundaryController@reverseGeocode');

//http://localhost:8000/api/reversegeocode?latitude=-12.974722&longitude=-38.476665
Route::get('reversegeocode', 'App\Http\Controllers\BouboundaryController@reverseGeocode');

//http://localhost:8000/api/region?boundary=1
//http://localhost:8000/api/region/1?boundary=1
Route::resource('region', RegionController::class)->only(['index', 'show']);
