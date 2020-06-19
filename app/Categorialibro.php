<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categorialibro extends Model
{
    protected $fillable = ['id','nombre'];
    protected $table = 'categorialibro';
}
