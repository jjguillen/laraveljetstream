<?php

namespace App\Http\Controllers;

use App\Models\Restaurante;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\RestauranteResource;

class RestauranteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::find(Auth::id());
        if ($user->role->role == "admin") {
            $restaurantes = Restaurante::paginate(5);
        } else {
            $restaurantes = Restaurante::where('user_id','=',Auth::id())->paginate(10);
        }
        
        return view('intranet.restaurantes', ['restaurantes' => $restaurantes ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('intranet.restaurantes.nuevo');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $restaurante = new Restaurante;
        $restaurante->nombre = $request->nombre;
        $restaurante->direccion = $request->direccion;
        $restaurante->ciudad = $request->ciudad;
        $restaurante->telefono = $request->telefono;
        $restaurante->longitud = $request->longitud;
        $restaurante->latitud = $request->latitud;
        $restaurante->user_id = Auth::id();
        $restaurante->save();

        return redirect()->action(
            [RestauranteController::class, 'index']
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Restaurante  $restaurante
     * @return \Illuminate\Http\Response
     */
    public function show(Restaurante $restaurante)
    {
        $this->authorize('view', $restaurante);
        return view('intranet.restaurantes.profile', [
            'restaurante' => $restaurante
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Restaurante  $restaurante
     * @return \Illuminate\Http\Response
     */
    public function edit(Restaurante $restaurante)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Restaurante  $restaurante
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Restaurante $restaurante)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Restaurante  $restaurante
     * @return \Illuminate\Http\Response
     */
    public function destroy(Restaurante $restaurante)
    {
        $this->authorize('delete', $restaurante);
        $restaurante->delete();

        return redirect()->action(
            [RestauranteController::class, 'index']
        );
    }

    /**
     * METODOS PARA API
     * ***************************************************************
     */

     
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function apiStore(Request $request)
    {
        $restaurante = new Restaurante;
        $restaurante->nombre = $request->nombre;
        $restaurante->direccion = $request->direccion;
        $restaurante->ciudad = $request->ciudad;
        $restaurante->telefono = $request->telefono;
        $restaurante->longitud = $request->longitud;
        $restaurante->latitud = $request->latitud;
        $restaurante->user_id = Auth::id();  //TO-DO PASSPORT
        $restaurante->save();

        //En lugar de devolver una vista, devuelvo si se ha realizado la acción
        return response(['restaurante' => new RestauranteResource($restaurante), 
                             'message' => 'Created successfully'], 201);
   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Restaurante  $restaurante
     * @return \Illuminate\Http\Response
     */
    public function apiDelete(Restaurante $restaurante)
    {
        $this->authorize('delete', $restaurante);
        $restaurante->delete();

        return response(['message' => 'Deleted successfully'], 201);
    }



}
