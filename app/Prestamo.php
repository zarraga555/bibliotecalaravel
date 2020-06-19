<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prestamo extends Model
{
    protected $fillable = ['id', 'tipoPrestamo', 'fecha_prestamo', 'fecha_devolucion', 'idLibro', 'idPersona', 'idUsuario'];
    protected $table = 'persona';

}