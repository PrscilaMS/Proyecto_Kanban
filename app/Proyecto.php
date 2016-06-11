<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proyecto extends Model
{
    public $timestamps = false;
    protected $fillable = array('ID_EQUIPO', 'NOMBRE_PROYECT', 'FECHA_INICIO');//
    
}
