<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Obra extends Model
{
  protected $table="obras";
  //para insertar
  protected $primarykey="id_obra";
  protected $fillable=[
    'subtotal','id_actividad','id_proyecto',
    ];
}
