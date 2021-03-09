@extends('fooding.layout')

  @section('content')
    
        <h3 class="head1">Restaurantes</h3>

          @foreach($restaurantes as $restaurante)

            <a href="/fooding/restaurantes/{{ $restaurante->id }}" class="block1">
              <img src="{{ asset('images/blur_img'. $restaurante->id .'.jpg') }}" alt="">
              <span class="price"><span>{{ $restaurante->nombre }}</span><strong></strong></span>
            </a>
   
          @endforeach

    @endsection