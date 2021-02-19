<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Plato;
use App\Models\Restaurante;
use Illuminate\Support\Facades\Auth;

class FoodingController extends Controller
{
    /**
     * Display a listing of restaurantes.
     *
     * @return \Illuminate\Http\Response
     */
    public function getRestaurantes()
    {
        $restaurantes = Restaurante::all();    
        
        return view('fooding.restaurantes', ['restaurantes' => $restaurantes ]);
    }

    /**
     * Display a listing of platos from a restaurante.
     *
     * @return \Illuminate\Http\Response
     */
    public function getPlatos($id)
    {
        $restaurante = Restaurante::findorfail($id);
        $platos = $restaurante->platos;    
        
        return view('fooding.platos', ['restaurante' => $restaurante->nombre, 'platos' => $platos ]);
    }

    /**
     * Display a listing a restaurante details.
     *
     * @return \Illuminate\Http\Response
     */
    public function getRestauranteDetalle($id)
    {
        $restaurante = Restaurante::findorfail($id);   
        $platos = $restaurante->platos;
        
        return view('fooding.restdetalle', ['restaurante' => $restaurante, 'platos' => $platos ]);
    }


    /**
     * Display a Plato detail.
     *
     * @return \Illuminate\Http\Response
     */
    public function getPlato($id)
    {
        $plato = Plato::findorfail($id);  
        $restaurante = $plato->restaurante; 
        
        return view('fooding.platodetalle', ['plato' => $plato, 'restaurante' => $restaurante]);
    }

}
