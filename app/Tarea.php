<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tarea extends Model
{
    public $timestamps= false;
    protected $fillable= array('ID_TALLA', 'ENUNCIADO', 'ID_VERSION');//
    
    
          public static function traerTareas($version) {
    return  \DB::table('tareas')->where('ID_VERSION', '=', $version)->get();
      }
      
                public static function elimiar($idtarea) {
    \DB::table('tareas')->where('ID_TAREA', '=', $idtarea)->delete();
      }
}

