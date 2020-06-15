<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Autor extends Model
{
    protected $fillable = ['nombre', 'nacionalidad'];
    protected $table = 'autor';
}
