<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clasificacion extends Model
{
  protected $table="clasificaciones";
  //para insertar
  protected $primarykey="id_clasificacion";
  protected $fillable=[
    'nombre','descripcion',
    ];
}
