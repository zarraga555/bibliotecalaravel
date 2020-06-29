<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prestamo extends Model
{
    protected $fillable = ['id', 'tipoPrestamo', 'fecha_prestamo', 'fecha_devolucion', 'idLibro', 'idPersona', 'idUsuario'];
    protected $table = 'persona';
    public function scopeName($query,$tipopres)
    {
        if($tipopres){
            return $query->where('tipoPrestamo', "LIKE", "%$tipopres%");
        }
    }
    public function scopeId($query,$id)
    {
        if($id){
            return $query->where('id', "LIKE", "%$id%");
        }
    }

}