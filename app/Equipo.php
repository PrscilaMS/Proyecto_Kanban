<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Equipo extends Model
{
    public $timestamps = false;
    protected $fillable = array('NOMBRE_EQUIPO', 'NUMERO_MIEMBROS');//
    
     
      public static function modificar($equipo) {
            \DB::table('equipos')
            ->where('ID_EQUIPO', $equipo->ID_EQUIPO)
            ->update(['NOMBRE_EQUIPO' => $equipo->NOMBRE_EQUIPO ]);
      }
      
      public static function eliminar($id) {
            \DB::table('equipos')->where('ID_EQUIPO', '=', $id)->delete();
      }
}
