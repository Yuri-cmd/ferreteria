<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistorialMovimiento extends Model
{
    use HasFactory;
    protected $table = 'historial_movimiento';
    protected $primaryKey = 'id_historial';
    protected $fillable = [
        'id_usuario',
        'id_producto',
        'detalle_mov',
        'fecha',
    ];
}
