@extends('home')

@section('titulo','Proyectos')

@section('contenido')


<div class="row " style="background: rgba(255,255,255,0.8)" >
  <h3 class="center-align">Nuevo Proyecto</h3>
  <form action="{{route('proyecto.store')}}" id="formValidate" method="POST">
    {{csrf_field()}}

        <div class="input-field col l10 offset-l1">
          <i class="material-icons prefix">account_circle</i>
          <input id="icon_prefix" type="text" class="validate" name="nombre" required>
          <label for="icon_prefix">Nombre</label>
        </div>
        <div class="input-field col l10 offset-l1">
          <i class="material-icons prefix">description</i>
          <textarea id="textarea1" class="materialize-textarea" name="descripcion" required></textarea>
          <label for="textarea1">Descripción</label>
        </div>
        <div class="input-field col l10 offset-l1"  >
          <i class="material-icons prefix">contacts</i>
          <select multiple name="actividades[]" required>
            <option value="" disabled selected>Seleccione actividad</option>
            @foreach($actividades as $actividad)
              <option value="{{$actividad->id}}">{{$actividad->nombre}}</option>
            @endforeach
          </select>
          <label>Actividades</label>
        </div>

        <div class="col offset-l8">
          <button class="btn btn-large waves-effect waves-light right" type="submit" name="action">Crear
            <i class="material-icons right"></i>
          </button>
        </div>
        <br>
  </form>

</div>

@endsection
