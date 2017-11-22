@extends('home')

@section('titulo','Login')


@section('contenido')
<div class="row">
  <div class="col l4 offset-l4">
    <form action="validar.blade.php" id="formValidate" method="POST">
      {{csrf_field()}}

          <div class="input-field col l10 offset-l1">
            <i class="material-icons prefix">account_circle</i>
            <input id="icon_prefix" type="text" class="validate" name="nombre" required>
            <label for="icon_prefix">Nombre</label>
          </div>
          <div class="input-field col l10 offset-l1">
            <i class="material-icons prefix">description</i>
            <input id="clave" class="materialize-textarea" name="descripcion" required></textarea>
            <label for="clave">Clave</label>
          </div>


          <div class="col offset-l8">
            <button class="btn btn-large waves-effect waves-light right" type="submit" name="action">Crear
              <i class="material-icons right"></i>
            </button>
          </div>
          <br>
    </form>
  </div>
</div>
@endsection
