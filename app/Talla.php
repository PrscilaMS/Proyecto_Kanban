<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Talla extends Model
{
    public $timestamps = false;
    protected $fillable = array('NOMBRE_TALLA');
    
    public static function modificar($talla) {
            \DB::table('tallas')
            ->where('ID_TALLA', $talla->ID_TALLA)
            ->update(['NOMBRE_TALLA' => $talla->NOMBRE_TALLA]);
      }
      
      public static function eliminar($id) {
            \DB::table('tallas')->where('ID_TALLA', '=', $id)->delete();
      }
}
