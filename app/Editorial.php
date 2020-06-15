<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Editorial extends Model
{
    protected $fillable = ['nombre'];
    protected $table = 'editorial';
}
