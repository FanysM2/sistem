<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aparato extends Model
{
    use HasFactory;


    protected $fillable = [
        'titulo',
        'ruta_imagen',
        'caracteristicas',
    ];
}
