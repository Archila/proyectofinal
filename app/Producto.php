<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
  protected $table="productos";
  //para insertar
  protected $primarykey="id_producto";
  protected $fillable=[
    'nombre','descripcion','precio','unidad','marca','id_producto'
    ];
}
