@extends('home')

@section('titulo','Actividades')

@section('contenido')


<div class="row " style="background: rgba(255,255,255,0.6)" >
  <h2 class="center-align">Actividades
    <a class="tooltipped  btn-floating btn-small waves-effect waves-light light-green darken-4" data-position="bottom" href="{{action('ActividadController@create')}}" data-delay="50" data-tooltip="Nuevo"><i class="large material-icons">add</i></a>
  </h2>

  <table class="centered bordered highlight responsive-table">
      <thead>
        <th>Nombre</th>
        <th>Descripción</th>
      </thead>
      <tbody>
        @foreach($actividades as $actividad)
          <tr>
            <td>{{$actividad->nombre}}</td>
            <td>{{$actividad->descripcion}}</td>
            <td>
              <a class="tooltipped  btn-floating btn-small waves-effect waves-light light-blue darken-4" data-position="bottom" href="{{action('ActividadController@editar',$actividad->id)}}" data-delay="50" data-tooltip="Editar"><i class="material-icons">edit</i></a>
              <a class="tooltipped  btn-floating btn-small waves-effect waves-light red modal-trigger"   data-position="bottom" href="{{action('ActividadController@eliminar',$actividad->id)}}" data-delay="50" data-tooltip="Eliminar tipo"><i class="material-icons">delete</i></a>

            </td>

          </tr>
        @endforeach
      </tbody>
  </table>
</div>

@endsection
