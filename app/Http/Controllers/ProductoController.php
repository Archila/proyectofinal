<?php

namespace App\Http\Controllers;

use App\Producto;
use App\Proveedor;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function eliminar($id)
     {
       $producto = Producto::findOrFail($id);       
       $producto->delete();
       $productos = Producto::all();
       $proveedores = Proveedor::all();
       return view('producto.index',['productos'=>$productos,'proveedores'=>$proveedores]);
     }

     public function editar($id)
     {
       $producto = Producto::findOrFail($id);
       $proveedores = Proveedor::all();
       return view('producto.edit',['producto'=>$producto,'proveedores'=>$proveedores]);
     }
     public function actualizar(Request $request)
     {
         $id = $request->id;
         $producto = Producto::findOrFail($id);
         $producto->nombre = $request->nombre;
         $producto->descripcion = $request->descripcion;
         $producto->precio = $request->precio;
         $producto->unidad = $request->unidad;
         $producto->marca = $request->marca;
         $producto->id_proveedor = $request->proveedor;
         $producto->save();
         $productos = Producto::all();
         $proveedores = Proveedor::all();
         return view('producto.index',['productos'=>$productos,'proveedores'=>$proveedores]);
     }

    public function index()
    {
      $productos = Producto::all();
      $proveedores = Proveedor::all();
      return view('producto.index',['productos'=>$productos,'proveedores'=>$proveedores]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $proveedores = Proveedor::all();
        return view('producto.nuevo',['proveedores'=>$proveedores]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $producto=new Producto;
        $producto->nombre = $request->nombre;
        $producto->descripcion = $request->descripcion;
        $producto->precio = $request->precio;
        $producto->unidad = $request->unidad;
        $producto->marca = $request->marca;
        $producto->id_proveedor = $request->proveedor;
        $producto->save();
        $productos = Producto::all();
        $proveedores = Proveedor::all();
        return view('producto.index',['productos'=>$productos,'proveedores'=>$proveedores]);
    }


}
