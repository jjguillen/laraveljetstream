<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Plato;
use Cart;

class CarroController extends Controller
{
    
    public function add($id) {
        $restauranteCarro = null;

        $plato = Plato::findorfail($id);

        //Sacamos el restaurante de los platos del carro
        //para solo permitir platos de ese restaurante
        foreach(Cart::getContent() as $item) {
            $platoCarro_id = $item->id;
            $platoCarro = Plato::find($platoCarro_id);
            $restauranteCarro = $platoCarro->restaurante;
        }
        
        //Comprobamos que coinciden los restaurantes de lo que hay en el carro
        if (!empty($restauranteCarro)) {
            if ($plato->restaurante->id != $restauranteCarro->id ) {
                return redirect()->back()->withErrors(['No puedes añadir platos de diferentes restaurantes']);
            }
        } 

        //Añadimos plato al carro
        Cart::add(
            $plato->id,
            $plato->nombre,
            $plato->precio,
            1,
            "foto"
        );
    

        return redirect()->back()->withErrors(['Añadido correctamente']);
      
    }


    public function check() {
        return view('fooding.carro');

    }

    public function delete(Request $request) {
        Cart::remove(['id' => $request->id]);
        return redirect()->back();

    }



}
