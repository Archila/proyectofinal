<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cotizacion extends Model
{
  protected $table="cotizacions";
  //para insertar
  protected $primarykey="id_cotizacion";
  protected $fillable=[
    'cantidad','subtotal','id_producto','id_obra',
    ];
}
