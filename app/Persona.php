<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    protected $fillable = ['id','ci', 'complemento', 'nombre', 'direccion', 'telefono', 'correo', 'fechaNacimiento', 'paisNacimiento'];
    protected $table = 'persona';

}
