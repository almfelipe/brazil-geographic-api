<?php

use App\Http\Controllers\BoundaryController;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\StateController;
use App\Http\Controllers\CityController;
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

//Route::post('reversegeocode', 'App\Http\Controllers\BouboundaryController@reverseGeocode');

//http://127.0.0.1:8000/api/boundary/reversegeocode?latitude=-12.974722&longitude=-38.476665
Route::get('boundary/reversegeocode', [BoundaryController::class, 'reverseGeocode'])->name('boundary.reversegeocode');

//http://localhost:8000/api/region?boundary=1
//http://localhost:8000/api/region/1?boundary=1
Route::resource('region', RegionController::class)->only(['index', 'show']);

//http://localhost:8000/api/state?boundary=1
//http://localhost:8000/api/state/29?boundary=1
//http://localhost:8000/api/state/BA?boundary=1
Route::resource('state', StateController::class)->only(['index', 'show']);


//http://localhost:8000/api/city/2927408?boundary=1
Route::resource('city', CityController::class)->only(['show']);

//http://localhost:8000/api/city/state/29?boundary=1
//http://localhost:8000/api/city/state/BA?boundary=1
Route::get('city/state/{state}', [CityController::class, 'citiesFromState'])->name('city.fromstate');
