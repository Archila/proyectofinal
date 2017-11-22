@extends('home')

@section('titulo','Proveedores')

@section('contenido')


<div class="row" >
  <div class="col l6 offset-l3" style="background: rgba(255,255,255,0.6)" >
    <h2 class="center-align">Nuevo proveedor</h2>
      <form action="{{route('proveedor.store')}}" id="formValidate" method="POST">
        {{csrf_field()}}
        
            <div class="input-field col l10 offset-l1">
              <i class="material-icons prefix">account_circle</i>
              <input id="icon_prefix" type="text" class="validate" name="nombre" required>
              <label for="icon_prefix">Nombre</label>
            </div>
            <div class="input-field col l10 offset-l1">
              <i class="material-icons prefix">edit</i>
              <textarea id="textarea1" class="materialize-textarea" name="descripcion" required></textarea>
              <label for="textarea1">Descripción</label>
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
