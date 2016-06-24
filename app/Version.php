<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Version extends Model
{
     public $timestamps = false;
     
    protected $fillable = array('NUMERO_VERSION', 'ID_PROYECTO');
    
          public static function crearVersion($id_proyecto) {
        $id = \DB::table('versions')->insertGetId(
    array( 'NUMERO_VERSION' => 1, 'ID_PROYECTO' => $id_proyecto));
    
    
    return $id;
      }
      
      public static function traerVersiones($idProyecto) {
        return  \DB::table('versions')->where(['ID_PROYECTO' => $idProyecto])->get();
    
      }
      
      public static function eliminarVersion($idVersion) {
       \DB::table('versions')->where('ID_VERSION', '>=',  $idVersion)->delete();
    
      }      
      
      public static function ingresarVersionResumen($duracionRequerimientos, $duracionDiseno, $duracionDesarrollo, $duracionPruebas, $idVersion, $idTalla, $total) {
          \DB::table('version_resumens')->insert(['ID_TALLA' => $idTalla,  'TOTAL' => $total, 'ID_VERSION' => $idVersion,  'DURACION_REQUERIMIENTOS' => $duracionRequerimientos,'DURACION_DISENO' => $duracionDiseno,'DURACION_DESARROLLO' => $duracionDesarrollo, 'DURACION_PRUEBAS' => $duracionPruebas]);
      }
      
}
