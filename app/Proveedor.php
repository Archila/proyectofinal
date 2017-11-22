<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
  protected $table="proveedors";
  //para insertar
  protected $primarykey="id_proveedor";
  protected $fillable=[
    'nombre','descripcion',
    ];
}
