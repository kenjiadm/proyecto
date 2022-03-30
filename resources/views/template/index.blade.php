<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{mix('/css/app.css')}}">
    
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" rel="stylesheet">

    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @livewireStyles
    <title>Denuncia</title>
  </head>
  <style>
    body{
      background: #ecebeb;
    }
  </style>
  <body>
    
    @yield('cuerpo')

    <script src="{{mix('/js/app.js')}}"></script>
    @livewireScripts
    @yield('js')
  </body>
</html>