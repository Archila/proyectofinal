@extends('home')

@section('titulo','Cotización')

@section('contenido')


<div class="row " style="background: rgba(255,255,255,0.8)" >
  <h3 class="center-align">Agregar Producto</h3>
  <h4 class="center-align">Actividad: {{$actividad->nombre}}</h4>
  <form action="{{action('ProyectoController@nuevo_producto')}}" id="formValidate" method="POST">
    {{csrf_field()}}
        <input type="hidden" name="id_obra" value="{{$obra->id}}">
        <input type="hidden" name="id_actividad" value="{{$actividad->id}}">

        <div class="input-field col l5 offset-l1"  >
          <i class="material-icons prefix">apps</i>
          <select name="producto" required>
            <option value="" disabled selected>Seleccione producto</option>
            @foreach($productos as $p)
              <option value="{{$p->id}}">{{$p->nombre}}</option>
            @endforeach
          </select>
          <label>Productos</label>
        </div>
        <div class="input-field col l3">
          <i class="material-icons prefix">add_box</i>
          <input type="number" id="cantidad2" name="cantidad" required>
          <label for="cantidad2">Cantidad</label>
        </div>
        <div class="col l3">
          <button class="btn btn-large waves-effect waves-light right" type="submit" name="action">Crear
            <i class="material-icons right"></i>
          </button>
        </div>
        <br>
  </form>

</div>

@endsection
