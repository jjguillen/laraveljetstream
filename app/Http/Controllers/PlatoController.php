<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Restaurante;
use App\Models\Plato;
use Illuminate\Support\Facades\Storage;

class PlatoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Restaurante $restaurante)
    {
        $platos = Restaurante::find($restaurante->id)->platos;
        return view('intranet.restaurantes.platos', ['platos' => $platos ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Restaurante $restaurante)
    {
        
        return view('intranet.restaurantes.nuevoPlato')->with('restaurante',$restaurante);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Restaurante $restaurante)
    {
        //$path = $request->file('foto')->store('platos');
        $path = Storage::disk('public')->put('uploads/', $request->file('foto'));

        $plato = new Plato;
        $plato->nombre = $request->nombre;
        $plato->descripcion = $request->descripcion;
        $plato->foto = $path;
        $plato->precio = $request->precio;
        $plato->categoria = $request->categoria;
        $plato->restaurante_id = $request->restaurante_id;
        $plato->save();

        return redirect()->action(
            [RestauranteController::class, 'index']
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
