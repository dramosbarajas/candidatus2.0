<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="contenedor">
      <input class="hide" id="menu-navegacion" type="checkbox">
      <header class="cabecera">
        <label class="icono-menu" for="menu-navegacion">
          <span class="boton icono">
            <span class="linea l1"></span>
            <span class="linea l2"></span>
            <span class="linea l3"></span>
          </span>
        </label>
        <div class="navbar-header">
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
            <ul class="">
              <li><a href="{{ route('login') }}">Login</a></li>
            </ul>
          </span>
        @else
          <label class="boton login-header logeado">
            <span class="icono">
              <svg viewBox="0 0 24 24"><path d="M12,19.2C9.5,19.2 7.29,17.92 6,16C6.03,14 10,12.9 12,12.9C14,12.9 17.97,14 18,16C16.71,17.92 14.5,19.2 12,19.2M12,5A3,3 0 0,1 15,8A3,3 0 0,1 12,11A3,3 0 0,1 9,8A3,3 0 0,1 12,5M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12C22,6.47 17.5,2 12,2Z"></path></svg>
            </span>
            <span class="usuario">{{ Auth::user()->name }}</span>
          </label>
          <input class="hide" id="menu-login" type="checkbox">
          <span class="menu-login" id="app-navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                  {{ Auth::user()->name }} <span class="caret"></span>
                </a>
                <ul class="dropdown-menu" role="menu">
                  <li>
                    <a href="{{ route('logout') }}"
                      onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();">
                      Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      {{ csrf_field() }}
                    </form>
                  </li>
                </ul>
                </li>
              </ul>
            </span>
          @endguest
      </header>
      

        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
