@extends('home')

@section('titulo','Proyectos')

@section('contenido')


<div class="row " style="background: rgba(255,255,255,0.75)" >
  <h3 class="center-align">Proyecto: {{$proyecto->nombre}}</h3>
  <ul class="collapsible" data-collapsible="accordion">
    @foreach($obras as $obra)
      <li>
        <div class="collapsible-header teal lighten-3 ">

            <div class="col l8 ">
              <h5><b>{{$obra->nombre_actividad}}</b>     </h5>
            </div>
            <div class="col l3 ">
              <h5>Q {{$obra->subtotal}}.00</h5>
            </div>
            <div class="col l1 ">
              <a class="tooltipped btn-floating waves-effect waves-light red "
                        data-position="bottom" href="{{action('ProyectoController@eliminar_actividad',$obra->id_obra)}}"
                        data-delay="50" data-tooltip="Eliminar Actividad">
                <i class="material-icons only">delete</i>
              </a>
            </div>



        </div>
        <div class="collapsible-body" style="background: rgba(204,255,255,0.5)" >
          <div class="row">
            <table>
              <thead>
                <th>Producto</th>
                <th>Unidad</th>
                <th>Precio/U</th>
                <th>Cantidad</th>
                <th>Subtotal</th>
                <th></th>
              </thead>
              <tbody>
                @foreach($cotizaciones as $c)
                  @foreach($productos as $p)
                    @if($c->id_producto == $p->id && $c->id_obra==$obra->id_obra)
                    <tr>
                      <td>{{$p->nombre}}</td>
                      <td>{{$p->unidad}}</td>
                      <td>{{$p->precio}}</td>
                      <td>{{$c->cantidad}}</td>
                      <td>{{$c->subtotal}}</td>
                      <td>
                        <a class="btn-floating waves-effect waves-light red btn-right"
                                  href="{{action('ProyectoController@eliminar_producto',$c->id)}}">
                          <i class="material-icons">delete</i>
                        </a>
                      </td>
                    </tr>
                    @endif
                  @endforeach
                @endforeach
              </tbody>
            </table>
          </div>
          <br>
          <div class="right-align">
            <a class="tooltipped btn-floating waves-effect waves-light green btn-right"
                      data-position="bottom" href="{{action('ProyectoController@cotizacion',$obra->id_obra)}}"
                      data-delay="50" data-tooltip="Agregar producto">
              <i class="material-icons">add</i>
            </a>
          </div>

        </div>

      </li>
    @endforeach


  </ul>

</div>

@endsection
