<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TareaHistorico extends Model
{
    public $timestamps = false;
    
    protected $fillable = array('ID_TALLA', 'ID_HISTORICO', 'NOMBRE_TAREA_HISTRICO','DURACION_REQUERIMIENTOS',
    'DURACION_DISENO','DURACION_DESARROLLO','DURACION_PRUEBAS');//
    
     
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
      
      public static function traerTallas($id) {
         return \DB::table('tarea_historicos')->select('ID_TALLA')->where('ID_HISTORICO', '=', $id)->distinct()->get();
        
      }
      
      
      public static function ingresarHistoricoResumen($duracionRequerimientos, $duracionDiseno, $duracionDesarrollo, $duracionPruebas, $idHistorico, $idTalla, $total) {
          \DB::table('historico_resumens')->insert(['ID_TALLA' => $idTalla,  'TOTAL' => $total, 'ID_HISTORICO' => $idHistorico,  'DURACION_REQUERIMIENTOS' => $duracionRequerimientos,'DURACION_DISENO' => $duracionDiseno,'DURACION_DESARROLLO' => $duracionDesarrollo, 'DURACION_PRUEBAS' => $duracionPruebas]);
        
      }
}
