<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Distrito extends Model
{
    protected $table = 'distritos';
    protected $fillable = ['nombre', 'estado'];
}