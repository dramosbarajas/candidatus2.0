<!doctype html>
<html lang="{{ config('app.locale') }}">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!--meta name="viewport" content="width=device-width, initial-scale=1"-->
    <meta name="viewport" content="width=device-width, user-scalable=no">
    <title>Laravel & VUE</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
     <!-- Fonts -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" crossorigin="anonymous">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="api_token" content="{{session('api_token')}}">
  </head>
  <body>
    <div id="contenedor">
      <input class="hide" id="menu-navegacion" type="checkbox">
      <header class="cabecera">
        <label class="icono-menu" for="menu-navegacion">
          <span class="linea l1"></span>
          <span class="linea l2"></span>
          <span class="linea l3"></span>
        </label>
        <div class="logo-cabecera">
          <a class="navbar-brand" href="#">
            <img src="img/candidatus-logo.svg">
          </a>
        </div>
        @guest
          <label class="boton login-header">
            <span class="icono">
              <svg viewBox="0 0 24 24"><path d="M12,19.2C9.5,19.2 7.29,17.92 6,16C6.03,14 10,12.9 12,12.9C14,12.9 17.97,14 18,16C16.71,17.92 14.5,19.2 12,19.2M12,5A3,3 0 0,1 15,8A3,3 0 0,1 12,11A3,3 0 0,1 9,8A3,3 0 0,1 12,5M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12C22,6.47 17.5,2 12,2Z"></path></svg>
            </span>
          </label>
          <input class="hide" id="menu-login" type="checkbox">
          <span class="menu-login" id="app-navbar-collapse">
            <ul>
              <li>
                <a href="{{ route('login') }}">
                  <span class="boton esquinas hover">
                    <span class="accion">Login</span>
                  </span>
                </a>
              </li>
              <li>
                <a href="{{ route('register') }}">
                  <span class="boton esquinas hover">
                    <span class="accion">Register</span>
                  </span>
                </a>
              </li>
            </ul>
          </span>
        @else
          <label class="boton login-header logeado" for="menu-login">
            <span class="icono">
              <svg viewBox="0 0 24 24"><path d="M12,19.2C9.5,19.2 7.29,17.92 6,16C6.03,14 10,12.9 12,12.9C14,12.9 17.97,14 18,16C16.71,17.92 14.5,19.2 12,19.2M12,5A3,3 0 0,1 15,8A3,3 0 0,1 12,11A3,3 0 0,1 9,8A3,3 0 0,1 12,5M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12C22,6.47 17.5,2 12,2Z"></path></svg>
            </span>
          </label>
          <input class="hide" id="menu-login" type="checkbox">
          <span class="menu-login" id="app-navbar-collapse">
            <ul>
              <li>
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                  <span class="boton esquinas hover">
                    <span class="accion">{{ Auth::user()->name }}</span>
                  </span>
                </a>
              </li>
              <li>  
                <a href="{{ route('logout') }}"
                  onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();">
                  <span class="boton esquinas hover">
                    <span class="accion">Logout</span>
                  </span>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  {{ csrf_field() }}
                </form>
              </li>
            </ul>
          </span>
        @endguest
      </header>
      <nav class="menu">
        <ul>
          <li>
            <a class="activo" href="/">
              <span class="boton esquinas hover">
                <span class="accion">Ofertas</span>
              </span>
            </a>
          </li>
          <li>
            <a href="/candidatos">
              <span class="boton esquinas hover">
                <span class="accion">Candidatos</span>
              </span>
            </a>
          </li>
          <li>
            <a href="/candidaturas">
               <span class="boton esquinas hover">
                <span class="accion">Candidaturas</span>
              </span>
            </a>
          </li>
        </ul>
      </nav>
      <div class="container">

         @yield('content')
         
      </div>
    </div>
  </body>
  <script src="{{ asset('js/app.js') }}"></script>
</html>
