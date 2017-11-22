<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proyecto extends Model
{
  protected $table="proyectos";
  //para insertar
  protected $primarykey="id_proyecto";
  protected $fillable=[
    'nombre','descripcion','fecha','total',
    ];
}
