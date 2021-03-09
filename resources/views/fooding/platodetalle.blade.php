@extends('fooding.layout')

  @section('content')
        
    <div class="grid_12">
      <h3>{{ $plato->nombre }}</h3>
      
        
          @if($errors->any())
          <span class='text-danger'>{{$errors->first()}}</span><br>
          @endif


        <div class="post">
        <img width="200px" src="{{ asset($plato->foto) }}" class="img_inner fleft">
          <div class="extra_wrapper">
            <div class="title col3"><a href="#"> {{ $plato->descripcion}} </a></div>
            
            <p class="col1">
            {{ $plato->precio}} €
            </p>
            <br>
            <a href="/fooding/carro/add/{{$plato->id}}" class="link1">Comprar</a>
          </div>
        </div>
  
    </div>
    

    @endsection

    