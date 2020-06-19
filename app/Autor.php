<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Autor extends Model
{
    protected $fillable = ['id','nombre', 'nacionalidad'];
    protected $table = 'autor';
}
