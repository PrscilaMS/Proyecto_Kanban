<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    public $timestamps = false;
    protected $fillable = array('NOMBRE_USUARIO', 'APELLIDO', 'CORREO', 'CONTRASENNA', 'TIPO');
    
    public static function modificar($usuario) {
            \DB::table('usuarios')
            ->where('CORREO', $usuario->CORREO)
            ->update(['NOMBRE_USUARIO' => $usuario->NOMBRE_USUARIO, 'APELLIDO' => $usuario->APELLIDO, 'CONTRASENNA' => $usuario->CONTRASENNA, 'TIPO' => $usuario->TIPO]);
      }
      
      public static function eliminar($id) {
            \DB::table('usuarios')->where('CORREO', '=', $id)->delete();
      }
      
      public static function agregarPrivilegio($equipo, $usuario){
          \DB::table('usuario_equipo')->insert(['CORREO' => $usuario->CORREO, 'ID_EQUIPO' => $equipo->ID_EQUIPO]);
      }
      
      public static function eliminarPrivilegio($id) {
            \DB::table('usuario_equipo')->where('ID_EQUIPO', '=', $id)->delete();
      }
      
}

