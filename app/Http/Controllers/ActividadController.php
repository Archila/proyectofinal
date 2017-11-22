<?php

namespace App\Http\Controllers;

use App\Actividad;
use Illuminate\Http\Request;

class ActividadController extends Controller
{
     public function eliminar($id)
     {
       $actividad = Actividad::findOrFail($id);
       $actividad->delete();
       $actividades = Actividad::all();
       return view('actividad.index')->with('actividades', $actividades);
     }

     public function editar($id)
     {
       $actividad = Actividad::findOrFail($id);
       return view('actividad.edit')->with('actividad', $actividad);
     }
     public function actualizar(Request $request)
     {
         $id = $request->id;
         $actividad = Actividad::findOrFail($id);
         $actividad->nombre = $request->nombre;
         $actividad->descripcion = $request->descripcion;
         $actividad->save();
         $actividades = Actividad::all();
         return view('actividad.index')->with('actividades', $actividades);
     }
    public function index()
    {
      $actividades = Actividad::all();
      return view('actividad.index')->with('actividades', $actividades);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('actividad.nuevo');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $actividad = new Actividad;
      $actividad->nombre = $request->nombre;
      $actividad->descripcion = $request->descripcion;
      $actividad->save();
      $actividades = Actividad::all();
      return view('actividad.index')->with('actividades', $actividades);
    }


}
