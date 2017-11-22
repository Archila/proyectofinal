<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Actividad extends Model
{
  protected $table="actividads";
  //para insertar
  protected $primarykey="id_actividad";
  protected $fillable=[
    'nombre','descripcion',
    ];
}
