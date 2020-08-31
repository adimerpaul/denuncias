<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Denuncia extends Model
{
    protected $fillable=['solicitud','nombre','ci','celular','correo','direccion','denunciados','descripcion','estado'];
}
