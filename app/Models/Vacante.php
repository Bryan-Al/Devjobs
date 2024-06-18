<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vacante extends Model
{
    use HasFactory;

    protected $dates =['fecha'];
    
    protected $fillable =[
        'titulo',
        'salario_id',
        'categoria_id',
        'empresa',
        'fecha',
        'Descripcion',
        'imagen',
        'user_id'
    ];
    }
