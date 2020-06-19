<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Libro extends Model
{
    protected $fillable = ['codigoLibro','nombre','ideditorial','paginas','fecha_lanzamiento','idAutor','idCategoriaLibro'];
    protected $table = 'libro';
    protected $primaryKey = 'id';
    public function scopeName($query,$name)
    {
        if(trim($name)!="")
        {
            $query->where(DB::raw("LIKE","%$name%"));
        }
    }
}