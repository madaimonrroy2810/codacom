<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vendedor extends Model
{
    protected $table = 'vendedores';

    protected $fillable = [
    'nombre_completo',
    'ci',
    'foto_carnet',
    'telefono',
    'nombre_negocio',
    'tipo_producto',
    'foto_frente',
    'foto_izquierda',
    'foto_derecha',
    'codigo_verificacion',
    'estado',
];
}