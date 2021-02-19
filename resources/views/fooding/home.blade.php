
@extends('fooding.layout')

  @section('content')
    <div class="grid_8">
    <h3>Asociación Restaurantes</h3>
      <img src="{{ asset('images/page2_img.jpg') }}" alt="" class="img_inner fleft">
       Somos una asociación de restaurantes que ofrecemos nuestros platos en delivery.
       Con la pandemia es una manera de generar ingresos en nuestros negocios</div>
    <div class="grid_4">
      <h3>Características</h3>
      <p class="col1 pad1">Servicio a domicilio de los platos servidos en los restaruantes asociados. </p>
      <ul class="list">
        <li><a href="#">Entrega a domicilio</a></li>
        <li><a href="#">Pedido a un único restaurante</a></li>
        <li><a href="#">Pedido en PDF al email </a></li>
        <li><a href="#">Grupo de raiders locales</a></li>
        <li><a href="#">Envio en menos de 15 minutos tras finalización de los platos</a></li>
      </ul>
    </div>
  @endsection
    