<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\RestauranteController;
use App\Http\Resources\RestauranteResource;
use App\Models\Restaurante;

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
/*
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
*/

Route::get('/restaurante/{id}', function ($id) {
    return new RestauranteResource(Restaurante::findOrFail($id));
});
Route::get('/restaurante', function () {
    return RestauranteResource::collection(Restaurante::paginate(3));
});
Route::post('/restaurante', [RestauranteController::class, 'apiStore'] );