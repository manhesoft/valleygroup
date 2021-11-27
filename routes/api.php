<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TrackingController;

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
//sanctum
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
//*/

//Muestra solos los productos  existente por api
Route::get('/tracking/all', [TrackingController::class,'index']); 

// muestra todos los productos con sus ingredientes
Route::get('/tracking/product', [TrackingController::class,'show']); 

// Muestro solo los ingredientes de un producto 
// @param number
// return Json
Route::get('/tracking/item/{item}', [TrackingController::class,'details']); //muestra todos los registros