<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tarea extends Model
{
        public $timestamps = false;
    protected $fillable = array('ID_TALLA', 'ENUNCIADO', 'ID_VERSION');//
}
