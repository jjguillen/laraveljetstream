<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Plato;
use App\Models\Pedido;
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

    public function buy(Request $request) {
        //Sacar usuario
        $user_id = Auth::id();

        //Sacamos el restaurante de los platos del carro
        //para solo permitir platos de ese restaurante
        foreach(Cart::getContent() as $item) {
            $platoCarro_id = $item->id;
            $platoCarro = Plato::find($platoCarro_id);
            $restauranteCarro = $platoCarro->restaurante;
        }
        $restaurante_id = $restauranteCarro->id;

        //Creamos el pedido
        $pedido = new Pedido;
        $pedido->estado = "realizado";
        $pedido->user_id = $user_id;
        $pedido->restaurante_id = $restaurante_id;
        $pedido->save();

        //Creamos las líneas de pedido
        foreach(Cart::getContent() as $item) {
            $pedido->lineasPedido()->attach($item->id, ['cantidad' => $item->quantity]);
        }

        //Vaciamos carro
        Cart::clear();

        //Redirigimos a /foodind
        return redirect('/fooding');
        

    }



}
