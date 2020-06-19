<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
    protected $fillable = ['id','codigoLibro','nombre','paginas','fecha_lanzamiento','idEditorial','idAutor','idCategoriaLibro'];
    protected $table = 'libro';
}
