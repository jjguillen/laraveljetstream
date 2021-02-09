<?php

use Illuminate\Support\Facades\Route;

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
    
    Route::group(['middleware' => 'role:grestaurante', 'prefix' => 'restaurante', 'as' => 'grestaurante.'], function() {
        Route::get('/', function () {
            return view('intranet.restaurantes');
        });
    });

    Route::group(['middleware' => 'role:cliente', 'prefix' => 'cliente', 'as' => 'cliente.'], function() {
        Route::get('/', function () {
            return view('intranet.clientes');
        });
    });

    Route::group(['middleware' => 'role:repartidor', 'prefix' => 'repartidor', 'as' => 'repartidor.'], function() {
        Route::get('/', function () {
            return view('intranet.repartidores');
        });
    });
    
    

});


//RUTAS WEB PRINCIPAL (El cliente viene aquí directo desde el login)
Route::prefix('/fooding')->middleware('auth')->group(function () {
    
    Route::get('/', function () {
        return view('fooding');     //Mostrar restaurantes y platos para pedir
    });
   
    //Ruta de hacer pedidos

    //Ruta de ver restaurantes, en detalle, ...

    //Ruta de ver platos, detalle, ...
       

});

