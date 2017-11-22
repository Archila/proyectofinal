<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Proveedor;
use App\Producto;

class ProveedorController extends Controller
{
  public function eliminar($prov)
  {
    $proveedor = Proveedor::findOrFail($prov);
    $productos = Producto::where('id_proveedor','=',$prov);
    $productos->delete();
    $proveedor->delete();
    $proveedores = Proveedor::all();
    return view('proveedor.index')->with('proveedores', $proveedores);
  }

  public function editar($prov)
  {
    $proveedor = Proveedor::findOrFail($prov);
    return view('proveedor.edit')->with('proveedor', $proveedor);
  }
  public function actualizar(Request $request)
  {
      $id = $request->id;
      $proveedor = Proveedor::findOrFail($id);
      $proveedor->nombre = $request->nombre;
      $proveedor->descripcion = $request->descripcion;
      $proveedor->save();
      $proveedores = Proveedor::all();
      return view('proveedor.index')->with('proveedores', $proveedores);
  }

  public function index()
  {
    $proveedores = Proveedor::all();
    return view('proveedor.index')->with('proveedores', $proveedores);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */



  public function create()
  {
    return view('proveedor.nuevo');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $proveedor = new Proveedor;
    $proveedor->nombre = $request->nombre;
    $proveedor->descripcion = $request->descripcion;
    $proveedor->save();
    $proveedores = Proveedor::all();
    return view('proveedor.index')->with('proveedores', $proveedores);
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Producto  $producto
   * @return \Illuminate\Http\Response
   */
  public function show(Proveedor $proveedor)
  {
      //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Producto  $producto
   * @return \Illuminate\Http\Response
   */
  public function edit(Proveedor $proveedor)
  {
    return view('proveedor.edit')->with('proveedor', $proveedor);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Producto  $producto
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request,Proveedor $proveedor)
  {
      $id = $request->id;
      $proveedor = Proveedor::findOrFail($id);
      $proveedor->nombre = $request->nombre;
      $proveedor->descripcion = $request->descripcion;
      $proveedor->save();
      $proveedores = Proveedor::all();
      return view('proveedor.index')->with('proveedores', $proveedores);
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Producto  $producto
   * @return \Illuminate\Http\Response
   */
  public function destroy($prov)
  {
    $proveedor = Proveedor::findOrFail($prov);
    $proveedor->delete();
    $proveedores = Proveedor::all();
    return view('proveedor.index')->with('proveedores', $proveedores);
  }
}
