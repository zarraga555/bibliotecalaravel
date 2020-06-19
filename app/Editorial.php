<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Editorial extends Model
{
    protected $fillable = ['id','nombre'];
    protected $table = 'editorial';
}
