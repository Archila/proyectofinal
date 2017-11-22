@extends('home')

@section('titulo','Productos')

@section('contenido')


<div class="row" >
  <div class="col l6 offset-l3" style="background: rgba(255,255,255,0.6)" >
    <h2 class="center-align">Editar Producto</h2>
      <form action="{{action('ProductoController@actualizar')}}" id="formValidate" method="POST">
        {{csrf_field()}}
            <input type="hidden" name="id" value="{{$producto->id}}">
            <div class="input-field col l10 offset-l1">
              <i class="material-icons prefix">account_circle</i>
              <input id="icon_prefix" type="text" class="validate" name="nombre" required value="{{$producto->nombre}}">
              <label for="icon_prefix">Nombre</label>
            </div>
            <div class="input-field col l10 offset-l1">
              <i class="material-icons prefix">description</i>
              <textarea id="textarea1" class="materialize-textarea" name="descripcion" required>{{$producto->descripcion}}</textarea>
              <label for="textarea1">Descripción</label>
            </div>
            <div class="input-field col l10 offset-l1">
              <i class="material-icons prefix">attach_money</i>
              <input id="icon_prefix" type="text" class="validate" name="precio" required value="{{$producto->precio}}">
              <label for="icon_prefix">Precio</label>
            </div>
            <div class="input-field col l10 offset-l1">
              <i class="material-icons prefix">label</i>
              <input id="icon_prefix" type="text" class="validate" name="unidad" required value="{{$producto->unidad}}">
              <label for="icon_prefix">Unidad</label>
            </div>
            <div class="input-field col l10 offset-l1">
              <i class="material-icons prefix">edit</i>
              <input id="icon_prefix" type="text" class="validate" name="marca" required value="{{$producto->marca}}">
              <label for="icon_prefix">Marca</label>
            </div>
            <div class="input-field col l10 offset-l1"  >
              <i class="material-icons prefix">contacts</i>
              <select name="proveedor" required>
                <option value="{{$producto->id_proveedor}}" disabled selected>Seleccione opción</option>
                @foreach($proveedores as $proveedor)
                  <option value="{{$proveedor->id}}">{{$proveedor->nombre}}</option>
                @endforeach
              </select>
              <label>Seleccione Proveedor</label>
            </div>
            <div class="col l6 offset-l4">
              <button class="btn waves-effect waves-light right" type="submit" name="action">Ingresar
                <i class="material-icons right">send</i>
              </button>
            </div>
            <br>
      </form>
      <br>
  </div>
  <br>
  </div>
@endsection
