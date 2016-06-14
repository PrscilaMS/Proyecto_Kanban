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
}
