<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TareaHistorico extends Model
{
    public $timestamps = false;
    protected $fillable = array('ID_TALLA', 'ID_HISTORICO', 'NOMBRE_TAREA_HISTRICO','DURACION_REQUERIMIENTOS',
    'DURACION_DISENO','DURACION_DESARROLLO','DURACION_PRUEBAS','DURACION_IMPLEMENTACION', 'DURACION_MANTENIMIENTO');//
    
     
    public static function modificar($tarea_historico) {
            \DB::table('tarea_historicos')
            ->where('ID_TAREA_HISTORICO', $tarea_historico->ID_EQUIPO)
            ->update(['NOMBRE_EQUIPO' => $tarea_historico->NOMBRE_EQUIPO , ]);
      }
      
    public static function eliminar($id) {
            \DB::table('tarea_historicos')->where('ID_TAREA_HISTORICO', '=', $id)->delete();
      }
    public static function mostrarTareas($historico) {
           return  \DB::table('tarea_historicos')->where('ID_HISTORICO', '=', $historico)->get();
      }
}
