<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link type="text/css" rel="stylesheet" href="{{URL::asset('css/materialize.css')}}"  media="screen,projection"/>
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <script type="text/javascript" src="{{URL::asset('js/initial.js')}}"></script>
    <script type="text/javascript" src="{{URL::asset('js/bin/materialize.js')}}"></script>
    <style media="screen">
      body{
        background: url('/imagenes/fondo.jpg');
        background-attachment: fixed;
      }
    </style>
</head>
<body>
    <div id="app">

        

        @yield('content')
    </div>

</body>
</html>
