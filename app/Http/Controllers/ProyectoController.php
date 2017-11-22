<?php

namespace App\Http\Controllers;

use \DB;
use App\Proyecto;
use App\Obra;
use App\Cotizacion;
use App\Actividad;
use App\Producto;

use Illuminate\Http\Request;

class ProyectoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function agregar(Request $request)
     {
         $proyecto = Proyecto::findOrFail($request->id);
         $proyecto->nombre = $request->nombre;
         $proyecto->descripcion = $request->descripcion;
         $proyecto->save();

         foreach ($_POST['actividades'] as $a ) {
           $obra = new Obra;
           $obra->subtotal=0;
           $obra->id_actividad=$a;
           $obra->id_proyecto=$proyecto->id;
           $obra->save();
         }
         $proyectos = Proyecto::all();
         return view('proyecto.index')->with('proyectos', $proyectos);
     }
     public function eliminar($id)
     {
       $obras = DB::table('obras')->where('id_proyecto', $id)->get();
       foreach ($obras as $o) {
         $cotizaciones = Cotizacion::where('id_obra','=',$o->id);
         $cotizaciones->delete();
       }
       $obras = Obra::where('id_proyecto','=',$id);
       $obras->delete();
       $proyecto = Proyecto::findOrFail($id);
       $proyecto->delete();
       $proyectos = Proyecto::all();
       return view('proyecto.index')->with('proyectos', $proyectos);
     }

     public function eliminar_actividad($id)
     {
       $obras = DB::table('obras')->where('id', $id)->get();
       foreach ($obras as $o) {
         $cotizaciones = Cotizacion::where('id_obra','=',$o->id);
         $cotizaciones->delete();
       }
       $obras = Obra::findOrFail($id);
       $obras->delete();
       return back();
     }

     public function cotizacion($id_obra)
     {
       $obra = Obra::findOrFail($id_obra);
       $id_actividad = $obra->id_actividad;
       $actividad = Actividad::findOrFail($id_actividad);
       $productos = Producto::all();
       return view('proyecto.nuevo_producto',['obra'=>$obra,'actividad'=>$actividad,'productos'=>$productos]);

     }

     public function editar($id)
     {
       $proyecto = Proyecto::findOrFail($id);
       //$obras =Obra::where('id_proyecto','=',$id);
       $obras = Obra::all();
       $actividades = Actividad::all();
       return view('proyecto.agregar_actividades',['proyecto'=>$proyecto,'obras'=>$obras,'actividades'=>$actividades]);
     }

     public function nuevo_producto(Request $request)
     {
       $obra = Obra::findOrFail($request->id_obra);
       $id = $obra->id_proyecto;
       $proyecto = Proyecto::findOrFail($id);
       $actividad = Actividad::findOrFail($request->id_actividad);
       $producto = Producto::findOrFail($request->producto);
       $cotizacion = new Cotizacion;
       $cantidad = $request->cantidad;
       $subtotal = $producto->precio * $cantidad ;
       $cotizacion->cantidad = $cantidad;
       $cotizacion->subtotal = $subtotal;
       $cotizacion->id_producto=$producto->id;
       $cotizacion->id_obra=$obra->id;
       $cotizacion->save();
       $obra->subtotal = $obra->subtotal + $subtotal;
       $obra->save();
       $proyectos = Proyecto::all();
       return back();

     }

     public function eliminar_producto($id)
     {
       $cotizacion = Cotizacion::findOrFail($id);
       $id_obra = $cotizacion->id_obra;
       $cantidad_operar = $cotizacion->subtotal;
       $obra = Obra::findOrFail($id_obra);
       $obra->subtotal = $obra->subtotal - $cantidad_operar;
       $obra->save();
       $cotizacion->delete();

       return back();
     }

     public function detalle ($id)
     {
       $proyecto = Proyecto::findOrFail($id);
       $obras = Obra::join('actividads', 'actividads.id', '=', 'obras.id_actividad')

           ->select(
                   'obras.id as id_obra',
                   'actividads.nombre as nombre_actividad',
                   'actividads.id as id_actividad',
                   'obras.subtotal as subtotal'
                   )
           ->where('obras.id_proyecto','=',$id)
           ->get();
       $cotizaciones = Cotizacion::all();
       $productos = Producto::all();
       return view('proyecto.detalle',['proyecto'=>$proyecto,'obras'=>$obras,
          'cotizaciones'=>$cotizaciones,'productos'=>$productos]);
     }
     public function actualizar(Request $request)
     {
         $id = $request->id;
         $producto = Proyecto::findOrFail($id);
         $producto->nombre = $request->nombre;
         $producto->descripcion = $request->descripcion;
         $producto->precio = $request->precio;
         $producto->unidad = $request->unidad;
         $producto->marca = $request->marca;
         $producto->id_proveedor = $request->proveedor;
         $producto->save();
         $productos = Producto::all();

         return view('proyecto.index',['productos'=>$productos]);
     }

    public function index()
    {
      $proyectos = Proyecto::all();
      return view('proyecto.index')->with('proyectos', $proyectos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $actividades = Actividad::all();
        $productos = Producto::all();
        return view('proyecto.nuevo',['actividades'=>$actividades,'productos'=>$productos]);
    }


    public function store(Request $request)
    {
        $proyecto = new Proyecto;
        $proyecto->nombre = $request->nombre;
        $proyecto->descripcion = $request->descripcion;
        $proyecto->save();

        foreach ($_POST['actividades'] as $a ) {
          $obra = new Obra;
          $obra->subtotal=0;
          $obra->id_actividad=$a;
          $obra->id_proyecto=$proyecto->id;
          $obra->save();
        }
        $proyectos = Proyecto::all();
        return view('proyecto.index')->with('proyectos', $proyectos);
    }


}
