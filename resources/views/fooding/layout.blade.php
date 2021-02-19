<!DOCTYPE html>
<html lang="en">
     <head>
     <title>About</title>
     <meta charset="utf-8">
     <link rel="icon" href="{{ asset('images/favicon.ico') }}">
     <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}" />
     
     <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
     <link rel="stylesheet" href="{{ asset('css/style.css') }}">
     <link rel="stylesheet" href="{{ asset('css/font-awesome.css') }}">

     <script src="{{ asset('js/jquery-3.5.1.js') }}"></script>
     
     <script src="{{ asset('js/jquery-migrate-1.1.1.js') }}"></script>
     <script src="{{ asset('js/jquery.equalheights.js') }}"></script>
     <script src="{{ asset('js/jquery.ui.totop.js') }}"></script>
     <script src="{{ asset('js/jquery.easing.1.3.js') }}"></script>
     <script>
        $(document).ready(function(){

          $().UItoTop({ easingType: 'easeOutQuart' });
        }) 
     </script>
    
     </head>
     <body  class="">

<!--==============================header=================================-->
 <header> 
  <div class="container_12">
    <div class="grid_12">
            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/fooding/dashboard') }}" class="text-sm text-gray-700 underline">Área Cliente</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
                        @endif
                    @endauth

                    @if (count(Cart::getContent()))
                      <a href="{{route('cart.checkout')}}">&nbsp;<i class="fa fa-shopping-cart"></i></a>
                    @endif


                </div>
            @endif
            
    </div>
  </div>

  <div class="container_12">
   <div class="grid_12"> 
    <div class="socials">
      <a href="#"></a>
      <a href="#"></a>
      <a href="#"> </a>
      <a href="#" class="last"></a>
    </div>

    <h1><a href="#"><img src="{{ asset('images/logo.png') }}" alt="Boo House"></a> </h1>
    <div class="menu_block">
      <nav id="bt-menu" class="bt-menu">
        <a href="#" class="bt-menu-trigger"><span>Menu</span></a>
        <ul>
            <li class="bt-icon"><a href="/fooding">Home</a></li>
            <li class="bt-icon"><a href="/fooding/categorias">Categorías</a></li>
            <li class="bt-icon"><a href="/fooding/"></a></li>
            <li class="bt-icon"><a href="/fooding/restaurantes">Restaurantes</a></li>
            <li class="bt-icon"><a href="/fooding/contacto">Contacto</a></li>
        </ul>
      </nav>
    
      <div class="clear"></div>
    </div>

    <div class="clear"></div>
   
  </div>
  </div>
</header>

<!--==============================Content=================================-->

<div class="content"><div class="ic"></div>
  <div class="container_12">
    
  @yield('content')
    
  </div>
</div>

<!--==============================footer=================================-->

<footer>    
  <div class="container_12">
    <div class="grid_6 prefix_3">
      <div class="copy">
      &copy; 2021 | <a href="#">Privacy Policy</a> <br> Website   designed by <a href="" rel="nofollow">JJ</a>
      </div>
    </div>
  </div>
</footer>
      <script>
      $(document).ready(function(){ 
         $(".bt-menu-trigger").toggle( 
          function(){
            $('.bt-menu').addClass('bt-menu-open'); 
          }, 
          function(){
            $('.bt-menu').removeClass('bt-menu-open'); 
          } 
        ); 
      }) 
    </script>
</body>

</html>