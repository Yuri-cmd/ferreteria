<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contador extends Model
{
    // Nombre de la tabla asociada
    protected $table = 'contadores';

    // Indicar que el modelo no usa timestamps
    public $timestamps = false;

    // Definir los atributos que pueden ser asignados en masa
    protected $fillable = ['nombre', 'valor'];

    // Definir la clave primaria
    protected $primaryKey = 'nombre';

    // Indicar que la clave primaria no es un entero autoincremental
    public $incrementing = false;

    // Definir el tipo de datos para el atributo 'valor'
    protected $casts = [
        'valor' => 'integer',
    ];
}
