<!doctype html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel & VUE</title>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
         <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" crossorigin="anonymous">
        
    </head>
    <body>
        <div class="container">
            
            @yield('content')

        </div>
        
        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
