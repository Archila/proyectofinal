<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>@yield('titulo')</title>
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
    <div class="navbar-fixed">
      <nav>
        <div class="nav-wrapper">
          <a href="#!" class="brand-logo">Logo</a>
          <ul class="right hide-on-med-and-down">
            <li><a href="{{action('ProyectoController@create')}}" class="tooltipped" data-position="bottom" data-delay="50" data-tooltip="Nuevo proyecto"><i class="material-icons">add</i></a></li>
            <li><a href="{{action('ProyectoController@index')}}" class="tooltipped" data-position="bottom" data-delay="50" data-tooltip="Ver mis proyectos"><i class="material-icons">insert_invitation</i></a></li>
            <li><a href="{{action('ProductoController@index')}}" class="tooltipped" data-position="bottom" data-delay="50" data-tooltip="Productos"><i class="material-icons">apps</i></a></li>
            <li><a href="{{action('ProveedorController@index')}}" class="tooltipped" data-position="bottom" data-delay="50" data-tooltip="Proveedores"><i class="material-icons">contacts</i></a></li>
            <li><a href="{{action('ActividadController@index')}}" class="tooltipped" data-position="bottom" data-delay="50" data-tooltip="Actividades"><i class="material-icons">class</i></a></li>

          </ul>
        </div>
      </nav>
    </div>
    <div class="container">
      @yield('contenido')
    </div>
  </body>
  <script type="text/javascript">
    $(document).ready(function() {
        $('select').material_select();
        $('.collapsible').collapsible();
      });
  </script>
</html>
