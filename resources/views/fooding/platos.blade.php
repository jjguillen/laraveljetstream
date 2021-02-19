@extends('fooding.layout')

  @section('content')
    
    <div class="grid_12">
      <h3>Platos de {{ $restaurante }}</h3>
          <ul class="nav">
            <li class="selected"><a href="#tab-1" class="">Ensaladas</a></li>
            <li><a href="#tab-2">Pizzas</a></li>
            <li><a href="#tab-3">Pastas</a></li>
            <li><a href="#tab-4">Arroces</a></li>
            <li><a href="#tab-5">Carnes</a></li>
            <li><a href="#tab-6">Pescados</a></li>
            <li><a href="#tab-6">Raciones</a></li>
            <li><a href="#tab-6">Tapas</a></li>
            <li><a href="#tab-6">Postres</a></li>
          </ul>
          <div class="div-tabs">
          @foreach($platos as $plato)
              <div  id="tab-1" class="tab-content gallery1">
                  <div class="grid_3">
                    <a href="{{ asset('images/big1.jpg') }}" class="gal"><img src="{{ asset('images/page3_img1.jpg') }}" alt=""><span></span></a>
                    <div class="col2"><span class="col3">
                      <a href="/fooding/platos/{{ $plato->id }}">{{ $plato->nombre }}</a></span> {{ $plato->precio }}
                    </div>
                  </div>    
              </div>          
          @endforeach
          </div>
  
    </div>
    
    @endsection