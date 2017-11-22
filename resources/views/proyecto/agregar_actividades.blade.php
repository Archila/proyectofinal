@extends('home')

@section('titulo','Proyectos')

@section('contenido')


<div class="row " style="background: rgba(255,255,255,0.8)" >
  <h3 class="center-align">Editar Proyecto</h3>
  <form action="{{action('ProyectoController@agregar')}}" id="formValidate" method="POST">
    {{csrf_field()}}
        <input type="hidden" name="id" value="{{$proyecto->id}}">
        <div class="input-field col l10 offset-l1">
          <i class="material-icons prefix">account_circle</i>
          <input id="icon_prefix" type="text" class="validate" name="nombre" value="{{$proyecto->nombre}}" required>
          <label for="icon_prefix">Nombre</label>
        </div>
        <div class="input-field col l10 offset-l1">
          <i class="material-icons prefix">description</i>
          <textarea id="textarea1" class="materialize-textarea" name="descripcion" required>{{$proyecto->descripcion}}</textarea>
          <label for="textarea1">Descripción</label>
        </div>
        <div class="input-field col l10 offset-l1"  >
          <i class="material-icons prefix">contacts</i>
          <select multiple name="actividades[]" required>
            <option value="" disabled selected>Seleccione actividades a agregar</option>
            @foreach( $actividades as $actividad )
              <?php

              $mostrar=true;
              foreach ($obras as $obra) {
                if ($obra->id_actividad == $actividad->id && $obra->id_proyecto == $proyecto->id) {
                  $mostrar = false;
                }
              }
              if ($mostrar) {
              ?>
                <option value="{{$actividad->id}}">{{$actividad->nombre}}</option>
              <?php

              }
              ?>
            @endforeach
          </select>
          <label>Actividades</label>
        </div>

        <div class="col offset-l8">
          <button class="btn btn-large waves-effect waves-light right" type="submit" name="action">Agregar
            <i class="material-icons right"></i>
          </button>
        </div>
        <br>
  </form>

</div>

@endsection
