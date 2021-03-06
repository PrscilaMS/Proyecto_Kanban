<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Historico extends Model
{
      public $timestamps = false;
      protected $fillable = array('NOMBRE_HISTORICO', 'ID_EQUIPO','FECHA_INICIO', 'FECHA_FINAL', 'DURACION_TOTAL');
      
      
      public static function modificar($historico) {
            \DB::table('historicos')
            ->where('ID_HISTORICO', $historico->ID_HISTORICO)
            ->update(['NOMBRE_HISTORICO' => $historico->NOMBRE_HISTORICO, 'FECHA_INICIO' => $historico->FECHA_INICIO, 'FECHA_FINAL' => $historico->FECHA_FINAL, 'DURACION_TOTAL' => $historico->DURACION_TOTAL]);
      }
      public static function eliminar($id) {
            \DB::table('historicos')->where('ID_HISTORICO', '=', $id)->delete();
      }
      
       
      public static function modificarHoras($historico) {
            \DB::table('historicos')
            ->where('ID_HISTORICO', $historico->ID_HISTORICO)
            ->update(['DURACION_TOTAL' => $historico->DURACION_TOTAL]);
      }
      
      public static function historicoPorFechas($proyecto){
            
		$historicos =  \DB::table('historicos')->join('historico_resumens', 'historicos.ID_HISTORICO','=', 'historico_resumens.ID_HISTORICO')
		                                    ->select('*')->where('FECHA_INICIO', '>=',$proyecto->FECHA_ESTIMACION)
		                                    ->where('historicos.ID_EQUIPO', '=', $proyecto->ID_EQUIPO)->get();
		return $historicos;
      }
      
     
      
   
      
}
