@extends('fooding.layout')

  @section('content')
    
    <div class="grid_12">
      <h3>Carro de la compra</h3>
          
        @if (count(Cart::getContent()))

        <table class='table stdipped'>
          <thead>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Foto</th>
            <th>Cantidad</th>
            <th>Quitar</th>
          </thead>

          <tbody>
            @foreach(Cart::getContent() as $item)
            <tr>
              <td>{{ $item->name }}</td>
              <td>{{ $item->price }}</td>
              <td></td>
              <td>{{ $item->quantity }}</td>
              <td>
                <form action="{{ route('cart.delete') }}" method="POST">
                  @csrf
                  <input type="hidden" name="id" value="{{ $item->id }}">
                  <button type="submit" class="btn btn-link btn-sm text-danger">x</button>
                </form>
              </td>
            </tr>
            @endforeach
          </tbody>

        </table>

        <button type="button" class="btn btn-success">Realizar pedido</button>

        @else
          <p>Carro vacío</p>
        @endif
  
    </div>
    
    @endsection