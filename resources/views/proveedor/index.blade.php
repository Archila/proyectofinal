@extends('home')

@section('titulo','Proveedores')

@section('contenido')


<div class="row " style="background: rgba(255,255,255,0.6)" >
  <h2 class="center-align">Proveedores
    <a class="tooltipped  btn-floating btn-small waves-effect waves-light light-green darken-4" data-position="bottom" href="{{action('ProveedorController@create')}}" data-delay="50" data-tooltip="Nuevo"><i class="large material-icons">add</i></a>
  </h2>

  <table class="centered bordered highlight responsive-table">
      <thead>
        <th>Nombre</th>
        <th>Descripción</th>
      </thead>
      <tbody>
        @foreach($proveedores as $proveedor)
          <tr>
            <td>{{$proveedor->nombre}}</td>
            <td>{{$proveedor->descripcion}}</td>
            <td>
              <a class="tooltipped  btn-floating btn-small waves-effect waves-light light-blue darken-4" data-position="bottom" href="{{action('ProveedorController@editar',$proveedor->id)}}" data-delay="50" data-tooltip="Editar"><i class="material-icons">edit</i></a>
              <a class="tooltipped  btn-floating btn-small waves-effect waves-light red modal-trigger"   data-position="bottom" href="{{action('ProveedorController@eliminar',$proveedor->id)}}" data-delay="50" data-tooltip="Eliminar tipo"><i class="material-icons">delete</i></a>

            </td>

          </tr>
        @endforeach
      </tbody>
  </table>
</div>

@endsection
