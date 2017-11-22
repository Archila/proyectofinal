@extends('home')

@section('titulo','Productos')

@section('contenido')


<div class="row " style="background: rgba(255,255,255,0.6)" >
  <h2 class="center-align">Productos
    <a class="tooltipped  btn-floating btn-small waves-effect waves-light light-green darken-4" data-position="bottom" href="{{action('ProductoController@create')}}" data-delay="50" data-tooltip="Nuevo"><i class="large material-icons">add</i></a>
  </h2>

  <table class="centered bordered highlight responsive-table">
      <thead>
        <th>Nombre</th>
        <th>Descripción</th>
        <th>Precio</th>
        <th>Unidad</th>
        <th>Marca</th>
        <th>Proveedor</th>
        <th></th>
      </thead>
      <tbody>
        @foreach($productos as $producto)
          <tr>
            <td>{{$producto->nombre}}</td>
            <td>{{$producto->descripcion}}</td>
            <td>{{$producto->precio}}</td>
            <td>{{$producto->unidad}}</td>
            <td>{{$producto->marca}}</td>
            @foreach($proveedores as $proveedor)
              @if($producto->id_proveedor==$proveedor->id)
              <td>{{$proveedor->nombre}}</td>
              @endif
            @endforeach
            <td>
              <a class="tooltipped  btn-floating btn-small waves-effect waves-light light-blue darken-4" data-position="bottom" href="{{action('ProductoController@editar',$producto->id)}}" data-delay="50" data-tooltip="Editar"><i class="material-icons">edit</i></a>
              <a class="tooltipped  btn-floating btn-small waves-effect waves-light red modal-trigger"   data-position="bottom" href="{{action('ProductoController@eliminar',$producto->id)}}" data-delay="50" data-tooltip="Eliminar tipo"><i class="material-icons">delete</i></a>

            </td>

          </tr>
        @endforeach
      </tbody>
  </table>
</div>

@endsection
