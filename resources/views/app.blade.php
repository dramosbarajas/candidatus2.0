<!doctype html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel & VUE</title>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
         <!-- Fonts -->
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" crossorigin="anonymous">
        
    </head>
    <body>
    <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="#">Candidatus 2.0</a>
      </div>
      <ul class="nav navbar-nav">
        <li class="active"><a href="/">Inicio</a></li>
        <li><a href="/">Ofertas</a></li>
        <li><a href="/candidatos">Candidatos</a></li>
        <li><a href="#">Candidaturas</a></li>
      </ul>
    </div>
  </nav>
        <div class="container">
            
            @yield('content')

        </div>
        
    </body>
        <script src="{{ asset('js/app.js') }}"></script>
</html>
