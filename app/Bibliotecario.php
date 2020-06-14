<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bibliotecario extends Model
{
    protected $fillable = ['ci', 'complemento', 'nombre', 'direccion', 'telefono', 'correo', 'turno', 'salario', 'fechaNacimiento', 'paisNacimiento'];
    protected $table = 'bibliotecario';
}
