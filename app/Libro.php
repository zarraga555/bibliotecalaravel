<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//use Illuminate\DataBase\DataManager;
use Illuminate\Support\Facades\DB;

class Libro extends Model
{
    protected $fillable = ['codigoLibro','nombre','ideditorial','paginas','fecha_lanzamiento','idAutor','idCategoriaLibro'];
    protected $table = 'libro';
    protected $primaryKey = 'id';
    public function scopeName($query,$nombre)
    {
        if($nombre){
            return $query->where('nombre', "LIKE", "%$nombre%");
        }
    }
    public function scopeCodigoLibro($query,$codigoLibro)
    {
        if($codigoLibro){
            return $query->where('codigoLibro', "LIKE", "%$codigoLibro%");
        }
    }
}