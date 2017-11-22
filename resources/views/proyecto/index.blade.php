@extends('home')

@section('titulo','Proyectos')

@section('contenido')


<div class="row " style="background: rgba(255,255,255,0.6)" >
  <h2 class="center-align">Proyectos
    <a class="tooltipped  btn-floating btn-small waves-effect waves-light light-green darken-4" data-position="bottom" href="{{action('ProyectoController@create')}}" data-delay="50" data-tooltip="Nuevo"><i class="large material-icons">add</i></a>
  </h2>

  <table class="centered bordered highlight responsive-table">
      <thead>
        <th>Nombre</th>
        <th>Descripción</th>

        <th></th>
      </thead>
      <tbody>
        @foreach($proyectos as $proyecto)
          <tr>
            <td>{{$proyecto->nombre}}</td>
            <td>{{$proyecto->descripcion}}</td>
            <td>
              <a class="tooltipped btn-floating waves-effect waves-light green modal-trigger"   data-position="bottom" href="{{action('ProyectoController@editar',$proyecto->id)}}" data-delay="50" data-tooltip="Agregar actividades"><i class="material-icons">add</i></a>
              <a class="tooltipped btn-floating waves-effect waves-light light-blue darken-4" data-position="bottom" href="{{action('ProyectoController@detalle',$proyecto->id)}}" data-delay="50" data-tooltip="Ver mas"><i class="material-icons">remove_red_eye</i></a>
              <a class="tooltipped btn-floating waves-effect waves-light red modal-trigger"   data-position="bottom" href="{{action('ProyectoController@eliminar',$proyecto->id)}}" data-delay="50" data-tooltip="Eliminar"><i class="material-icons">delete</i></a>


            </td>

          </tr>
        @endforeach
      </tbody>
  </table>
</div>

@endsection
