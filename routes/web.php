<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Route::group(['middleware' => 'auth'], function () {
  Route::get('proveedor/eliminar/{prov}', 'ProveedorController@eliminar');
  Route::get('proveedor/editar/{prov}', 'ProveedorController@editar');
  Route::post('proveedor/actualizar', 'ProveedorController@actualizar');
  Route::resource('proveedor', 'ProveedorController');

  Route::get('actividad/eliminar/{prov}', 'ActividadController@eliminar');
  Route::get('actividad/editar/{prov}', 'ActividadController@editar');
  Route::post('actividad/actualizar', 'ActividadController@actualizar');
  Route::resource('actividad', 'ActividadController');

  Route::get('producto/eliminar/{prov}', 'ProductoController@eliminar');
  Route::get('producto/editar/{prov}', 'ProductoController@editar');
  Route::post('producto/actualizar', 'ProductoController@actualizar');
  Route::resource('producto', 'ProductoController');

  Route::get('proyecto/eliminar/{prov}', 'ProyectoController@eliminar');
  Route::get('proyecto/editar/{prov}', 'ProyectoController@editar');
  Route::get('proyecto/detalle/{prov}', 'ProyectoController@detalle');
  Route::post('proyecto/actualizar', 'ProyectoController@actualizar');
  Route::any('proyecto/cotizacion/{id_obra}', 'ProyectoController@cotizacion');
  Route::any('proyecto/nuevo_producto', 'ProyectoController@nuevo_producto');
  Route::any('proyecto/cotizacion/eliminar/{id}', 'ProyectoController@eliminar_producto');
  Route::any('proyecto/obras/eliminar/{id}', 'ProyectoController@eliminar_actividad');
  Route::any('proyecto/agregar','ProyectoController@agregar');
  Route::resource('proyecto', 'ProyectoController');
});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
