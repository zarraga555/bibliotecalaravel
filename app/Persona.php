<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    protected $fillable = ['ci', 'complemento', 'nombre', 'direccion', 'telefono', 'correo', 'fechaNacimiento', 'paisNacimiento'];
    protected $table = 'persona';

}
