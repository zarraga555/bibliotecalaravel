<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prestamo extends Model
{
    protected $fillable = ['id', 'fecha_prestamo', 'fecha_devolucion', 'idLibro', 'idPersona', 'idUsuario'];
    protected $table = 'prestamo';
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