<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RestauranteController;
use App\Http\Controllers\FoodingController;
use App\Http\Controllers\CarroController;
use App\Http\Controllers\PlatoController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function () {
    return view('welcome');  //No se debería poder hacer pedidos, página estática
});


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


//Rutas de la INTRANET
Route::prefix('intranet')->middleware('auth')->group(function () {
    
    Route::group(['middleware' => 'role:grestaurante', 'prefix' => 'restaurante'], function() {
        //Route::get('/{restaurante}', [RestauranteController::class, 'show'] );
        //Route::get('/{restaurante}/delete', [RestauranteController::class, 'destroy'] );
        Route::get('/{restaurante}/platos', [PlatoController::class, 'index']);
        Route::get('/{restaurante}/plato', [PlatoController::class, 'create']);
        Route::post('/{restaurante}/plato', [PlatoController::class, 'store']);
        Route::resource('/', RestauranteController::class);

        //Crear restaurante, platos, borrar, finalizar pedido, ...
    });

    Route::group(['middleware' => 'role:cliente', 'prefix' => 'cliente'], function() {
        Route::get('/', function () {
            return view('intranet.clientes');
        });
    });

    Route::group(['middleware' => 'role:repartidor', 'prefix' => 'repartidor'], function() {
        Route::get('/', function () {
            return view('intranet.repartidores');
        });
    });
    
});


//RUTAS WEB PRINCIPAL (El cliente viene aquí directo desde el login)
Route::prefix('/fooding')->middleware('auth')->group(function () {
    
    Route::get('/', function () {
        return view('fooding.home');
    });
    Route::get('/restaurantes', [FoodingController::class, 'getRestaurantes']);
    Route::get('/restaurantes/{id}', [FoodingController::class, 'getRestauranteDetalle']);
    Route::get('/restaurantes/{id}/platos', [FoodingController::class, 'getPlatos']);

    Route::get('/platos/{id}', [FoodingController::class, 'getPlato']);
    
    Route::get('/carro/add/{id}', [CarroController::class, 'add']);
    Route::get('/carro/checkout', [CarroController::class, 'check'])->name('cart.checkout');
    Route::post('/carro/delete', [CarroController::class, 'delete'])->name('cart.delete');
    Route::get('/carro/buy', [CarroController::class, 'buy'])->name('cart.buy');

    
       

});

