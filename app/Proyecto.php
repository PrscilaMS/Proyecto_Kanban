<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proyecto extends Model
{
    public $timestamps = false;
    protected $fillable = array('ID_EQUIPO', 'NOMBRE_PROYECT', 'FECHA_INICIO','FECHA_ESTIMACION');//
    
    
    
          public static function eliminarProyecto($id) {
       \DB::table('proyectos')->where('ID_PROYECTO', '=',  $id)->delete();
    
      } 
      
      public static function mostrarTareas($idVersion) {
          
           return  \DB::table('tareas')->where('ID_VERSION', '=', $idVersion)->get();
      }
      
      
       public static function traerTallas($id) {
           
         return \DB::table('tareas')->where('ID_VERSION', '=', $id)->select('ID_TALLA')->distinct()->get();
        
      }
    
}
